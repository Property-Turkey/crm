<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pmsdeveloper $pmsdeveloper
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pmsdeveloper'), ['action' => 'edit', $pmsdeveloper->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pmsdeveloper'), ['action' => 'delete', $pmsdeveloper->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pmsdeveloper->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pmsdevelopers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pmsdeveloper'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pmsdevelopers view content">
            <h3><?= h($pmsdeveloper->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Dev Name') ?></th>
                    <td><?= h($pmsdeveloper->dev_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dev Configs') ?></th>
                    <td><?= h($pmsdeveloper->dev_configs) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pmsdeveloper->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $this->Number->format($pmsdeveloper->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($pmsdeveloper->stat_created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
