<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClientSpec $clientSpec
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Client Spec'), ['action' => 'edit', $clientSpec->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Client Spec'), ['action' => 'delete', $clientSpec->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientSpec->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Client Specs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Client Spec'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clientSpecs view content">
            <h3><?= h($clientSpec->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $clientSpec->has('client') ? $this->Html->link($clientSpec->client->client_name, ['controller' => 'Clients', 'action' => 'view', $clientSpec->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Clientspec Propertytype') ?></th>
                    <td><?= h($clientSpec->clientspec_propertytype) ?></td>
                </tr>
                <tr>
                    <th><?= __('Clientspec Beds') ?></th>
                    <td><?= h($clientSpec->clientspec_beds) ?></td>
                </tr>
                <tr>
                    <th><?= __('Clientspec Loction Target') ?></th>
                    <td><?= h($clientSpec->clientspec_loction_target) ?></td>
                </tr>
                <tr>
                    <th><?= __('Clientspec Target Country') ?></th>
                    <td><?= h($clientSpec->clientspec_target_country) ?></td>
                </tr>
                <tr>
                    <th><?= __('Clientspec Target City') ?></th>
                    <td><?= h($clientSpec->clientspec_target_city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Clientspec Target Region') ?></th>
                    <td><?= h($clientSpec->clientspec_target_region) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($clientSpec->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Clientspec Currency') ?></th>
                    <td><?= $clientSpec->clientspec_currency === null ? '' : $this->Number->format($clientSpec->clientspec_currency) ?></td>
                </tr>
                <tr>
                    <th><?= __('Clientspec Buyerpersona') ?></th>
                    <td><?= $clientSpec->clientspec_buyerpersona === null ? '' : $this->Number->format($clientSpec->clientspec_buyerpersona) ?></td>
                </tr>
                <tr>
                    <th><?= __('Clientspec Socialstyle') ?></th>
                    <td><?= $clientSpec->clientspec_socialstyle === null ? '' : $this->Number->format($clientSpec->clientspec_socialstyle) ?></td>
                </tr>
                <tr>
                    <th><?= __('Clientspec Isowner') ?></th>
                    <td><?= $this->Number->format($clientSpec->clientspec_isowner) ?></td>
                </tr>
                <tr>
                    <th><?= __('Clientspec Isready') ?></th>
                    <td><?= $this->Number->format($clientSpec->clientspec_isready) ?></td>
                </tr>
                <tr>
                    <th><?= __('Clientspec Saved') ?></th>
                    <td><?= $clientSpec->clientspec_saved === null ? '' : $this->Number->format($clientSpec->clientspec_saved) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Clientspec Configs') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($clientSpec->clientspec_configs)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
