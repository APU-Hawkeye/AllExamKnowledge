<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Database\Expression\QueryExpression;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

/**
 * Class AgenciesController
 * @package App\Controller
 *
 * @property \App\Model\Table\SubCategoriesTable $SubCategories
 */
class SubCategoriesController extends \App\Controller\AppController
{
    /**
     * @param EventInterface $event
     * @return \Cake\Http\Response|void|null
     */
    public function beforeFilter(EventInterface $event)
    {
        /** @var  \App\Model\Table\CategoriesTable $categories */
        $categories = TableRegistry::getTableLocator()->get('SubCategories');
        $this->SubCategories = $categories;
        parent::beforeFilter($event);

        $subCategories = $this->SubCategories->find('all')
            ->orderAsc('title')->orderAsc('created');
        $this->set(compact('subCategories'));
    }

    /**
     * @return void
     */
    public function index()
    {
        $query = $this->SubCategories->find()->contain('Categories')->orderAsc('SubCategories.title');
        if ($this->getRequest()->getQuery('status') === 'active') {
            $query->find('enabled');
        }
        if ($this->getRequest()->getQuery('status') === 'disabled') {
            $query->find('disabled');
        }
        $searchQuery = $this->getRequest()->getQuery('q');
        if (is_string($searchQuery)) {
            $query->where(function (QueryExpression $expression) use ($searchQuery) {
                return $expression->or([
                    $this->SubCategories->aliasField('title') . ' LIKE' => '%' . $searchQuery . '%',
                    $this->SubCategories->aliasField('code') . ' LIKE' => '%' . $searchQuery . '%'
                ]);
            });
        }
        $categories = $this->SubCategories->Categories->find('list')->all();
        $subCategories = $this->paginate($query);
        $this->set('categories', $categories);
        $this->set('subCategories', $subCategories);
        $this->set('titleForLayout', 'Sub Categories');
        $this->viewBuilder()->setLayout('admin_default');
    }

    /**
     * @return \Cake\Http\Response|void|null
     */
    public function add()
    {
        $category = $this->SubCategories->newEmptyEntity();
        if ($this->getRequest()->is(['post', 'ajax'])) {
            $category = $this->SubCategories->patchEntity($category, $this->getRequest()->getData());
            if ($this->SubCategories->save($category)) {
                $this->Flash->success(__('{0} has been added successfully', [
                    $category->code
                ]));
            } else {
                $this->response = $this->response->withStatus(400);
                $this->Flash->error(__('Something went wrong, please try to add again'));
            }
            return $this->redirect(Router::url([
                'action' => 'index'
            ]));
        }
    }

    /**
     * @param string|null $id Category ID
     * @return \Cake\Http\Response|void|null
     */
    public function edit(?string $id = null)
    {
        $category = $this->SubCategories->get($id);
        if ($this->getRequest()->is(['post', 'put', 'patch', 'ajax'])) {
            $category = $this->SubCategories->patchEntity($category, $this->getRequest()->getData());
            if ($this->SubCategories->save($category)) {
                $this->Flash->success(__('{0} has been edited successfully', [
                    $category->title
                ]));
                return $this->redirect(Router::url([
                    'action' => 'view',
                    $category->id,
                ]));
            } else {
                $this->response = $this->response->withStatus(400);
                $this->Flash->error(__('Something went wrong, please try to add again'));
            }
            return $this->redirect($this->referer());
        }
    }

    /**
     * @param string|null $id Category ID
     * @return void
     */
    public function view(?string $id = null)
    {
        $category = $this->SubCategories->get($id, [
            'contain' => [
                'Categories',
            ],
        ]);
        $categories = $this->SubCategories->Categories->find('list')->all();
        $this->viewBuilder()->setLayout('admin_default');
        $this->set('titleForLayout', $category->title);
        $this->set('category', $category);
        $this->set('categories', $categories);
    }
}
