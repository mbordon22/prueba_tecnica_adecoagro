<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto[]|\Cake\Collection\CollectionInterface $productos
 */
?>
<div class="productos index content">
    <?= $this->Html->link(__('Nuevo Producto'), ['action' => 'add'], ['class' => 'btn btn-secondary float-right']) ?>
    <h3><?= __('Productos') ?></h3>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="bg-light">
                <tr>
                    <th><?= $this->Paginator->sort('producto') ?></th>
                    <th><?= $this->Paginator->sort('precio') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto) : ?>
                    <tr>
                        <td><?= h($producto->producto) ?></td>
                        <td><?= $this->Number->currency($producto->precio, 'USD') ?></td>
                        <td><?= h($producto->created) ?></td>
                        <td><?= h($producto->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $producto->id], ['class' => 'btn btn-primary px-2 text-white mb-1 mb-md-0']) ?>
                            <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $producto->id], ['class' => 'btn btn-danger px-2 text-white','confirm' => __('Are you sure you want to delete # {0}?', $producto->id)]) ?>
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