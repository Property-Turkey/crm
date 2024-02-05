<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserSale $userSale
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User Sale'), ['action' => 'edit', $userSale->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User Sale'), ['action' => 'delete', $userSale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userSale->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List User Sale'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User Sale'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userSale view content">
            <h3><?= h($userSale->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $userSale->has('user') ? $this->Html->link($userSale->user->user_fullname, ['controller' => 'Users', 'action' => 'view', $userSale->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $userSale->has('client') ? $this->Html->link($userSale->client->client_name, ['controller' => 'Clients', 'action' => 'view', $userSale->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($userSale->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $this->Number->format($userSale->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($userSale->stat_created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
