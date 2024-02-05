<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ClientSpec> $clientSpecs
 */
?>
<div class="clientSpecs index content">
    <?= $this->Html->link(__('New Client Spec'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Client Specs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('client_id') ?></th>
                    <th><?= $this->Paginator->sort('clientspec_propertytype') ?></th>
                    <th><?= $this->Paginator->sort('clientspec_currency') ?></th>
                    <th><?= $this->Paginator->sort('clientspec_buyerpersona') ?></th>
                    <th><?= $this->Paginator->sort('clientspec_socialstyle') ?></th>
                    <th><?= $this->Paginator->sort('clientspec_beds') ?></th>
                    <th><?= $this->Paginator->sort('clientspec_loction_target') ?></th>
                    <th><?= $this->Paginator->sort('clientspec_isowner') ?></th>
                    <th><?= $this->Paginator->sort('clientspec_isready') ?></th>
                    <th><?= $this->Paginator->sort('clientspec_saved') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientSpecs as $clientSpec): ?>
                <tr>
                    <td><?= $this->Number->format($clientSpec->id) ?></td>
                    <td><?= $clientSpec->has('client') ? $this->Html->link($clientSpec->client->client_name, ['controller' => 'Clients', 'action' => 'view', $clientSpec->client->id]) : '' ?></td>
                    <td><?= h($clientSpec->clientspec_propertytype) ?></td>
                    <td><?= $clientSpec->has('currency') ? $this->Html->link($clientSpec->currency->category_name, ['controller' => 'Categories', 'action' => 'view', $clientSpec->currency->id]) : '' ?></td>
                    <td><?= $clientSpec->has('persona') ? $this->Html->link($clientSpec->persona->category_name, ['controller' => 'Categories', 'action' => 'view', $clientSpec->persona->id]) : '' ?></td>
                    <td><?= $clientSpec->has('style') ? $this->Html->link($clientSpec->style->category_name, ['controller' => 'Categories', 'action' => 'view', $clientSpec->style->id]) : '' ?></td>
                    <td><?= h($clientSpec->clientspec_beds) ?></td>
                    <td><?= h($clientSpec->clientspec_loction_target) ?></td>
                    <td><?= $this->Number->format($clientSpec->clientspec_isowner) ?></td>
                    <td><?= $this->Number->format($clientSpec->clientspec_isready) ?></td>
                    <td><?= $clientSpec->clientspec_saved === null ? '' : $this->Number->format($clientSpec->clientspec_saved) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $clientSpec->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clientSpec->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $clientSpec->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientSpec->id)]) ?>
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
