<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Enquire> $enquires
 */
?>
<div class="enquires index content">
    <?= $this->Html->link(__('New Enquire'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Enquires') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('client_id') ?></th>
                    <th><?= $this->Paginator->sort('property_id') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_clname') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_clemail') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_clphone') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_clcountry') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_source') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_message') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_ipaddress') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_lastpage') ?></th>
                    <th><?= $this->Paginator->sort('seo_keywords') ?></th>
                    <th><?= $this->Paginator->sort('seo_host') ?></th>
                    <th><?= $this->Paginator->sort('isindex') ?></th>
                    <th><?= $this->Paginator->sort('stat_created') ?></th>
                    <th><?= $this->Paginator->sort('stat_updated') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($enquires as $enquire): ?>
                <tr>
                    <td><?= $this->Number->format($enquire->id) ?></td>
                    <td><?= $enquire->has('client') ? $this->Html->link($enquire->client->client_name, ['controller' => 'Clients', 'action' => 'view', $enquire->client->id]) : '' ?></td>
                    <td><?= $this->Number->format($enquire->property_id) ?></td>
                    <td><?= h($enquire->enquiry_clname) ?></td>
                    <td><?= h($enquire->enquiry_clemail) ?></td>
                    <td><?= $enquire->enquiry_clphone === null ? '' : $this->Number->format($enquire->enquiry_clphone) ?></td>
                    <td><?= $enquire->enquiry_clcountry === null ? '' : $this->Number->format($enquire->enquiry_clcountry) ?></td>
                    <td><?= $enquire->enquiry_source === null ? '' : $this->Number->format($enquire->enquiry_source) ?></td>
                    <td><?= h($enquire->enquiry_message) ?></td>
                    <td><?= h($enquire->enquiry_ipaddress) ?></td>
                    <td><?= h($enquire->enquiry_lastpage) ?></td>
                    <td><?= h($enquire->seo_keywords) ?></td>
                    <td><?= $this->Number->format($enquire->seo_host) ?></td>
                    <td><?= $this->Number->format($enquire->isindex) ?></td>
                    <td><?= h($enquire->stat_created) ?></td>
                    <td><?= h($enquire->stat_updated) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $enquire->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $enquire->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $enquire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquire->id)]) ?>
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
