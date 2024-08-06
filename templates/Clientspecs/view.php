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
                    <th><?= __('Currency') ?></th>
                    <td><?= $clientSpec->has('currency') ? $this->Html->link($clientSpec->currency->category_name, ['controller' => 'Categories', 'action' => 'view', $clientSpec->currency->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Persona') ?></th>
                    <td><?= $clientSpec->has('persona') ? $this->Html->link($clientSpec->persona->category_name, ['controller' => 'Categories', 'action' => 'view', $clientSpec->persona->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Style') ?></th>
                    <td><?= $clientSpec->has('style') ? $this->Html->link($clientSpec->style->category_name, ['controller' => 'Categories', 'action' => 'view', $clientSpec->style->id]) : '' ?></td>
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
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($clientSpec->id) ?></td>
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
