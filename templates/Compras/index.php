<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Compra[]|\Cake\Collection\CollectionInterface $compras
 */
?>
<div class="compras index content">
    <?= $this->Html->link(__('Nueva Compra'), ['action' => 'add'], ['class' => 'btn btn-secondary float-right']) ?>
    <h3><?= __('Compras') ?></h3>
    <div class="table-responsive mt-3 mt-md-0">
        <table class="table table-hover table-bordered">
            <thead class="bg-light">
                <tr>
                    <th><?= $this->Paginator->sort('Proveedor') ?></th>
                    <th><?= $this->Paginator->sort('fecha y Hora') ?></th>
                    <th><?= $this->Paginator->sort('importe') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($compras as $compra): ?>
                <tr>
                    <td><?= h($compra->proveedore->apellido . ' ' . $compra->proveedore->nombre) ?></td>
                    <td><?= h($compra->fecha) ?></td>
                    <td><?= $this->Number->currency($compra->importe, 'USD') ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Detalle'), ['action' => 'view', $compra->id], ['class' => 'btn btn-success px-2 text-white mb-1 mb-md-0']) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $compra->id], ['class' => 'btn btn-primary px-2 text-white mb-1 mb-md-0']) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $compra->id], ['class' => 'btn btn-danger px-2 text-white', 'confirm' => __('¿Seguro que quieres eliminar la compra?', $compra->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primer')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}}')) ?></p>
    </div>
</div>
