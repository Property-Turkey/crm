<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reminder $reminder
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
                ['action' => 'delete', $reminder->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $reminder->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Reminders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reminders form content">
            <?= $this->Form->create($reminder) ?>
            <fieldset>
                <legend><?= __('Edit Reminder') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('sale_id', ['options' => $sales]);
                    echo $this->Form->control('reminder_nextcall');
                    echo $this->Form->control('reminder_desc');
                    echo $this->Form->control('stat_created');
                    echo $this->Form->control('stat_updated', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
