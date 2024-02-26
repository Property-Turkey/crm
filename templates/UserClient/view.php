<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserClient $userClient
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Client'), ['action' => 'edit', $userClient->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Client'), ['action' => 'delete', $userClient->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userClient->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Client'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Client'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userClient view content">
            <h3><?= h($userClient->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $userClient->has('user') ? $this->Html->link($userClient->user->user_fullname, ['controller' => 'Users', 'action' => 'view', $userClient->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userClient->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Target Id') ?></th>
                    <td><?= $this->Number->format($userClient->target_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Target Type') ?></th>
                    <td><?= $userClient->target_type === null ? '' : $this->Number->format($userClient->target_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $userClient->rec_state === null ? '' : $this->Number->format($userClient->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($userClient->stat_created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
