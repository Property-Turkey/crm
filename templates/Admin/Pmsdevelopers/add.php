<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pmsdeveloper $pmsdeveloper
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Pmsdevelopers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pmsdevelopers form content">
            <?= $this->Form->create($pmsdeveloper) ?>
            <fieldset>
                <legend><?= __('Add Pmsdeveloper') ?></legend>
                <?php
                    echo $this->Form->control('dev_name');
                    echo $this->Form->control('dev_configs');
                    echo $this->Form->control('stat_created');
                    echo $this->Form->control('rec_state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
