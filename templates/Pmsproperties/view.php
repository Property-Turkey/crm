<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pmsproperty $pmsproperty
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Pmsproperty'), ['action' => 'edit', $pmsproperty->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Pmsproperty'), ['action' => 'delete', $pmsproperty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pmsproperty->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pmsproperties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Pmsproperty'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pmsproperties view content">
            <h3><?= h($pmsproperty->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($pmsproperty->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Features Ids') ?></th>
                    <td><?= h($pmsproperty->features_ids) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tags Ids') ?></th>
                    <td><?= h($pmsproperty->tags_ids) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Title') ?></th>
                    <td><?= h($pmsproperty->property_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Loc') ?></th>
                    <td><?= h($pmsproperty->property_loc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Ref') ?></th>
                    <td><?= h($pmsproperty->property_ref) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Usp') ?></th>
                    <td><?= h($pmsproperty->property_usp) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs Country') ?></th>
                    <td><?= h($pmsproperty->adrs_country) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs City') ?></th>
                    <td><?= h($pmsproperty->adrs_city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs Region') ?></th>
                    <td><?= h($pmsproperty->adrs_region) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs District') ?></th>
                    <td><?= h($pmsproperty->adrs_district) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs Street') ?></th>
                    <td><?= h($pmsproperty->adrs_street) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs Block') ?></th>
                    <td><?= h($pmsproperty->adrs_block) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adrs No') ?></th>
                    <td><?= h($pmsproperty->adrs_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seo Title') ?></th>
                    <td><?= h($pmsproperty->seo_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seo Keywords') ?></th>
                    <td><?= h($pmsproperty->seo_keywords) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seo Desc') ?></th>
                    <td><?= h($pmsproperty->seo_desc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($pmsproperty->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Language Id') ?></th>
                    <td><?= $this->Number->format($pmsproperty->language_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Category Id') ?></th>
                    <td><?= $this->Number->format($pmsproperty->category_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Id') ?></th>
                    <td><?= $pmsproperty->user_id === null ? '' : $this->Number->format($pmsproperty->user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Developer Id') ?></th>
                    <td><?= $pmsproperty->developer_id === null ? '' : $this->Number->format($pmsproperty->developer_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Project Id') ?></th>
                    <td><?= $pmsproperty->project_id === null ? '' : $this->Number->format($pmsproperty->project_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Seller Id') ?></th>
                    <td><?= $pmsproperty->seller_id === null ? '' : $this->Number->format($pmsproperty->seller_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Price') ?></th>
                    <td><?= $pmsproperty->property_price === null ? '' : $this->Number->format($pmsproperty->property_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Oldprice') ?></th>
                    <td><?= $pmsproperty->property_oldprice === null ? '' : $this->Number->format($pmsproperty->property_oldprice) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Currency') ?></th>
                    <td><?= $this->Number->format($pmsproperty->property_currency) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Issold') ?></th>
                    <td><?= $pmsproperty->param_issold === null ? '' : $this->Number->format($pmsproperty->param_issold) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Isfeatured') ?></th>
                    <td><?= $this->Number->format($pmsproperty->property_isfeatured) ?></td>
                </tr>
                <tr>
                    <th><?= __('Property Isindexed') ?></th>
                    <td><?= $this->Number->format($pmsproperty->property_isindexed) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Netspace') ?></th>
                    <td><?= $pmsproperty->param_netspace === null ? '' : $this->Number->format($pmsproperty->param_netspace) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Grossspace') ?></th>
                    <td><?= $pmsproperty->param_grossspace === null ? '' : $this->Number->format($pmsproperty->param_grossspace) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Rooms') ?></th>
                    <td><?= $pmsproperty->param_rooms === null ? '' : $this->Number->format($pmsproperty->param_rooms) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Bedrooms') ?></th>
                    <td><?= $pmsproperty->param_bedrooms === null ? '' : $this->Number->format($pmsproperty->param_bedrooms) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Buildage') ?></th>
                    <td><?= $pmsproperty->param_buildage === null ? '' : $this->Number->format($pmsproperty->param_buildage) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Floors') ?></th>
                    <td><?= $pmsproperty->param_floors === null ? '' : $this->Number->format($pmsproperty->param_floors) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Floor') ?></th>
                    <td><?= $pmsproperty->param_floor === null ? '' : $this->Number->format($pmsproperty->param_floor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Heat') ?></th>
                    <td><?= $pmsproperty->param_heat === null ? '' : $this->Number->format($pmsproperty->param_heat) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Bathrooms') ?></th>
                    <td><?= $pmsproperty->param_bathrooms === null ? '' : $this->Number->format($pmsproperty->param_bathrooms) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Balconies') ?></th>
                    <td><?= $pmsproperty->param_balconies === null ? '' : $this->Number->format($pmsproperty->param_balconies) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Isfurnitured') ?></th>
                    <td><?= $pmsproperty->param_isfurnitured === null ? '' : $this->Number->format($pmsproperty->param_isfurnitured) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Isresale') ?></th>
                    <td><?= $pmsproperty->param_isresale === null ? '' : $this->Number->format($pmsproperty->param_isresale) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Iscitizenship') ?></th>
                    <td><?= $pmsproperty->param_iscitizenship === null ? '' : $this->Number->format($pmsproperty->param_iscitizenship) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Isresidence') ?></th>
                    <td><?= $pmsproperty->param_isresidence === null ? '' : $this->Number->format($pmsproperty->param_isresidence) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Iscommission Included') ?></th>
                    <td><?= $pmsproperty->param_iscommission_included === null ? '' : $this->Number->format($pmsproperty->param_iscommission_included) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Ispublished') ?></th>
                    <td><?= $this->Number->format($pmsproperty->param_ispublished) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Titledeed') ?></th>
                    <td><?= $pmsproperty->param_titledeed === null ? '' : $this->Number->format($pmsproperty->param_titledeed) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Usestatus') ?></th>
                    <td><?= $pmsproperty->param_usestatus === null ? '' : $this->Number->format($pmsproperty->param_usestatus) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Monthlytax') ?></th>
                    <td><?= $pmsproperty->param_monthlytax === null ? '' : $this->Number->format($pmsproperty->param_monthlytax) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Payment') ?></th>
                    <td><?= $pmsproperty->param_payment === null ? '' : $this->Number->format($pmsproperty->param_payment) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Ownership') ?></th>
                    <td><?= $pmsproperty->param_ownership === null ? '' : $this->Number->format($pmsproperty->param_ownership) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Ownertype') ?></th>
                    <td><?= $pmsproperty->param_ownertype === null ? '' : $this->Number->format($pmsproperty->param_ownertype) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Deposit') ?></th>
                    <td><?= $pmsproperty->param_deposit === null ? '' : $this->Number->format($pmsproperty->param_deposit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Delivertype') ?></th>
                    <td><?= $pmsproperty->param_delivertype === null ? '' : $this->Number->format($pmsproperty->param_delivertype) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Views') ?></th>
                    <td><?= $this->Number->format($pmsproperty->stat_views) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Shares') ?></th>
                    <td><?= $this->Number->format($pmsproperty->stat_shares) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rec State') ?></th>
                    <td><?= $this->Number->format($pmsproperty->rec_state) ?></td>
                </tr>
                <tr>
                    <th><?= __('Param Deliverdate') ?></th>
                    <td><?= h($pmsproperty->param_deliverdate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Created') ?></th>
                    <td><?= h($pmsproperty->stat_created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stat Updated') ?></th>
                    <td><?= h($pmsproperty->stat_updated) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Property Desc') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($pmsproperty->property_desc)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Property Photos') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($pmsproperty->property_photos)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Property Videos') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($pmsproperty->property_videos)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Offers') ?></h4>
                <?php if (!empty($pmsproperty->offers)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('Property Id') ?></th>
                            <th><?= __('Offer Desc') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Stat Updated') ?></th>
                            <th><?= __('Isinterested') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pmsproperty->offers as $offers) : ?>
                        <tr>
                            <td><?= h($offers->id) ?></td>
                            <td><?= h($offers->client_id) ?></td>
                            <td><?= h($offers->property_id) ?></td>
                            <td><?= h($offers->offer_desc) ?></td>
                            <td><?= h($offers->stat_created) ?></td>
                            <td><?= h($offers->stat_updated) ?></td>
                            <td><?= h($offers->isinterested) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Offers', 'action' => 'view', $offers->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Offers', 'action' => 'edit', $offers->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Offers', 'action' => 'delete', $offers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offers->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Reservations') ?></h4>
                <?php if (!empty($pmsproperty->reservations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('Property Id') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th><?= __('Type Id') ?></th>
                            <th><?= __('Source Id') ?></th>
                            <th><?= __('Developer Id') ?></th>
                            <th><?= __('Category Id') ?></th>
                            <th><?= __('Sellertype Id') ?></th>
                            <th><?= __('Seller Id') ?></th>
                            <th><?= __('Reservation Amount') ?></th>
                            <th><?= __('Reservation Price') ?></th>
                            <th><?= __('Reservation Currency') ?></th>
                            <th><?= __('Reservation Usdprice') ?></th>
                            <th><?= __('Reservation Paytype') ?></th>
                            <th><?= __('Reservation Downpayment Date') ?></th>
                            <th><?= __('Reservation Downpayment') ?></th>
                            <th><?= __('Reservation Isinvoice Sent') ?></th>
                            <th><?= __('Reservation Invoice Date') ?></th>
                            <th><?= __('Reservation Comission') ?></th>
                            <th><?= __('Reservation Usdcomission') ?></th>
                            <th><?= __('Reservation Details') ?></th>
                            <th><?= __('Stat Created') ?></th>
                            <th><?= __('Stat Updated') ?></th>
                            <th><?= __('Rec State') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($pmsproperty->reservations as $reservations) : ?>
                        <tr>
                            <td><?= h($reservations->id) ?></td>
                            <td><?= h($reservations->client_id) ?></td>
                            <td><?= h($reservations->property_id) ?></td>
                            <td><?= h($reservations->project_id) ?></td>
                            <td><?= h($reservations->type_id) ?></td>
                            <td><?= h($reservations->source_id) ?></td>
                            <td><?= h($reservations->developer_id) ?></td>
                            <td><?= h($reservations->category_id) ?></td>
                            <td><?= h($reservations->sellertype_id) ?></td>
                            <td><?= h($reservations->seller_id) ?></td>
                            <td><?= h($reservations->reservation_amount) ?></td>
                            <td><?= h($reservations->reservation_price) ?></td>
                            <td><?= h($reservations->reservation_currency) ?></td>
                            <td><?= h($reservations->reservation_usdprice) ?></td>
                            <td><?= h($reservations->reservation_paytype) ?></td>
                            <td><?= h($reservations->reservation_downpayment_date) ?></td>
                            <td><?= h($reservations->reservation_downpayment) ?></td>
                            <td><?= h($reservations->reservation_isinvoice_sent) ?></td>
                            <td><?= h($reservations->reservation_invoice_date) ?></td>
                            <td><?= h($reservations->reservation_comission) ?></td>
                            <td><?= h($reservations->reservation_usdcomission) ?></td>
                            <td><?= h($reservations->reservation_details) ?></td>
                            <td><?= h($reservations->stat_created) ?></td>
                            <td><?= h($reservations->stat_updated) ?></td>
                            <td><?= h($reservations->rec_state) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Reservations', 'action' => 'view', $reservations->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Reservations', 'action' => 'edit', $reservations->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reservations', 'action' => 'delete', $reservations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservations->id)]) ?>
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
