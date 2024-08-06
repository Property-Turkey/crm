<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Salespec $salespec
 * @var string[]|\Cake\Collection\CollectionInterface $sales
 * @var string[]|\Cake\Collection\CollectionInterface $currency
 * @var string[]|\Cake\Collection\CollectionInterface $persona
 * @var string[]|\Cake\Collection\CollectionInterface $style
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $salespec->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $salespec->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Salespecs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="salespecs form content">
            <?= $this->Form->create($salespec) ?>
            <fieldset>
                <legend><?= __('Edit Salespec') ?></legend>
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
