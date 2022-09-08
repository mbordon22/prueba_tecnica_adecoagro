<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proveedore $proveedore
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Proveedore'), ['action' => 'edit', $proveedore->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Proveedore'), ['action' => 'delete', $proveedore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $proveedore->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Proveedores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Proveedore'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="proveedores view content">
            <h3><?= h($proveedore->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($proveedore->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellido') ?></th>
                    <td><?= h($proveedore->apellido) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dni') ?></th>
                    <td><?= h($proveedore->dni) ?></td>
                </tr>
                <tr>
                    <th><?= __('Domicilio') ?></th>
                    <td><?= h($proveedore->domicilio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mail') ?></th>
                    <td><?= h($proveedore->mail) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefono') ?></th>
                    <td><?= h($proveedore->telefono) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($proveedore->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($proveedore->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($proveedore->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
