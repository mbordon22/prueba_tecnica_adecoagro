<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proveedore $proveedore
 */
?>
<div class="container">
    <div class="row d-md-flex justify-content-center">
        <div class="col-12 col-md-8 proveedores form content">
            <?= $this->Form->create($proveedore) ?>
            <fieldset>
                <legend class="mb-3"><?= __('Editar Proveedor') ?></legend>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <?= $this->Form->control('nombre',['class' => 'form-control']);  ?>
                    </div>
                    <div class="col-12 col-md-6">
                        <?= $this->Form->control('apellido',['class' => 'form-control']);?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <?= $this->Form->control('dni',['class' => 'form-control']);  ?>
                    </div>
                    <div class="col-12 col-md-6">
                        <?= $this->Form->control('domicilio',['class' => 'form-control']);?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <?= $this->Form->control('mail',['class' => 'form-control']);  ?>
                    </div>
                    <div class="col-12 col-md-6">
                        <?= $this->Form->control('telefono',['class' => 'form-control']);?>
                    </div>
                </div>
                
            </fieldset>
            <?= $this->Form->button(__('Guardar'),['class' => 'btn btn-primary mt-3']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
