<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ResponsiblesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ResponsiblesTable Test Case
 */
class ResponsiblesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ResponsiblesTable
     */
    public $Responsibles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.responsibles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Responsibles') ? [] : ['className' => 'App\Model\Table\ResponsiblesTable'];
        $this->Responsibles = TableRegistry::get('Responsibles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Responsibles);

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
