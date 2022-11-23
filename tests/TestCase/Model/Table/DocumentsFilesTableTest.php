<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocumentsFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DocumentsFilesTable Test Case
 */
class DocumentsFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DocumentsFilesTable
     */
    public $DocumentsFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.documents_files',
        'app.external_documents',
        'app.locals_document',
        'app.clients',
        'app.clients_contact',
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
        $config = TableRegistry::exists('DocumentsFiles') ? [] : ['className' => 'App\Model\Table\DocumentsFilesTable'];
        $this->DocumentsFiles = TableRegistry::get('DocumentsFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DocumentsFiles);

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
