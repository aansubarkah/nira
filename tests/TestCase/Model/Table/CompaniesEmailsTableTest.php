<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompaniesEmailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompaniesEmailsTable Test Case
 */
class CompaniesEmailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CompaniesEmailsTable
     */
    public $CompaniesEmails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.companies_emails',
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
        'app.phones',
        'app.companies_phones',
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
        $config = TableRegistry::exists('CompaniesEmails') ? [] : ['className' => 'App\Model\Table\CompaniesEmailsTable'];
        $this->CompaniesEmails = TableRegistry::get('CompaniesEmails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompaniesEmails);

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
