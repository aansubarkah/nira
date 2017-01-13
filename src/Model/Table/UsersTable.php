<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Roles
 * @property \Cake\ORM\Association\BelongsToMany $Addresses
 * @property \Cake\ORM\Association\BelongsToMany $Certificates
 * @property \Cake\ORM\Association\BelongsToMany $Companies
 * @property \Cake\ORM\Association\BelongsToMany $Educations
 * @property \Cake\ORM\Association\BelongsToMany $Emails
 * @property \Cake\ORM\Association\BelongsToMany $Offices
 * @property \Cake\ORM\Association\BelongsToMany $Phones
 * @property \Cake\ORM\Association\BelongsToMany $Trainings
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Addresses', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'address_id',
            'joinTable' => 'addresses_users'
        ]);
        $this->belongsToMany('Certificates', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'certificate_id',
            'joinTable' => 'certificates_users'
        ]);
        $this->belongsToMany('Companies', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'company_id',
            'joinTable' => 'companies_users'
        ]);
        $this->belongsToMany('Educations', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'education_id',
            'joinTable' => 'educations_users'
        ]);
        $this->belongsToMany('Emails', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'email_id',
            'joinTable' => 'emails_users'
        ]);
        $this->belongsToMany('Offices', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'office_id',
            'joinTable' => 'offices_users'
        ]);
        $this->belongsToMany('Phones', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'phone_id',
            'joinTable' => 'phones_users'
        ]);
        $this->belongsToMany('Trainings', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'training_id',
            'joinTable' => 'trainings_users'
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
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('fullname', 'create')
            ->notEmpty('fullname');

        $validator
            ->requirePresence('nira', 'create')
            ->notEmpty('nira');

        $validator
            ->requirePresence('nik', 'create')
            ->notEmpty('nik');

        $validator
            ->requirePresence('localnumber', 'create')
            ->notEmpty('localnumber');

        $validator
            ->boolean('verified')
            ->requirePresence('verified', 'create')
            ->notEmpty('verified');

        $validator
            ->boolean('marital')
            ->requirePresence('marital', 'create')
            ->notEmpty('marital');

        $validator
            ->date('birthday')
            ->requirePresence('birthday', 'create')
            ->notEmpty('birthday');

        $validator
            ->requirePresence('birthplace', 'create')
            ->notEmpty('birthplace');

        $validator
            ->boolean('sex')
            ->requirePresence('sex', 'create')
            ->notEmpty('sex');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        return $validator;
    }

    public function validationPassword(Validator $validator) {
        $validator ->add('oldPassword', 'custom',
            [
                'rule' => function($value, $context){
                    $user = $this->get($context['data']['id']);
                    if ($user) {
                        if ((new DefaultPasswordHasher)->check($value, $user->password)) {
                            return true;
                        }
                    }
                    return false;
                },
                'message' => 'The old password does not match the current password!',
            ]) ->notEmpty('old_password');
        $validator ->add('newPassword1', [
        ]) ->add('newPassword1',[
            'match'=> [
                'rule'=> ['compareWith','newPassword2'],
                'message'=>'The passwords does not match!', ]
        ]) ->notEmpty('newPassword1');

        $validator ->add('newPassword2', [
        ]) ->add('newPassword2',[
            'match' => [
                'rule'=> ['compareWith','newPassword1'],
                'message'=>'The passwords does not match!', ]
        ]) ->notEmpty('newPassword2');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));

        return $rules;
    }

    /**
    * Find Auth
    *
    * @param \Cake\ORM\Query $query
    * @param array $options
    * @return \Cake\ORM\Query $query
    */
    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        $query
            ->where(['Users.active' => 1, 'Users.verified' => 1]);

        return $query;
    }
}
