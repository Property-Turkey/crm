<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Salespec> $salespecs
 */
?>
<div class="salespecs index content">
    <?= $this->Html->link(__('New Salespec'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Salespecs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('sale_id') ?></th>
                    <th><?= $this->Paginator->sort('salespec_propertytype') ?></th>
                    <th><?= $this->Paginator->sort('salespec_currency') ?></th>
                    <th><?= $this->Paginator->sort('salespec_buyerpersona') ?></th>
                    <th><?= $this->Paginator->sort('salespec_socialstyle') ?></th>
                    <th><?= $this->Paginator->sort('salespec_beds') ?></th>
                    <th><?= $this->Paginator->sort('salespec_loction_target') ?></th>
                    <th><?= $this->Paginator->sort('salespec_isowner') ?></th>
                    <th><?= $this->Paginator->sort('salespec_isready') ?></th>
                    <th><?= $this->Paginator->sort('salespec_saved') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($salespecs as $salespec): ?>
                <tr>
                    <td><?= $salespec->has('sale') ? $this->Html->link($salespec->sale->client_id, ['controller' => 'Sales', 'action' => 'view', $salespec->sale->id]) : '' ?></td>
                    <td><?= $this->Number->format($salespec->sale_id) ?></td>
                    <td><?= h($salespec->salespec_propertytype) ?></td>
                    <td><?= $salespec->has('currency') ? $this->Html->link($salespec->currency->category_name, ['controller' => 'Categories', 'action' => 'view', $salespec->currency->id]) : '' ?></td>
                    <td><?= $salespec->has('persona') ? $this->Html->link($salespec->persona->category_name, ['controller' => 'Categories', 'action' => 'view', $salespec->persona->id]) : '' ?></td>
                    <td><?= $salespec->has('style') ? $this->Html->link($salespec->style->category_name, ['controller' => 'Categories', 'action' => 'view', $salespec->style->id]) : '' ?></td>
                    <td><?= h($salespec->salespec_beds) ?></td>
                    <td><?= h($salespec->salespec_loction_target) ?></td>
                    <td><?= $this->Number->format($salespec->salespec_isowner) ?></td>
                    <td><?= $this->Number->format($salespec->salespec_isready) ?></td>
                    <td><?= $salespec->salespec_saved === null ? '' : $this->Number->format($salespec->salespec_saved) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $salespec->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $salespec->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $salespec->id], ['confirm' => __('Are you sure you want to delete # {0}?', $salespec->id)]) ?>
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
