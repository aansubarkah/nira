<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmailsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmailsUsersTable Test Case
 */
class EmailsUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmailsUsersTable
     */
    public $EmailsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.emails_users',
        'app.emails',
        'app.companies',
        'app.categories',
        'app.offices',
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
        'app.emails_offices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EmailsUsers') ? [] : ['className' => 'App\Model\Table\EmailsUsersTable'];
        $this->EmailsUsers = TableRegistry::get('EmailsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmailsUsers);

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
