<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PortalControlFixture
 *
 */
class PortalControlFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'portal_control';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => '10', 'autoIncrement' => true, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null],
        'name_portal' => ['type' => 'string', 'length' => '100', 'null' => false, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'site_link' => ['type' => 'string', 'length' => '500', 'null' => false, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'phone_number' => ['type' => 'string', 'length' => '200', 'null' => false, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'instructions' => ['type' => 'string', 'length' => '500', 'null' => true, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'comments' => ['type' => 'string', 'length' => '500', 'null' => true, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'users_portal_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'portal_control_files_id' => ['type' => 'integer', 'length' => '10', 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_users_portal_id_key' => ['type' => 'foreign', 'columns' => ['users_portal_id'], 'references' => ['users_portal_control', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_portal_control_files_key' => ['type' => 'foreign', 'columns' => ['portal_control_files_id'], 'references' => ['portal_control_files', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'name_portal' => 'Lorem ipsum dolor sit amet',
            'site_link' => 'Lorem ipsum dolor sit amet',
            'phone_number' => 'Lorem ipsum dolor sit amet',
            'instructions' => 'Lorem ipsum dolor sit amet',
            'comments' => 'Lorem ipsum dolor sit amet',
            'users_portal_id' => 1,
            'portal_control_files_id' => 1,
            'created' => 1508520495,
            'modified' => 1508520495
        ],
    ];
}
