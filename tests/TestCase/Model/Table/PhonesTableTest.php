<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhonesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhonesTable Test Case
 */
class PhonesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PhonesTable
     */
    public $Phones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.companies_users',
        'app.phones_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Phones') ? [] : ['className' => 'App\Model\Table\PhonesTable'];
        $this->Phones = TableRegistry::get('Phones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Phones);

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
