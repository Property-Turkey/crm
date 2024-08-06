<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UserSale> $userSale
 */
?>
<div class="userSale index content">
    <?= $this->Html->link(__('New User Sale'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Sale') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('client_id') ?></th>
                    <th><?= $this->Paginator->sort('stat_created') ?></th>
                    <th><?= $this->Paginator->sort('rec_state') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userSale as $userSale): ?>
                <tr>
                    <td><?= $this->Number->format($userSale->id) ?></td>
                    <td><?= $userSale->has('user') ? $this->Html->link($userSale->user->user_fullname, ['controller' => 'Users', 'action' => 'view', $userSale->user->id]) : '' ?></td>
                    <td><?= $userSale->has('client') ? $this->Html->link($userSale->client->client_name, ['controller' => 'Clients', 'action' => 'view', $userSale->client->id]) : '' ?></td>
                    <td><?= h($userSale->stat_created) ?></td>
                    <td><?= $this->Number->format($userSale->rec_state) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userSale->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userSale->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userSale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSale->id)]) ?>
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
