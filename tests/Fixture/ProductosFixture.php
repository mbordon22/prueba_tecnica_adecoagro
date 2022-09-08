<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductosFixture
 */
class ProductosFixture extends TestFixture
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
                'producto' => 'Lorem ipsum dolor sit amet',
                'precio' => 1.5,
                'created' => '2022-09-07 14:50:43',
                'modified' => '2022-09-07 14:50:43',
            ],
        ];
        parent::init();
    }
}
