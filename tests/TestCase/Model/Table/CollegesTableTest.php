<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CollegesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CollegesTable Test Case
 */
class CollegesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CollegesTable
     */
    public $Colleges;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.colleges',
        'app.educations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Colleges') ? [] : ['className' => 'App\Model\Table\CollegesTable'];
        $this->Colleges = TableRegistry::get('Colleges', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Colleges);

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
