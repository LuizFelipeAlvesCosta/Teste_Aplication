<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PortalControlsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PortalControlsTable Test Case
 */
class PortalControlsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PortalControlsTable
     */
    public $PortalControls;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.portal_controls',
        'app.portal_control_files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PortalControls') ? [] : ['className' => 'App\Model\Table\PortalControlsTable'];
        $this->PortalControls = TableRegistry::get('PortalControls', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PortalControls);

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
