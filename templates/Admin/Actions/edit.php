<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Action $action
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $sales
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $action->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $action->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Actions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actions form content">
            <?= $this->Form->create($action) ?>
            <fieldset>
                <legend><?= __('Edit Action') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('sale_id', ['options' => $sales]);
                    echo $this->Form->control('action_type');
                    echo $this->Form->control('stat_created');
                    echo $this->Form->control('rec_state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
