<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Behavior\SwitchBehavior;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BlogArticles Model
 *
 * @property \App\Model\Table\BlogAuthorsTable&\Cake\ORM\Association\BelongsTo $BlogAuthors
 * @property \App\Model\Table\BlogCategoriesTable&\Cake\ORM\Association\BelongsTo $BlogCategories
 *
 * @method \App\Model\Entity\BlogArticle newEmptyEntity()
 * @method \App\Model\Entity\BlogArticle newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\BlogArticle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BlogArticle get($primaryKey, $options = [])
 * @method \App\Model\Entity\BlogArticle findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\BlogArticle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BlogArticle[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\BlogArticle|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogArticle saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BlogArticle[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogArticle[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogArticle[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\BlogArticle[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin SwitchBehavior
 */
class BlogArticlesTable extends Table
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

        $this->setTable('blog_articles');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Switch');
        $this->addBehavior('AttachmentFiles', [
            'fields' => ['image']
        ]);

        $this->belongsTo('BlogAuthors', [
            'foreignKey' => 'blog_author_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('BlogCategories', [
            'foreignKey' => 'blog_category_id',
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
            ->uuid('blog_author_id')
            ->notEmptyString('blog_author_id');

        $validator
            ->uuid('blog_category_id')
            ->notEmptyString('blog_category_id');

        $validator
            ->scalar('title')
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('body')
            ->allowEmptyString('body');

        $validator
            ->allowEmptyFile('image')
            ->add('image', [
                'mimeType' => [
                    'rule' => ['mimeType', ['image/png', 'image/jpg', 'image/jpeg']],
                    'message' => __('Please upload images only (gif, png and jpg are supported).'),
                ],
                'fileSize' => [
                    'rule' => [ 'fileSize', '<=', '150MB' ],
                    'message' => __('Image file size should be less than 150MB.'),
                ],
            ]);

        $validator
            ->integer('read_time')
            ->allowEmptyString('read_time');

        $validator
            ->scalar('meta_description')
            ->maxLength('meta_description', 200)
            ->allowEmptyString('meta_description');

        $validator
            ->scalar('slug')
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug')
            ->add('slug', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['slug']), ['errorField' => 'slug']);
        $rules->add($rules->existsIn('blog_author_id', 'BlogAuthors'), ['errorField' => 'blog_author_id']);
        $rules->add($rules->existsIn('blog_category_id', 'BlogCategories'), ['errorField' => 'blog_category_id']);

        return $rules;
    }
}
