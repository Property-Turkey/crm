<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Reservation'), ['action' => 'edit', $reservation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Reservation'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Reservations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Reservation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="reservations view content">
            <h3><?= h($reservation->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $reservation->has('client') ? $this->Html->link($reservation->client->client_name, ['controller' => 'Clients', 'action' => 'view', $reservation->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Currency') ?></th>
                    <td><?= $reservation->has('currency') ? $this->Html->link($reservation->currency->category_name, ['controller' => 'Categories', 'action' => 'view', $reservation->currency->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment') ?></th>
                    <td><?= $reservation->has('payment') ? $this->Html->link($reservation->payment->category_name, ['controller' => 'Categories', 'action' => 'view', $reservation->payment->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Details') ?></th>
                    <td><?= h($reservation->reservation_details) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($reservation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Id') ?></th>
                    <td><?= $this->Number->format($reservation->property_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Project Id') ?></th>
                    <td><?= $reservation->project_id === null ? '' : $this->Number->format($reservation->project_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type Id') ?></th>
                    <td><?= $reservation->type_id === null ? '' : $this->Number->format($reservation->type_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Source Id') ?></th>
                    <td><?= $reservation->source_id === null ? '' : $this->Number->format($reservation->source_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Developer Id') ?></th>
                    <td><?= $reservation->developer_id === null ? '' : $this->Number->format($reservation->developer_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Id') ?></th>
                    <td><?= $reservation->category_id === null ? '' : $this->Number->format($reservation->category_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sellertype Id') ?></th>
                    <td><?= $reservation->sellertype_id === null ? '' : $this->Number->format($reservation->sellertype_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seller Id') ?></th>
                    <td><?= $reservation->seller_id === null ? '' : $this->Number->format($reservation->seller_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Amount') ?></th>
                    <td><?= $this->Number->format($reservation->reservation_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Price') ?></th>
                    <td><?= $reservation->reservation_price === null ? '' : $this->Number->format($reservation->reservation_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Usdprice') ?></th>
                    <td><?= $reservation->reservation_usdprice === null ? '' : $this->Number->format($reservation->reservation_usdprice) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Downpayment') ?></th>
                    <td><?= $reservation->reservation_downpayment === null ? '' : $this->Number->format($reservation->reservation_downpayment) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Isinvoice Sent') ?></th>
                    <td><?= $this->Number->format($reservation->reservation_isinvoice_sent) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Comission') ?></th>
                    <td><?= $this->Number->format($reservation->reservation_comission) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Usdcomission') ?></th>
                    <td><?= $this->Number->format($reservation->reservation_usdcomission) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $this->Number->format($reservation->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Downpayment Date') ?></th>
                    <td><?= h($reservation->reservation_downpayment_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Reservation Invoice Date') ?></th>
                    <td><?= h($reservation->reservation_invoice_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($reservation->stat_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Updated') ?></th>
                    <td><?= h($reservation->stat_updated) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
