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
                    <th><?= $this->Paginator->sort('sale_id') ?></th>
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
                    <td><?= $reservation->has('sale') ? $this->Html->link($reservation->sale->client_id, ['controller' => 'Sales', 'action' => 'view', $reservation->sale->id]) : '' ?></td>
                    <td><?= $this->Number->format($reservation->reservation_amount) ?></td>
                    <td><?= $reservation->reservation_price === null ? '' : $this->Number->format($reservation->reservation_price) ?></td>
                    <td><?= $reservation->reservation_currency === null ? '' : $this->Number->format($reservation->reservation_currency) ?></td>
                    <td><?= $reservation->reservation_usdprice === null ? '' : $this->Number->format($reservation->reservation_usdprice) ?></td>
                    <td><?= $reservation->reservation_paytype === null ? '' : $this->Number->format($reservation->reservation_paytype) ?></td>
                    <td><?= h($reservation->reservation_downpayment_date) ?></td>
                    <td><?= $reservation->reservation_downpayment === null ? '' : $this->Number->format($reservation->reservation_downpayment) ?></td>
                    <td><?= $this->Number->format($reservation->reservation_isinvoice_sent) ?></td>
                    <td><?= h($reservation->reservation_invoice_date) ?></td>
                    <td><?= $this->Number->format($reservation->reservation_comission) ?></td>
                    <td><?= $this->Number->format($reservation->reservation_usdcomission) ?></td>
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
