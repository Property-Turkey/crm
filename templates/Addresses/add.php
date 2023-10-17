<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 * @var \Cake\Collection\CollectionInterface|string[] $parentAddresses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Addresses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addresses form content">
            <?= $this->Form->create($address) ?>
            <fieldset>
                <legend><?= __('Add Address') ?></legend>
                <?php
                    echo $this->Form->control('parent_id', ['options' => $parentAddresses, 'empty' => true]);
                    echo $this->Form->control('adrs_name');
                    echo $this->Form->control('adrs_slug');
                    echo $this->Form->control('adrs_type');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
