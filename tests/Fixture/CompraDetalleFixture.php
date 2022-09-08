<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CompraDetalleFixture
 */
class CompraDetalleFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'compra_detalle';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'id_compra' => 1,
                'id_producto' => 1,
                'cantidad' => 1,
                'fecha' => '2022-09-07',
                'created' => '2022-09-07 23:29:32',
                'modified' => '2022-09-07 23:29:32',
            ],
        ];
        parent::init();
    }
}
