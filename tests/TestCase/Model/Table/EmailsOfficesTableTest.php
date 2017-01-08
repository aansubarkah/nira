<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmailsOfficesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmailsOfficesTable Test Case
 */
class EmailsOfficesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmailsOfficesTable
     */
    public $EmailsOffices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.emails_offices',
        'app.offices',
        'app.emails',
        'app.companies',
        'app.categories',
        'app.addresses',
        'app.regencies',
        'app.addresses_companies',
        'app.addresses_offices',
        'app.users',
        'app.addresses_users',
        'app.companies_emails',
        'app.phones',
        'app.companies_phones',
        'app.companies_users',
        'app.emails_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EmailsOffices') ? [] : ['className' => 'App\Model\Table\EmailsOfficesTable'];
        $this->EmailsOffices = TableRegistry::get('EmailsOffices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmailsOffices);

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
