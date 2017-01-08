<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OfficesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OfficesTable Test Case
 */
class OfficesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OfficesTable
     */
    public $Offices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.offices',
        'app.categories',
        'app.companies',
        'app.addresses',
        'app.regencies',
        'app.addresses_companies',
        'app.addresses_offices',
        'app.users',
        'app.addresses_users',
        'app.emails',
        'app.companies_emails',
        'app.emails_offices',
        'app.emails_users',
        'app.phones',
        'app.companies_phones',
        'app.companies_users',
        'app.offices_phones',
        'app.offices_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Offices') ? [] : ['className' => 'App\Model\Table\OfficesTable'];
        $this->Offices = TableRegistry::get('Offices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Offices);

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
