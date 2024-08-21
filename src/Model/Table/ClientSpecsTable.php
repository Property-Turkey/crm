<?php
declare(strict_types=1);

namespace App\Model\Table;

    
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;
use Cake\Event\EventInterface;
use ArrayObject;
use Cake\ORM\TableRegistry;
/**
 * ClientSpecs Model
 *
 * @property \App\Model\Table\ClientsTable&\Cake\ORM\Association\BelongsTo $Clients
 *
 * @method \App\Model\Entity\ClientSpec newEmptyEntity()
 * @method \App\Model\Entity\ClientSpec newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ClientSpec[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ClientSpec get($primaryKey, $options = [])
 * @method \App\Model\Entity\ClientSpec findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ClientSpec patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ClientSpec[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ClientSpec|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClientSpec saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ClientSpec[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ClientSpec[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ClientSpec[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ClientSpec[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ClientSpecsTable extends Table
{

public function beforeSave(EventInterface $event, $entity, ArrayObject $options)
{
    
    

    // Replace encoded slashes to normal slashes
    $fullUrl = str_replace('\\/', '/', $_SERVER['REQUEST_URI']);

    $logData = [
        'user_id' => $entity->user_id,
        'log_url' => json_encode([
            "", "", "", "", $fullUrl, "Clients", "update", $entity->id
        ]),
        'log_changes' => json_encode([
            'before' => $entity->getOriginalValues(),
            'after' => $entity->toArray()
        ]),
        'rec_state' => 1
    ];

    $logsTable = TableRegistry::getTableLocator()->get('Logs');
    $logEntity = $logsTable->newEntity($logData);
    $logsTable->save($logEntity);
}

public function initialize(array $config): void
{
    parent::initialize($config);

    $this->setTable('client_specs');
    $this->setDisplayField('id');
    $this->setPrimaryKey('id');

    $this->belongsTo('Clients', [
        'foreignKey' => 'client_id',
    ]);
    
    $this->belongsTo('Currency', [
        'foreignKey' => 'clientspec_currency',
        'className' => 'Categories',
    ]);

    $this->belongsTo('Persona', [
        'foreignKey' => 'clientspec_buyerpersona',
        'className' => 'Categories',
    ]);

    $this->belongsTo('Style', [
        'foreignKey' => 'clientspec_socialstyle',
        'className' => 'Categories',
    ]);
    
}
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('client_id')
            ->notEmptyString('client_id');

        $validator
            ->scalar('clientspec_propertytype')
            ->maxLength('clientspec_propertytype', 255)
            ->allowEmptyString('clientspec_propertytype');

        $validator
            ->integer('clientspec_currency')
            ->allowEmptyString('clientspec_currency');

        $validator
            ->integer('clientspec_buyerpersona')
            ->allowEmptyString('clientspec_buyerpersona');

        $validator
            ->integer('clientspec_socialstyle')
            ->allowEmptyString('clientspec_socialstyle');

        $validator
            ->scalar('clientspec_beds')
            ->maxLength('clientspec_beds', 255)
            ->allowEmptyString('clientspec_beds');

        $validator
            ->scalar('clientspec_loction_target')
            ->maxLength('clientspec_loction_target', 255)
            ->allowEmptyString('clientspec_loction_target');

        $validator
            ->scalar('clientspec_target_country')
            ->maxLength('clientspec_target_country', 255)
            ->allowEmptyString('clientspec_target_country');

        $validator
            ->scalar('clientspec_target_city')
            ->maxLength('clientspec_target_city', 255)
            ->allowEmptyString('clientspec_target_city');

        $validator
            ->scalar('clientspec_target_region')
            ->maxLength('clientspec_target_region', 255)
            ->allowEmptyString('clientspec_target_region');

        $validator
            ->notEmptyString('clientspec_isowner');

        $validator
            ->notEmptyString('clientspec_isready');

        $validator
            ->allowEmptyString('clientspec_saved');

        $validator
            ->scalar('clientspec_configs')
            ->allowEmptyString('clientspec_configs');

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

        return $rules;
    }
}
