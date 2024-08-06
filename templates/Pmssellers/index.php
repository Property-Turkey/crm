<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pmsseller> $pmssellers
 */
?>
<div class="pmssellers index content">
    <?= $this->Html->link(__('New Pmsseller'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pmssellers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('seller_name') ?></th>
                    <th><?= $this->Paginator->sort('seller_type') ?></th>
                    <th><?= $this->Paginator->sort('seller_nationality') ?></th>
                    <th><?= $this->Paginator->sort('seller_photos') ?></th>
                    <th><?= $this->Paginator->sort('seller_configs') ?></th>
                    <th><?= $this->Paginator->sort('stat_created') ?></th>
                    <th><?= $this->Paginator->sort('rec_state') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pmssellers as $pmsseller): ?>
                <tr>
                    <td><?= $this->Number->format($pmsseller->id) ?></td>
                    <td><?= h($pmsseller->seller_name) ?></td>
                    <td><?= $this->Number->format($pmsseller->seller_type) ?></td>
                    <td><?= $pmsseller->seller_nationality === null ? '' : $this->Number->format($pmsseller->seller_nationality) ?></td>
                    <td><?= h($pmsseller->seller_photos) ?></td>
                    <td><?= h($pmsseller->seller_configs) ?></td>
                    <td><?= h($pmsseller->stat_created) ?></td>
                    <td><?= $this->Number->format($pmsseller->rec_state) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pmsseller->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pmsseller->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pmsseller->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pmsseller->id)]) ?>
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
