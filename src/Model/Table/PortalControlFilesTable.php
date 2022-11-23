<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * PortalControlFiles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PortalControls
 *
 * @method \App\Model\Entity\PortalControlFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\PortalControlFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PortalControlFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PortalControlFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PortalControlFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PortalControlFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PortalControlFile findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PortalControlFilesTable extends Table
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

        $this->table('portal_control_files');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PortalControls', [
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
            ->requirePresence('text', 'create')
            ->notEmpty('text');

        $validator
            ->requirePresence('archive', 'create')
            ->notEmpty('archive');

        return $validator;
    }

        public function deleteFiles($portalControl_id)
    {
        $connection = ConnectionManager::get('default');
        $portalControlFiles = $connection->execute("SELECT * FROM portal_control_files WHERE portal_control_id = '$portal_control_id'");

        $x = $connection->execute("DELETE
                FROM [portal_control_files]
                WHERE [portal_control_id] = portal_control_id");

        foreach ($portalControlFiles as $key) {
            echo unlink(getcwd()
                . '/files/portal_control_files/'
                . strval($key['portal_control_id'])
                . '/' . strval($key['archive']));
        }
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
        $rules->add($rules->existsIn(['portal_control_id'], 'PortalControls'));

        return $rules;
    }
}
