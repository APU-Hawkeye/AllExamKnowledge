<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Behavior\AttachmentFilesBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StudyMaterials Model
 *
 * @property \App\Model\Table\SubCategoriesTable&\Cake\ORM\Association\BelongsTo $SubCategories
 *
 * @method \App\Model\Entity\StudyMaterial newEmptyEntity()
 * @method \App\Model\Entity\StudyMaterial newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\StudyMaterial[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StudyMaterial get($primaryKey, $options = [])
 * @method \App\Model\Entity\StudyMaterial findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\StudyMaterial patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StudyMaterial[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\StudyMaterial|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StudyMaterial saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StudyMaterial[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StudyMaterial[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\StudyMaterial[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StudyMaterial[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin AttachmentFilesBehavior
 */
class StudyMaterialsTable extends Table
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

        $this->setTable('study_materials');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('AttachmentFiles', [
            'fields' => ['file']
        ]);

        $this->belongsTo('SubCategories', [
            'foreignKey' => 'sub_category_id',
            'joinType' => 'INNER',
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
            ->uuid('sub_category_id')
            ->notEmptyString('sub_category_id');

        $validator
            ->scalar('title')
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->allowEmptyFile('file')
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('sub_category_id', 'SubCategories'), ['errorField' => 'sub_category_id']);

        return $rules;
    }
}
