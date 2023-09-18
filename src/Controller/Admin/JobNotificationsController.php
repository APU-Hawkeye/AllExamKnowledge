<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

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


}

