<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OfficesPhonesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OfficesPhonesTable Test Case
 */
class OfficesPhonesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OfficesPhonesTable
     */
    public $OfficesPhones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.offices_phones',
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
        $config = TableRegistry::exists('OfficesPhones') ? [] : ['className' => 'App\Model\Table\OfficesPhonesTable'];
        $this->OfficesPhones = TableRegistry::get('OfficesPhones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OfficesPhones);

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
