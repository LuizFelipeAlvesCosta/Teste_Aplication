<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * DocumentsFiles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ExternalDocuments
 *
 * @method \App\Model\Entity\DocumentsFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\DocumentsFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DocumentsFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DocumentsFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DocumentsFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentsFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentsFile findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DocumentsFilesTable extends Table
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

        $this->table('documents_files');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ExternalDocuments', [
            'foreignKey' => 'document_id',
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
            ->allowEmpty('text');

        $validator
            ->allowEmpty('archive');

        return $validator;
    }

    public function deleteFiles($document_id)
    {
        $connection = ConnectionManager::get('default');
        $portalControlFiles = $connection->execute("SELECT * FROM documents_files WHERE document_id = '$document_id'");

        $x = $connection->execute("DELETE
                FROM [documents_files]
                WHERE [document_id] = document_id");

        foreach ($portalControlFiles as $key) {
            echo unlink(getcwd()
                . '/files/documents_files/'
                . strval($key['document_id'])
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
        $rules->add($rules->existsIn(['document_id'], 'ExternalDocuments'));

        return $rules;
    }
}
