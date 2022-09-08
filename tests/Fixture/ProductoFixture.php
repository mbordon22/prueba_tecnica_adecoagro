<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductoFixture
 */
class ProductoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'producto';
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
                'cantidad' => 1,
                'precio' => 1.5,
                'created' => '2022-09-07 14:39:04',
                'modified' => '2022-09-07 14:39:04',
            ],
        ];
        parent::init();
    }
}
