<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Database\Expression\QueryExpression;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 * @property \App\Model\Table\StudyMaterialsTable $StudyMaterials
 * @property \App\Model\Table\JobNotificationsTable $JobNotifications
 */
class PagesController extends AppController
{
    /**
     * @param EventInterface $event
     * @return \Cake\Http\Response|void|null
     */
    public function beforeFilter(EventInterface $event)
    {
        $this->Authentication->allowUnauthenticated([
            'index','contactUs','downloadPdf','aboutUs','download', 'privacyPolicy', 'adsFile',
            'previousYearQuestions', 'generalKnowledge', 'currentAffairs', 'queryBySubCategory'
        ]);
        /** @var  \App\Model\Table\CategoriesTable $studyMaterials */
        $studyMaterials = TableRegistry::getTableLocator()->get('StudyMaterials');
        $this->StudyMaterials = $studyMaterials;
        /** @var  \App\Model\Table\JobNotificationsTable $jobNotifications */
        $jobNotifications = TableRegistry::getTableLocator()->get('JobNotifications');
        $this->JobNotifications = $jobNotifications;
        parent::beforeFilter($event);

        $categories = $this->StudyMaterials->SubCategories->Categories->find('all');
        $subCategories = $this->StudyMaterials->SubCategories->find('all');
        $this->set('categories', $categories);
        $this->set('subCategories', $subCategories);
    }

    /**
     * @return void
     */
    public function index()
    {
        $categories = $this->StudyMaterials->SubCategories->Categories->find()->find('enabled')->all();
        $subCategories = $this->StudyMaterials->SubCategories->find()->find('enabled')->contain([
            'Categories',
        ])->all();
        $notes = $this->StudyMaterials->find()->contain([
            'SubCategories',
            'SubCategories.Categories',
        ])->all();
        $notifications = $this->JobNotifications->find()->find('enabled')
            ->orderDesc('created')->all();
        $this->set('categories', $categories);
        $this->set('subCategories', $subCategories);
        $this->set('notes', $notes);
        $this->set('notifications', $notifications);
        $this->set('titleForLayout', __('All Exam Knowledge'));
    }

    /**
     * @param string|null $id Study Material ID
     * @return string
     */
    public function pdfView(?string $id = null)
    {
        $pdfFile = $this->StudyMaterials->get($id);
        /** @var \Cake\Http\Response $response */
        $response = $this->response;
        $response = $response->withType('application/pdf');
        $response = $response->getBody()->getContents($pdfFile->file);

        return $response;
    }

    public function aboutUs()
    {
        $this->set('titleForLayout', __('About Us'));
    }

    public function contactUs()
    {
        $this->set('titleForLayout', __('Contact Us'));
    }

    public function privacyPolicy()
    {
        $this->set('titleForLayout', __('Privacy Policy'));
    }

    /**
     * @return void
     */
    public function downloadPdf()
    {
        $notes = $this->StudyMaterials->find()->contain([
            'SubCategories',
            'SubCategories.Categories',
        ])->all();
        $this->set('notes', $notes);
        $this->set('titleForLayout', __('Download PDF'));
    }

    /**
     * @param string|null $filename
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function download(?string $filename = null)
    {
        $filePath = WWW_ROOT . 'files' . DS . 'study_materials' . DS . 'file' . DS . $filename;
        $this->response = $this->response->withFile($filePath);

        return $this->response;
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adsFile()
    {
        $filePath = WWW_ROOT. 'files' . DS . 'ads.txt';
        $this->response = $this->response->withFile($filePath);

        return $this->response;
    }

    /**
     * @return void
     */
    public function previousYearQuestions()
    {
        $query = $this->StudyMaterials->find()->contain([
            'SubCategories',
            'SubCategories.Categories',
        ])->where([
            'Categories.code' => 'PYQ'
        ]);
        $subCategories = $this->StudyMaterials->SubCategories->find()->contain([
            'Categories',
        ])->where([
            'Categories.code' => 'PYQ'
        ])->orderAsc('SubCategories.created')->all();
        $sc = $this->StudyMaterials->SubCategories->find('list')->contain([
            'Categories',
        ])->where([
            'Categories.code' => 'PYQ'
        ]);
        if ($this->getRequest()->getQuery('sub_category')) {
            $query->where(function (QueryExpression $expression) {
                return $expression->or([
                    $this->StudyMaterials->aliasField('sub_category_id') . ' IS' =>
                        $this->getRequest()->getQuery('sub_category'),
                ]);
            });
        }
        $notes = $this->paginate($query, [
            'limit' => 10,
            'maxLimit' => 100
        ]);
        $this->set('notes', $notes);
        $this->set('subCategories', $subCategories);
        $this->set('sc', $sc);
        $this->set('titleForLayout', __('Previous year Question'));
    }

    /**
     * @return void
     */
    public function generalKnowledge()
    {
        $query = $this->StudyMaterials->find()->contain([
            'SubCategories',
            'SubCategories.Categories',
        ])->where([
            'Categories.code' => 'GK'
        ]);
        $subCategories = $this->StudyMaterials->SubCategories->find('list')->contain([
            'Categories',
        ])->where([
            'Categories.code' => 'GK'
        ])->orderAsc('SubCategories.created')->all();
        if ($this->getRequest()->getQuery('sub_category')) {
            $query->where(function (QueryExpression $expression) {
                return $expression->or([
                    $this->StudyMaterials->aliasField('sub_category_id') . ' IS' =>
                        $this->getRequest()->getQuery('sub_category'),
                ]);
            });
        }
        $notes = $this->paginate($query, [
            'limit' => 10,
            'maxLimit' => 100
        ]);
        $this->set('notes', $notes);
        $this->set('subCategories', $subCategories);
        $this->set('titleForLayout', __('General Knowledge'));
    }

    /**
     * @return void
     */
    public function currentAffairs()
    {
        $query = $this->StudyMaterials->find()->contain([
            'SubCategories',
            'SubCategories.Categories',
        ])->where([
            'Categories.code' => 'CA'
        ]);
        $subCategories = $this->StudyMaterials->SubCategories->find('list')->contain([
            'Categories',
        ])->where([
            'Categories.code' => 'CA'
        ])->orderAsc('SubCategories.created')->all();
        if ($this->getRequest()->getQuery('sub_category')) {
            $query->where(function (QueryExpression $expression) {
                return $expression->or([
                    $this->StudyMaterials->aliasField('sub_category_id') . ' IS' =>
                        $this->getRequest()->getQuery('sub_category'),
                ]);
            });
        }
        $notes = $this->paginate($query, [
            'limit' => 10,
            'maxLimit' => 100
        ]);
        $this->set('notes', $notes);
        $this->set('subCategories', $subCategories);
        $this->set('titleForLayout', __('Current Affairs'));
    }

    /**
     * @param string|null $id
     * @return \Cake\Http\Response
     */
    public function dataBySubCategory(?string $id = null)
    {
        $this->getRequest()->allowMethod(['get', 'ajax', 'post']);
        $this->getResponse()->withType('json');
        $subCategory = $this->StudyMaterials->SubCategories->get($id, [
            'contain' => ['Categories',]
        ]);
        $notes = $this->StudyMaterials->find()->where([
            $this->StudyMaterials->aliasField('sub_category_id') => $subCategory->id,
        ])->orderAsc('StudyMaterials.title')->enableHydration(false)->all();
        /** @var string $responseBody */
        $responseBody = json_encode($notes);

        return $this->getResponse()->withStringBody($responseBody);
    }

    /**
     * @param string|null $id
     * @param string|null $catId
     * @return void
     */
    public function queryBySubCategory(?string $id = null, ?string $catId = null)
    {
        $category = $this->StudyMaterials->SubCategories->Categories->get($catId);
        $subCat = $this->StudyMaterials->SubCategories->get($id, [
            'contain' => ['Categories']
        ]);
        $subCategories = $this->StudyMaterials->SubCategories->find()->contain([
            'Categories',
        ])->where([
            $this->StudyMaterials->SubCategories->aliasField('category_id') => $category->id,
        ])->orderAsc('SubCategories.created')->all();
        $notes = $this->StudyMaterials->find()->where([
            $this->StudyMaterials->aliasField('sub_category_id') => $subCat->id,
        ])->orderAsc('StudyMaterials.title')->all();

        $this->set('notes', $notes);
        $this->set('subCategories', $subCategories);
        $this->set('titleForLayout', __('{0}', [
            $subCat->title
        ]));
    }
}
