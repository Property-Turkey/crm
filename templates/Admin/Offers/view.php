<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Offer'), ['action' => 'edit', $offer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Offer'), ['action' => 'delete', $offer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Offers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Offer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="offers view content">
            <h3><?= h($offer->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sale') ?></th>
                    <td><?= $offer->has('sale') ? $this->Html->link($offer->sale->client_id, ['controller' => 'Sales', 'action' => 'view', $offer->sale->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($offer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Id') ?></th>
                    <td><?= $this->Number->format($offer->property_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($offer->stat_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Updated') ?></th>
                    <td><?= h($offer->stat_updated) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Offer Desc') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($offer->offer_desc)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
