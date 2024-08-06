<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pmsproject $pmsproject
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pmsproject'), ['action' => 'edit', $pmsproject->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pmsproject'), ['action' => 'delete', $pmsproject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pmsproject->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pmsprojects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pmsproject'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pmsprojects view content">
            <h3><?= h($pmsproject->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Category') ?></th>
                    <td><?= $pmsproject->has('category') ? $this->Html->link($pmsproject->category->category_name, ['controller' => 'Categories', 'action' => 'view', $pmsproject->category->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $pmsproject->has('user') ? $this->Html->link($pmsproject->user->user_fullname, ['controller' => 'Users', 'action' => 'view', $pmsproject->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Features Ids') ?></th>
                    <td><?= h($pmsproject->features_ids) ?></td>
                </tr>
                <tr>
                    <th><?= __('Project Title') ?></th>
                    <td><?= h($pmsproject->project_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Project Loc') ?></th>
                    <td><?= h($pmsproject->project_loc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Project Ref') ?></th>
                    <td><?= h($pmsproject->project_ref) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs Country') ?></th>
                    <td><?= h($pmsproject->adrs_country) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs City') ?></th>
                    <td><?= h($pmsproject->adrs_city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs Region') ?></th>
                    <td><?= h($pmsproject->adrs_region) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs District') ?></th>
                    <td><?= h($pmsproject->adrs_district) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs Street') ?></th>
                    <td><?= h($pmsproject->adrs_street) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Unit Types') ?></th>
                    <td><?= h($pmsproject->param_unit_types) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Units Size Range') ?></th>
                    <td><?= h($pmsproject->param_units_size_range) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seo Title') ?></th>
                    <td><?= h($pmsproject->seo_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seo Keywords') ?></th>
                    <td><?= h($pmsproject->seo_keywords) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seo Desc') ?></th>
                    <td><?= h($pmsproject->seo_desc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pmsproject->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Language Id') ?></th>
                    <td><?= $pmsproject->language_id === null ? '' : $this->Number->format($pmsproject->language_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Developer Id') ?></th>
                    <td><?= $pmsproject->developer_id === null ? '' : $this->Number->format($pmsproject->developer_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seller Id') ?></th>
                    <td><?= $pmsproject->seller_id === null ? '' : $this->Number->format($pmsproject->seller_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Project Currency') ?></th>
                    <td><?= $pmsproject->project_currency === null ? '' : $this->Number->format($pmsproject->project_currency) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Space') ?></th>
                    <td><?= $pmsproject->param_space === null ? '' : $this->Number->format($pmsproject->param_space) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Delivertype') ?></th>
                    <td><?= $pmsproject->param_delivertype === null ? '' : $this->Number->format($pmsproject->param_delivertype) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Totalunits') ?></th>
                    <td><?= $pmsproject->param_totalunits === null ? '' : $this->Number->format($pmsproject->param_totalunits) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Blocks') ?></th>
                    <td><?= $pmsproject->param_blocks === null ? '' : $this->Number->format($pmsproject->param_blocks) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Bldfloors') ?></th>
                    <td><?= $pmsproject->param_bldfloors === null ? '' : $this->Number->format($pmsproject->param_bldfloors) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Iscitizenship') ?></th>
                    <td><?= $pmsproject->param_iscitizenship === null ? '' : $this->Number->format($pmsproject->param_iscitizenship) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Isresidence') ?></th>
                    <td><?= $pmsproject->param_isresidence === null ? '' : $this->Number->format($pmsproject->param_isresidence) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Residential Units') ?></th>
                    <td><?= $pmsproject->param_residential_units === null ? '' : $this->Number->format($pmsproject->param_residential_units) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Commercial Units') ?></th>
                    <td><?= $pmsproject->param_commercial_units === null ? '' : $this->Number->format($pmsproject->param_commercial_units) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Downpayment') ?></th>
                    <td><?= $pmsproject->param_downpayment === null ? '' : $this->Number->format($pmsproject->param_downpayment) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Installment') ?></th>
                    <td><?= $pmsproject->param_installment === null ? '' : $this->Number->format($pmsproject->param_installment) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Installment Months') ?></th>
                    <td><?= $pmsproject->param_installment_months === null ? '' : $this->Number->format($pmsproject->param_installment_months) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Views') ?></th>
                    <td><?= $this->Number->format($pmsproject->stat_views) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Shares') ?></th>
                    <td><?= $this->Number->format($pmsproject->stat_shares) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $this->Number->format($pmsproject->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Deliverdate') ?></th>
                    <td><?= h($pmsproject->param_deliverdate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($pmsproject->stat_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Updated') ?></th>
                    <td><?= h($pmsproject->stat_updated) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Project Desc') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($pmsproject->project_desc)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Project Photos') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($pmsproject->project_photos)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Project Videos') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($pmsproject->project_videos)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
