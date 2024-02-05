<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Pmsproperty> $pmsproperties
 */
?>
<div class="pmsproperties index content">
    <?= $this->Html->link(__('New Pmsproperty'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Pmsproperties') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('language_id') ?></th>
                    <th><?= $this->Paginator->sort('category_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('developer_id') ?></th>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('seller_id') ?></th>
                    <th><?= $this->Paginator->sort('features_ids') ?></th>
                    <th><?= $this->Paginator->sort('tags_ids') ?></th>
                    <th><?= $this->Paginator->sort('property_title') ?></th>
                    <th><?= $this->Paginator->sort('property_price') ?></th>
                    <th><?= $this->Paginator->sort('property_oldprice') ?></th>
                    <th><?= $this->Paginator->sort('property_currency') ?></th>
                    <th><?= $this->Paginator->sort('property_loc') ?></th>
                    <th><?= $this->Paginator->sort('property_ref') ?></th>
                    <th><?= $this->Paginator->sort('property_usp') ?></th>
                    <th><?= $this->Paginator->sort('param_issold') ?></th>
                    <th><?= $this->Paginator->sort('property_isfeatured') ?></th>
                    <th><?= $this->Paginator->sort('property_isindexed') ?></th>
                    <th><?= $this->Paginator->sort('adrs_country') ?></th>
                    <th><?= $this->Paginator->sort('adrs_city') ?></th>
                    <th><?= $this->Paginator->sort('adrs_region') ?></th>
                    <th><?= $this->Paginator->sort('adrs_district') ?></th>
                    <th><?= $this->Paginator->sort('adrs_street') ?></th>
                    <th><?= $this->Paginator->sort('adrs_block') ?></th>
                    <th><?= $this->Paginator->sort('adrs_no') ?></th>
                    <th><?= $this->Paginator->sort('param_netspace') ?></th>
                    <th><?= $this->Paginator->sort('param_grossspace') ?></th>
                    <th><?= $this->Paginator->sort('param_rooms') ?></th>
                    <th><?= $this->Paginator->sort('param_bedrooms') ?></th>
                    <th><?= $this->Paginator->sort('param_buildage') ?></th>
                    <th><?= $this->Paginator->sort('param_floors') ?></th>
                    <th><?= $this->Paginator->sort('param_floor') ?></th>
                    <th><?= $this->Paginator->sort('param_heat') ?></th>
                    <th><?= $this->Paginator->sort('param_bathrooms') ?></th>
                    <th><?= $this->Paginator->sort('param_balconies') ?></th>
                    <th><?= $this->Paginator->sort('param_isfurnitured') ?></th>
                    <th><?= $this->Paginator->sort('param_isresale') ?></th>
                    <th><?= $this->Paginator->sort('param_iscitizenship') ?></th>
                    <th><?= $this->Paginator->sort('param_isresidence') ?></th>
                    <th><?= $this->Paginator->sort('param_iscommission_included') ?></th>
                    <th><?= $this->Paginator->sort('param_ispublished') ?></th>
                    <th><?= $this->Paginator->sort('param_titledeed') ?></th>
                    <th><?= $this->Paginator->sort('param_usestatus') ?></th>
                    <th><?= $this->Paginator->sort('param_monthlytax') ?></th>
                    <th><?= $this->Paginator->sort('param_payment') ?></th>
                    <th><?= $this->Paginator->sort('param_ownership') ?></th>
                    <th><?= $this->Paginator->sort('param_ownertype') ?></th>
                    <th><?= $this->Paginator->sort('param_deposit') ?></th>
                    <th><?= $this->Paginator->sort('param_delivertype') ?></th>
                    <th><?= $this->Paginator->sort('param_deliverdate') ?></th>
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
                <?php foreach ($pmsproperties as $pmsproperty): ?>
                <tr>
                    <td><?= $this->Number->format($pmsproperty->id) ?></td>
                    <td><?= h($pmsproperty->slug) ?></td>
                    <td><?= $this->Number->format($pmsproperty->language_id) ?></td>
                    <td><?= $this->Number->format($pmsproperty->category_id) ?></td>
                    <td><?= $pmsproperty->user_id === null ? '' : $this->Number->format($pmsproperty->user_id) ?></td>
                    <td><?= $pmsproperty->developer_id === null ? '' : $this->Number->format($pmsproperty->developer_id) ?></td>
                    <td><?= $pmsproperty->project_id === null ? '' : $this->Number->format($pmsproperty->project_id) ?></td>
                    <td><?= $pmsproperty->seller_id === null ? '' : $this->Number->format($pmsproperty->seller_id) ?></td>
                    <td><?= h($pmsproperty->features_ids) ?></td>
                    <td><?= h($pmsproperty->tags_ids) ?></td>
                    <td><?= h($pmsproperty->property_title) ?></td>
                    <td><?= $pmsproperty->property_price === null ? '' : $this->Number->format($pmsproperty->property_price) ?></td>
                    <td><?= $pmsproperty->property_oldprice === null ? '' : $this->Number->format($pmsproperty->property_oldprice) ?></td>
                    <td><?= $this->Number->format($pmsproperty->property_currency) ?></td>
                    <td><?= h($pmsproperty->property_loc) ?></td>
                    <td><?= h($pmsproperty->property_ref) ?></td>
                    <td><?= h($pmsproperty->property_usp) ?></td>
                    <td><?= $pmsproperty->param_issold === null ? '' : $this->Number->format($pmsproperty->param_issold) ?></td>
                    <td><?= $this->Number->format($pmsproperty->property_isfeatured) ?></td>
                    <td><?= $this->Number->format($pmsproperty->property_isindexed) ?></td>
                    <td><?= h($pmsproperty->adrs_country) ?></td>
                    <td><?= h($pmsproperty->adrs_city) ?></td>
                    <td><?= h($pmsproperty->adrs_region) ?></td>
                    <td><?= h($pmsproperty->adrs_district) ?></td>
                    <td><?= h($pmsproperty->adrs_street) ?></td>
                    <td><?= h($pmsproperty->adrs_block) ?></td>
                    <td><?= h($pmsproperty->adrs_no) ?></td>
                    <td><?= $pmsproperty->param_netspace === null ? '' : $this->Number->format($pmsproperty->param_netspace) ?></td>
                    <td><?= $pmsproperty->param_grossspace === null ? '' : $this->Number->format($pmsproperty->param_grossspace) ?></td>
                    <td><?= $pmsproperty->param_rooms === null ? '' : $this->Number->format($pmsproperty->param_rooms) ?></td>
                    <td><?= $pmsproperty->param_bedrooms === null ? '' : $this->Number->format($pmsproperty->param_bedrooms) ?></td>
                    <td><?= $pmsproperty->param_buildage === null ? '' : $this->Number->format($pmsproperty->param_buildage) ?></td>
                    <td><?= $pmsproperty->param_floors === null ? '' : $this->Number->format($pmsproperty->param_floors) ?></td>
                    <td><?= $pmsproperty->param_floor === null ? '' : $this->Number->format($pmsproperty->param_floor) ?></td>
                    <td><?= $pmsproperty->param_heat === null ? '' : $this->Number->format($pmsproperty->param_heat) ?></td>
                    <td><?= $pmsproperty->param_bathrooms === null ? '' : $this->Number->format($pmsproperty->param_bathrooms) ?></td>
                    <td><?= $pmsproperty->param_balconies === null ? '' : $this->Number->format($pmsproperty->param_balconies) ?></td>
                    <td><?= $pmsproperty->param_isfurnitured === null ? '' : $this->Number->format($pmsproperty->param_isfurnitured) ?></td>
                    <td><?= $pmsproperty->param_isresale === null ? '' : $this->Number->format($pmsproperty->param_isresale) ?></td>
                    <td><?= $pmsproperty->param_iscitizenship === null ? '' : $this->Number->format($pmsproperty->param_iscitizenship) ?></td>
                    <td><?= $pmsproperty->param_isresidence === null ? '' : $this->Number->format($pmsproperty->param_isresidence) ?></td>
                    <td><?= $pmsproperty->param_iscommission_included === null ? '' : $this->Number->format($pmsproperty->param_iscommission_included) ?></td>
                    <td><?= $this->Number->format($pmsproperty->param_ispublished) ?></td>
                    <td><?= $pmsproperty->param_titledeed === null ? '' : $this->Number->format($pmsproperty->param_titledeed) ?></td>
                    <td><?= $pmsproperty->param_usestatus === null ? '' : $this->Number->format($pmsproperty->param_usestatus) ?></td>
                    <td><?= $pmsproperty->param_monthlytax === null ? '' : $this->Number->format($pmsproperty->param_monthlytax) ?></td>
                    <td><?= $pmsproperty->param_payment === null ? '' : $this->Number->format($pmsproperty->param_payment) ?></td>
                    <td><?= $pmsproperty->param_ownership === null ? '' : $this->Number->format($pmsproperty->param_ownership) ?></td>
                    <td><?= $pmsproperty->param_ownertype === null ? '' : $this->Number->format($pmsproperty->param_ownertype) ?></td>
                    <td><?= $pmsproperty->param_deposit === null ? '' : $this->Number->format($pmsproperty->param_deposit) ?></td>
                    <td><?= $pmsproperty->param_delivertype === null ? '' : $this->Number->format($pmsproperty->param_delivertype) ?></td>
                    <td><?= h($pmsproperty->param_deliverdate) ?></td>
                    <td><?= h($pmsproperty->seo_title) ?></td>
                    <td><?= h($pmsproperty->seo_keywords) ?></td>
                    <td><?= h($pmsproperty->seo_desc) ?></td>
                    <td><?= h($pmsproperty->stat_created) ?></td>
                    <td><?= h($pmsproperty->stat_updated) ?></td>
                    <td><?= $this->Number->format($pmsproperty->stat_views) ?></td>
                    <td><?= $this->Number->format($pmsproperty->stat_shares) ?></td>
                    <td><?= $this->Number->format($pmsproperty->rec_state) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $pmsproperty->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pmsproperty->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pmsproperty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pmsproperty->id)]) ?>
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
