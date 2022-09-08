<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Proveedore Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $dni
 * @property string $domicilio
 * @property string $mail
 * @property string $telefono
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Proveedore extends Entity
{
    protected function _getLabel()
    {
        return $this->_fields['apellido'] . ' ' . $this->_fields['nombre'];
    }
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'nombre' => true,
        'apellido' => true,
        'dni' => true,
        'domicilio' => true,
        'mail' => true,
        'telefono' => true,
        'created' => true,
        'modified' => true,
    ];
}
