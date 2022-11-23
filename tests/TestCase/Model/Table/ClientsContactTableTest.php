<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientsContactTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClientsContactTable Test Case
 */
class ClientsContactTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientsContactTable
     */
    public $ClientsContact;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.clients_contact',
        'app.clients',
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
        $config = TableRegistry::exists('ClientsContact') ? [] : ['className' => 'App\Model\Table\ClientsContactTable'];
        $this->ClientsContact = TableRegistry::get('ClientsContact', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ClientsContact);

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
