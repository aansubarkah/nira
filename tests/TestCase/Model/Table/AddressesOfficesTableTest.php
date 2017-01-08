<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AddressesOfficesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AddressesOfficesTable Test Case
 */
class AddressesOfficesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AddressesOfficesTable
     */
    public $AddressesOffices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.addresses_offices',
        'app.addresses',
        'app.regencies',
        'app.companies',
        'app.addresses_companies',
        'app.offices',
        'app.users',
        'app.addresses_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AddressesOffices') ? [] : ['className' => 'App\Model\Table\AddressesOfficesTable'];
        $this->AddressesOffices = TableRegistry::get('AddressesOffices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AddressesOffices);

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
