<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UserPool> $userPool
 */
?>
<div class="userPool index content">
    <?= $this->Html->link(__('New User Pool'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Pool') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('pool_id') ?></th>
                    <th><?= $this->Paginator->sort('stat_created') ?></th>
                    <th><?= $this->Paginator->sort('rec_state') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userPool as $userPool): ?>
                <tr>
                    <td><?= $this->Number->format($userPool->id) ?></td>
                    <td><?= $userPool->has('user') ? $this->Html->link($userPool->user->user_fullname, ['controller' => 'Users', 'action' => 'view', $userPool->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($userPool->pool_id) ?></td>
                    <td><?= h($userPool->stat_created) ?></td>
                    <td><?= $userPool->rec_state === null ? '' : $this->Number->format($userPool->rec_state) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userPool->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userPool->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userPool->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userPool->id)]) ?>
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
