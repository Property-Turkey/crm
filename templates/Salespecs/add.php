<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Salespec $salespec
 * @var \Cake\Collection\CollectionInterface|string[] $sales
 * @var \Cake\Collection\CollectionInterface|string[] $currency
 * @var \Cake\Collection\CollectionInterface|string[] $persona
 * @var \Cake\Collection\CollectionInterface|string[] $style
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Salespecs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="salespecs form content">
            <?= $this->Form->create($salespec) ?>
            <fieldset>
                <legend><?= __('Add Salespec') ?></legend>
                <?php
                    echo $this->Form->control('sale_id');
                    echo $this->Form->control('salespec_propertytype');
                    echo $this->Form->control('salespec_currency', ['options' => $currency, 'empty' => true]);
                    echo $this->Form->control('salespec_buyerpersona', ['options' => $persona, 'empty' => true]);
                    echo $this->Form->control('salespec_socialstyle', ['options' => $style, 'empty' => true]);
                    echo $this->Form->control('salespec_beds');
                    echo $this->Form->control('salespec_loction_target');
                    echo $this->Form->control('salespec_isowner');
                    echo $this->Form->control('salespec_isready');
                    echo $this->Form->control('salespec_saved');
                    echo $this->Form->control('salespec_configs');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
