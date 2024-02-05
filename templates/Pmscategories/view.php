<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pmscategory $pmscategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pmscategory'), ['action' => 'edit', $pmscategory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pmscategory'), ['action' => 'delete', $pmscategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pmscategory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pmscategories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pmscategory'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pmscategories view content">
            <h3><?= h($pmscategory->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($pmscategory->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Parent Pmscategory') ?></th>
                    <td><?= $pmscategory->has('parent_pmscategory') ? $this->Html->link($pmscategory->parent_pmscategory->id, ['controller' => 'Pmscategories', 'action' => 'view', $pmscategory->parent_pmscategory->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Name') ?></th>
                    <td><?= h($pmscategory->category_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Configs') ?></th>
                    <td><?= h($pmscategory->category_configs) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pmscategory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Language Id') ?></th>
                    <td><?= $this->Number->format($pmscategory->language_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Priority') ?></th>
                    <td><?= $this->Number->format($pmscategory->category_priority) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $this->Number->format($pmscategory->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($pmscategory->stat_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Updated') ?></th>
                    <td><?= h($pmscategory->stat_updated) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Pmscategories') ?></h4>
                <?php if (!empty($pmscategory->child_pmscategories)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Slug') ?></th>
                            <th><?= __('Language Id') ?></th>
                            <th><?= __('Parent Id') ?></th>
                            <th><?= __('Category Name') ?></th>
                            <th><?= __('Category Configs') ?></th>
                            <th><?= __('Category Priority') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Stat Updated') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pmscategory->child_pmscategories as $childPmscategories) : ?>
                        <tr>
                            <td><?= h($childPmscategories->id) ?></td>
                            <td><?= h($childPmscategories->slug) ?></td>
                            <td><?= h($childPmscategories->language_id) ?></td>
                            <td><?= h($childPmscategories->parent_id) ?></td>
                            <td><?= h($childPmscategories->category_name) ?></td>
                            <td><?= h($childPmscategories->category_configs) ?></td>
                            <td><?= h($childPmscategories->category_priority) ?></td>
                            <td><?= h($childPmscategories->stat_created) ?></td>
                            <td><?= h($childPmscategories->stat_updated) ?></td>
                            <td><?= h($childPmscategories->rec_state) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Pmscategories', 'action' => 'view', $childPmscategories->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Pmscategories', 'action' => 'edit', $childPmscategories->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Pmscategories', 'action' => 'delete', $childPmscategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childPmscategories->id)]) ?>
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
