<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Action> $actions
 */
?>
<div class="actions index content">
    <?= $this->Html->link(__('New Action'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Actions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('sale_id') ?></th>
                    <th><?= $this->Paginator->sort('action_type') ?></th>
                    <th><?= $this->Paginator->sort('stat_created') ?></th>
                    <th><?= $this->Paginator->sort('rec_state') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actions as $action): ?>
                <tr>
                    <td><?= $this->Number->format($action->id) ?></td>
                    <td><?= $action->has('user') ? $this->Html->link($action->user->user_fullname, ['controller' => 'Users', 'action' => 'view', $action->user->id]) : '' ?></td>
                    <td><?= $action->has('sale') ? $this->Html->link($action->sale->client_id, ['controller' => 'Sales', 'action' => 'view', $action->sale->id]) : '' ?></td>
                    <td><?= $action->action_type === null ? '' : $this->Number->format($action->action_type) ?></td>
                    <td><?= h($action->stat_created) ?></td>
                    <td><?= $this->Number->format($action->rec_state) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $action->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $action->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $action->id], ['confirm' => __('Are you sure you want to delete # {0}?', $action->id)]) ?>
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
