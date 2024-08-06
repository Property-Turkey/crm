<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserPool $userPool
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Pool'), ['action' => 'edit', $userPool->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Pool'), ['action' => 'delete', $userPool->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userPool->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Pool'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Pool'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userPool view content">
            <h3><?= h($userPool->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $userPool->has('user') ? $this->Html->link($userPool->user->user_fullname, ['controller' => 'Users', 'action' => 'view', $userPool->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userPool->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pool Id') ?></th>
                    <td><?= $this->Number->format($userPool->pool_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $userPool->rec_state === null ? '' : $this->Number->format($userPool->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($userPool->stat_created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
