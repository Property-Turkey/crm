<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Region> $regions
 */
?>
<div class="regions index content">
    <?= $this->Html->link(__('New Region'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Regions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('language_id') ?></th>
                    <th><?= $this->Paginator->sort('city_id') ?></th>
                    <th><?= $this->Paginator->sort('region_name') ?></th>
                    <th><?= $this->Paginator->sort('region_slug') ?></th>
                    <th><?= $this->Paginator->sort('region_configs') ?></th>
                    <th><?= $this->Paginator->sort('rec_state') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($regions as $region): ?>
                <tr>
                    <td><?= $this->Number->format($region->id) ?></td>
                    <td><?= $this->Number->format($region->language_id) ?></td>
                    <td><?= $region->has('city') ? $this->Html->link($region->city->id, ['controller' => 'Cities', 'action' => 'view', $region->city->id]) : '' ?></td>
                    <td><?= h($region->region_name) ?></td>
                    <td><?= h($region->region_slug) ?></td>
                    <td><?= h($region->region_configs) ?></td>
                    <td><?= $this->Number->format($region->rec_state) ?></td>
                    <td><?= h($region->created_at) ?></td>
                    <td><?= h($region->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $region->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $region->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $region->id], ['confirm' => __('Are you sure you want to delete # {0}?', $region->id)]) ?>
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
