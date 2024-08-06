<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Addresses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Address'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addresses view content">
            <h3><?= h($address->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Parent Address') ?></th>
                    <td><?= $address->has('parent_address') ? $this->Html->link($address->parent_address->id, ['controller' => 'Addresses', 'action' => 'view', $address->parent_address->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs Name') ?></th>
                    <td><?= h($address->adrs_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs Slug') ?></th>
                    <td><?= h($address->adrs_slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs Type') ?></th>
                    <td><?= h($address->adrs_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($address->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Addresses') ?></h4>
                <?php if (!empty($address->child_addresses)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Parent Id') ?></th>
                            <th><?= __('Adrs Name') ?></th>
                            <th><?= __('Adrs Slug') ?></th>
                            <th><?= __('Adrs Type') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($address->child_addresses as $childAddresses) : ?>
                        <tr>
                            <td><?= h($childAddresses->id) ?></td>
                            <td><?= h($childAddresses->parent_id) ?></td>
                            <td><?= h($childAddresses->adrs_name) ?></td>
                            <td><?= h($childAddresses->adrs_slug) ?></td>
                            <td><?= h($childAddresses->adrs_type) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $childAddresses->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $childAddresses->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $childAddresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childAddresses->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
