<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evidence Entity
 *
 * @property int $id
 * @property string $name
 * @property string $filetype
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $active
 *
 * @property \App\Model\Entity\CertificatesUser[] $certificates_users
 * @property \App\Model\Entity\EducationsUser[] $educations_users
 * @property \App\Model\Entity\TrainingsUser[] $trainings_users
 */
class Evidence extends Entity
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
