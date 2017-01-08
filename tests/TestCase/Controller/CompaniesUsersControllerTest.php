<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CompaniesUsersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CompaniesUsersController Test Case
 */
class CompaniesUsersControllerTest extends IntegrationTestCase
{

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
        'app.regencies',
        'app.provinces',
        'app.addresses',
        'app.addresses_companies',
        'app.addresses_offices',
        'app.users',
        'app.roles',
        'app.addresses_users',
        'app.certificates',
        'app.issuers',
        'app.trainings',
        'app.trainings_users',
        'app.evidences',
        'app.certificates_users',
        'app.educations_users',
        'app.educations',
        'app.colleges',
        'app.levels',
        'app.emails',
        'app.companies_emails',
        'app.emails_offices',
        'app.emails_users',
        'app.offices_users',
        'app.phones',
        'app.types',
        'app.companies_phones',
        'app.offices_phones',
        'app.phones_users'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
