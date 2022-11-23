<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersPortalControlsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersPortalControlsTable Test Case
 */
class UsersPortalControlsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersPortalControlsTable
     */
    public $UsersPortalControls;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_portal_controls'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersPortalControls') ? [] : ['className' => 'App\Model\Table\UsersPortalControlsTable'];
        $this->UsersPortalControls = TableRegistry::get('UsersPortalControls', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersPortalControls);

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
