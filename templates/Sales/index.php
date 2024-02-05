<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sale> $sales
 */
?>
<div class="sales index content">
    <?= $this->Html->link(__('New Sale'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sales') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('client_id') ?></th>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th><?= $this->Paginator->sort('pool_id') ?></th>
                    <th><?= $this->Paginator->sort('sale_priority') ?></th>
                    <th><?= $this->Paginator->sort('sale_finance') ?></th>
                    <th><?= $this->Paginator->sort('sale_current_stage') ?></th>
                    <th><?= $this->Paginator->sort('sale_budget') ?></th>
                    <th><?= $this->Paginator->sort('sale_commission') ?></th>
                    <th><?= $this->Paginator->sort('sale_units') ?></th>
                    <th><?= $this->Paginator->sort('sale_shared_roles') ?></th>
                    <th><?= $this->Paginator->sort('stat_created') ?></th>
                    <th><?= $this->Paginator->sort('stat_updated') ?></th>
                    <th><?= $this->Paginator->sort('rec_state') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sales as $sale): ?>
                <tr>
                    <td><?= $this->Number->format($sale->id) ?></td>
                    <td><?= $sale->has('client') ? $this->Html->link($sale->client->client_name, ['controller' => 'Clients', 'action' => 'view', $sale->client->id]) : '' ?></td>
                    <td><?= $sale->has('category') ? $this->Html->link($sale->category->category_name, ['controller' => 'Categories', 'action' => 'view', $sale->category->id]) : '' ?></td>
                    <td><?= $sale->has('pool') ? $this->Html->link($sale->pool->category_name, ['controller' => 'Categories', 'action' => 'view', $sale->pool->id]) : '' ?></td>
                    <td><?= $sale->sale_priority === null ? '' : $this->Number->format($sale->sale_priority) ?></td>
                    <td><?= $sale->sale_finance === null ? '' : $this->Number->format($sale->sale_finance) ?></td>
                    <td><?= $this->Number->format($sale->sale_current_stage) ?></td>
                    <td><?= $sale->sale_budget === null ? '' : $this->Number->format($sale->sale_budget) ?></td>
                    <td><?= $sale->sale_commission === null ? '' : $this->Number->format($sale->sale_commission) ?></td>
                    <td><?= $sale->sale_units === null ? '' : $this->Number->format($sale->sale_units) ?></td>
                    <td><?= h($sale->sale_shared_roles) ?></td>
                    <td><?= h($sale->stat_created) ?></td>
                    <td><?= h($sale->stat_updated) ?></td>
                    <td><?= $this->Number->format($sale->rec_state) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sale->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sale->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sale->id)]) ?>
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
