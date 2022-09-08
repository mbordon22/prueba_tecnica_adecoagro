<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compra $compra
 */
?>
<div class="container">
    <div class="row d-md-flex justify-content-center ">
        <div class="col-12 col-md-8 compras view content">
            <h3 class="text-center"><?= __('Detalle Compra N°: '. $compra->id) ?></h3>
            <div class="row">
                <div class="col-12">
                    <p class="text-center"><b>Proveedor: </b><?= h($compra->proveedore->apellido . ' ' . $compra->proveedore->nombre) ?></p>
                    <p class="text-center"><b>Fecha y Hora de la compra: </b><?= h($compra->fecha) ?></p>
                
                    <p class="text-center"><b>Productos Comprados </b></p>
                    <div class="producto_item d-flex justify-content-between aling-items-center">
                        <p><b><?= h('Producto') ?></b></p>
                        <p><b><?= h('Cantidad') ?></b></p>
                        <p><b><?= h('Subtotal') ?></b></p>
                    </div>
                    <?php foreach($compra->compra_detalle as $detalle): ?>
                        <div class="producto_item d-flex justify-content-between aling-items-center">
                            <p><?= $detalle->producto->producto ?></p>
                            <p><?= $detalle->cantidad ?></p>
                            <p><?= $this->Number->currency(($detalle->producto->precio * $detalle->cantidad),'USD') ?></p>
                        </div>
                    <?php endforeach; ?>

                    <div class="producto_item d-flex justify-content-between aling-items-center">
                        <p><b>Total: </b></p>
                        <p></p>
                        <p><b><?= $this->Number->currency($compra->importe, 'USD') ?></b></p>
                    </div>
                </div>
            </div>
            <!-- <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($compra->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Proveedor') ?></th>
                    <td><?= h($compra->proveedore->apellido . ' ' . $compra->proveedore->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fecha Y Hora de la compra') ?></th>
                    <td><?= h($compra->fecha) ?></td>
                </tr>
                <tr>
                    <th><?= __('Productos Comprados') ?></th>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th><?= __('Producto') ?></th>
                    <th><?= __('Cantidad') ?></th>
                    <th><?= __('Total') ?></th>
                </tr>
                <?php foreach($compra->compra_detalle as $detalle): ?>
                    
                    <tr>
                        <td><?= $detalle->producto->producto ?></td>
                        <td><?= $detalle->cantidad ?></td>
                        <td><?= $this->Number->currency(($detalle->producto->precio * $detalle->cantidad),'USD') ?></td>
                    </tr>

                <?php endforeach; ?>
                <tr>
                    <th><?= __('Importe Total') ?></th>
                    <td></td>
                    <td><?= $this->Number->currency($compra->importe, 'USD') ?></td>
                </tr>
            </table> -->
        </div>
    </div>
</div>
