<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Role Entity.
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $alias
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $login_redirect_url
 * @property string $logout_redirect_url
 * @property int $weight
 * @property \App\Model\Entity\Permission[] $permissions
 * @property \App\Model\Entity\User[] $users
 */
class Role extends Entity
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