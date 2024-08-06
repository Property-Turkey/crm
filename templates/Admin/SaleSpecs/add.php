<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SaleSpec $saleSpec
 * @var \Cake\Collection\CollectionInterface|string[] $sales
 * @var \Cake\Collection\CollectionInterface|string[] $clients
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Sale Specs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="saleSpecs form content">
            <?= $this->Form->create($saleSpec) ?>
            <fieldset>
                <legend><?= __('Add Sale Spec') ?></legend>
                <?php
                    echo $this->Form->control('sale_id', ['options' => $sales]);
                    echo $this->Form->control('salespec_current_location');
                    echo $this->Form->control('salespec_propertytype');
                    echo $this->Form->control('salespec_beds');
                    echo $this->Form->control('salespec_loction_target');
                    echo $this->Form->control('salespec_isowner');
                    echo $this->Form->control('salespec_isready');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
