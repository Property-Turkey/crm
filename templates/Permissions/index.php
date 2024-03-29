<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Permission> $permissions
 */
?>
<div class="permissions index content">
    <?= $this->Html->link(__('New Permission'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Permissions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('permission_role') ?></th>
                    <th><?= $this->Paginator->sort('permission_module') ?></th>
                    <th><?= $this->Paginator->sort('permission_c') ?></th>
                    <th><?= $this->Paginator->sort('permission_r') ?></th>
                    <th><?= $this->Paginator->sort('permission_u') ?></th>
                    <th><?= $this->Paginator->sort('permission_d') ?></th>
                    <th><?= $this->Paginator->sort('permission_a') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($permissions as $permission): ?>
                <tr>
                    <td><?= $this->Number->format($permission->id) ?></td>
                    <td><?= h($permission->permission_role) ?></td>
                    <td><?= h($permission->permission_module) ?></td>
                    <td><?= $this->Number->format($permission->permission_c) ?></td>
                    <td><?= $this->Number->format($permission->permission_r) ?></td>
                    <td><?= $this->Number->format($permission->permission_u) ?></td>
                    <td><?= $this->Number->format($permission->permission_d) ?></td>
                    <td><?= $this->Number->format($permission->permission_a) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $permission->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $permission->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $permission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permission->id)]) ?>
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
