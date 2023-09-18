<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobNotifications Model
 *
 * @method \App\Model\Entity\JobNotification newEmptyEntity()
 * @method \App\Model\Entity\JobNotification newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\JobNotification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobNotification get($primaryKey, $options = [])
 * @method \App\Model\Entity\JobNotification findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\JobNotification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JobNotification[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobNotification|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobNotification saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobNotification[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\JobNotification[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\JobNotification[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\JobNotification[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JobNotificationsTable extends Table
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

        $this->setTable('job_notifications');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('AttachmentFiles', [
            'fields' => ['file']
        ]);
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
            ->scalar('title')
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->scalar('tag')
            ->maxLength('tag', 255)
            ->allowEmptyString('tag');

        $validator
            ->scalar('link')
            ->allowEmptyString('link');

        $validator
            ->notEmptyFile('file')
            ->add('file', [
                'mimeType' => [
                    'rule' => ['mimeType', ['application/pdf']],
                    'message' => __('Please upload PDF only'),
                ],
                'fileSize' => [
                    'rule' => [ 'fileSize', '<=', '100MB' ],
                    'message' => __('PDF file size should be less than 64MB.'),
                ],
            ]);

        $validator
            ->dateTime('disabled')
            ->allowEmptyDateTime('disabled');

        return $validator;
    }
}
