<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reminder $reminder
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reminder'), ['action' => 'edit', $reminder->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reminder'), ['action' => 'delete', $reminder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reminder->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reminders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reminder'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reminders view content">
            <h3><?= h($reminder->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $reminder->has('user') ? $this->Html->link($reminder->user->user_fullname, ['controller' => 'Users', 'action' => 'view', $reminder->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $reminder->has('client') ? $this->Html->link($reminder->client->client_name, ['controller' => 'Clients', 'action' => 'view', $reminder->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($reminder->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reminder Nextcall') ?></th>
                    <td><?= h($reminder->reminder_nextcall) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($reminder->stat_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Updated') ?></th>
                    <td><?= h($reminder->stat_updated) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Reminder Desc') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($reminder->reminder_desc)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
