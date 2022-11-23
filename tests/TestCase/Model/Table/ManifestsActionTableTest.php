<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ManifestsActionTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ManifestsActionTable Test Case
 */
class ManifestsActionTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ManifestsActionTable
     */
    public $ManifestsAction;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.manifests_action'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ManifestsAction') ? [] : ['className' => 'App\Model\Table\ManifestsActionTable'];
        $this->ManifestsAction = TableRegistry::get('ManifestsAction', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ManifestsAction);

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
