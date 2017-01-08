<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompaniesUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompaniesUsersTable Test Case
 */
class CompaniesUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CompaniesUsersTable
     */
    public $CompaniesUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.companies_users',
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
        'app.companies_phones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CompaniesUsers') ? [] : ['className' => 'App\Model\Table\CompaniesUsersTable'];
        $this->CompaniesUsers = TableRegistry::get('CompaniesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompaniesUsers);

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
