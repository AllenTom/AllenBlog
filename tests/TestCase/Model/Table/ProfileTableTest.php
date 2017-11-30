<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProfileTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProfileTable Test Case
 */
class ProfileTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProfileTable
     */
    public $Profile;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.profile'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Profile') ? [] : ['className' => ProfileTable::class];
        $this->Profile = TableRegistry::get('Profile', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Profile);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
