<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pmsseller $pmsseller
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pmsseller'), ['action' => 'edit', $pmsseller->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pmsseller'), ['action' => 'delete', $pmsseller->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pmsseller->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pmssellers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pmsseller'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pmssellers view content">
            <h3><?= h($pmsseller->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Seller Name') ?></th>
                    <td><?= h($pmsseller->seller_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seller Photos') ?></th>
                    <td><?= h($pmsseller->seller_photos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seller Configs') ?></th>
                    <td><?= h($pmsseller->seller_configs) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pmsseller->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seller Type') ?></th>
                    <td><?= $this->Number->format($pmsseller->seller_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seller Nationality') ?></th>
                    <td><?= $pmsseller->seller_nationality === null ? '' : $this->Number->format($pmsseller->seller_nationality) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $this->Number->format($pmsseller->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($pmsseller->stat_created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
