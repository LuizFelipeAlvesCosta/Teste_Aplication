<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ComposicaoPpu Entity
 *
 * @property int $id
 * @property string $Valor_art
 * @property string $Valor_visita
 * @property string $valor_outros
 * @property string $num_qc
 * @property bool $avista
 */
class ComposicaoPpu extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
