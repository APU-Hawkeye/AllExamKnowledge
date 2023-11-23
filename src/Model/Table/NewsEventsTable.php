<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Behavior\AttachmentFilesBehavior;
use App\Model\Behavior\SwitchBehavior;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NewsEvents Model
 *
 * @method \App\Model\Entity\NewsEvent newEmptyEntity()
 * @method \App\Model\Entity\NewsEvent newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\NewsEvent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NewsEvent get($primaryKey, $options = [])
 * @method \App\Model\Entity\NewsEvent findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\NewsEvent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NewsEvent[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\NewsEvent|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NewsEvent saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NewsEvent[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\NewsEvent[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\NewsEvent[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\NewsEvent[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin SwitchBehavior
 * @mixin AttachmentFilesBehavior
 */
class NewsEventsTable extends Table
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

        $this->setTable('news_events');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Switch');
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
