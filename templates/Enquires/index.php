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
                    <th><?= $this->Paginator->sort('source_id') ?></th>
                    <th><?= $this->Paginator->sort('property_id') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_name') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_email') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_phone') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_country') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_message') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_ipaddress') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_referral') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_host') ?></th>
                    <th><?= $this->Paginator->sort('seo_keywords') ?></th>
                    <th><?= $this->Paginator->sort('stat_created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($enquires as $enquire): ?>
                <tr>
                    <td><?= $this->Number->format($enquire->id) ?></td>
                    <td><?= $enquire->has('client') ? $this->Html->link($enquire->client->client_name, ['controller' => 'Clients', 'action' => 'view', $enquire->client->id]) : '' ?></td>
                    <td><?= $enquire->source_id === null ? '' : $this->Number->format($enquire->source_id) ?></td>
                    <td><?= $enquire->property_id === null ? '' : $this->Number->format($enquire->property_id) ?></td>
                    <td><?= h($enquire->enquiry_name) ?></td>
                    <td><?= h($enquire->enquiry_email) ?></td>
                    <td><?= $enquire->enquiry_phone === null ? '' : $this->Number->format($enquire->enquiry_phone) ?></td>
                    <td><?= $enquire->enquiry_country === null ? '' : $this->Number->format($enquire->enquiry_country) ?></td>
                    <td><?= h($enquire->enquiry_message) ?></td>
                    <td><?= h($enquire->enquiry_ipaddress) ?></td>
                    <td><?= h($enquire->enquiry_referral) ?></td>
                    <td><?= h($enquire->enquiry_host) ?></td>
                    <td><?= h($enquire->seo_keywords) ?></td>
                    <td><?= h($enquire->stat_created) ?></td>
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
