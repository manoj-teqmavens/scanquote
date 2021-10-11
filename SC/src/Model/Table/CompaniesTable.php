<?php
namespace App\Model\Table;

use Cake\Event\EventInterface;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;


Class CompaniesTable extends Table{
    public function initialize(array $config):void
    {
        $this->addBehavior('Timestamp');
         $this->hasMany('Estimators', [
            'foreignKey' => 'company_id',
        ]);
         $this->hasMany('Jobs', [
            'foreignKey' => 'company_id',
        ]);
         $this->hasMany('Categorymarkups',[
            'foreignkey' => 'company_id',
        ]);
         $this->hasMany('Itemsmarkups',[
            'foreignkey' => 'company_id',
        ]); 
    }
    public function beforeSave(EventInterface $event, $entity, $options)
    {
        if($entity->isNew() && !$entity->slug)
        {
            $sluggedTitle = Text::slug($entity->company_name);
            $entity->slug = substr($sluggedTitle, 0, 191);
        }
    }
    public function validationDefault(Validator $validator): Validator
    {   
        $validator->notEmptyString('company_name')->minLength('company_name',10)->maxLength('company_name',255)
        ->notEmptyString('email')
        ->notEmptyString('contact_no')
        ->notEmptyString('status');
        return $validator;
    }
}

