<?php
declare(strict_types=1);
namespace App\Controller\Admin;

use Cake\Event\EventInterface;
use Cake\Routing\Router;

/**
 * Class BlogsController
 * @package App\Controller
 *
 * @property \App\Model\Table\BlogArticlesTable $Blogs
 */
class BlogsController extends AppController
{

    public $paginate = [
      'limit' => 20,
      'maxLimit' => 200
    ];

    /**
     * @param EventInterface $event
     * @return \Cake\Http\Response|void|null
     */
    public function beforeFilter(EventInterface $event)
    {
        $this->Blogs = $this->getTableLocator()->get('BlogArticles');
        parent::beforeFilter($event);
    }

    /**
     * @return void
     */
    public function index()
    {
        $query = $this->Blogs->find()->contain([
            'BlogCategories',
            'BlogAuthors',
        ]);
        $articles = $this->paginate($query);
        $this->set('titleForLayout', __('Articles'));
        $this->set('articles', $articles);
        $this->viewBuilder()->setLayout('admin_default');
    }

    /**
     * @param string|null $id Article ID
     * @return void
     */
    public function view(?string $id = null)
    {

    }

    /**
     * @return \Cake\Http\Response|void|null
     */
    public function createArticle()
    {
        $article = $this->Blogs->newEmptyEntity();
        if ($this->getRequest()->is(['post', 'ajax'])) {
            /** @var array $postData */
            $postData = $this->getRequest()->getData();
            $article = $this->Blogs->patchEntity($article, $postData);
            if ($this->Blogs->save($article)) {
                $this->Flash->success(__('Blog Article has been successfully posted'));
                return $this->redirect(Router::url([
                    'controller' => 'Blogs',
                    'action' => 'index',
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
     * @param string|null $id Article ID
     * @return void
     */
    public function editArticle(?string $id = null)
    {

    }

    public function dashboard()
    {
        $this->set('titleForLayout', __('Blogs Menu'));
        $this->viewBuilder()->setLayout('admin_default');
    }

    /**
     * @return void
     */
    public function categories()
    {
        $query = $this->Blogs->BlogCategories->find()->orderDesc('disabled');
        $blogCategories = $this->paginate($query);
        $this->set('titleForLayout', __('Blogs Categories'));
        $this->set('blogCategories', $blogCategories,);
        $this->viewBuilder()->setLayout('admin_default');
    }

    /**
     * @param string|null $id Category ID
     * @return void
     */
    public function viewCategory(?string $id = null)
    {
        $category = $this->Blogs->BlogCategories->get($id);
        $this->set('category', $category);
        $this->set('titleForLayout', __('Category - {0}', [
            $category->title
        ]));
        $this->viewBuilder()->setLayout('admin_default');
    }

    /**
     * @return \Cake\Http\Response|void|null
     */
    public function addCategory()
    {
        $category = $this->Blogs->BlogCategories->newEmptyEntity();
        if ($this->getRequest()->is(['post', 'ajax'])) {
            /** @var array $postData */
            $postData = $this->getRequest()->getData();
            $category = $this->Blogs->BlogCategories->patchEntity($category, $postData);
            if ($this->Blogs->BlogCategories->save($category)) {
                $this->Flash->success(__('{0} has been added successfully', [
                    $category->code
                ]));
                return $this->redirect(Router::url([
                    'controller' => 'Blogs',
                    'action' => 'categories',
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
    public function editCategory(?string $id = null)
    {
        $category = $this->Blogs->BlogCategories->get($id);
        if ($this->getRequest()->is(['post', 'put', 'patch', 'ajax'])) {
            /** @var array $postData */
            $postData = $this->getRequest()->getData();
            $category = $this->Blogs->BlogCategories->patchEntity($category, $postData);
            if ($this->Blogs->BlogCategories->save($category)) {
                $this->Flash->success(__('{0} has been edited successfully', [
                    $category->title
                ]));
                return $this->redirect(Router::url([
                    'action' => 'viewCategory',
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
     * @return void
     */
    public function authors()
    {
        $query = $this->Blogs->BlogAuthors->find()->orderDesc('disabled');
        $authors = $this->paginate($query);
        $this->set('titleForLayout', __('Blogs Authors'));
        $this->set('authors', $authors);
        $this->viewBuilder()->setLayout('admin_default');
    }

    /**
     * @param string|null $id Author ID
     * @return void
     */
    public function viewAuthor(?string $id = null)
    {
        $author = $this->Blogs->BlogAuthors->get($id);
        $this->set('author', $author);
        $this->set('titleForLayout', __('Author - {0}', [
            $author->first_name
        ]));
        $this->viewBuilder()->setLayout('admin_default');
    }

    /**
     * @return \Cake\Http\Response|void|null
     */
    public function addAuthor()
    {
        $author = $this->Blogs->BlogAuthors->newEmptyEntity();
        if ($this->getRequest()->is(['post', 'ajax'])) {
            /** @var array $postData */
            $postData = $this->getRequest()->getData();
            $author = $this->Blogs->BlogAuthors->patchEntity($author, $postData);
            if ($this->Blogs->BlogAuthors->save($author)) {
                $this->Flash->success(__('{0} has been added successfully', [
                    $author->first_name
                ]));
                return $this->redirect(Router::url([
                    'controller' => 'Blogs',
                    'action' => 'authors',
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
     * @param string|null $id Author ID
     * @return \Cake\Http\Response|void|null
     */
    public function editAuthor(?string $id = null)
    {
        $author = $this->Blogs->BlogAuthors->get($id);
        if ($this->getRequest()->is(['post', 'put', 'patch', 'ajax'])) {
            /** @var array $postData */
            $postData = $this->getRequest()->getData();
            $author = $this->Blogs->BlogAuthors->patchEntity($author, $postData);
            if ($this->Blogs->BlogAuthors->save($author)) {
                $this->Flash->success(__('{0} has been edited successfully', [
                    $author->first_name
                ]));
                return $this->redirect(Router::url([
                    'action' => 'viewAuthor',
                    $author->id,
                ]));
            } else {
                $this->response = $this->response->withStatus(400);
                $this->Flash->error(__('Something went wrong, please try to add again'));
            }
            return $this->redirect($this->referer());
        }
    }
}
