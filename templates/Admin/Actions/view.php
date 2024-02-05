<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Action $action
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Action'), ['action' => 'edit', $action->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Action'), ['action' => 'delete', $action->id], ['confirm' => __('Are you sure you want to delete # {0}?', $action->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Actions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Action'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="actions view content">
            <h3><?= h($action->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $action->has('user') ? $this->Html->link($action->user->user_fullname, ['controller' => 'Users', 'action' => 'view', $action->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale') ?></th>
                    <td><?= $action->has('sale') ? $this->Html->link($action->sale->client_id, ['controller' => 'Sales', 'action' => 'view', $action->sale->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($action->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Action Type') ?></th>
                    <td><?= $action->action_type === null ? '' : $this->Number->format($action->action_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $this->Number->format($action->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($action->stat_created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
