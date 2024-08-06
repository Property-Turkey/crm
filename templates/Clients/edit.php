<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 * @var string[]|\Cake\Collection\CollectionInterface $sources
 * @var string[]|\Cake\Collection\CollectionInterface $country
 * @var string[]|\Cake\Collection\CollectionInterface $city
 * @var string[]|\Cake\Collection\CollectionInterface $poolCategories
 * @var string[]|\Cake\Collection\CollectionInterface $region
 * @var string[]|\Cake\Collection\CollectionInterface $tagCategories
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $client->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $client->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Clients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clients form content">
            <?= $this->Form->create($client) ?>
            <fieldset>
                <legend><?= __('Edit Client') ?></legend>
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
