<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compra $compra
 */
?>
<div class="container">
    <div class="row d-md-flex justify-content-center">
        <div class="col-12 col-md-8 compras form content">
            <?= $this->Form->create($compra, ['id' => 'formulario_compra']) ?>
            <fieldset>
                <legend class="mb-3"><?= __('Editar Compra') ?></legend>
                <div class="row">
                    <div class="col-12 col-md-5 mb-3 mb-md-0">
                        <?= $this->Form->control('id_producto', ['options' => $productos, 'label' => 'Producto', 'id' => 'id_producto', 'class' => 'form-control', 'empty' => 'Seleccionar']);  ?>
                    </div>
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <?= $this->Form->control('Cantidad Producto', ['type' => 'number', 'min' => 1,  'id' => 'cantidad_producto', 'name' => 'cantidad_producto', 'class' => 'form-control']); ?>
                    </div>
                    <div class="col-12 col-md-3 d-flex justify-content-center align-items-end">
                        <?= $this->Form->button('Agregar Producto', ["type" => "button", 'id' => 'btn_agregar_producto', 'class' => 'btn btn-success']); ?>
                    </div>
                </div>

                <div class="table-responsive my-4" id="tabla_productos_compra">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Importe</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($compra->compra_detalle as $detalle) : ?>
                                <tr>
                                    <td><?= $detalle->producto->id ?></td>
                                    <td><?= $detalle->producto->producto ?></td>
                                    <td><?= $detalle->cantidad ?></td>
                                    <td><?= '$' . ($detalle->producto->precio * $detalle->cantidad) ?></td>
                                    <td><span style="color:red; cursor:pointer;" onclick="eliminar_producto_detalle(this)">X</span></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-12 col-md-5 mb-3 mb-md-0">
                        <?= $this->Form->control('id_proveedor', ['options' => $proveedores, 'label' => 'Proveedor', 'class' => 'form-control', 'empty' => 'Seleccionar']); ?>
                    </div>
                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                        <?= $this->Form->control('fecha', ['type' => 'datetime','label' =>'Fecha y Hora','class' => 'form-control', 'value' => $compra->fecha]);?>
                    </div>
                    <div class="col-12 col-md-3">
                        <?= $this->Form->control('importe', ['type' => 'text', 'readonly' => true, 'id' => 'importe_total', 'label' => 'Importe Total', 'value' => '$' . $compra->importe, 'class' => 'form-control']); ?>
                    </div>
                </div>

            </fieldset>
            <div class="row mt-3">
                <div class="col-12">
                    <?= $this->Form->button(__('Guardar'), ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?php echo $this->Html->script("compras.js") ?>