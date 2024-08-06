<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pmscategory> $pmscategories
 */
?>
<div class="pmscategories index content">
    <?= $this->Html->link(__('New Pmscategory'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pmscategories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('language_id') ?></th>
                    <th><?= $this->Paginator->sort('parent_id') ?></th>
                    <th><?= $this->Paginator->sort('category_name') ?></th>
                    <th><?= $this->Paginator->sort('category_configs') ?></th>
                    <th><?= $this->Paginator->sort('category_priority') ?></th>
                    <th><?= $this->Paginator->sort('stat_created') ?></th>
                    <th><?= $this->Paginator->sort('stat_updated') ?></th>
                    <th><?= $this->Paginator->sort('rec_state') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pmscategories as $pmscategory): ?>
                <tr>
                    <td><?= $this->Number->format($pmscategory->id) ?></td>
                    <td><?= h($pmscategory->slug) ?></td>
                    <td><?= $this->Number->format($pmscategory->language_id) ?></td>
                    <td><?= $pmscategory->has('parent_pmscategory') ? $this->Html->link($pmscategory->parent_pmscategory->id, ['controller' => 'Pmscategories', 'action' => 'view', $pmscategory->parent_pmscategory->id]) : '' ?></td>
                    <td><?= h($pmscategory->category_name) ?></td>
                    <td><?= h($pmscategory->category_configs) ?></td>
                    <td><?= $this->Number->format($pmscategory->category_priority) ?></td>
                    <td><?= h($pmscategory->stat_created) ?></td>
                    <td><?= h($pmscategory->stat_updated) ?></td>
                    <td><?= $this->Number->format($pmscategory->rec_state) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pmscategory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pmscategory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pmscategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pmscategory->id)]) ?>
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
