<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSale $userSale
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $clients
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userSale->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userSale->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List User Sale'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userSale form content">
            <?= $this->Form->create($userSale) ?>
            <fieldset>
                <legend><?= __('Edit User Sale') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('client_id', ['options' => $clients]);
                    echo $this->Form->control('stat_created', ['empty' => true]);
                    echo $this->Form->control('rec_state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
