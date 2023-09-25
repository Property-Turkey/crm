<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\AddressCategory> $addressCategories
 */
?>
<div class="addressCategories index content">
    <?= $this->Html->link(__('New Address Category'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Address Categories') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('language_id') ?></th>
                    <th><?= $this->Paginator->sort('parent_id') ?></th>
                    <th><?= $this->Paginator->sort('category_name') ?></th>
                    <th><?= $this->Paginator->sort('category_slug') ?></th>
                    <th><?= $this->Paginator->sort('category_configs') ?></th>
                    <th><?= $this->Paginator->sort('category_priority') ?></th>
                    <th><?= $this->Paginator->sort('rec_state') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($addressCategories as $addressCategory): ?>
                <tr>
                    <td><?= $this->Number->format($addressCategory->id) ?></td>
                    <td><?= $this->Number->format($addressCategory->language_id) ?></td>
                    <td><?= $addressCategory->has('parent_address_category') ? $this->Html->link($addressCategory->parent_address_category->id, ['controller' => 'AddressCategories', 'action' => 'view', $addressCategory->parent_address_category->id]) : '' ?></td>
                    <td><?= h($addressCategory->category_name) ?></td>
                    <td><?= h($addressCategory->category_slug) ?></td>
                    <td><?= h($addressCategory->category_configs) ?></td>
                    <td><?= $addressCategory->category_priority === null ? '' : $this->Number->format($addressCategory->category_priority) ?></td>
                    <td><?= $addressCategory->rec_state === null ? '' : $this->Number->format($addressCategory->rec_state) ?></td>
                    <td><?= h($addressCategory->created_at) ?></td>
                    <td><?= h($addressCategory->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $addressCategory->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $addressCategory->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $addressCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addressCategory->id)]) ?>
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
