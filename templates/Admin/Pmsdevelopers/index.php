<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pmsdeveloper> $pmsdevelopers
 */
?>
<div class="pmsdevelopers index content">
    <?= $this->Html->link(__('New Pmsdeveloper'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pmsdevelopers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('dev_name') ?></th>
                    <th><?= $this->Paginator->sort('dev_configs') ?></th>
                    <th><?= $this->Paginator->sort('stat_created') ?></th>
                    <th><?= $this->Paginator->sort('rec_state') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pmsdevelopers as $pmsdeveloper): ?>
                <tr>
                    <td><?= $this->Number->format($pmsdeveloper->id) ?></td>
                    <td><?= h($pmsdeveloper->dev_name) ?></td>
                    <td><?= h($pmsdeveloper->dev_configs) ?></td>
                    <td><?= h($pmsdeveloper->stat_created) ?></td>
                    <td><?= $this->Number->format($pmsdeveloper->rec_state) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pmsdeveloper->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pmsdeveloper->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pmsdeveloper->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pmsdeveloper->id)]) ?>
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
