<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Country Entity.
 *
 * @property int $id
 * @property string $iso_code
 * @property string $name
 * @property \App\Model\Entity\Contact[] $contacts
 */
class Country extends Entity
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
        'iso' => false,
    ];
}
