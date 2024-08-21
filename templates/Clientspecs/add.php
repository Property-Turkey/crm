<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClientSpec $clientSpec
 * @var \Cake\Collection\CollectionInterface|string[] $clients
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Client Specs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clientSpecs form content">
            <?= $this->Form->create($clientSpec) ?>
            <fieldset>
                <legend><?= __('Add Client Spec') ?></legend>
                <?php
                    echo $this->Form->control('client_id', ['options' => $clients]);
                    echo $this->Form->control('clientspec_propertytype');
                    echo $this->Form->control('clientspec_currency');
                    echo $this->Form->control('clientspec_buyerpersona');
                    echo $this->Form->control('clientspec_socialstyle');
                    echo $this->Form->control('clientspec_beds');
                    echo $this->Form->control('clientspec_loction_target');
                    echo $this->Form->control('clientspec_target_country');
                    echo $this->Form->control('clientspec_target_city');
                    echo $this->Form->control('clientspec_target_region');
                    echo $this->Form->control('clientspec_isowner');
                    echo $this->Form->control('clientspec_isready');
                    echo $this->Form->control('clientspec_saved');
                    echo $this->Form->control('clientspec_configs');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
