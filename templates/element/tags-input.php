
<?

?>


<tags-input 
    class="wb-txt-inp" 
    tag-class="{even: $index % 2 == 0, odd: $index % 2 != 0}"
    ng-model="rec.client.country" 
    add-from-autocomplete-only="true" 
    max-tags="1" 
    placeholder="<?= __('adrs_country') ?>" 
    display-property="text"
    key-property="value"
    ng-disabled="rec.client.country || rec.client.id"
    ng-style="{'background-color': rec.client.country || rec.client.id ? '#eeeeee' : 'initial'}"
    
>
    <auto-complete min-length="1" highlightMatchedText="true" source="loadTags($query, 'addresses', '0')"></auto-complete>
</tags-input>