<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TypesAction Model
 *
 * @method \App\Model\Entity\TypesAction get($primaryKey, $options = [])
 * @method \App\Model\Entity\TypesAction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TypesAction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TypesAction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TypesAction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TypesAction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TypesAction findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TypesActionTable extends Table
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

        $this->table('types_action');
        $this->displayField('type_action');
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
            ->requirePresence('type_action', 'create')
            ->notEmpty('type_action');

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
