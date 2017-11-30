<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuthTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuthTable Test Case
 */
class AuthTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AuthTable
     */
    public $Auth;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.auth'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Auth') ? [] : ['className' => AuthTable::class];
        $this->Auth = TableRegistry::get('Auth', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Auth);

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
