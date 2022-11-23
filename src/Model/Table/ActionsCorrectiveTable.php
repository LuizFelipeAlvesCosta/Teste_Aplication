<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ActionsCorrective Model
 *
 * @method \App\Model\Entity\ActionsCorrective get($primaryKey, $options = [])
 * @method \App\Model\Entity\ActionsCorrective newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ActionsCorrective[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ActionsCorrective|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ActionsCorrective patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ActionsCorrective[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ActionsCorrective findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ActionsCorrectiveTable extends Table
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

        $this->table('actions_corrective');
        $this->displayField('action_corrective');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->requirePresence('action_corrective', 'create')
            ->notEmpty('action_corrective');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }
}
