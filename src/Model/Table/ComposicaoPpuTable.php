<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ComposicaoPpu Model
 *
 * @method \App\Model\Entity\ComposicaoPpu get($primaryKey, $options = [])
 * @method \App\Model\Entity\ComposicaoPpu newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ComposicaoPpu[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ComposicaoPpu|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ComposicaoPpu patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ComposicaoPpu[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ComposicaoPpu findOrCreate($search, callable $callback = null)
 */
class ComposicaoPpuTable extends Table
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

        $this->table('composicao_ppu');
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
            ->allowEmpty('Valor_art');

        $validator
            ->allowEmpty('Valor_visita');

        $validator
            ->allowEmpty('valor_outros');

        $validator
            ->allowEmpty('num_qc');

        $validator
            ->boolean('avista')
            ->allowEmpty('avista');

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
