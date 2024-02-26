<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserClient $userClient
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userClient->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userClient->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List User Client'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userClient form content">
            <?= $this->Form->create($userClient) ?>
            <fieldset>
                <legend><?= __('Edit User Client') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('target_id');
                    echo $this->Form->control('target_type');
                    echo $this->Form->control('stat_created', ['empty' => true]);
                    echo $this->Form->control('rec_state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
