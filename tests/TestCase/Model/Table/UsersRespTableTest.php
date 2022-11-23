<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersRespTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersRespTable Test Case
 */
class UsersRespTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersRespTable
     */
    public $UsersResp;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_resp'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersResp') ? [] : ['className' => 'App\Model\Table\UsersRespTable'];
        $this->UsersResp = TableRegistry::get('UsersResp', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersResp);

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
