<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypesTable Test Case
 */
class TypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypesTable
     */
    public $Types;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.types',
        'app.phones',
        'app.companies',
        'app.categories',
        'app.offices',
        'app.regencies',
        'app.provinces',
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
        $config = TableRegistry::exists('Types') ? [] : ['className' => 'App\Model\Table\TypesTable'];
        $this->Types = TableRegistry::get('Types', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Types);

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
