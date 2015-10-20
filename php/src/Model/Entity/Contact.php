<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Contact Entity.
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $phone
 * @property string $address
 * @property string $post_code
 * @property string $city
 * @property string $gender
 * @property \Cake\I18n\Time $birth_date
 * @property bool $is_active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 * @property int $profile_pic_id
 * @property \App\Model\Entity\Asset $asset
 * @property int $user_id
 * @property \App\Model\Entity\User $user
 * @property float $latitude
 * @property float $longitude
 * @property int $country_id
 * @property \App\Model\Entity\Country $country
 * @property string $email
 */
class Contact extends Entity
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
        'id' => false,
    ];
}
