<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ActionsCorrectiveTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ActionsCorrectiveTable Test Case
 */
class ActionsCorrectiveTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ActionsCorrectiveTable
     */
    public $ActionsCorrective;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('ActionsCorrective') ? [] : ['className' => 'App\Model\Table\ActionsCorrectiveTable'];
        $this->ActionsCorrective = TableRegistry::get('ActionsCorrective', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ActionsCorrective);

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
