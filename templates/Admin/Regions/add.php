<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Region $region
 * @var \Cake\Collection\CollectionInterface|string[] $cities
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Regions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="regions form content">
            <?= $this->Form->create($region) ?>
            <fieldset>
                <legend><?= __('Add Region') ?></legend>
                <?php
                    echo $this->Form->control('language_id');
                    echo $this->Form->control('city_id', ['options' => $cities]);
                    echo $this->Form->control('region_name');
                    echo $this->Form->control('region_slug');
                    echo $this->Form->control('region_configs');
                    echo $this->Form->control('rec_state');
                    echo $this->Form->control('created_at');
                    echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
