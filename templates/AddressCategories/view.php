<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AddressCategory $addressCategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Address Category'), ['action' => 'edit', $addressCategory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Address Category'), ['action' => 'delete', $addressCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addressCategory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Address Categories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Address Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addressCategories view content">
            <h3><?= h($addressCategory->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Parent Address Category') ?></th>
                    <td><?= $addressCategory->has('parent_address_category') ? $this->Html->link($addressCategory->parent_address_category->id, ['controller' => 'AddressCategories', 'action' => 'view', $addressCategory->parent_address_category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Name') ?></th>
                    <td><?= h($addressCategory->category_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Slug') ?></th>
                    <td><?= h($addressCategory->category_slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Configs') ?></th>
                    <td><?= h($addressCategory->category_configs) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($addressCategory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Language Id') ?></th>
                    <td><?= $this->Number->format($addressCategory->language_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Priority') ?></th>
                    <td><?= $addressCategory->category_priority === null ? '' : $this->Number->format($addressCategory->category_priority) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $addressCategory->rec_state === null ? '' : $this->Number->format($addressCategory->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($addressCategory->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($addressCategory->updated_at) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Address Categories') ?></h4>
                <?php if (!empty($addressCategory->child_address_categories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Language Id') ?></th>
                            <th><?= __('Parent Id') ?></th>
                            <th><?= __('Category Name') ?></th>
                            <th><?= __('Category Slug') ?></th>
                            <th><?= __('Category Configs') ?></th>
                            <th><?= __('Category Priority') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($addressCategory->child_address_categories as $childAddressCategories) : ?>
                        <tr>
                            <td><?= h($childAddressCategories->id) ?></td>
                            <td><?= h($childAddressCategories->language_id) ?></td>
                            <td><?= h($childAddressCategories->parent_id) ?></td>
                            <td><?= h($childAddressCategories->category_name) ?></td>
                            <td><?= h($childAddressCategories->category_slug) ?></td>
                            <td><?= h($childAddressCategories->category_configs) ?></td>
                            <td><?= h($childAddressCategories->category_priority) ?></td>
                            <td><?= h($childAddressCategories->rec_state) ?></td>
                            <td><?= h($childAddressCategories->created_at) ?></td>
                            <td><?= h($childAddressCategories->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'AddressCategories', 'action' => 'view', $childAddressCategories->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'AddressCategories', 'action' => 'edit', $childAddressCategories->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'AddressCategories', 'action' => 'delete', $childAddressCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childAddressCategories->id)]) ?>
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
