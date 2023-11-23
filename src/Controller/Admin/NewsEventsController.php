<?php
declare(strict_types=1);

namespace App\Controller\Admin;


use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

/**
 * Class NewsEventsController
 * @package App\Controller
 *
 * @property \App\Model\Table\NewsEventsTable $NewsEvents
 */
class NewsEventsController extends AppController
{
    public $paginate = [
        'limit' => 30,
        'maxLimit' => 600,
    ];

    /**
     * @param EventInterface $event
     * @return \Cake\Http\Response|void|null
     */
    public function beforeFilter(EventInterface $event)
    {
        /** @var  \App\Model\Table\NewsEventsTable $newEvents */
        $newEvents = TableRegistry::getTableLocator()->get('NewsEvents');
        $this->NewsEvents = $newEvents;
        parent::beforeFilter($event);
    }

    /**
     * @return void
     */
    public function index()
    {
        $query = $this->NewsEvents->find()->orderDesc('created');
        $newsEvents = $this->paginate($query);
        $this->set('newsEvents', $newsEvents);
        $this->set('titleForLayout', 'New Events');
        $this->viewBuilder()->setLayout('admin_default');
    }

    /**
     * @param string|null $id NewsEvent ID
     * @return void
     */
    public function view(?string $id = null)
    {
        $newsEvent = $this->NewsEvents->get($id);
        $this->set('newsEvent', $newsEvent);
        $this->set('titleForLayout', 'New Events');
        $this->viewBuilder()->setLayout('admin_default');
    }

    /**
     * @return \Cake\Http\Response|void|null
     */
    public function add()
    {
        $newsEvent = $this->NewsEvents->newEmptyEntity();
        if ($this->getRequest()->is(['post', 'ajax'])) {
            /** @var array $postData */
            $postData = $this->getRequest()->getData();
            $newsEvent = $this->NewsEvents->patchEntity($newsEvent, $postData);
            if ($this->NewsEvents->save($newsEvent)) {
                $this->Flash->success(__('Job Notification has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Job Notification could not be saved. Please, try again.'));
        }
        $this->set(compact('newsEvent'));
    }

    /**
     * @param string|null $id Study Material ID
     * @return \Cake\Http\Response|void|null
     */
    public function edit(?string $id = null)
    {
        $newsEvent = $this->NewsEvents->get($id);
        if ($this->getRequest()->is(['post', 'put', 'patch', 'ajax'])) {
            /** @var array $postData */
            $postData = $this->getRequest()->getData();
            $newsEvent = $this->NewsEvents->patchEntity($newsEvent, $postData);
            if ($this->NewsEvents->save($newsEvent)) {
                $this->Flash->success(__('{0} has been edited successfully', [
                    $newsEvent->title
                ]));

                return $this->redirect(Router::url([
                    'action' => 'view',
                    $newsEvent->id,
                ]));
            } else {
                $this->response = $this->response->withStatus(400);
                $this->Flash->error(__('Something went wrong, please try to add again'));
            }
            return $this->redirect($this->referer());
        }
    }

    /**
     * @param string|null $id ID
     * @return \Cake\Http\Response|null
     */
    public function disable(?string $id = null): ?\Cake\Http\Response
    {
        $this->getRequest()->allowMethod(['post']);
        $newsEvent = $this->NewsEvents->get($id);
        if ($this->NewsEvents->disable($newsEvent)) {
            $this->Flash->success(__('{0} has been successfully disabled.', [
                $newsEvent->title,
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
    public function enable(?string $id = null): ?\Cake\Http\Response
    {
        $this->getRequest()->allowMethod(['post']);
        $newsEvent = $this->NewsEvents->get($id);
        if ($this->NewsEvents->enable($newsEvent)) {
            $this->Flash->success(__('{0} has been successfully enabled.', [
                $newsEvent->title,
            ]));
        } else {
            $this->Flash->error(__('Something went wrong. Kindly try again later'));
        }

        return $this->redirect($this->referer());
    }

}
