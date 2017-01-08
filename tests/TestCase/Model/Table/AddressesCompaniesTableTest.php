<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AddressesCompaniesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AddressesCompaniesTable Test Case
 */
class AddressesCompaniesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AddressesCompaniesTable
     */
    public $AddressesCompanies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.addresses_companies',
        'app.addresses',
        'app.regencies',
        'app.companies',
        'app.offices',
        'app.addresses_offices',
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
        $config = TableRegistry::exists('AddressesCompanies') ? [] : ['className' => 'App\Model\Table\AddressesCompaniesTable'];
        $this->AddressesCompanies = TableRegistry::get('AddressesCompanies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AddressesCompanies);

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
