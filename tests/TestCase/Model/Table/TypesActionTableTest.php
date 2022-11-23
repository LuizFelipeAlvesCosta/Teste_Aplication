<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesActionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesActionTable Test Case
 */
class TypesActionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesActionTable
     */
    public $TypesAction;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.types_action'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TypesAction') ? [] : ['className' => 'App\Model\Table\TypesActionTable'];
        $this->TypesAction = TableRegistry::get('TypesAction', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypesAction);

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
