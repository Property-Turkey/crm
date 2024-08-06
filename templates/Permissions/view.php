<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission $permission
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Permission'), ['action' => 'edit', $permission->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Permission'), ['action' => 'delete', $permission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permission->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Permissions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Permission'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="permissions view content">
            <h3><?= h($permission->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Permission Role') ?></th>
                    <td><?= h($permission->permission_role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Permission Module') ?></th>
                    <td><?= h($permission->permission_module) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($permission->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Permission C') ?></th>
                    <td><?= $this->Number->format($permission->permission_c) ?></td>
                </tr>
                <tr>
                    <th><?= __('Permission R') ?></th>
                    <td><?= $this->Number->format($permission->permission_r) ?></td>
                </tr>
                <tr>
                    <th><?= __('Permission U') ?></th>
                    <td><?= $this->Number->format($permission->permission_u) ?></td>
                </tr>
                <tr>
                    <th><?= __('Permission D') ?></th>
                    <td><?= $this->Number->format($permission->permission_d) ?></td>
                </tr>
                <tr>
                    <th><?= __('Permission A') ?></th>
                    <td><?= $this->Number->format($permission->permission_a) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
