<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

/**
 * Class JobNotificationsController
 * @package App\Controller
 *
 * @property \App\Model\Table\JobNotificationsTable $JobNotifications
 */
class JobNotificationsController extends AppController
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
        /** @var  \App\Model\Table\JobNotificationsTable $notifications */
        $notifications = TableRegistry::getTableLocator()->get('JobNotifications');
        $this->JobNotifications = $notifications;
        parent::beforeFilter($event);
    }

    /**
     * @return void
     */
    public function index()
    {
        $query = $this->JobNotifications->find()->orderDesc('created');
        $notifications = $this->paginate($query);
        $this->set('notifications', $notifications);
        $this->set('titleForLayout', 'Job Notifications');
        $this->viewBuilder()->setLayout('admin_default');
    }

    /**
     * @return \Cake\Http\Response|void|null
     */
    public function add()
    {
        $notification = $this->JobNotifications->newEmptyEntity();
        if ($this->getRequest()->is(['post', 'ajax'])) {
            /** @var array $postData */
            $postData = $this->getRequest()->getData();
            $notification = $this->JobNotifications->patchEntity($notification, $postData);
            if ($this->JobNotifications->save($notification)) {
                $this->Flash->success(__('Job Notification has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Job Notification could not be saved. Please, try again.'));
        }
        $this->set(compact('notification'));
    }

    /**
     * @param string|null $id Study Material ID
     * @return \Cake\Http\Response|void|null
     */
    public function edit(?string $id = null)
    {
        $notification = $this->JobNotifications->get($id);
        if ($this->getRequest()->is(['post', 'put', 'patch', 'ajax'])) {
            /** @var array $postData */
            $postData = $this->getRequest()->getData();
            $notification = $this->JobNotifications->patchEntity($notification, $postData);
            if ($this->JobNotifications->save($notification)) {
                $this->Flash->success(__('{0} has been edited successfully', [
                    $notification->title
                ]));

                return $this->redirect(Router::url([
                    'action' => 'view',
                    $notification->id,
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
        $notification= $this->JobNotifications->get($id);
        if ($this->JobNotifications->disable($notification)) {
            $this->Flash->success(__('{0} has been successfully disabled.', [
                $notification->title,
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
        $notification = $this->JobNotifications->get($id);
        if ($this->JobNotifications->enable($notification)) {
            $this->Flash->success(__('{0} has been successfully enabled.', [
                $notification->title,
            ]));
        } else {
            $this->Flash->error(__('Something went wrong. Kindly try again later'));
        }

        return $this->redirect($this->referer());
    }

}

