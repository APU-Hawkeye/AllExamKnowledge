<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController as BaseController;
use Authentication\Controller\Component\AuthenticationComponent;
use Cake\Event\EventInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AppController
 * @package App\Controller\Admin
 *
 * @property AuthenticationComponent $Authentication
 * @property \Psr\Http\Message\ResponseInterface $response
 */
class AppController extends BaseController
{
    /**
     * @return void
     * @throws \Exception
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authentication.Authentication');
    }

    /**
     * @param EventInterface $event
     * @return \Cake\Http\Response|void|null
     */
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->FormProtection->setConfig([
            'validate' => false
        ]);
    }
}
