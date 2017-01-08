<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmailsTable Test Case
 */
class EmailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmailsTable
     */
    public $Emails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.emails_offices',
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
        $config = TableRegistry::exists('Emails') ? [] : ['className' => 'App\Model\Table\EmailsTable'];
        $this->Emails = TableRegistry::get('Emails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Emails);

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
}
