<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompaniesPhonesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompaniesPhonesTable Test Case
 */
class CompaniesPhonesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CompaniesPhonesTable
     */
    public $CompaniesPhones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.companies_phones',
        'app.companies',
        'app.categories',
        'app.offices',
        'app.addresses',
        'app.regencies',
        'app.addresses_companies',
        'app.addresses_offices',
        'app.users',
        'app.addresses_users',
        'app.emails',
        'app.companies_emails',
        'app.phones',
        'app.companies_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CompaniesPhones') ? [] : ['className' => 'App\Model\Table\CompaniesPhonesTable'];
        $this->CompaniesPhones = TableRegistry::get('CompaniesPhones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompaniesPhones);

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
