<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $fullname
 * @property string $nira
 * @property string $nik
 * @property string $localnumber
 * @property int $role_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $verified
 * @property bool $marital
 * @property \Cake\I18n\Time $birthday
 * @property string $birthplace
 * @property bool $sex
 * @property bool $active
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Address[] $addresses
 * @property \App\Model\Entity\Certificate[] $certificates
 * @property \App\Model\Entity\Company[] $companies
 * @property \App\Model\Entity\Education[] $educations
 * @property \App\Model\Entity\Email[] $emails
 * @property \App\Model\Entity\Office[] $offices
 * @property \App\Model\Entity\Phone[] $phones
 * @property \App\Model\Entity\Training[] $trainings
 * @property \App\Model\Entity\EmailsUser $emailsusers
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    /**
    * Hasher Password
    *
    * @var string
    */
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
