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
            <?= $this->Html->link(__('List Pmsproperties'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pmsproperties form content">
            <?= $this->Form->create($pmsproperty) ?>
            <fieldset>
                <legend><?= __('Add Pmsproperty') ?></legend>
                <?php
                    echo $this->Form->control('slug');
                    echo $this->Form->control('language_id');
                    echo $this->Form->control('category_id');
                    echo $this->Form->control('user_id');
                    echo $this->Form->control('developer_id');
                    echo $this->Form->control('project_id');
                    echo $this->Form->control('seller_id');
                    echo $this->Form->control('features_ids');
                    echo $this->Form->control('tags_ids');
                    echo $this->Form->control('property_title');
                    echo $this->Form->control('property_desc');
                    echo $this->Form->control('property_photos');
                    echo $this->Form->control('property_videos');
                    echo $this->Form->control('property_price');
                    echo $this->Form->control('property_oldprice');
                    echo $this->Form->control('property_currency');
                    echo $this->Form->control('property_loc');
                    echo $this->Form->control('property_ref');
                    echo $this->Form->control('property_usp');
                    echo $this->Form->control('param_issold');
                    echo $this->Form->control('property_isfeatured');
                    echo $this->Form->control('property_isindexed');
                    echo $this->Form->control('adrs_country');
                    echo $this->Form->control('adrs_city');
                    echo $this->Form->control('adrs_region');
                    echo $this->Form->control('adrs_district');
                    echo $this->Form->control('adrs_street');
                    echo $this->Form->control('adrs_block');
                    echo $this->Form->control('adrs_no');
                    echo $this->Form->control('param_netspace');
                    echo $this->Form->control('param_grossspace');
                    echo $this->Form->control('param_rooms');
                    echo $this->Form->control('param_bedrooms');
                    echo $this->Form->control('param_buildage');
                    echo $this->Form->control('param_floors');
                    echo $this->Form->control('param_floor');
                    echo $this->Form->control('param_heat');
                    echo $this->Form->control('param_bathrooms');
                    echo $this->Form->control('param_balconies');
                    echo $this->Form->control('param_isfurnitured');
                    echo $this->Form->control('param_isresale');
                    echo $this->Form->control('param_iscitizenship');
                    echo $this->Form->control('param_isresidence');
                    echo $this->Form->control('param_iscommission_included');
                    echo $this->Form->control('param_ispublished');
                    echo $this->Form->control('param_titledeed');
                    echo $this->Form->control('param_usestatus');
                    echo $this->Form->control('param_monthlytax');
                    echo $this->Form->control('param_payment');
                    echo $this->Form->control('param_ownership');
                    echo $this->Form->control('param_ownertype');
                    echo $this->Form->control('param_deposit');
                    echo $this->Form->control('param_delivertype');
                    echo $this->Form->control('param_deliverdate', ['empty' => true]);
                    echo $this->Form->control('seo_title');
                    echo $this->Form->control('seo_keywords');
                    echo $this->Form->control('seo_desc');
                    echo $this->Form->control('stat_created');
                    echo $this->Form->control('stat_updated', ['empty' => true]);
                    echo $this->Form->control('stat_views');
                    echo $this->Form->control('stat_shares');
                    echo $this->Form->control('rec_state');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
