<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\SaleSpec> $saleSpecs
 */
?>
<div class="saleSpecs index content">
    <?= $this->Html->link(__('New Sale Spec'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sale Specs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('sale_id') ?></th>
                    <th><?= $this->Paginator->sort('salespec_current_location') ?></th>
                    <th><?= $this->Paginator->sort('salespec_propertytype') ?></th>
                    <th><?= $this->Paginator->sort('salespec_beds') ?></th>
                    <th><?= $this->Paginator->sort('salespec_loction_target') ?></th>
                    <th><?= $this->Paginator->sort('salespec_isowner') ?></th>
                    <th><?= $this->Paginator->sort('salespec_isready') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($saleSpecs as $saleSpec): ?>
                <tr>
                    <td><?= $this->Number->format($saleSpec->id) ?></td>
                    <td><?= $saleSpec->has('sale') ? $this->Html->link($saleSpec->sale->client_id, ['controller' => 'Sales', 'action' => 'view', $saleSpec->sale->id]) : '' ?></td>
                    <td><?= h($saleSpec->salespec_current_location) ?></td>
                    <td><?= $saleSpec->salespec_propertytype === null ? '' : $this->Number->format($saleSpec->salespec_propertytype) ?></td>
                    <td><?= $saleSpec->salespec_beds === null ? '' : $this->Number->format($saleSpec->salespec_beds) ?></td>
                    <td><?= h($saleSpec->salespec_loction_target) ?></td>
                    <td><?= $this->Number->format($saleSpec->salespec_isowner) ?></td>
                    <td><?= $this->Number->format($saleSpec->salespec_isready) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $saleSpec->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $saleSpec->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $saleSpec->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleSpec->id)]) ?>
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
