<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PortalControlTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PortalControlTable Test Case
 */
class PortalControlTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PortalControlTable
     */
    public $PortalControl;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.portal_control',
        'app.users_portal_control',
        'app.portal_control_files',
        'app.portals',
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
        $config = TableRegistry::exists('PortalControl') ? [] : ['className' => 'App\Model\Table\PortalControlTable'];
        $this->PortalControl = TableRegistry::get('PortalControl', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PortalControl);

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
