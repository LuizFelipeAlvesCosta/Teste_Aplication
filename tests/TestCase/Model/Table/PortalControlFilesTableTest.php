<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PortalControlFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PortalControlFilesTable Test Case
 */
class PortalControlFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PortalControlFilesTable
     */
    public $PortalControlFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.portal_control_files',
        'app.portal_controls'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PortalControlFiles') ? [] : ['className' => 'App\Model\Table\PortalControlFilesTable'];
        $this->PortalControlFiles = TableRegistry::get('PortalControlFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PortalControlFiles);

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
     * Test deleteFiles method
     *
     * @return void
     */
    public function testDeleteFiles()
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
