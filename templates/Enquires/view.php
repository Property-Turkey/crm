<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquire $enquire
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Enquire'), ['action' => 'edit', $enquire->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Enquire'), ['action' => 'delete', $enquire->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquire->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Enquires'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Enquire'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="enquires view content">
            <h3><?= h($enquire->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $enquire->has('client') ? $this->Html->link($enquire->client->client_name, ['controller' => 'Clients', 'action' => 'view', $enquire->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Name') ?></th>
                    <td><?= h($enquire->enquiry_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Email') ?></th>
                    <td><?= h($enquire->enquiry_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Message') ?></th>
                    <td><?= h($enquire->enquiry_message) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Ipaddress') ?></th>
                    <td><?= h($enquire->enquiry_ipaddress) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Referral') ?></th>
                    <td><?= h($enquire->enquiry_referral) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Host') ?></th>
                    <td><?= h($enquire->enquiry_host) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seo Keywords') ?></th>
                    <td><?= h($enquire->seo_keywords) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($enquire->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Source Id') ?></th>
                    <td><?= $enquire->source_id === null ? '' : $this->Number->format($enquire->source_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Id') ?></th>
                    <td><?= $enquire->property_id === null ? '' : $this->Number->format($enquire->property_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Phone') ?></th>
                    <td><?= $enquire->enquiry_phone === null ? '' : $this->Number->format($enquire->enquiry_phone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Country') ?></th>
                    <td><?= $enquire->enquiry_country === null ? '' : $this->Number->format($enquire->enquiry_country) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($enquire->stat_created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
