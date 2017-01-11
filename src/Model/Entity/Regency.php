<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Regency Entity
 *
 * @property int $id
 * @property int $province_id
 * @property bool $kind
 * @property string $name
 * @property bool $active
 *
 * @property \App\Model\Entity\Province $province
 * @property \App\Model\Entity\Address[] $addresses
 * @property \App\Model\Entity\Office[] $offices
 */
class Regency extends Entity
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
