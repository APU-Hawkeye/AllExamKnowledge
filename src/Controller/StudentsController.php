<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\StudentsTable;
use Cake\Database\Expression\QueryExpression;
use Cake\Event\EventInterface;
use Cake\Routing\Router;

/**
 * Class StudentsController
 * @package App\Controller\Admin
 *
 * @property StudentsTable $Students
 */
class StudentsController extends AppController
{
    /**
     * @var int[]
     */
    public $paginate = [
        'limit' => 25,
        'maxLimit' => 50
    ];

    /**
     * @param EventInterface $event
     * @return \Cake\Http\Response|void|null
     */
    public function beforeFilter(EventInterface $event)
    {
        $this->Authentication->addUnauthenticatedActions([
            'login',
            'logout',
            'register',
            'forgotPassword',
            'resetPassword',
        ]);
        $this->Students = $this->getTableLocator()->get('Students');
        parent::beforeFilter($event);
    }

    /**
     * @return \Cake\Http\Response|void|null|void
     */
    public function register()
    {
        $student = $this->Students->newEmptyEntity();
        if ($this->getRequest()->is(['post', 'put', 'patch'])) {
            $student = $this->Students->patchEntity($student, $this->getRequest()->getData());
            if ($this->Students->save($student)) {
                $this->Flash->success(__("You're account has been created successfully. Please log in."));

                return $this->redirect([
                    'controller' => 'Students',
                    'action' => 'login',
                    '?' => [
                        'referer' => $this->getRequest()->getQuery('referer'),
                    ],
                ]);
            } else {
                $this->response = $this->response->withStatus(400);
                $this->Flash->error("User could not be saved. Please try again.");
            }
        }
        $this->set('student', $student);
        $this->viewBuilder()->disableAutoLayout();
        $this->set('titleForLayout', __("Register"));
    }

    /**
     * @return \Cake\Http\Response|null|void
     * @throws \Exception
     */
    public function login()
    {
        $result = $this->Authentication->getResult();
        if ($result) {
            if ($result->isValid()) {
                $identity = $this->Authentication->getIdentity();
                $this->Authentication->setIdentity($identity);
                $redirectTarget = $this->Authentication->getLoginRedirect() ?? [
                        'controller' => 'Students',
                        'action' => 'dashboard',
                    ];
                $this->response = $this->response->withLocation(Router::url($redirectTarget));

                return $this->response;
            }
            else {
                if($this->getRequest()->is('post') && !$result->isValid()) {
                    $this->response = $this->response->withStatus(401);
                    $this->Flash->error(__("Incorrect username or password."));
                }
            }
        }
        $this->viewBuilder()->disableAutoLayout();
        $this->set('titleForLayout', __("Login"));
    }

    /**
     * @return \Cake\Http\Response|null|void
     */
    public function logout()
    {
        $this->Flash->set(__("You've successfully logged out."), [
            'element' => 'error'
        ]);
        if ( $this->Authentication->getIdentity() ) {
            $this->Authentication->logout();
        }
        return $this->redirect([
            'action' => 'login'
        ]);
    }

    /**
     * @return void
     */
    public function dashboard()
    {
        $identity = $this->Authentication->getIdentity();
        if ($identity != null) {
            $id = $identity->getIdentifier();
            $student = $this->Students->get($id);
        }
        $this->set('student', $student);
        $this->set('titleForLayout', __('Dashboard'));
    }
}
