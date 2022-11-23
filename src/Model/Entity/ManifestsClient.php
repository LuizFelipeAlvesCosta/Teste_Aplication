<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ManifestsClient Entity
 *
 * @property int $id
 * @property string $number_manifest
 * @property int $organ_id
 * @property int $type_action_id
 * @property int $manifest_type_id
 * @property int $client_manifest_id
 * @property int $contact_manifest_id
 * @property int $action_corrective_id
 * @property string $description
 * @property string $historic
 * @property string $rnc
 * @property int $user_id
 * @property int $user_resp_id
 * @property \Cake\I18n\Time $created
 * @property string $detail
 * @property bool $status
 *
 * @property \App\Model\Entity\Organ $organ
 * @property \App\Model\Entity\TypesAction $types_action
 * @property \App\Model\Entity\ManifestsType $manifests_type
 * @property \App\Model\Entity\Client $client
 * @property \App\Model\Entity\ClientsContact $clients_contact
 * @property \App\Model\Entity\ActionsCorrective $actions_corrective
 * @property \App\Model\Entity\User $user
 */
class ManifestsClient extends Entity
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
