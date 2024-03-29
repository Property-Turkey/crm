<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission $permission
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Permissions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="permissions form content">
            <?= $this->Form->create($permission) ?>
            <fieldset>
                <legend><?= __('Add Permission') ?></legend>
                <?php
                    echo $this->Form->control('permission_role');
                    echo $this->Form->control('permission_module');
                    echo $this->Form->control('permission_c');
                    echo $this->Form->control('permission_r');
                    echo $this->Form->control('permission_u');
                    echo $this->Form->control('permission_d');
                    echo $this->Form->control('permission_a');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
