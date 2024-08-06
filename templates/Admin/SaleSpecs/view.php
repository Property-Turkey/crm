<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SaleSpec $saleSpec
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sale Spec'), ['action' => 'edit', $saleSpec->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sale Spec'), ['action' => 'delete', $saleSpec->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saleSpec->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sale Specs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sale Spec'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="saleSpecs view content">
            <h3><?= h($saleSpec->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Sale') ?></th>
                    <td><?= $saleSpec->has('sale') ? $this->Html->link($saleSpec->sale->client_id, ['controller' => 'Sales', 'action' => 'view', $saleSpec->sale->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Salespec Current Location') ?></th>
                    <td><?= h($saleSpec->salespec_current_location) ?></td>
                </tr>
                <tr>
                    <th><?= __('Salespec Loction Target') ?></th>
                    <td><?= h($saleSpec->salespec_loction_target) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($saleSpec->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Salespec Propertytype') ?></th>
                    <td><?= $saleSpec->salespec_propertytype === null ? '' : $this->Number->format($saleSpec->salespec_propertytype) ?></td>
                </tr>
                <tr>
                    <th><?= __('Salespec Beds') ?></th>
                    <td><?= $saleSpec->salespec_beds === null ? '' : $this->Number->format($saleSpec->salespec_beds) ?></td>
                </tr>
                <tr>
                    <th><?= __('Salespec Isowner') ?></th>
                    <td><?= $this->Number->format($saleSpec->salespec_isowner) ?></td>
                </tr>
                <tr>
                    <th><?= __('Salespec Isready') ?></th>
                    <td><?= $this->Number->format($saleSpec->salespec_isready) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Reports') ?></h4>
                <?php if (!empty($saleSpec->reports)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Tar Id') ?></th>
                            <th><?= __('Tar Tbl') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Report Type') ?></th>
                            <th><?= __('Report Priority') ?></th>
                            <th><?= __('Report Text') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($saleSpec->reports as $reports) : ?>
                        <tr>
                            <td><?= h($reports->id) ?></td>
                            <td><?= h($reports->user_id) ?></td>
                            <td><?= h($reports->tar_id) ?></td>
                            <td><?= h($reports->tar_tbl) ?></td>
                            <td><?= h($reports->category_id) ?></td>
                            <td><?= h($reports->report_type) ?></td>
                            <td><?= h($reports->report_priority) ?></td>
                            <td><?= h($reports->report_text) ?></td>
                            <td><?= h($reports->stat_created) ?></td>
                            <td><?= h($reports->rec_state) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Reports', 'action' => 'view', $reports->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Reports', 'action' => 'edit', $reports->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reports', 'action' => 'delete', $reports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reports->id)]) ?>
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
