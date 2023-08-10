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

use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 * @property \App\Model\Table\StudyMaterialsTable $StudyMaterials
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
            'index','contactUs','downloadPdf','aboutUs','download',
        ]);
        /** @var  \App\Model\Table\CategoriesTable $studyMaterials */
        $studyMaterials = TableRegistry::getTableLocator()->get('StudyMaterials');
        $this->StudyMaterials = $studyMaterials;
        parent::beforeFilter($event);
    }

    /**
     * @return void
     */
    public function index()
    {
        $categories = $this->StudyMaterials->SubCategories->Categories->find()->all();
        $subCategories = $this->StudyMaterials->SubCategories->find()->contain([
            'Categories',
        ])->all();
        $notes = $this->StudyMaterials->find()->contain([
            'SubCategories',
            'SubCategories.Categories',
        ])->all();
        $this->set('categories', $categories);
        $this->set('subCategories', $subCategories);
        $this->set('notes', $notes);
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

    public function downloadPdf()
    {
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
}
