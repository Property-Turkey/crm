<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSale $userSale
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List User Sale'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userSale form content">
            <?= $this->Form->create($userSale) ?>
            <fieldset>
                <legend><?= __('Add User Sale') ?></legend>
                <?php
                    echo $this->Form->control('user_id');
                    echo $this->Form->control('lead_id');
                    echo $this->Form->control('user_lead_configs');
                    echo $this->Form->control('stat_created', ['empty' => true]);
                    echo $this->Form->control('rec_state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
