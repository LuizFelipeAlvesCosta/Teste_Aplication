<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ManifestsClientFixture
 *
 */
class ManifestsClientFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'manifests_client';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => '10', 'autoIncrement' => true, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null],
        'number_manifest' => ['type' => 'string', 'length' => '10', 'null' => true, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'organ_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'type_action_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'manifest_type_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'client_manifest_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'contact_manifest_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'action_corrective_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'description' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null],
        'historic' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null],
        'rnc' => ['type' => 'string', 'length' => '100', 'null' => false, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'user_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'user_resp_id' => ['type' => 'integer', 'length' => '10', 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'detail' => ['type' => 'string', 'length' => '350', 'null' => true, 'default' => null, 'collate' => 'Latin1_General_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'status' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => 0, 'precision' => null, 'comment' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_organ' => ['type' => 'foreign', 'columns' => ['organ_id'], 'references' => ['organs', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_type_action' => ['type' => 'foreign', 'columns' => ['type_action_id'], 'references' => ['types_action', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_manifest_type' => ['type' => 'foreign', 'columns' => ['manifest_type_id'], 'references' => ['manifests_type', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_manifest_client' => ['type' => 'foreign', 'columns' => ['client_manifest_id'], 'references' => ['clients', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_manifest_contact' => ['type' => 'foreign', 'columns' => ['contact_manifest_id'], 'references' => ['clients_contact', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_action_corrective' => ['type' => 'foreign', 'columns' => ['action_corrective_id'], 'references' => ['actions_corrective', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_sender_manifest_client' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_user_resp' => ['type' => 'foreign', 'columns' => ['user_resp_id'], 'references' => ['users_resp', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'number_manifest' => 'Lorem ip',
            'organ_id' => 1,
            'type_action_id' => 1,
            'manifest_type_id' => 1,
            'client_manifest_id' => 1,
            'contact_manifest_id' => 1,
            'action_corrective_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'historic' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'rnc' => 'Lorem ipsum dolor sit amet',
            'user_id' => 1,
            'user_resp_id' => 1,
            'created' => 1547145098,
            'detail' => 'Lorem ipsum dolor sit amet',
            'status' => 1
        ],
    ];
}
