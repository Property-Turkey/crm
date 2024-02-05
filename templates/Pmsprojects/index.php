<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pmsproject> $pmsprojects
 */
?>
<div class="pmsprojects index content">
    <?= $this->Html->link(__('New Pmsproject'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pmsprojects') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('language_id') ?></th>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('developer_id') ?></th>
                    <th><?= $this->Paginator->sort('seller_id') ?></th>
                    <th><?= $this->Paginator->sort('features_ids') ?></th>
                    <th><?= $this->Paginator->sort('project_title') ?></th>
                    <th><?= $this->Paginator->sort('project_loc') ?></th>
                    <th><?= $this->Paginator->sort('project_ref') ?></th>
                    <th><?= $this->Paginator->sort('project_currency') ?></th>
                    <th><?= $this->Paginator->sort('adrs_country') ?></th>
                    <th><?= $this->Paginator->sort('adrs_city') ?></th>
                    <th><?= $this->Paginator->sort('adrs_region') ?></th>
                    <th><?= $this->Paginator->sort('adrs_district') ?></th>
                    <th><?= $this->Paginator->sort('adrs_street') ?></th>
                    <th><?= $this->Paginator->sort('param_space') ?></th>
                    <th><?= $this->Paginator->sort('param_delivertype') ?></th>
                    <th><?= $this->Paginator->sort('param_deliverdate') ?></th>
                    <th><?= $this->Paginator->sort('param_totalunits') ?></th>
                    <th><?= $this->Paginator->sort('param_blocks') ?></th>
                    <th><?= $this->Paginator->sort('param_bldfloors') ?></th>
                    <th><?= $this->Paginator->sort('param_iscitizenship') ?></th>
                    <th><?= $this->Paginator->sort('param_isresidence') ?></th>
                    <th><?= $this->Paginator->sort('param_residential_units') ?></th>
                    <th><?= $this->Paginator->sort('param_commercial_units') ?></th>
                    <th><?= $this->Paginator->sort('param_unit_types') ?></th>
                    <th><?= $this->Paginator->sort('param_units_size_range') ?></th>
                    <th><?= $this->Paginator->sort('param_downpayment') ?></th>
                    <th><?= $this->Paginator->sort('param_installment') ?></th>
                    <th><?= $this->Paginator->sort('param_installment_months') ?></th>
                    <th><?= $this->Paginator->sort('seo_title') ?></th>
                    <th><?= $this->Paginator->sort('seo_keywords') ?></th>
                    <th><?= $this->Paginator->sort('seo_desc') ?></th>
                    <th><?= $this->Paginator->sort('stat_created') ?></th>
                    <th><?= $this->Paginator->sort('stat_updated') ?></th>
                    <th><?= $this->Paginator->sort('stat_views') ?></th>
                    <th><?= $this->Paginator->sort('stat_shares') ?></th>
                    <th><?= $this->Paginator->sort('rec_state') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pmsprojects as $pmsproject): ?>
                <tr>
                    <td><?= $this->Number->format($pmsproject->id) ?></td>
                    <td><?= $pmsproject->language_id === null ? '' : $this->Number->format($pmsproject->language_id) ?></td>
                    <td><?= $pmsproject->has('category') ? $this->Html->link($pmsproject->category->category_name, ['controller' => 'Categories', 'action' => 'view', $pmsproject->category->id]) : '' ?></td>
                    <td><?= $pmsproject->has('user') ? $this->Html->link($pmsproject->user->user_fullname, ['controller' => 'Users', 'action' => 'view', $pmsproject->user->id]) : '' ?></td>
                    <td><?= $pmsproject->developer_id === null ? '' : $this->Number->format($pmsproject->developer_id) ?></td>
                    <td><?= $pmsproject->seller_id === null ? '' : $this->Number->format($pmsproject->seller_id) ?></td>
                    <td><?= h($pmsproject->features_ids) ?></td>
                    <td><?= h($pmsproject->project_title) ?></td>
                    <td><?= h($pmsproject->project_loc) ?></td>
                    <td><?= h($pmsproject->project_ref) ?></td>
                    <td><?= $pmsproject->project_currency === null ? '' : $this->Number->format($pmsproject->project_currency) ?></td>
                    <td><?= h($pmsproject->adrs_country) ?></td>
                    <td><?= h($pmsproject->adrs_city) ?></td>
                    <td><?= h($pmsproject->adrs_region) ?></td>
                    <td><?= h($pmsproject->adrs_district) ?></td>
                    <td><?= h($pmsproject->adrs_street) ?></td>
                    <td><?= $pmsproject->param_space === null ? '' : $this->Number->format($pmsproject->param_space) ?></td>
                    <td><?= $pmsproject->param_delivertype === null ? '' : $this->Number->format($pmsproject->param_delivertype) ?></td>
                    <td><?= h($pmsproject->param_deliverdate) ?></td>
                    <td><?= $pmsproject->param_totalunits === null ? '' : $this->Number->format($pmsproject->param_totalunits) ?></td>
                    <td><?= $pmsproject->param_blocks === null ? '' : $this->Number->format($pmsproject->param_blocks) ?></td>
                    <td><?= $pmsproject->param_bldfloors === null ? '' : $this->Number->format($pmsproject->param_bldfloors) ?></td>
                    <td><?= $pmsproject->param_iscitizenship === null ? '' : $this->Number->format($pmsproject->param_iscitizenship) ?></td>
                    <td><?= $pmsproject->param_isresidence === null ? '' : $this->Number->format($pmsproject->param_isresidence) ?></td>
                    <td><?= $pmsproject->param_residential_units === null ? '' : $this->Number->format($pmsproject->param_residential_units) ?></td>
                    <td><?= $pmsproject->param_commercial_units === null ? '' : $this->Number->format($pmsproject->param_commercial_units) ?></td>
                    <td><?= h($pmsproject->param_unit_types) ?></td>
                    <td><?= h($pmsproject->param_units_size_range) ?></td>
                    <td><?= $pmsproject->param_downpayment === null ? '' : $this->Number->format($pmsproject->param_downpayment) ?></td>
                    <td><?= $pmsproject->param_installment === null ? '' : $this->Number->format($pmsproject->param_installment) ?></td>
                    <td><?= $pmsproject->param_installment_months === null ? '' : $this->Number->format($pmsproject->param_installment_months) ?></td>
                    <td><?= h($pmsproject->seo_title) ?></td>
                    <td><?= h($pmsproject->seo_keywords) ?></td>
                    <td><?= h($pmsproject->seo_desc) ?></td>
                    <td><?= h($pmsproject->stat_created) ?></td>
                    <td><?= h($pmsproject->stat_updated) ?></td>
                    <td><?= $this->Number->format($pmsproject->stat_views) ?></td>
                    <td><?= $this->Number->format($pmsproject->stat_shares) ?></td>
                    <td><?= $this->Number->format($pmsproject->rec_state) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pmsproject->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pmsproject->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pmsproject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pmsproject->id)]) ?>
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
