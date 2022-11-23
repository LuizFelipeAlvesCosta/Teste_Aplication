<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ManifestFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ManifestFilesTable Test Case
 */
class ManifestFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ManifestFilesTable
     */
    public $ManifestFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.manifest_files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ManifestFiles') ? [] : ['className' => 'App\Model\Table\ManifestFilesTable'];
        $this->ManifestFiles = TableRegistry::get('ManifestFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ManifestFiles);

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
