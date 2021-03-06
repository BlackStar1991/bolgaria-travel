<?php
if(getenv('WPAE_DEV')) {
    wp_enqueue_script('pmxe-angular-app', PMXE_ROOT_URL . '/dist/app.js', array('jquery'), PMXE_VERSION);
} else {
    wp_enqueue_script('pmxe-angular-app', PMXE_ROOT_URL . '/dist/app.min.js', array('jquery'), PMXE_VERSION);
}
wp_enqueue_style('pmxe-angular-scss', PMXE_ROOT_URL . '/dist/styles.css', array(), PMXE_VERSION);

$productAttributesJson = empty(XmlExportEngine::$globalAvailableSections['product_data']['additional']['attributes']['meta']) ? '' : json_encode(XmlExportEngine::$globalAvailableSections['product_data']['additional']['attributes']['meta']);

if(getenv('WPAE_DEV')) {
    wp_enqueue_script('pmxe-livereload', '//localhost:35729/livereload.js', array(), '3', true);
}
?>
<script type="text/javascript">
    var wpae_product_attributes = <?php echo empty($productAttributesJson) ? '""' : $productAttributesJson; ?>;
</script>
<div ng-app="GoogleMerchants" ng-controller="mainController" ng-init="init('<?php if (class_exists("WooCommerce")) echo get_woocommerce_currency_symbol(); ?>', '<?php if (class_exists("WooCommerce")) echo  get_woocommerce_currency();?>')" class="googleMerchants" id="googleMerchants">
    <?php
    if ($post['xml_template_type'] == XmlExportEngine::EXPORT_TYPE_GOOLE_MERCHANTS && $post['export_to'] == XmlExportEngine::EXPORT_TYPE_XML) {
        ?>
        <span ng-init="selectGoogleMerchantsInitially()"></span>
    <?php
    }
    ?>
    <div ng-slide-down="isGoogleMerchantExport" duration="0.5">
        <basic-information information="merchantsFeedData.basicInformation"></basic-information>
        <availability-price information="merchantsFeedData.availabilityPrice"></availability-price>
        <product-categories information="merchantsFeedData.productCategories"></product-categories>
        <unique-identifiers information="merchantsFeedData.uniqueIdentifiers"></unique-identifiers>
        <detailed-information information="merchantsFeedData.detailedInformation"></detailed-information>
        <shipping information="merchantsFeedData.shipping"></shipping>
        <advanced-attributes information="merchantsFeedData.advancedAttributes"></advanced-attributes>
    </div>
</div>