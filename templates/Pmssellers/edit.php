<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pmsseller $pmsseller
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pmsseller->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pmsseller->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Pmssellers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pmssellers form content">
            <?= $this->Form->create($pmsseller) ?>
            <fieldset>
                <legend><?= __('Edit Pmsseller') ?></legend>
                <?php
                    echo $this->Form->control('seller_name');
                    echo $this->Form->control('seller_type');
                    echo $this->Form->control('seller_nationality');
                    echo $this->Form->control('seller_photos');
                    echo $this->Form->control('seller_configs');
                    echo $this->Form->control('stat_created');
                    echo $this->Form->control('rec_state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
