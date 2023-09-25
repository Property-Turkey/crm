<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 * @var string[]|\Cake\Collection\CollectionInterface $sales
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $offer->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $offer->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Offers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="offers form content">
            <?= $this->Form->create($offer) ?>
            <fieldset>
                <legend><?= __('Edit Offer') ?></legend>
                <?php
                    echo $this->Form->control('sale_id', ['options' => $sales]);
                    echo $this->Form->control('property_id');
                    echo $this->Form->control('offer_desc');
                    echo $this->Form->control('stat_created');
                    echo $this->Form->control('stat_updated', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
