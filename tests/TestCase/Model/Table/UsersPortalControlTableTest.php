<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersPortalControlTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersPortalControlTable Test Case
 */
class UsersPortalControlTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersPortalControlTable
     */
    public $UsersPortalControl;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_portal_control'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersPortalControl') ? [] : ['className' => 'App\Model\Table\UsersPortalControlTable'];
        $this->UsersPortalControl = TableRegistry::get('UsersPortalControl', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersPortalControl);

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
