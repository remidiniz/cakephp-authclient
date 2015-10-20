<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

/**
 * User Entity.
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $referrer_id
 * @property \App\Model\Entity\User $user
 * @property bool $is_active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 * @property \App\Model\Entity\Ambassador[] $ambassadors
 * @property \App\Model\Entity\Asset[] $assets
 * @property \App\Model\Entity\BannerClick[] $banner_clicks
 * @property \App\Model\Entity\Banner[] $banners
 * @property \App\Model\Entity\Contact[] $contacts
 * @property \App\Model\Entity\Testimonial[] $testimonials
 * @property \App\Model\Entity\PromotionClick[] $promotion_clicks
 * @property \App\Model\Entity\Promotion[] $promotions
 * @property \App\Model\Entity\Session[] $sessions
 * @property \App\Model\Entity\BannerPack[] $banner_packs
 * @property \App\Model\Entity\Event[] $events
 * @property \App\Model\Entity\Group[] $groups
 * @property \App\Model\Entity\Hobby[] $hobbies
 * @property \App\Model\Entity\NotificationType[] $notification_types
 * @property \App\Model\Entity\Plan[] $plans
 * @property \App\Model\Entity\PromotionPack[] $promotion_packs
 * @property \App\Model\Entity\Rank[] $ranks
 * @property \App\Model\Entity\Role[] $roles
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
        'id' => false,
    ];
    
    public function getHeaviestRole()
    {
    	$heaviestRole = null;
    
    	foreach( $this->getRoles() as $role )
    	{
	    	if( $heaviestRole === null )
	    		$heaviestRole = $role;
	    	else
	    		if( $role->weight > $heaviestRole->weight )
	    			$heaviestRole = $role;
    	}
    
    	return $heaviestRole;
    }
    
    
    protected function getRoles()
    {
    	$usersRolesTable = TableRegistry::get('UsersRoles');
    	 
    	$usersRoles = $usersRolesTable->find('all')->where([
    			'user_id' => $this->id
    	])->contain([
    			'Roles'
    	]);
    	 
    	$userRoles = [];
    	 
    	foreach ( $usersRoles as $userRole )
    	{
    		$userRoles[] = $userRole->role;
    	}
    	 
    	return $userRoles;
    }

	public function getDownlineUsers()
    {
        $connection = ConnectionManager::get('default');
        $results = $connection->execute("WITH RECURSIVE usertree AS
	(SELECT id, username, referrer_id FROM core.users WHERE id = '".$this->id."'
		UNION
		   SELECT si.id, si.username, si.referrer_id FROM core.users AS si INNER JOIN usertree AS sp
		ON (si.referrer_id = sp.id)
	)
	SELECT ut.id, (SELECT count(*) FROM core.users WHERE referrer_id = ut.id
	) AS userCount, ut.username, ut.referrer_id, concat(c.first_name,' ' ,c.last_name) as fullname, c.phone, c.email, c.skype FROM usertree AS ut JOIN core.contacts as c ON(ut.id = c.user_id)")->fetchAll('assoc');
        return $results;
    }
    protected function _setPassword($password)
    {
    	return (new DefaultPasswordHasher)->hash($password);
    }
}
