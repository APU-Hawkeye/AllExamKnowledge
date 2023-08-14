<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Model\Table\StudentsTable;
use Cake\Database\Expression\QueryExpression;
use Cake\Event\EventInterface;

/**
 * Class StudentsController
 * @package App\Controller\Admin
 *
 * @property StudentsTable $Students
 */
class LearnersController extends AppController
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
        $this->set('titleForLayout', __("Students"));
    }
}
