<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Addresses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Regencies
 * @property \Cake\ORM\Association\BelongsToMany $Companies
 * @property \Cake\ORM\Association\BelongsToMany $Offices
 * @property \Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Address get($primaryKey, $options = [])
 * @method \App\Model\Entity\Address newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Address[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Address|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Address patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Address[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Address findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AddressesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('addresses');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Regencies', [
            'foreignKey' => 'regency_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Companies', [
            'foreignKey' => 'address_id',
            'targetForeignKey' => 'company_id',
            'joinTable' => 'addresses_companies'
        ]);
        $this->belongsToMany('Offices', [
            'foreignKey' => 'address_id',
            'targetForeignKey' => 'office_id',
            'joinTable' => 'addresses_offices'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'address_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'addresses_users'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('number');

        $validator
            ->allowEmpty('street');

        $validator
            ->integer('rt')
            ->requirePresence('rt', 'create')
            ->notEmpty('rt');

        $validator
            ->integer('rw')
            ->requirePresence('rw', 'create')
            ->notEmpty('rw');

        $validator
            ->allowEmpty('village');

        $validator
            ->allowEmpty('district');

        $validator
            ->integer('postal')
            ->requirePresence('postal', 'create')
            ->notEmpty('postal');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['regency_id'], 'Regencies'));

        return $rules;
    }
}
