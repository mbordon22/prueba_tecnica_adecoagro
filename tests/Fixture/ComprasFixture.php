<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ComprasFixture
 */
class ComprasFixture extends TestFixture
{
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
                'id_proveedor' => 1,
                'fecha' => '2022-09-07 15:35:03',
                'importe' => 1.5,
                'created' => '2022-09-07 15:35:03',
                'modified' => '2022-09-07 15:35:03',
            ],
        ];
        parent::init();
    }
}
