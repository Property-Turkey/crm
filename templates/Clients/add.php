<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 * @var \Cake\Collection\CollectionInterface|string[] $sources
 * @var \Cake\Collection\CollectionInterface|string[] $country
 * @var \Cake\Collection\CollectionInterface|string[] $city
 * @var \Cake\Collection\CollectionInterface|string[] $poolCategories
 * @var \Cake\Collection\CollectionInterface|string[] $region
 * @var \Cake\Collection\CollectionInterface|string[] $tagCategories
 * @var \Cake\Collection\CollectionInterface|string[] $categories
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
                    echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true]);
                    echo $this->Form->control('source_id', ['options' => $sources, 'empty' => true]);
                    echo $this->Form->control('pool_id', ['options' => $poolCategories, 'empty' => true]);
                    echo $this->Form->control('client_name');
                    echo $this->Form->control('client_phone');
                    echo $this->Form->control('client_mobile');
                    echo $this->Form->control('client_email');
                    echo $this->Form->control('client_address');
                    echo $this->Form->control('client_nationality');
                    echo $this->Form->control('client_configs');
                    echo $this->Form->control('client_priority');
                    echo $this->Form->control('client_finance');
                    echo $this->Form->control('client_current_stage');
                    echo $this->Form->control('client_tags');
                    echo $this->Form->control('client_budget');
                    echo $this->Form->control('client_commission');
                    echo $this->Form->control('client_units');
                    echo $this->Form->control('client_shared_roles');
                    echo $this->Form->control('adrs_country', ['options' => $country, 'empty' => true]);
                    echo $this->Form->control('adrs_city', ['options' => $city, 'empty' => true]);
                    echo $this->Form->control('adrs_region', ['options' => $region, 'empty' => true]);
                    echo $this->Form->control('stat_created');
                    echo $this->Form->control('rec_state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
