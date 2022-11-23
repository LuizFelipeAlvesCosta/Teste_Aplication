<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ManifestsClient Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Organs
 * @property \Cake\ORM\Association\BelongsTo $TypesAction
 * @property \Cake\ORM\Association\BelongsTo $ManifestsType
 * @property \Cake\ORM\Association\BelongsTo $Clients
 * @property \Cake\ORM\Association\BelongsTo $ClientsContact
 * @property \Cake\ORM\Association\BelongsTo $ActionsCorrective
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $UsersResp
 *
 * @method \App\Model\Entity\ManifestsClient get($primaryKey, $options = [])
 * @method \App\Model\Entity\ManifestsClient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ManifestsClient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ManifestsClient|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ManifestsClient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ManifestsClient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ManifestsClient findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ManifestsClientTable extends Table
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

        $this->table('manifests_client');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Organs', [
            'foreignKey' => 'organ_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TypesAction', [
            'foreignKey' => 'type_action_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ManifestsType', [
            'foreignKey' => 'manifest_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Clients', [
            'foreignKey' => 'client_manifest_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ClientsContact', [
            'foreignKey' => 'contact_manifest_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ActionsCorrective', [
            'foreignKey' => 'action_corrective_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('UsersResp', [
            'foreignKey' => 'user_resp_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('number_manifest');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->allowEmpty('historic');

        $validator
            ->requirePresence('rnc', 'create')
            ->notEmpty('rnc');

        $validator
            ->allowEmpty('detail');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['organ_id'], 'Organs'));
        $rules->add($rules->existsIn(['type_action_id'], 'TypesAction'));
        $rules->add($rules->existsIn(['manifest_type_id'], 'ManifestsType'));
        $rules->add($rules->existsIn(['client_manifest_id'], 'Clients'));
        $rules->add($rules->existsIn(['contact_manifest_id'], 'ClientsContact'));
        $rules->add($rules->existsIn(['action_corrective_id'], 'ActionsCorrective'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['user_resp_id'], 'UsersResp'));

        return $rules;
    }
}
