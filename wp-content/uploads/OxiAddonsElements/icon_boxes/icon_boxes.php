 <?php
if (!defined('ABSPATH')) {
    exit;
}

$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiimpport = '';
if (!empty($_GET['oxiimpport'])) {
    $oxiimpport = sanitize_text_field($_GET['oxiimpport']);
}

oxi_addons_user_capabilities();
OxiDataAdminImport($oxitype);
global $wpdb;
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_import = $wpdb->prefix . 'oxi_div_import';
$importstyle = $wpdb->get_results("SELECT * FROM $table_import WHERE type = '$oxitype' ORDER BY id DESC", ARRAY_A);
$freeimport = array('style-1', 'style-2', 'style-3');
if (count($importstyle) < 1) {
    foreach ($freeimport as $value) {
        $wpdb->query($wpdb->prepare("INSERT INTO {$table_import} (type, name) VALUES (%s, %s )", array($oxitype, $value)));
    }
    $js = 'location.reload();';
    wp_add_inline_script('oxi-addons-vendor', $js);
}
$file = array(
    'Style 1OXIIMPORTicon_boxesOXIIMPORTstyle-1OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddIconBoxes-width|300|300|300|||||OxiAddIconBoxes-body|rgba(15,140,189,1.00)|||OxiAddIconBoxes-border-top |0|0|0|OxiAddIconBoxes-border-bottom |0|0|0|OxiAddIconBoxes-border-left |0|0|0|OxiAddIconBoxes-border-right |0|0|0|OxiAddIconBoxes-border |solid|#fd3387||OxiAddIconBoxes-radius-top |0|0|0|OxiAddIconBoxes-radius-bottom |0|0|0|OxiAddIconBoxes-radius-left |0|0|0|OxiAddIconBoxes-radius-right |0|0|0|OxiAddIconBoxes-padding-top |20|20|20|OxiAddIconBoxes-padding-bottom |20|20|20|OxiAddIconBoxes-padding-left |10|10|10|OxiAddIconBoxes-padding-right |10|10|10|OxiAddIconBoxes-margin-top |10|10|10|OxiAddIconBoxes-margin-bottom |10|10|10|OxiAddIconBoxes-margin-left |10|10|10|OxiAddIconBoxes-margin-right |10|10|10|OxiAddIconBoxes-box-shadow |rgba(194, 194, 194, 0.58)|0|5|10|0|OxiAddIconBoxes-animation||2|0//|OxiAddIconBoxes-icon-size|50|50|50| OxiAddIconBoxes-icon-color |#ffffff| OxiAddIconBoxes-icon-align |center|OxiAddIconBoxes-icon-padding-top |5|5|5|OxiAddIconBoxes-icon-padding-bottom |5|5|5|OxiAddIconBoxes-icon-padding-left |5|5|5|OxiAddIconBoxes-icon-padding-right |5|5|5|OxiAddIconBoxes-heading-size|20|20|20| OxiAddIconBoxes-heading-color |#ffffff|OxiAddIconBoxes-heading-family |Open+Sans|600|OxiAddIconBoxes-heading-style |normal:1.3|center|OxiAddIconBoxes-heading-padding-top |5|5|5|OxiAddIconBoxes-heading-padding-bottom |5|5|5|OxiAddIconBoxes-heading-padding-left |5|5|5|OxiAddIconBoxes-heading-padding-right |5|5|5|OxiAddIconBoxes-content-size|15|15|15| OxiAddIconBoxes-content-color |#ffffff|OxiAddIconBoxes-content-family |Open+Sans|300|OxiAddIconBoxes-content-style |normal:1.3|center|OxiAddIconBoxes-content-padding-top |5|5|5|OxiAddIconBoxes-content-padding-bottom |5|5|5|OxiAddIconBoxes-content-padding-left |5|5|5|OxiAddIconBoxes-content-padding-right |5|5|5|OxiAddIconBoxes-icon-animation||2|0//infinite| OxiAddIconBoxes-Tab||OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-2|oxi-addons-xs-col-1|||#|| ||#|||##OXISTYLE##OxiAddIconBoxes-icon-class ||#||fab fa-algolia||#||OxiAddIconBoxes-heading-text ||#||Default Title||#||OxiAddIconBoxes-content ||#||Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit.||#||OxiAddIconBoxes-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##OxiAddIconBoxes-icon-class ||#||fas fa-apple-alt||#||OxiAddIconBoxes-heading-text ||#||Defalt Title||#||OxiAddIconBoxes-content ||#||Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit.||#||OxiAddIconBoxes-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##OxiAddIconBoxes-icon-class ||#||fas fa-arrow-circle-down||#||OxiAddIconBoxes-heading-text ||#||Defalt Title||#||OxiAddIconBoxes-content ||#||Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit.||#||OxiAddIconBoxes-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##',
    'Style 2OXIIMPORTicon_boxesOXIIMPORTstyle-2OXIIMPORToxi-addons-preview-BG |rgba(235,249,255,1.00)|OxiAddIconBoxes-width|275|275|275|||||OxiAddIconBoxes-body|linear-gradient(45deg, rgba(255,41,41,1) 2%,rgba(240,188,0,0.84) 100%)|||OxiAddIconBoxes-border-top |0|0|0|OxiAddIconBoxes-border-bottom |0|0|0|OxiAddIconBoxes-border-left |0|0|0|OxiAddIconBoxes-border-right |0|0|0|OxiAddIconBoxes-border |solid|#fd3387||OxiAddIconBoxes-radius-top |0|0|0|OxiAddIconBoxes-radius-bottom |0|0|0|OxiAddIconBoxes-radius-left |0|0|0|OxiAddIconBoxes-radius-right |0|0|0|OxiAddIconBoxes-padding-top |0|20|20|OxiAddIconBoxes-padding-bottom |20|20|20|OxiAddIconBoxes-padding-left |10|10|10|OxiAddIconBoxes-padding-right |10|10|10|OxiAddIconBoxes-margin-top |10|10|10|OxiAddIconBoxes-margin-bottom |10|10|10|OxiAddIconBoxes-margin-left |10|10|10|OxiAddIconBoxes-margin-right |10|10|10|OxiAddIconBoxes-box-shadow |rgba(163, 163, 163, 1)|0|5|17|0|OxiAddIconBoxes-animation||2|0//|OxiAddIconBoxes-icon-size|30|30|30| OxiAddIconBoxes-icon-color |#f77c18| OxiAddIconBoxes-icon-align |center|OxiAddIconBoxes-icon-border-top |0|0|0|OxiAddIconBoxes-icon-border-bottom |0|0|0|OxiAddIconBoxes-icon-border-left |0|0|0|OxiAddIconBoxes-icon-border-right |0|0|0|OxiAddIconBoxes-heading-size|22|22|22| OxiAddIconBoxes-heading-color |#ffffff|OxiAddIconBoxes-heading-family |Open+Sans|600|OxiAddIconBoxes-heading-style |normal:1.3|left:0()0()0()rgba(255, 255, 255, 0)|OxiAddIconBoxes-heading-padding-top |10|10|10|OxiAddIconBoxes-heading-padding-bottom |10|10|10|OxiAddIconBoxes-heading-padding-left |5|5|5|OxiAddIconBoxes-heading-padding-right |10|10|10|OxiAddIconBoxes-content-size|14|14|14| OxiAddIconBoxes-content-color |#ffffff|OxiAddIconBoxes-content-family |Open+Sans|500|OxiAddIconBoxes-content-style |normal:1.3|left:0()0()0()rgba(255, 255, 255, 0)|OxiAddIconBoxes-content-padding-top |5|5|5|OxiAddIconBoxes-content-padding-bottom |5|5|5|OxiAddIconBoxes-content-padding-left |5|5|5|OxiAddIconBoxes-content-padding-right |11|11|11|OxiAddIconBoxes-icon-animation||2|0//infinite| OxiAddIconBoxes-icon-bgcolor |rgba(255,255,255,1.00)|OxiAddIconBoxes-icon-width|70|70|70|OxiAddIconBoxes-icon-border |solid|#ffffff||OxiAddIconBoxes-icon-radius-top |0|2|0|OxiAddIconBoxes-icon-radius-bottom |0|2|0|OxiAddIconBoxes-icon-radius-left |0|2|0|OxiAddIconBoxes-icon-radius-right |0|2|0| OxiAddIconBoxes-Tab||OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-2|oxi-addons-xs-col-1|||#|| ||#|||##OXISTYLE##OxiAddIconBoxes-icon-class ||#||fab fa-affiliatetheme||#||OxiAddIconBoxes-heading-text ||#||Default Title||#||OxiAddIconBoxes-content ||#||Now there???s really no need to purchase and overload your WordPress website with another plugin! Supreme Shortcodes introduce a brand new shortcode for your collection, Icon Boxes!||#||OxiAddIconBoxes-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##OxiAddIconBoxes-icon-class ||#||fa fa-flag||#||OxiAddIconBoxes-heading-text ||#||Default Title||#||OxiAddIconBoxes-content ||#||Now there???s really no need to purchase and overload your WordPress website with another plugin! Supreme Shortcodes introduce a brand new shortcode for your collection, Icon Boxes!||#||OxiAddIconBoxes-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##OxiAddIconBoxes-icon-class ||#||fab fa-algolia||#||OxiAddIconBoxes-heading-text ||#||Default Title||#||OxiAddIconBoxes-content ||#||Now there???s really no need to purchase and overload your WordPress website with another plugin! Supreme Shortcodes introduce a brand new shortcode for your collection, Icon Boxes!||#||OxiAddIconBoxes-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##',
    'Style 3OXIIMPORTicon_boxesOXIIMPORTstyle-3OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAddIconBoxes-width|280|280|280|||||OxiAddIconBoxes-body|rgba(8,132,138,1.00)|||OxiAddIconBoxes-border-top |0|0|0|OxiAddIconBoxes-border-bottom |0|0|0|OxiAddIconBoxes-border-left |0|0|0|OxiAddIconBoxes-border-right |0|0|0|OxiAddIconBoxes-border |solid|#fd3387||OxiAddIconBoxes-radius-top |0|0|0|OxiAddIconBoxes-radius-bottom |0|0|0|OxiAddIconBoxes-radius-left |0|0|0|OxiAddIconBoxes-radius-right |0|0|0|OxiAddIconBoxes-padding-top |20|20|20|OxiAddIconBoxes-padding-bottom |20|20|20|OxiAddIconBoxes-padding-left |10|10|10|OxiAddIconBoxes-padding-right |10|10|10|OxiAddIconBoxes-margin-top |10|10|10|OxiAddIconBoxes-margin-bottom |10|10|10|OxiAddIconBoxes-margin-left |10|10|10|OxiAddIconBoxes-margin-right |10|10|10|OxiAddIconBoxes-box-shadow |rgba(219, 219, 219, 0.73)|0|5|10|0|OxiAddIconBoxes-animation||2|0//|OxiAddIconBoxes-icon-size|30|30|30| OxiAddIconBoxes-icon-color |#ffffff| OxiAddIconBoxes-icon-align |center|OxiAddIconBoxes-icon-border-top |6|6|6|OxiAddIconBoxes-icon-border-bottom |6|6|6|OxiAddIconBoxes-icon-border-left |6|6|6|OxiAddIconBoxes-icon-border-right |6|6|6|OxiAddIconBoxes-heading-size|22|22|22| OxiAddIconBoxes-heading-color |#ffffff|OxiAddIconBoxes-heading-family |Open+Sans|600|OxiAddIconBoxes-heading-style |normal:1.3|center:0()0()0()#ffffff|OxiAddIconBoxes-heading-padding-top |10|10|10|OxiAddIconBoxes-heading-padding-bottom |10|10|10|OxiAddIconBoxes-heading-padding-left |10|10|10|OxiAddIconBoxes-heading-padding-right |10|10|10|OxiAddIconBoxes-content-size|14|14|14| OxiAddIconBoxes-content-color |#ffffff|OxiAddIconBoxes-content-family |Open+Sans|300|OxiAddIconBoxes-content-style |normal:1.3|center:0()0()0()#ffffff|OxiAddIconBoxes-content-padding-top |5|5|5|OxiAddIconBoxes-content-padding-bottom |5|5|5|OxiAddIconBoxes-content-padding-left |10|10|10|OxiAddIconBoxes-content-padding-right |10|10|10|OxiAddIconBoxes-icon-animation||1|0.2//| ||OxiAddIconBoxes-icon-width|70|70|70|OxiAddIconBoxes-icon-border |double|#ffffff||OxiAddIconBoxes-icon-radius-top |70|70|70|OxiAddIconBoxes-icon-radius-bottom |70|70|70|OxiAddIconBoxes-icon-radius-left |70|70|70|OxiAddIconBoxes-icon-radius-right |70|70|70| OxiAddIconBoxes-Tab||OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-2|oxi-addons-xs-col-1|||#|| ||#|||##OXISTYLE##OxiAddIconBoxes-icon-class ||#||fas fa-briefcase-medical||#||OxiAddIconBoxes-heading-text ||#||Default Title||#||OxiAddIconBoxes-content ||#||Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit.||#||OxiAddIconBoxes-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##OxiAddIconBoxes-icon-class ||#||fas fa-atom||#||OxiAddIconBoxes-heading-text ||#||Default Title||#||OxiAddIconBoxes-content ||#||Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit.||#||OxiAddIconBoxes-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##OxiAddIconBoxes-icon-class ||#||fas fa-apple-alt||#||OxiAddIconBoxes-heading-text ||#||Default Title||#||OxiAddIconBoxes-content ||#||Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit.||#||OxiAddIconBoxes-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##',
    'Style 4OXIIMPORTicon_boxesOXIIMPORTstyle-4OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAddIconBoxes-width|275|275|275|||||OxiAddIconBoxes-body|rgba(255,255,255,1.00)|||OxiAddIconBoxes-border-top |0|0|0|OxiAddIconBoxes-border-bottom |0|0|0|OxiAddIconBoxes-border-left |0|0|0|OxiAddIconBoxes-border-right |0|0|0|OxiAddIconBoxes-border |solid|#fd3387||OxiAddIconBoxes-radius-top |10|10|10|OxiAddIconBoxes-radius-bottom |10|10|10|OxiAddIconBoxes-radius-left |10|10|10|OxiAddIconBoxes-radius-right |10|10|10|OxiAddIconBoxes-padding-top |20|20|20|OxiAddIconBoxes-padding-bottom |20|20|20|OxiAddIconBoxes-padding-left |10|10|10|OxiAddIconBoxes-padding-right |10|10|10|OxiAddIconBoxes-margin-top |20|20|20|OxiAddIconBoxes-margin-bottom |20|20|20|OxiAddIconBoxes-margin-left |20|20|20|OxiAddIconBoxes-margin-right |20|20|20|OxiAddIconBoxes-box-shadow |rgba(153, 153, 153, 1)|0|2|6|0|OxiAddIconBoxes-animation||2|0//|OxiAddIconBoxes-icon-size|30|30|30| OxiAddIconBoxes-icon-color |#ffffff| OxiAddIconBoxes-icon-align |center|OxiAddIconBoxes-icon-border-top |1|1|0|OxiAddIconBoxes-icon-border-bottom |1|1|0|OxiAddIconBoxes-icon-border-left |1|1|0|OxiAddIconBoxes-icon-border-right |1|1|0|OxiAddIconBoxes-heading-size|22|22|22| OxiAddIconBoxes-heading-color |#2f0696|OxiAddIconBoxes-heading-family |Open+Sans|600|OxiAddIconBoxes-heading-style |normal:1.3|center:0()0()0()#ffffff|OxiAddIconBoxes-heading-padding-top |5|5|5|OxiAddIconBoxes-heading-padding-bottom |5|5|5|OxiAddIconBoxes-heading-padding-left |5|5|5|OxiAddIconBoxes-heading-padding-right |5|5|5|OxiAddIconBoxes-content-size|14|14|14| OxiAddIconBoxes-content-color |#575757|OxiAddIconBoxes-content-family |Open+Sans|300|OxiAddIconBoxes-content-style |normal:1.3|center:0()0()0()#ffffff|OxiAddIconBoxes-content-padding-top |10|10|10|OxiAddIconBoxes-content-padding-bottom |10|10|10|OxiAddIconBoxes-content-padding-left |10|10|10|OxiAddIconBoxes-content-padding-right |10|10|10|OxiAddIconBoxes-icon-animation||2|0//| OxiAddIconBoxes-icon-bgcolor |rgba(47,6,150,1.00)|OxiAddIconBoxes-icon-width|70|70|70|OxiAddIconBoxes-icon-border |solid|#ffffff||OxiAddIconBoxes-icon-radius-top |50|2|0|OxiAddIconBoxes-icon-radius-bottom |50|2|0|OxiAddIconBoxes-icon-radius-left |50|2|0|OxiAddIconBoxes-icon-radius-right |50|2|0| OxiAddIconBoxes-Tab||OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-2|oxi-addons-xs-col-1|||#|| ||#|||##OXISTYLE##OxiAddIconBoxes-icon-class ||#||fas fa-download||#||OxiAddIconBoxes-heading-text ||#||Default Title||#||OxiAddIconBoxes-content ||#||Now there???s really no need to purchase and overload your WordPress website with another plugin! Shortcodes introduce a brand new shortcode for your collection, Icon Boxes!||#||OxiAddIconBoxes-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##OxiAddIconBoxes-icon-class ||#||fas fa-baseball-ball||#||OxiAddIconBoxes-heading-text ||#||Default Title||#||OxiAddIconBoxes-content ||#||Now there???s really no need to purchase and overload your WordPress website with another plugin! Shortcodes introduce a brand new shortcode for your collection, Icon Boxes!||#||OxiAddIconBoxes-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##OxiAddIconBoxes-icon-class ||#||fas fa-atom||#||OxiAddIconBoxes-heading-text ||#||Default Title||#||OxiAddIconBoxes-content ||#||Now there???s really no need to purchase and overload your WordPress website with another plugin! Shortcodes introduce a brand new shortcode for your collection, Icon Boxes!||#||OxiAddIconBoxes-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##',
    'Style 5OXIIMPORTicon_boxesOXIIMPORTstyle-5OXIIMPORToxi-addons-preview-BG |rgba(255,255,255,1.00)|OxiAddIconBoxes-width|300|300|300|OxiAddIconBoxes-height|250|250|250|OxiAddIconBoxes-body|rgba(255,255,255,1.00)|||OxiAddIconBoxes-border-top |4|4|4|OxiAddIconBoxes-border-bottom |4|4|4|OxiAddIconBoxes-border-left |4|4|4|OxiAddIconBoxes-border-right |4|4|4|OxiAddIconBoxes-border |double|#7619a8||OxiAddIconBoxes-radius-top |5|5|5|OxiAddIconBoxes-radius-bottom |5|5|5|OxiAddIconBoxes-radius-left |5|5|5|OxiAddIconBoxes-radius-right |5|5|5|OxiAddIconBoxes-padding-top |20|20|20|OxiAddIconBoxes-padding-bottom |20|20|20|OxiAddIconBoxes-padding-left |10|10|10|OxiAddIconBoxes-padding-right |10|10|10|OxiAddIconBoxes-margin-top |40|40|40|OxiAddIconBoxes-margin-bottom |10|10|10|OxiAddIconBoxes-margin-left |10|10|10|OxiAddIconBoxes-margin-right |10|10|10|OxiAddIconBoxes-box-shadow |rgba(0, 0, 0, 0.06)|0|23|33|0|OxiAddIconBoxes-animation||2|0//|OxiAddIconBoxes-icon-size|35|35|35| OxiAddIconBoxes-icon-color |#ffffff| OxiAddIconBoxes-icon-align |center|OxiAddIconBoxes-icon-border-top |1|1|1|OxiAddIconBoxes-icon-border-bottom |1|1|1|OxiAddIconBoxes-icon-border-left |1|1|1|OxiAddIconBoxes-icon-border-right |1|1|1|OxiAddIconBoxes-heading-size|22|22|22| OxiAddIconBoxes-heading-color |#000000|OxiAddIconBoxes-heading-family |Open+Sans|600|OxiAddIconBoxes-heading-style |normal:1.3|center|OxiAddIconBoxes-heading-padding-top |10|10|10|OxiAddIconBoxes-heading-padding-bottom |5|5|5|OxiAddIconBoxes-heading-padding-left |5|5|5|OxiAddIconBoxes-heading-padding-right |5|5|5|OxiAddIconBoxes-content-size|16|16|16| OxiAddIconBoxes-content-color |#6b6b6b|OxiAddIconBoxes-content-family |Open+Sans|300|OxiAddIconBoxes-content-style |normal:1.3|center|OxiAddIconBoxes-content-padding-top |10|10|10|OxiAddIconBoxes-content-padding-bottom |10|10|10|OxiAddIconBoxes-content-padding-left |10|10|10|OxiAddIconBoxes-content-padding-right |10|10|10|OxiAddIconBoxes-icon-animation||2|0//infinite| OxiAddIconBoxes-icon-bgcolor |rgba(118,25,168,1.00)|OxiAddIconBoxes-icon-width|80|50|35|OxiAddIconBoxes-icon-border |solid|#ffffff||OxiAddIconBoxes-icon-radius-top |10|10|10|OxiAddIconBoxes-icon-radius-bottom |10|10|10|OxiAddIconBoxes-icon-radius-left |10|10|10|OxiAddIconBoxes-icon-radius-right |10|10|10| OxiAddIconBoxes-Tab||OxiAddIconBoxes-rows |oxi-addons-lg-col-3|oxi-addons-md-col-2|oxi-addons-xs-col-1|||#|| ||#|||##OXISTYLE##OxiAddIconBoxes-icon-class ||#||fab fa-facebook||#||OxiAddIconBoxes-heading-text ||#||Default Title||#||OxiAddIconBoxes-content ||#||Cras sagittis. Vivamus in erat urna cursus vestibulum. Vestibulum rutrum, mi nec elementum vehiculaid fringilla.||#||OxiAddIconBoxes-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##OxiAddIconBoxes-icon-class ||#||fas fa-baseball-ball||#||OxiAddIconBoxes-heading-text ||#||Default Title||#||OxiAddIconBoxes-content ||#||Cras sagittis. Vivamus in erat urna cursus vestibulum. Vestibulum rutrum, mi nec elementum vehiculaid fringilla.||#||OxiAddIconBoxes-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##OxiAddIconBoxes-icon-class ||#||fas fa-baseball-ball||#||OxiAddIconBoxes-heading-text ||#||Default Title||#||OxiAddIconBoxes-content ||#||Cras sagittis. Vivamus in erat urna cursus vestibulum. Vestibulum rutrum, mi nec elementum vehiculaid fringilla.||#||OxiAddIconBoxes-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##',
    'Style 6OXIIMPORTicon_boxesOXIIMPORTstyle-6OXIIMPORToxi-addons-preview-BG |rgba(255, 255, 255, 1)|OxiAddIconBoxes-width|250|250|250|OxiAddIconBoxes-height|250|250|250|OxiAddIconBoxes-body|rgba(255,255,255,1.00)|||OxiAddIconBoxes-border-top |0|0|0|OxiAddIconBoxes-border-bottom |0|0|0|OxiAddIconBoxes-border-left |0|0|0|OxiAddIconBoxes-border-right |0|0|0|OxiAddIconBoxes-border |solid|#fd3387||OxiAddIconBoxes-radius-top |0|0|0|OxiAddIconBoxes-radius-bottom |0|0|0|OxiAddIconBoxes-radius-left |0|0|0|OxiAddIconBoxes-radius-right |0|0|0|OxiAddIconBoxes-padding-top |20|20|20|OxiAddIconBoxes-padding-bottom |20|20|20|OxiAddIconBoxes-padding-left |20|20|20|OxiAddIconBoxes-padding-right |20|20|20|OxiAddIconBoxes-margin-top |15|6|6|OxiAddIconBoxes-margin-bottom |15|6|6|OxiAddIconBoxes-margin-left |10|6|6|OxiAddIconBoxes-margin-right |10|6|6|OxiAddIconBoxes-box-shadow |rgba(219, 219, 219, 1)|0|8|15|0|OxiAddIconBoxes-animation||2|0//|OxiAddIconBoxes-icon-size|35|35|35| OxiAddIconBoxes-icon-color |#7c00b5|OxiAddIconBoxes-icon-padding-top |5|5|5|OxiAddIconBoxes-icon-padding-bottom |5|5|5|OxiAddIconBoxes-icon-padding-left |5|5|5|OxiAddIconBoxes-icon-padding-right |5|5|5|OxiAddIconBoxes-icon-animation|||22//|OxiAddIconBoxes-heading-size|18|18|18| OxiAddIconBoxes-heading-color |#757575|OxiAddIconBoxes-heading-family |Nanum+Gothic|normal|OxiAddIconBoxes-heading-style |normal:1.3|center:0()0()0()#ffffff|OxiAddIconBoxes-heading-padding-top |5|0|5|OxiAddIconBoxes-heading-padding-bottom |5|0|5|OxiAddIconBoxes-heading-padding-left |5|0|5|OxiAddIconBoxes-heading-padding-right |5|0|16|OxiAddIconBoxes-hover-body|rgba(240,240,240,1.00)|||OxiAddIconBoxes-hover-border |dotted|#330000||OxiAddIconBoxes-hover-box-shadow |rgba(219, 219, 219, 0.75)|0|10|20|5| OxiAddIconBoxes-icon-hover-color |#b5009d| OxiAddIconBoxes-heading-hover-color |#757575|OxiAddIconBoxes-rows |oxi-addons-lg-col-4|oxi-addons-md-col-3|oxi-addons-xs-col-1| OxiAddIconBoxes-Tab|_blank|OxiAddPR-TC-Serial|icon,title||##OXISTYLE##OxiAddIconBoxes-icon-title||#||Content Boxes||#||OxiAddIconBoxes-Icon-Class||#||fas fa-tablets||#||OxiAddIconBoxes-Icon-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##OxiAddIconBoxes-icon-title||#||Food Menu||#||OxiAddIconBoxes-Icon-Class||#||fas fa-th-large||#||OxiAddIconBoxes-Icon-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##OxiAddIconBoxes-icon-title||#||Smooth Scrolling||#||OxiAddIconBoxes-Icon-Class||#||fas fa-exclamation-circle||#||OxiAddIconBoxes-Icon-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##OxiAddIconBoxes-icon-title||#||Social Icons||#||OxiAddIconBoxes-Icon-Class||#||fab fa-stumbleupon||#||OxiAddIconBoxes-Icon-link||#||#||#|| ||#|| ||#|| ||#||##OXIDATA##',
    'Style 7OXIIMPORTicon_boxesOXIIMPORTstyle-7OXIIMPORToxi-addons-preview-BG || || OxiAddonsEW-G-MW |450|OxiAddonsEW-G-P-top |30|30|30|OxiAddonsEW-G-P-bottom |30|30|30|OxiAddonsEW-G-P-left |30|30|30|OxiAddonsEW-G-P-right |30|30|30|OxiAddonsEW-G-M-top |8|8|8|OxiAddonsEW-G-M-bottom |8|8|8|OxiAddonsEW-G-M-left |20|20|20|OxiAddonsEW-G-M-right |8|8|8|OxiAddonsEW-G-BS |rgba(219, 216, 216, 1)|0|0|1|1| OxiAddonsEW-BP-BG |#ef3938| OxiAddonsEW-BP-TC |#ffffff|OxiAddonsEW-BP-P-top |0|5|5|OxiAddonsEW-BP-P-bottom |18|18|18|OxiAddonsEW-BP-P-left |0|0|0|OxiAddonsEW-BP-P-right |45|45|45|OxiAddonsEW-BP-FS |23|23|23|||||||||||||OxiAddonsEW-BH-F-family |Nunito|100|OxiAddonsEW-BH-F-style |normal:1.3|left:0()0()0()#ffffff:1| OxiAddonsEW-BH-TC |#4d4d4d|OxiAddonsEW-BH-FS |18|18|18|OxiAddonsEW-BH-P-top |0|0|0|OxiAddonsEW-BH-P-bottom |8|8|8|OxiAddonsEW-BH-P-left |0|0|0|OxiAddonsEW-BH-P-right |0|0|0| OxiAddonsEW-SD-TC |#4d4d4d|OxiAddonsEW-SD-FS |16|16|16|OxiAddonsEW-SD-F-family |Nunito+Sans|normal|OxiAddonsEW-SD-F-style |normal:1.3|left:0()0()0()#ffffff:.5|OxiAddonsEW-SD-P-top |0|0|0|OxiAddonsEW-SD-P-bottom |0|0|0|OxiAddonsEW-SD-P-left |0|0|0|OxiAddonsEW-SD-P-right |0|0|0| OxiAddonsEW-BP-PS |right| OxiAddonsEW-animation||2:false:false:500:10:0.2|0//||OxiAddonsEW-G-rows |oxi-addons-lg-col-3|oxi-addons-md-col-1|oxi-addons-xs-col-1|OxiAddonsEW-G-3-BG|rgba(255, 255, 255, 1)||||OxiAddonsEW-BP-RO |-45|-45||||#|| ||#||##OXISTYLE##||#||OxiAddonsEW-BP-TB ||#||fas fa-car||#|| OxiAddonsEW-BH ||#||BATTERY CHANGE||#|| OxiAddonsEW-SD ||#||Tell us What your car needs or ask for a diagnostic. Recieive a free, fast, fair & transparent price quote||#||##OXIDATA##||#||OxiAddonsEW-BP-TB ||#||fas fa-cart-plus||#|| OxiAddonsEW-BH ||#||BATTERY CHANGE||#|| OxiAddonsEW-SD ||#||Tell us What your car needs or ask for a diagnostic. Recieive a free, fast, fair & transparent price quote||#||##OXIDATA##||#||OxiAddonsEW-BP-TB ||#||fab fa-500px||#|| OxiAddonsEW-BH ||#||BATTERY CHANGE||#|| OxiAddonsEW-SD ||#||Tell us What your car needs or ask for a diagnostic. Recieive a free, fast, fair & transparent price quote||#||##OXIDATA##',
);
if ($oxiimpport == 'import') {
    ?>
    <div class="wrap">
        <?php
        echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes');
        echo '<div class="oxi-addons-wrapper">
                <div class="oxi-addons-row">
                    <div class="oxi-addons-view-more-demo" style=" padding-top: 35px; padding-bottom: 35px; ">
                        <div class="oxi-addons-view-more-demo-data" >
                            <div class="oxi-addons-view-more-demo-icon">
                                <i class="fas fa-bullhorn oxi-icons"></i>
                            </div>
                            <div class="oxi-addons-view-more-demo-text">
                                <div class="oxi-addons-view-more-demo-heading">
                                    More Layouts
                                </div>
                                <div class="oxi-addons-view-more-demo-content">
                                    Thank you for using Shortcode Addons. As limitation of viewing Layouts or Design we added some layouts. Kindly check more  <a target="_blank" href="https://www.oxilab.org/shortcode-addons-features/' . str_replace('_', '-', $oxitype) . '" >' . oxi_addons_shortcode_name_converter($oxitype) . '</a> design from Oxilab.org. Copy <strong>export</strong> code and <strong>import</strong> it, get your preferable layouts.
                                </div>
                            </div>
                            <div class="oxi-addons-view-more-demo-button">
                                <a target="_blank" class="oxi-addons-more-layouts" href="https://www.oxilab.org/shortcode-addons-features/' . str_replace('_', '-', $oxitype) . '" >View layouts</a>
                            </div>
                        </div>
                    </div>
                </div>
           </div>';
        ?>

        <div class="oxi-addons-wrapper">
            <div class="oxi-addons-row">
                <?php
                foreach ($file as $value) {
                    $expludedata = explode('OXIIMPORT', $value);
                    $datatrue = '';
                    foreach ($importstyle as $vals) {
                        if ($vals['name'] == $expludedata[2]) {
                            $datatrue = 'true';
                        }
                    }
                    if ($datatrue != 'true') {
                        $number = rand();
                        echo '<div class="oxi-addons-col-1"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';
                        echo OxiDataAdminShortcode($oxitype, $value);
                        echo '</div>
                         <div class="oxi-addons-style-preview-bottom">
                            <div class="oxi-addons-style-preview-bottom-left">';
                        echo OxiDataAdminShortcodeName($value);
                        echo '       </div>';
                        echo '  <div class="oxi-addons-style-preview-bottom-right">
                                    <form method="post" style=" display: inline-block; ">
                                        ' . wp_nonce_field("oxi-addons-$expludedata[1]-style-active-nonce") . '
                                        <input type="hidden" name="oxiactivestyle" value="' . $expludedata[2] . '">
                                        <button class="btn btn-success" title="Active"  type="submit" value="Active" name="addonsstyleactive">Import Style</button>  
                                    </form> 
                                </div>';
                        echo '            </div>
                   </div>
                </div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

<?php
} else {
    $data = $wpdb->get_results("SELECT * FROM $table_name WHERE type = '$oxitype' ORDER BY id DESC", ARRAY_A);
    ?>
    <div class="wrap">
        <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
        <?php echo OxiAddonsAdmAdminShortcodeTable($data, $oxitype); ?>
        <div class="oxi-addons-wrapper">
            <div class="oxi-addons-row">
                <?php
                foreach ($file as $value) {
                    $expludedata = explode('OXIIMPORT', $value);
                    $datatrue = '';
                    foreach ($importstyle as $vals) {
                        if ($vals['name'] == $expludedata[2]) {
                            $datatrue = 'true';
                        }
                    }
                    if ($datatrue == 'true') {
                        $number = rand();
                        echo '<div class="oxi-addons-col-1" id="' . $expludedata[2] . '"><div class="oxi-addons-style-preview"><div class="oxi-addons-style-preview-top oxi-addons-center">';
                        echo OxiDataAdminShortcode($oxitype, $value);
                        echo '</div>
                         <div class="oxi-addons-style-preview-bottom">
                            <div class="oxi-addons-style-preview-bottom-left">';
                        echo OxiDataAdminShortcodeName($value);
                        echo '       </div>';
                        echo OxiDataAdminShortcodeControl($number, $value, $freeimport);
                        echo '            </div>
                   </div>
                </div>';
                    }
                }
                ?>
                <div class="oxi-addons-col-1 oxi-import">
                    <div class="oxi-addons-style-preview">
                        <div class="oxilab-admin-style-preview-top">
                            <a href="<?php echo admin_url("admin.php?page=oxi-addons&oxitype=$oxitype&oxiimpport=import"); ?>">
                                <div class="oxilab-admin-add-new-item">
                                    <span>
                                        <i class="fas fa-plus-circle oxi-icons"></i>
                                        Add More Templates
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    echo OxiDataAdminShortcodeModal($oxitype);
}
