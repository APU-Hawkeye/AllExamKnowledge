<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Model\Table\UsersTable;
use Authentication\Authenticator\FormAuthenticator;
use Cake\Database\Expression\QueryExpression;
use Cake\Event\EventInterface;

/**
 * Class UsersController
 * @package App\Controller\Admin
 *
 * @property UsersTable $Users
 */
class UsersController extends AppController
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
            'logout'
        ]);
        $this->Users = $this->getTableLocator()->get('Users');
        parent::beforeFilter($event);
    }

    /**
     * @return \Cake\ORM\Query|void
     */
    public function index()
    {
        $query = $this->Users->find()->order([
            $this->Users->aliasField('disabled').' IS NULL ' => 'DESC',
            $this->Users->aliasField('first_name') => 'ASC'
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
                    $this->Users->aliasField('first_name').' LIKE' => '%'.$this->getRequest()->getQuery('q').'%',
                    $this->Users->aliasField('last_name').' LIKE' => '%'.$this->getRequest()->getQuery('q').'%'
                ]);
            });
        }
        $users = $this->paginate($query);
        $this->viewBuilder()->setLayout('admin_default');
        $this->set('users', $users);
        $this->set('titleForLayout', __("Users"));
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
                'controller' => 'Users',
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
        $this->viewBuilder()->setLayout('admin_default');
        $this->set('titleForLayout', __('Dashboard'));
    }

    /**
     * @return \Cake\Http\Response|void|null|void
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->getRequest()->is(['post', 'put', 'patch'])) {
            $user = $this->Users->patchEntity($user, $this->getRequest()->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__("{0} has been successfully saved", [
                    $user->first_name
                ]));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->response = $this->response->withStatus(400);
                $this->Flash->error("User could not be saved. Please try again.");
            }
        }
        $this->set('user', $user);
        $this->viewBuilder()->setLayout('admin_default');
        $this->set('titleForLayout', __("New User"));
    }

    /**
     * @param string|null $id User ID
     * @return void
     */
    public function view(?string $id = null)
    {
        $user = $this->Users->get($id);
        $this->set('user', $user);
        $this->viewBuilder()->setLayout('admin_default');
        $this->set('titleForLayout', __("User - ".$user->first_name));
    }

    /**
     * @param string|null $id User ID
     * @return \Cake\Http\Response|null|void
     */
    public function disable(?string $id = null)
    {
        $this->getRequest()->allowMethod(["post"]);
        $user = $this->Users->get($id);
        if ($this->Users->disabled($user)) {
            $this->Flash->success(__("{0} has been successfully disabled.", [
                $user->first_name
            ]));
        } else {
            $this->Flash->error(__("Something went wrong. Kindly try again later"));
        }
        return $this->redirect($this->referer());
    }

    /**
     * @param string|null $id User ID
     * @return \Cake\Http\Response|null|void
     */
    public function enable(?string $id = null)
    {
        $this->getRequest()->allowMethod(["post"]);
        $user = $this->Users->get($id);
        if ($this->Users->enabled($user)) {
            $this->Flash->success(__("{0} has been successfully enabled.", [
                $user->first_name
            ]));
        } else {
            $this->Flash->error(__("Something went wrong. Kindly try again later"));
        }
        return $this->redirect($this->referer());
    }

    /**
     * @param string|null $id User ID
     * @return \Cake\Http\Response|void|null
     */
    public function edit(?string $id = null)
    {
        $user = $this->Users->get($id);
        if ($this->getRequest()->is(['put', 'patch', 'post', 'ajax'])) {
            $user = $this->Users->patchEntity($user, $this->getRequest()->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__("{0} has been successfully edited", [
                    $user->first_name
                ]));
            } else {
                $this->Flash->error(__("Something went wrong. Please try again."));
            }
            return $this->redirect(['action' => 'index']);
        }
        $this->set('user', $user);
        $this->viewBuilder()->setLayout('admin_default');
        $this->set('titleForLayout', __("Change Password"));
    }
}
