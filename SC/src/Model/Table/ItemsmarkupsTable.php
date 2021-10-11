<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Itemsmarkups Model
 *
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsTo $Companies
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\BelongsTo $Items
 *
 * @method \App\Model\Entity\Itemsmarkup newEmptyEntity()
 * @method \App\Model\Entity\Itemsmarkup newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Itemsmarkup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Itemsmarkup get($primaryKey, $options = [])
 * @method \App\Model\Entity\Itemsmarkup findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Itemsmarkup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Itemsmarkup[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Itemsmarkup|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Itemsmarkup saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Itemsmarkup[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Itemsmarkup[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Itemsmarkup[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Itemsmarkup[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ItemsmarkupsTable extends Table
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

        $this->setTable('itemsmarkups');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Productcatalogs', [
            'foreignKey' => 'item_id',
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
            ->scalar('markup')
            ->maxLength('markup', 60)
            ->requirePresence('markup', 'create')
            ->notEmptyString('markup');

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
        $rules->add($rules->existsIn(['company_id'], 'Companies'), ['errorField' => 'company_id']);
        $rules->add($rules->existsIn(['item_id'], 'Productcatalogs'), ['errorField' => 'item_id']);

        return $rules;
    }
}
