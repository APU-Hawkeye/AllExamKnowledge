<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Exception\RequestFailedException;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\Event;
use Cake\Http\Exception\BadRequestException;
use Cake\Http\ServerRequest;
use Cake\I18n\FrozenTime;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Students Model
 *
 * @method \App\Model\Entity\Student newEmptyEntity()
 * @method \App\Model\Entity\Student newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Student[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Student get($primaryKey, $options = [])
 * @method \App\Model\Entity\Student findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Student patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Student[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Student|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StudentsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('students');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('first_name')
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->dateTime('email_verified')
            ->allowEmptyDateTime('email_verified');

        $validator
            ->scalar('phone')
            ->maxLength('phone', 10)
            ->allowEmptyString('phone');

        $validator
            ->scalar('password')
            ->maxLength('password', 128)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->dateTime('password_expiry')
            ->allowEmptyDateTime('password_expiry');

        $validator
            ->dateTime('password_updated')
            ->allowEmptyDateTime('password_updated');

        $validator
            ->scalar('gender')
            ->allowEmptyString('gender');

        $validator
            ->date('date_of_birth')
            ->allowEmptyDate('date_of_birth');

        $validator
            ->dateTime('profile_completed')
            ->allowEmptyDateTime('profile_completed');

        $validator
            ->dateTime('disabled')
            ->allowEmptyDateTime('disabled');

        $validator
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->isUnique(['sin']), ['errorField' => 'sin']);
        $rules->add(function (EntityInterface $entity) {
            if ($entity->get('date_of_birth')) {
                return $entity->get('date_of_birth')->isFuture() === false;
            }
            return true;
        }, '_invalidDateOfBirth', [
            'errorField' => 'date_of_birth',
            'message' => __("Date of birth cannot be future date.")
        ]);

        return $rules;
    }

    /**
     * @param \App\Model\Entity\Student $student Student Instance
     * @param string $currentPassword Current Password
     * @param string $newPassword New Password
     * @param string $confirmNewPassword Confirm password
     * @return \App\Model\Entity\Student|false
     */
    public function changePassword(
        \App\Model\Entity\Student $student,
        string $currentPassword,
        string $newPassword,
        string $confirmNewPassword
    ) {
        $student->setAccess('current_password', true);
        $student->setAccess('confirm_password', true);
        $student = $this->patchEntity($student, [
            'current_password' => $currentPassword,
            'password' => $newPassword,
            'confirm_password' => $confirmNewPassword,
            'password_updated' => new FrozenTime(),
        ], [
            'validate' => 'changePassword',
        ]);
        $result = $this->save($student);
        if ($result) {
            $studentEvent = new Event('Student.afterChangePassword', $this, [
                'student' => $student,
            ]);
            $this->getEventManager()->dispatch($studentEvent);
        }

        return $result;
    }

    /**
     * @param \Cake\Validation\Validator $validator Validator Instance
     * @return \Cake\Validation\Validator
     */
    protected function _getNewPasswordValidation(Validator $validator): Validator
    {
        $validator
            ->scalar('password')
            ->minLength('password', 6, __('Password should be at-least 6 character long'))
            ->maxLength('password', 128)
            ->requirePresence('password', true)
            ->notEmptyString('password')
            ->add('password', '_sameAsCurrentPassword', [
                'rule' => function (string $data, array $context) {
                    /** @var array{id: string} $contextData */
                    $contextData = $context['data'];
                    $user = $this->get($contextData['id']);

                    return (new \Authentication\PasswordHasher\DefaultPasswordHasher())->check($data, $user->password) === false;
                },
                'message' => __('New password cannot be same as current password'),
            ]);

        $validator
            ->scalar('confirm_password')
            ->requirePresence('confirm_password', true)
            ->notEmptyString('confirm_password')
            ->sameAs('confirm_password', 'password', __('Password do not match'));

        $validator
            ->dateTime('password_updated')
            ->requirePresence('password_updated', true)
            ->notEmptyDateTime('password_updated');

        return $validator;
    }

    /**
     * @param \Cake\Validation\Validator $validator Validator Instance
     * @return \Cake\Validation\Validator
     */
    public function validationChangePassword(Validator $validator): Validator
    {
        $validator
            ->scalar('current_password')
            ->requirePresence('current_password', true)
            ->notEmptyString('current_password')
            ->add('current_password', '_incorrectCurrentPassword', [
                'rule' => function (string $data, array $context) {
                    /** @var array{id: string} $contextData */
                    $contextData = $context['data'];
                    $user = $this->get($contextData['id']);

                    return (new DefaultPasswordHasher())->check($data, $user->password);
                },
                'message' => __('Incorrect current password'),
            ]);

        return $this->_getNewPasswordValidation($validator);
    }

    /**
     * @return int
     */
    protected function _generateStudentIdentificationNumber(): int
    {
        do {
            $sin = mt_rand(100001, 999999);
        } while (
            $this->exists([
                'sin' => $sin,
            ])
        );

        return $sin;
    }

    /**
     * @param \Cake\Event\EventInterface $event Event Instance
     * @param \Cake\Datasource\EntityInterface $entity Entity Instance
     * @return void
     */
    public function beforeSave(\Cake\Event\EventInterface $event, \Cake\Datasource\EntityInterface $entity): void
    {
        $event->getSubject();
        if ($entity->isNew()) {
            $entity->setAccess('sin', true);
            $entity->set('sin', $this->_generateStudentIdentificationNumber());
            $entity->setDirty('sin', true);
        }
    }

    /**
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationRegister(Validator $validator): Validator
    {
        $validator = $this->validationDefault($validator);

        $validator
            ->scalar('confirm_password')
            ->requirePresence('confirm_password')
            ->notEmptyString('confirm_password')
            ->sameAs('confirm_password', 'password');

        return $validator;
    }

    /**
     * @param \Cake\Http\ServerRequest $serverRequest Request Instance
     * @return \App\Model\Entity\Student
     * @throws \Cake\Http\Exception\BadRequestException
     */
    public function verifyEmail(ServerRequest $serverRequest): \App\Model\Entity\Student
    {
        /** @var string $id */
        $id = $serverRequest->getParam('id');
        try {
            $accountRequest = $this->AccountRequests->get($id);
            $customer = $this->AccountRequests->validateRequest($accountRequest, $serverRequest);
            if ($customer->email_verified) {
                throw new RequestFailedException(__('Your email address is already verified.'));
            }
            $customer = $this->patchEntity($customer, [
                'email_verified' => new FrozenTime(),
            ], [
                'validate' => false,
            ]);
            $this->save($customer);
            $this->AccountRequests->expire($accountRequest);

            return $customer;
        } catch (RecordNotFoundException $e) {
            /** @var string $exception */
            $exception = json_encode([
                [
                    'code' => '_notFound',
                    'param' => 'id',
                    'message' => __('Account Request could not be found'),
                ],
            ]);
            throw new BadRequestException($exception);
        }
    }
}
