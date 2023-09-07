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
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController
{
    /**
     * @param EventInterface $event
     * @return \Cake\Http\Response|void|null
     */
    public function beforeFilter(EventInterface $event)
    {
        /** @var  \App\Model\Table\CategoriesTable $categories */
        $categories = TableRegistry::getTableLocator()->get('Categories');
        $this->Categories = $categories;
        parent::beforeFilter($event);

        $categories = $this->Categories->find('all');
        $this->set(compact('categories'));
    }

    /**
     * @return void
     */
    public function index()
    {
        $query = $this->Categories->find()->orderAsc('title');
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
                    $this->Categories->aliasField('title') . ' LIKE' => '%' . $searchQuery . '%',
                    $this->Categories->aliasField('code') . ' LIKE' => '%' . $searchQuery . '%'
                ]);
            });
        }
        $categories = $this->paginate($query);
        $this->set('categories', $categories);
        $this->set('titleForLayout', 'Main Categories');
        $this->viewBuilder()->setLayout('admin_default');
    }

    /**
     * @return \Cake\Http\Response|void|null
     */
    public function add()
    {
        $category = $this->Categories->newEmptyEntity();
        if ($this->getRequest()->is(['post', 'ajax'])) {
            $category = $this->Categories->patchEntity($category, $this->getRequest()->getData());
            if ($this->Categories->save($category)) {
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
        $category = $this->Categories->get($id);
        if ($this->getRequest()->is(['post', 'put', 'patch', 'ajax'])) {
            $category = $this->Categories->patchEntity($category, $this->getRequest()->getData());
            if ($this->Categories->save($category)) {
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
        $category = $this->Categories->get($id);
        $this->viewBuilder()->setLayout('admin_default');
        $this->set('titleForLayout', $category->title);
        $this->set('category', $category);
    }

    /**
     * @param string|null $id ID
     * @return \Cake\Http\Response|null
     */
    public function disable(?string $id = null)
    {
        $this->getRequest()->allowMethod(['post']);
        $category = $this->Categories->get($id);
        if ($this->Categories->disable($category)) {
            $this->Flash->success(__('{0} has been successfully disabled.', [
                $category->title,
            ]));
        } else {
            $this->Flash->error(__('Something went wrong. Kindly try again later'));
        }

        return $this->redirect($this->referer());
    }

    /**
     * @param string|null $id ID
     * @return \Cake\Http\Response|null
     */
    public function enable(?string $id = null)
    {
        $this->getRequest()->allowMethod(['post']);
        $category = $this->Categories->get($id);
        if ($this->Categories->enable($category)) {
            $this->Flash->success(__('{0} has been successfully enabled.', [
                $category->title,
            ]));
        } else {
            $this->Flash->error(__('Something went wrong. Kindly try again later'));
        }

        return $this->redirect($this->referer());
    }
}
