<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Clients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clients form content">
            <?= $this->Form->create($client) ?>
            <fieldset>
                <legend><?= __('Add Client') ?></legend>
                <?php
                    echo $this->Form->control('source_id');
                    echo $this->Form->control('client_name');
                    echo $this->Form->control('client_phone');
                    echo $this->Form->control('client_mobile');
                    echo $this->Form->control('client_email');
                    echo $this->Form->control('client_address');
                    echo $this->Form->control('client_nationality');
                    echo $this->Form->control('client_configs');
                    echo $this->Form->control('adrs_country');
                    echo $this->Form->control('adrs_city');
                    echo $this->Form->control('adrs_region');
                    echo $this->Form->control('stat_created');
                    echo $this->Form->control('rec_state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
