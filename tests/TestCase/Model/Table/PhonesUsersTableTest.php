<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhonesUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhonesUsersTable Test Case
 */
class PhonesUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PhonesUsersTable
     */
    public $PhonesUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.phones_users',
        'app.phones',
        'app.types',
        'app.companies',
        'app.categories',
        'app.offices',
        'app.regencies',
        'app.addresses',
        'app.addresses_companies',
        'app.addresses_offices',
        'app.users',
        'app.addresses_users',
        'app.emails',
        'app.companies_emails',
        'app.emails_offices',
        'app.emails_users',
        'app.offices_phones',
        'app.offices_users',
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
        $config = TableRegistry::exists('PhonesUsers') ? [] : ['className' => 'App\Model\Table\PhonesUsersTable'];
        $this->PhonesUsers = TableRegistry::get('PhonesUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PhonesUsers);

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
