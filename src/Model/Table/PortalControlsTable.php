<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PortalControls Model
 *
 * @property \Cake\ORM\Association\HasMany $PortalControlFiles
 *
 * @method \App\Model\Entity\PortalControl get($primaryKey, $options = [])
 * @method \App\Model\Entity\PortalControl newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PortalControl[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PortalControl|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PortalControl patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PortalControl[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PortalControl findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PortalControlsTable extends Table
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

        $this->table('portal_controls');
        $this->displayField('name_portal');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PortalControlFiles', [
            'foreignKey' => 'portal_control_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name_portal', 'create')
            ->notEmpty('name_portal');

        $validator
            ->requirePresence('client', 'create')
            ->notEmpty('client');

        $validator
            ->requirePresence('site_link', 'create')
            ->notEmpty('site_link');

        $validator
            ->allowEmpty('phone_number');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->requirePresence('login', 'create')
            ->notEmpty('login');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->allowEmpty('instructions');

        $validator
            ->allowEmpty('comments');

        $validator
            ->allowEmpty('users');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     *
    *public function buildRules(RulesChecker $rules)
    *{
     *   $rules->add($rules->isUnique(['email']));
      *  $rules->add($rules->isUnique(['login']));
*
 *       return $rules;
  *  }*/
}
