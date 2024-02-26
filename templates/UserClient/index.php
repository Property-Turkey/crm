<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UserClient> $userClient
 */
?>
<div class="userClient index content">
    <?= $this->Html->link(__('New User Client'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Client') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('target_id') ?></th>
                    <th><?= $this->Paginator->sort('target_type') ?></th>
                    <th><?= $this->Paginator->sort('stat_created') ?></th>
                    <th><?= $this->Paginator->sort('rec_state') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userClient as $userClient): ?>
                <tr>
                    <td><?= $this->Number->format($userClient->id) ?></td>
                    <td><?= $userClient->has('user') ? $this->Html->link($userClient->user->user_fullname, ['controller' => 'Users', 'action' => 'view', $userClient->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($userClient->target_id) ?></td>
                    <td><?= $userClient->target_type === null ? '' : $this->Number->format($userClient->target_type) ?></td>
                    <td><?= h($userClient->stat_created) ?></td>
                    <td><?= $userClient->rec_state === null ? '' : $this->Number->format($userClient->rec_state) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userClient->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userClient->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userClient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userClient->id)]) ?>
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
