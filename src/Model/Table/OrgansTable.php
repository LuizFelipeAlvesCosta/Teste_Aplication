<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Organs Model
 *
 * @property \Cake\ORM\Association\HasMany $ManifestsClient
 *
 * @method \App\Model\Entity\Organ get($primaryKey, $options = [])
 * @method \App\Model\Entity\Organ newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Organ[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Organ|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Organ patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Organ[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Organ findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrgansTable extends Table
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

        $this->table('organs');
        $this->displayField('organ');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ManifestsClient', [
            'foreignKey' => 'organ_id'
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
            ->requirePresence('organ', 'create')
            ->notEmpty('organ');

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
