<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ManifestsClientTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ManifestsClientTable Test Case
 */
class ManifestsClientTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ManifestsClientTable
     */
    public $ManifestsClient;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.manifests_client',
        'app.organs',
        'app.types_action',
        'app.manifests_type',
        'app.clients',
        'app.clients_contact',
        'app.external_documents',
        'app.documents_files',
        'app.locals_document',
        'app.treatments_document',
        'app.users',
        'app.notices',
        'app.notices_users',
        'app.roles',
        'app.notices_roles',
        'app.roles_users',
        'app.actions_corrective'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ManifestsClient') ? [] : ['className' => 'App\Model\Table\ManifestsClientTable'];
        $this->ManifestsClient = TableRegistry::get('ManifestsClient', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ManifestsClient);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
