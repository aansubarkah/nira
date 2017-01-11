<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AddressesUser Entity
 *
 * @property int $id
 * @property int $address_id
 * @property int $user_id
 * @property \Cake\I18n\Time $started
 * @property \Cake\I18n\Time $ended
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\User $user
 */
class AddressesUser extends Entity
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
}
