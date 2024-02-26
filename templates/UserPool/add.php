<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserPool $userPool
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List User Pool'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userPool form content">
            <?= $this->Form->create($userPool) ?>
            <fieldset>
                <legend><?= __('Add User Pool') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('pool_id');
                    echo $this->Form->control('stat_created', ['empty' => true]);
                    echo $this->Form->control('rec_state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
