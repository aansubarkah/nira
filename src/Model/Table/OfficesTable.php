<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Offices Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\BelongsTo $Regencies
 * @property \Cake\ORM\Association\BelongsTo $ParentOffices
 * @property \Cake\ORM\Association\HasMany $ChildOffices
 * @property \Cake\ORM\Association\BelongsToMany $Addresses
 * @property \Cake\ORM\Association\BelongsToMany $Emails
 * @property \Cake\ORM\Association\BelongsToMany $Phones
 * @property \Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Office get($primaryKey, $options = [])
 * @method \App\Model\Entity\Office newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Office[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Office|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Office patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Office[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Office findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class OfficesTable extends Table
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

        $this->table('offices');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Regencies', [
            'foreignKey' => 'regency_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ParentOffices', [
            'className' => 'Offices',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildOffices', [
            'className' => 'Offices',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsToMany('Addresses', [
            'foreignKey' => 'office_id',
            'targetForeignKey' => 'address_id',
            'joinTable' => 'addresses_offices'
        ]);
        $this->belongsToMany('Emails', [
            'foreignKey' => 'office_id',
            'targetForeignKey' => 'email_id',
            'joinTable' => 'emails_offices'
        ]);
        $this->belongsToMany('Phones', [
            'foreignKey' => 'office_id',
            'targetForeignKey' => 'phone_id',
            'joinTable' => 'offices_phones'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'office_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'offices_users'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['regency_id'], 'Regencies'));
        $rules->add($rules->existsIn(['parent_id'], 'ParentOffices'));

        return $rules;
    }
}
