<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jobs Model
 *
 * @property \App\Model\Table\EstimatorsTable&\Cake\ORM\Association\BelongsTo $Estimators
 * @property \App\Model\Table\CompaniesTable&\Cake\ORM\Association\BelongsTo $Companies
 *
 * @method \App\Model\Entity\Job newEmptyEntity()
 * @method \App\Model\Entity\Job newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Job[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Job get($primaryKey, $options = [])
 * @method \App\Model\Entity\Job findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Job patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Job[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Job|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Job saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Job[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JobsTable extends Table
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

        $this->setTable('jobs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Estimators', [
            'foreignKey' => 'estimator_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Companies', [
            'foreignKey' => 'company_id',
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
            ->scalar('job_name')
            ->maxLength('job_name', 200)
            ->requirePresence('job_name', 'create')
            ->notEmptyString('job_name');

        $validator
            ->scalar('bid_no')
            ->maxLength('bid_no', 60)
            ->requirePresence('bid_no', 'create')
            ->notEmptyString('bid_no');

        $validator
            ->dateTime('scanned_at')
            ->requirePresence('scanned_at', 'create')
            ->notEmptyDateTime('scanned_at');

        $validator
            ->integer('scanned_by')
            ->requirePresence('scanned_by', 'create')
            ->notEmptyString('scanned_by');

        $validator
            ->integer('job_status')
            ->requirePresence('job_status', 'create')
            ->notEmptyString('job_status');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('contact_no')
            ->maxLength('contact_no', 60)
            ->requirePresence('contact_no', 'create')
            ->notEmptyString('contact_no');

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
        $rules->add($rules->existsIn(['estimator_id'], 'Estimators'), ['errorField' => 'estimator_id']);
        $rules->add($rules->existsIn(['company_id'], 'Companies'), ['errorField' => 'company_id']);

        return $rules;
    }
}
