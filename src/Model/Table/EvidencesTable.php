<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Evidences Model
 *
 * @property \Cake\ORM\Association\HasMany $CertificatesUsers
 * @property \Cake\ORM\Association\HasMany $EducationsUsers
 * @property \Cake\ORM\Association\HasMany $TrainingsUsers
 *
 * @method \App\Model\Entity\Evidence get($primaryKey, $options = [])
 * @method \App\Model\Entity\Evidence newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Evidence[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Evidence|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Evidence patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Evidence[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Evidence findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EvidencesTable extends Table
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

        $this->table('evidences');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CertificatesUsers', [
            'foreignKey' => 'evidence_id'
        ]);
        $this->hasMany('EducationsUsers', [
            'foreignKey' => 'evidence_id'
        ]);
        $this->hasMany('TrainingsUsers', [
            'foreignKey' => 'evidence_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('filetype', 'create')
            ->notEmpty('filetype');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        return $validator;
    }
}
