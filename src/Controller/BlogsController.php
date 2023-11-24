<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

/**
 * Blogs Controller
 *
 * @property \App\Model\Table\BlogArticlesTable $Articles
 * @property \App\Model\Table\SubCategoriesTable $SubCategories
 */
class BlogsController extends AppController
{
    /**
     * @param EventInterface $event Event Interface
     * @return \Cake\Http\Response|void|null
     */
    public function beforeFilter(EventInterface $event)
    {
        $this->Authentication->allowUnauthenticated([
            'index', 'blog',
        ]);
        /** @var  \App\Model\Table\BlogArticlesTable $articles */
        $articles = TableRegistry::getTableLocator()->get('BlogArticles');
        $this->Articles = $articles;
        /** @var \App\Model\Table\SubCategoriesTable $subCategories */
        $subCategories = TableRegistry::getTableLocator()->get('SubCategories');
        $this->SubCategories = $subCategories;

        $subCate = $this->SubCategories->find()->find('enabled')->contain([
            'Categories',
        ])->all();
        $cate = $this->SubCategories->Categories->find()->find('enabled')->all();
        $this->set('cate', $cate);
        $this->set('subCate', $subCate);

        return parent::beforeFilter($event);
    }

    /**
     * @return void
     */
    public function index()
    {
        $query = $this->Articles->find()->contain([
            'BlogCategories',
            'BlogAuthors',
        ]);
        $articles = $this->paginate($query,[
            'limit' => 10,
            'maxLimit' => 100
        ]);
        $this->set('titleForLayout', __('Blog Articles'));
        $this->set('articles', $articles);
    }

    /**
     * @param string|null $id Blog Article ID
     * @return void
     */
    public function blog(?string $id = null)
    {
        $blog = $this->Articles->get($id, [
            'contain' => [
                'BlogAuthors',
                'BlogCategories',
            ],
        ]);
        $this->set('titleForLayout', __('Blog Article'));
        $this->set('blog', $blog);
    }
}
