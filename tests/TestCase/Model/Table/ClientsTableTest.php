<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClientsTable Test Case
 */
class ClientsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientsTable
     */
    public $Clients;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clients',
        'app.clients_contact',
        'app.external_documents',
        'app.locals_document',
        'app.treatments_document',
        'app.users',
        'app.notices',
        'app.notices_users',
        'app.roles',
        'app.notices_roles',
        'app.roles_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Clients') ? [] : ['className' => 'App\Model\Table\ClientsTable'];
        $this->Clients = TableRegistry::get('Clients', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Clients);

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
}
