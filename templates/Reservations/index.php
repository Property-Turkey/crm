<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Reservation> $reservations
 */
?>
<div class="reservations index content">
    <?= $this->Html->link(__('New Reservation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Reservations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('client_id') ?></th>
                    <th><?= $this->Paginator->sort('property_id') ?></th>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('type_id') ?></th>
                    <th><?= $this->Paginator->sort('source_id') ?></th>
                    <th><?= $this->Paginator->sort('developer_id') ?></th>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th><?= $this->Paginator->sort('sellertype_id') ?></th>
                    <th><?= $this->Paginator->sort('seller_id') ?></th>
                    <th><?= $this->Paginator->sort('reservation_amount') ?></th>
                    <th><?= $this->Paginator->sort('reservation_price') ?></th>
                    <th><?= $this->Paginator->sort('reservation_currency') ?></th>
                    <th><?= $this->Paginator->sort('reservation_usdprice') ?></th>
                    <th><?= $this->Paginator->sort('reservation_paytype') ?></th>
                    <th><?= $this->Paginator->sort('reservation_downpayment_date') ?></th>
                    <th><?= $this->Paginator->sort('reservation_downpayment') ?></th>
                    <th><?= $this->Paginator->sort('reservation_isinvoice_sent') ?></th>
                    <th><?= $this->Paginator->sort('reservation_invoice_date') ?></th>
                    <th><?= $this->Paginator->sort('reservation_comission') ?></th>
                    <th><?= $this->Paginator->sort('reservation_usdcomission') ?></th>
                    <th><?= $this->Paginator->sort('reservation_details') ?></th>
                    <th><?= $this->Paginator->sort('stat_created') ?></th>
                    <th><?= $this->Paginator->sort('stat_updated') ?></th>
                    <th><?= $this->Paginator->sort('rec_state') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation): ?>
                <tr>
                    <td><?= $this->Number->format($reservation->id) ?></td>
                    <td><?= $reservation->has('client') ? $this->Html->link($reservation->client->client_name, ['controller' => 'Clients', 'action' => 'view', $reservation->client->id]) : '' ?></td>
                    <td><?= $this->Number->format($reservation->property_id) ?></td>
                    <td><?= $reservation->project_id === null ? '' : $this->Number->format($reservation->project_id) ?></td>
                    <td><?= $reservation->type_id === null ? '' : $this->Number->format($reservation->type_id) ?></td>
                    <td><?= $reservation->source_id === null ? '' : $this->Number->format($reservation->source_id) ?></td>
                    <td><?= $reservation->developer_id === null ? '' : $this->Number->format($reservation->developer_id) ?></td>
                    <td><?= $reservation->category_id === null ? '' : $this->Number->format($reservation->category_id) ?></td>
                    <td><?= $reservation->sellertype_id === null ? '' : $this->Number->format($reservation->sellertype_id) ?></td>
                    <td><?= $reservation->seller_id === null ? '' : $this->Number->format($reservation->seller_id) ?></td>
                    <td><?= $this->Number->format($reservation->reservation_amount) ?></td>
                    <td><?= $reservation->reservation_price === null ? '' : $this->Number->format($reservation->reservation_price) ?></td>
                    <td><?= $reservation->has('currency') ? $this->Html->link($reservation->currency->category_name, ['controller' => 'Categories', 'action' => 'view', $reservation->currency->id]) : '' ?></td>
                    <td><?= $reservation->reservation_usdprice === null ? '' : $this->Number->format($reservation->reservation_usdprice) ?></td>
                    <td><?= $reservation->has('payment') ? $this->Html->link($reservation->payment->category_name, ['controller' => 'Categories', 'action' => 'view', $reservation->payment->id]) : '' ?></td>
                    <td><?= h($reservation->reservation_downpayment_date) ?></td>
                    <td><?= $reservation->reservation_downpayment === null ? '' : $this->Number->format($reservation->reservation_downpayment) ?></td>
                    <td><?= $this->Number->format($reservation->reservation_isinvoice_sent) ?></td>
                    <td><?= h($reservation->reservation_invoice_date) ?></td>
                    <td><?= $this->Number->format($reservation->reservation_comission) ?></td>
                    <td><?= $this->Number->format($reservation->reservation_usdcomission) ?></td>
                    <td><?= h($reservation->reservation_details) ?></td>
                    <td><?= h($reservation->stat_created) ?></td>
                    <td><?= h($reservation->stat_updated) ?></td>
                    <td><?= $this->Number->format($reservation->rec_state) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $reservation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $reservation->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]) ?>
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
