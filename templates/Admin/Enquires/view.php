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
                    <th><?= __('Enquiry Clname') ?></th>
                    <td><?= h($enquire->enquiry_clname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Clemail') ?></th>
                    <td><?= h($enquire->enquiry_clemail) ?></td>
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
                    <th><?= __('Enquiry Lastpage') ?></th>
                    <td><?= h($enquire->enquiry_lastpage) ?></td>
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
                    <th><?= __('Property Id') ?></th>
                    <td><?= $this->Number->format($enquire->property_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Clphone') ?></th>
                    <td><?= $enquire->enquiry_clphone === null ? '' : $this->Number->format($enquire->enquiry_clphone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Clcountry') ?></th>
                    <td><?= $enquire->enquiry_clcountry === null ? '' : $this->Number->format($enquire->enquiry_clcountry) ?></td>
                </tr>
                <tr>
                    <th><?= __('Enquiry Clsource') ?></th>
                    <td><?= $enquire->enquiry_clsource === null ? '' : $this->Number->format($enquire->enquiry_clsource) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seo Host') ?></th>
                    <td><?= $this->Number->format($enquire->seo_host) ?></td>
                </tr>
                <tr>
                    <th><?= __('Isindex') ?></th>
                    <td><?= $this->Number->format($enquire->isindex) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($enquire->stat_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Updated') ?></th>
                    <td><?= h($enquire->stat_updated) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
