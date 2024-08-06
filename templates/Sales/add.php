<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sale $sale
 * @var \Cake\Collection\CollectionInterface|string[] $clients
 * @var \Cake\Collection\CollectionInterface|string[] $tags
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 * @var \Cake\Collection\CollectionInterface|string[] $pool
 * @var \Cake\Collection\CollectionInterface|string[] $status
 * @var \Cake\Collection\CollectionInterface|string[] $type
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Sales'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sales form content">
            <?= $this->Form->create($sale) ?>
            <fieldset>
                <legend><?= __('Add Sale') ?></legend>
                <?php
                    echo $this->Form->control('client_id', ['options' => $clients, 'empty' => true]);
                    echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true]);
                    echo $this->Form->control('pool_id', ['options' => $pool, 'empty' => true]);
                    echo $this->Form->control('sale_priority');
                    echo $this->Form->control('sale_finance');
                    echo $this->Form->control('sale_current_stage');
                    echo $this->Form->control('sale_tags', ['options' => $tags, 'empty' => true]);
                    echo $this->Form->control('sale_budget');
                    echo $this->Form->control('sale_commission');
                    echo $this->Form->control('sale_units');
                    echo $this->Form->control('sale_shared_roles');
                    echo $this->Form->control('stat_created');
                    echo $this->Form->control('stat_updated');
                    echo $this->Form->control('rec_state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
