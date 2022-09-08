<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Producto $producto
 */
?>
<div class="container">
    <div class="row d-md-flex justify-content-center">
        <div class="col-12 col-md-8 productos form content">
            <?= $this->Form->create($producto) ?>
            <fieldset>
                <legend class="mb-3"><?= __('Nuevo Producto') ?></legend>
                <?php
                    echo $this->Form->control('producto',['class' => 'form-control mb-3']);
                    echo $this->Form->control('precio',['class' => 'form-control']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Guardar'),['class' => 'btn btn-primary mt-3']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
