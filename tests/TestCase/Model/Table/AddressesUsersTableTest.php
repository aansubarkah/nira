<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AddressesUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AddressesUsersTable Test Case
 */
class AddressesUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AddressesUsersTable
     */
    public $AddressesUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.addresses_users',
        'app.addresses',
        'app.regencies',
        'app.companies',
        'app.addresses_companies',
        'app.offices',
        'app.addresses_offices',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AddressesUsers') ? [] : ['className' => 'App\Model\Table\AddressesUsersTable'];
        $this->AddressesUsers = TableRegistry::get('AddressesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AddressesUsers);

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
