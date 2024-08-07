<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Enquires Model
 *
 * @property \App\Model\Table\ClientsTable&\Cake\ORM\Association\BelongsTo $Clients
 *
 * @method \App\Model\Entity\Enquire newEmptyEntity()
 * @method \App\Model\Entity\Enquire newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Enquire[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Enquire get($primaryKey, $options = [])
 * @method \App\Model\Entity\Enquire findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Enquire patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Enquire[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Enquire|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Enquire saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Enquire[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Enquire[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Enquire[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Enquire[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EnquiresTable extends Table
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

        $this->setTable('enquires');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Log');
        
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Sources', [
            'foreignKey' => 'enquiry_source',
            'className' => 'Categories',
        ]);

        $this->belongsTo('Country', [
            'foreignKey' => 'enquiry_clcountry',
            'className' => 'Addresses',
        ]); 
        
        $this->belongsTo('Properties', [
            'foreignKey' => 'property_id',
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
            ->integer('client_id')
            ->allowEmptyString('client_id');

        $validator
            ->integer('source_id')
            ->allowEmptyString('source_id');

        $validator
            ->integer('property_id')
            ->allowEmptyString('property_id');

        $validator
            ->scalar('enquiry_name')
            ->maxLength('enquiry_name', 255)
            ->allowEmptyString('enquiry_name');

        $validator
            ->scalar('enquiry_email')
            ->maxLength('enquiry_email', 255)
            ->requirePresence('enquiry_email', 'create')
            ->notEmptyString('enquiry_email');

        $validator
            ->integer('enquiry_phone')
            ->allowEmptyString('enquiry_phone');

        $validator
            ->integer('enquiry_country')
            ->allowEmptyString('enquiry_country');

        $validator
            ->scalar('enquiry_message')
            ->maxLength('enquiry_message', 255)
            ->allowEmptyString('enquiry_message');

        $validator
            ->scalar('enquiry_ipaddress')
            ->maxLength('enquiry_ipaddress', 255)
            ->allowEmptyString('enquiry_ipaddress');

        $validator
            ->scalar('enquiry_referral')
            ->maxLength('enquiry_referral', 255)
            ->allowEmptyString('enquiry_referral');

        $validator
            ->scalar('enquiry_host')
            ->maxLength('enquiry_host', 255)
            ->allowEmptyString('enquiry_host');

        $validator
            ->scalar('seo_keywords')
            ->maxLength('seo_keywords', 255)
            ->allowEmptyString('seo_keywords');

        $validator
            ->dateTime('stat_created')
            ->allowEmptyDateTime('stat_created');

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
        $rules->add($rules->existsIn('client_id', 'Clients'), ['errorField' => 'client_id']);
        $rules->add($rules->existsIn('property_id', 'Properties'), ['errorField' => 'property_id']);

        return $rules;
    }
}
