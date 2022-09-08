<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proveedore[]|\Cake\Collection\CollectionInterface $proveedores
 */
?>
<div class="proveedores index content">
    <?= $this->Html->link(__('Nuevo Proveedor'), ['action' => 'add'], ['class' => 'btn btn-secondary float-right']) ?>
    <h3><?= __('Proveedores') ?></h3>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="bg-light">
                <tr>
                    <th><?= $this->Paginator->sort('apellido y Nombre') ?></th>
                    <th><?= $this->Paginator->sort('DNI') ?></th>
                    <th><?= $this->Paginator->sort('domicilio') ?></th>
                    <th><?= $this->Paginator->sort('mail') ?></th>
                    <th><?= $this->Paginator->sort('telefono') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proveedores as $proveedore): ?>
                <tr>
                    <td><?= h($proveedore->apellido . ' ' .$proveedore->nombre) ?></td>
                    <td><?= h($proveedore->dni) ?></td>
                    <td><?= h($proveedore->domicilio) ?></td>
                    <td><?= h($proveedore->mail) ?></td>
                    <td><?= h($proveedore->telefono) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $proveedore->id], ['class' => 'btn btn-primary px-2 text-white mb-1 mb-md-0']) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $proveedore->id], ['class' => 'btn btn-danger px-2 text-white','confirm' => __('Are you sure you want to delete # {0}?', $proveedore->id)]) ?>
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
