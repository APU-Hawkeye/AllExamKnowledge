<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\StudentsTable;
use Cake\Database\Expression\QueryExpression;
use Cake\Event\EventInterface;

/**
 * Class UsersController
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
            'changePassword',
        ]);
        $this->Students = $this->getTableLocator()->get('Students');
        parent::beforeFilter($event);
    }

    /**
     * @return \Cake\ORM\Query|void
     */
    public function index()
    {
        $query = $this->Students->find()->order([
            $this->Students->aliasField('disabled').' IS NULL ' => 'DESC',
            $this->Students->aliasField('first_name') => 'ASC'
        ]);
        if ($this->getRequest()->getQuery('status') === 'active') {
            return $query->find('enabled');
        }
        if ($this->getRequest()->getQuery('status') === 'disabled') {
            return $query->find('disabled');
        }
        if ($this->getRequest()->getQuery('q')) {
            $query->where(function (QueryExpression $expression) {
                return $expression->or([
                    $this->Students->aliasField('first_name').' LIKE' => '%'.$this->getRequest()->getQuery('q').'%',
                    $this->Students->aliasField('last_name').' LIKE' => '%'.$this->getRequest()->getQuery('q').'%'
                ]);
            });
        }
        $students = $this->paginate($query);
        $this->viewBuilder()->setLayout('admin_default');
        $this->set('students', $students);
        $this->set('titleForLayout', __("Users"));
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
        if ($result->isValid()) {
            $redirect = $this->getRequest()->getQuery('redirect', [
                'controller' => 'Students',
                'action' => 'dashboard'
            ]);

            return $this->redirect($redirect);
        }
        else {
            if($this->getRequest()->is('post') && !$result->isValid()) {
                $this->response = $this->response->withStatus(401);
                $this->Flash->error(__("Incorrect username or password."));
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
        $this->set('titleForLayout', __('Dashboard'));
    }
}
