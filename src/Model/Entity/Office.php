<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Office Entity
 *
 * @property int $id
 * @property int $category_id
 * @property int $regency_id
 * @property string $name
 * @property string $number
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $active
 * @property int $parent_id
 * @property int $lft
 * @property int $rght
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Regency $regency
 * @property \App\Model\Entity\ParentOffice $parent_office
 * @property \App\Model\Entity\ChildOffice[] $child_offices
 * @property \App\Model\Entity\Address[] $addresses
 * @property \App\Model\Entity\Email[] $emails
 * @property \App\Model\Entity\Phone[] $phones
 * @property \App\Model\Entity\User[] $users
 */
class Office extends Entity
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
