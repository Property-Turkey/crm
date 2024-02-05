<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Offer> $offers
 */
?>
<div class="offers index content">
    <?= $this->Html->link(__('New Offer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Offers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('client_id') ?></th>
                    <th><?= $this->Paginator->sort('property_id') ?></th>
                    <th><?= $this->Paginator->sort('stat_created') ?></th>
                    <th><?= $this->Paginator->sort('stat_updated') ?></th>
                    <th><?= $this->Paginator->sort('isinterested') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($offers as $offer): ?>
                <tr>
                    <td><?= $this->Number->format($offer->id) ?></td>
                    <td><?= $offer->has('client') ? $this->Html->link($offer->client->client_name, ['controller' => 'Clients', 'action' => 'view', $offer->client->id]) : '' ?></td>
                    <td><?= $this->Number->format($offer->property_id) ?></td>
                    <td><?= h($offer->stat_created) ?></td>
                    <td><?= h($offer->stat_updated) ?></td>
                    <td><?= $offer->isinterested === null ? '' : $this->Number->format($offer->isinterested) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $offer->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $offer->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $offer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offer->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
