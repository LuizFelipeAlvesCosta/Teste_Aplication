<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ParametrosMedicao Model
 *
 * @method \App\Model\Entity\ParametrosMedicao get($primaryKey, $options = [])
 * @method \App\Model\Entity\ParametrosMedicao newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ParametrosMedicao[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ParametrosMedicao|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ParametrosMedicao patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ParametrosMedicao[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ParametrosMedicao findOrCreate($search, callable $callback = null)
 */
class ParametrosMedicaoTable extends Table
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

        $this->table('parametros_medicao');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->allowEmpty('parametro_ponto');

        $validator
            ->allowEmpty('valor_parametro');

        $validator
            ->allowEmpty('quantidade');

        $validator
            ->requirePresence('num_qc', 'create')
            ->notEmpty('num_qc');

        return $validator;
    }

    /**
     * Returns the database connection name to use by default.
     *
     * @return string
     */
    public static function defaultConnectionName()
    {
        return 'clientesFaturas';
    }
}
