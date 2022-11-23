<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PortalControl Entity
 *
 * @property int $id
 * @property string $name_portal
 * @property string $client
 * @property string $site_link
 * @property string $phone_number
 * @property string $email
 * @property string $login
 * @property string $password
 * @property string $instructions
 * @property string $comments
 * @property string $users
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\PortalControlFile[] $portal_control_files
 */
class PortalControl extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
