<?php
namespace App\Model\Table;

use App\Model\Entity\Contact;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contacts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Assets
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Countries
 */
class ContactsTable extends Table
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

        $this->table('contacts');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id'
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
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->allowEmpty('phone');

        $validator
            ->allowEmpty('address');

        $validator
            ->allowEmpty('post_code');

        $validator
            ->allowEmpty('city');

        $validator
            ->allowEmpty('gender');

        $validator
            ->allowEmpty('birth_date');

        $validator
            ->add('is_active', 'valid', ['rule' => 'boolean'])
            ->requirePresence('is_active', 'create')
            ->notEmpty('is_active');

        $validator
            ->allowEmpty('deleted');

        $validator
            ->add('latitude', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('latitude');

        $validator
            ->add('longitude', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('longitude');

        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->allowEmpty('email');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['country_id'], 'Countries'));
        return $rules;
    }
    
    public static function defaultConnectionName() {
    	return 'users';
    }
}
