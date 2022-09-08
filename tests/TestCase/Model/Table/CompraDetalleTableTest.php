<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompraDetalleTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompraDetalleTable Test Case
 */
class CompraDetalleTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CompraDetalleTable
     */
    protected $CompraDetalle;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CompraDetalle',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CompraDetalle') ? [] : ['className' => CompraDetalleTable::class];
        $this->CompraDetalle = $this->getTableLocator()->get('CompraDetalle', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CompraDetalle);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CompraDetalleTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
