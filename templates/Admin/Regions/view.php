<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Region $region
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Region'), ['action' => 'edit', $region->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Region'), ['action' => 'delete', $region->id], ['confirm' => __('Are you sure you want to delete # {0}?', $region->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Regions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Region'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="regions view content">
            <h3><?= h($region->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= $region->has('city') ? $this->Html->link($region->city->id, ['controller' => 'Cities', 'action' => 'view', $region->city->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Region Name') ?></th>
                    <td><?= h($region->region_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Region Slug') ?></th>
                    <td><?= h($region->region_slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Region Configs') ?></th>
                    <td><?= h($region->region_configs) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($region->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Language Id') ?></th>
                    <td><?= $this->Number->format($region->language_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $this->Number->format($region->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($region->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($region->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
