<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Productcatalogs Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\SubcategoriesTable&\Cake\ORM\Association\BelongsTo $Subcategories
 * @property \App\Model\Table\TypesTable&\Cake\ORM\Association\BelongsTo $Types
 *
 * @method \App\Model\Entity\Productcatalog newEmptyEntity()
 * @method \App\Model\Entity\Productcatalog newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Productcatalog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Productcatalog get($primaryKey, $options = [])
 * @method \App\Model\Entity\Productcatalog findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Productcatalog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Productcatalog[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Productcatalog|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Productcatalog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Productcatalog[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Productcatalog[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Productcatalog[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Productcatalog[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductcatalogsTable extends Table
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

        $this->setTable('productcatalogs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
            'propertyName' => 'category'
        ]);
        $this->belongsTo('SubCategories', [
            'foreignKey' => 'subcategory_id',
            'className' => 'Categories'
        ]);
        $this->belongsTo('Types', [
            'foreignKey' => 'type_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('item')
            ->maxLength('item', 255)
            ->requirePresence('item', 'create')
            ->notEmptyString('item');

        $validator
            ->scalar('price')
            ->maxLength('price', 60)
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'), ['errorField' => 'category_id']);
        $rules->add($rules->existsIn(['type_id'], 'Types'), ['errorField' => 'type_id']);

        return $rules;
    }
}
