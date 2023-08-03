<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

/**
 * Class AgenciesController
 * @package App\Controller
 *
 * @property \App\Model\Table\StudyMaterialsTable $StudyMaterials
 */
class StudyMaterialsController extends AppController
{
    /**
     * @param EventInterface $event
     * @return \Cake\Http\Response|void|null
     */
    public function beforeFilter(EventInterface $event)
    {
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
        $studyMaterials = $this->StudyMaterials->find()->contain([
            'SubCategories',
            'SubCategories.Categories',
        ])->orderAsc('StudyMaterials.title');
        $categories = $this->StudyMaterials->SubCategories->find('list')
            ->contain('Categories')->all();
        $this->set('studyMaterials', $studyMaterials);
        $this->set('categories', $categories);
        $this->set('titleForLayout', 'Study Materials');
        $this->viewBuilder()->setLayout('admin_default');
    }

    /**
     * @return \Cake\Http\Response|void|null
     */
    public function add()
    {
        $note = $this->StudyMaterials->newEmptyEntity();
        if ($this->getRequest()->is(['post', 'ajax'])) {
            /** @var array $postData */
            $postData = $this->getRequest()->getData();
            $note = $this->StudyMaterials->patchEntity($note, $postData);
            //dd($note);
            if ($this->StudyMaterials->save($note)) {
                $this->Flash->success(__('Study Material has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Study Material could not be saved. Please, try again.'));
        }
        $this->set(compact('note'));
    }

    public function edit()
    {

    }

    /**
     * @param string|null $id Study Material ID
     * @return void
     */
    public function view(?string $id = null)
    {
        $studyMaterial = $this->StudyMaterials->get($id, [
            'contain' => [
                'SubCategories',
                'SubCategories.Categories',
            ],
        ]);
        $this->viewBuilder()->setLayout('admin_default');
        $this->set('titleForLayout', $studyMaterial->title);
        $this->set('studyMaterial', $studyMaterial);
    }

    /**
     * @param string|null $id Study Material ID
     * @return string
     */
    public function file(?string $id = null)
    {
        $pdfFile = $this->StudyMaterials->get($id);
        /** @var \Cake\Http\Response $response */
        $response = $this->response;
        $response = $response->withType('application/pdf');
        $response = $response->getBody()->getContents($pdfFile->file);

        return $response;
    }
}
