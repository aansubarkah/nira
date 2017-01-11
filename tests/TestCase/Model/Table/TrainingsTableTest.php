<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrainingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrainingsTable Test Case
 */
class TrainingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TrainingsTable
     */
    public $Trainings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.trainings',
        'app.issuers',
        'app.certificates',
        'app.users',
        'app.certificates_users',
        'app.evidences',
        'app.educations_users',
        'app.educations',
        'app.colleges',
        'app.levels',
        'app.trainings_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Trainings') ? [] : ['className' => 'App\Model\Table\TrainingsTable'];
        $this->Trainings = TableRegistry::get('Trainings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Trainings);

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
