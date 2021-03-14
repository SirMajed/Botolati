<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();

/**
 * Home Page
 * Shortcode Addons home page
 */
if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}
$oxitype = 'oxi-addons';
$directory = OxiAddonsElements;
if (!function_exists('is_plugin_active')) {
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
if (!empty($_POST['OxiElementsDLT']) && $_POST['OxiElementsDLT'] == 'Delete') {
    if (!wp_verify_nonce($nonce, 'Oxi-Addons-Delete-Elements-Nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $folder = sanitize_text_field($_POST['OXIAddonsElements']);
        if ($folder != 'user_control') {
            $target_folder = OxiAddonsElements . $folder . '/';
            WP_Filesystem();
            global $wp_filesystem;
            $wp_filesystem->rmdir($target_folder, true);
        }
    }
}

/**
 * Adding more elements with custom slug
 */
$DIRfiles = glob($directory . '*', GLOB_ONLYDIR);
$importdata = $catarray = $catnewdata = Array();
foreach ($DIRfiles as $value) {
    $file = explode('/OxiAddonsElements/', $value);
    if (!empty($value)) {
        if (!empty($value) && count($file) == 2) {
            $vs = array('1.5', 'Custom Elements', false);
            if (file_exists(OxiAddonsElements . $file[1] . '/version.php')) {
                $version = include_once OxiAddonsElements . $file[1] . '/version.php';
                if (is_array($version)) {
                    if (count($version) == 3 && $version[2] == true) {
                        $vs = $version;
                    }
                }
            }
            $catarray[$vs[1]] = $vs[1];

            $importdata[$vs[1]][$file[1]] = array(
                'type' => 'oxi-addons',
                'name' => $file[1],
                'homepage' => $file[1],
                'slug' => 'oxi-addons',
                'version' => $vs[0],
                'control' => $vs[2]
            );
        }
    }
}
ksort($importdata);
$array1 = array(
    'Content Elements' => 'Content Elements',
    'Creative Elements' => 'Creative Elements',
    'Marketing Elements' => 'Marketing Elements',
    'Dynamic Contents' => 'Dynamic Contents',
    'Image Effects' => 'Image Effects',
    'Social Elements' => 'Social Elements',
    'Form Contents' => 'Form Contents',
    'Extensions' => 'Extensions');

$margecat = array_merge($array1, $catarray);

foreach ($margecat as $value) {
    $catnewdata[$value] = (array_key_exists($value, $importdata) ? $importdata[$value] : array());
}
$versionvalid = 'version16';

if (get_option('oxiaddonsinitialinstallelements') != $versionvalid) {
    add_option('oxiaddonsinitialinstallelements', $versionvalid);
    echo '<form method="post" id="OxiAddonsElementsDataForm">
                <input type="hidden" id="OxiAddonsElementsData" name="OxiAddonsElementsData" value="Installing Data">
                 <input type="hidden" name="oxi-addons-admin-ajax-nonce" id="oxi-addons-admin-ajax-nonce" value="' . wp_create_nonce("oxi_addons_admin_ajax_nonce") . '"/>
          </form>';
    $css = '.oxi-addons-loading-wrap{
               position:absolute;
               width:100%;
               height:100%;
               left:0;
               top:0;
               background:#171d56;
               
             }
             .oxi-addons-pei-data{
               display: flex;
               width:100%;
               height:100%;
               flex-direction: column;
               justify-content: center;
               align-items: center;
               z-index: 1;
             }
               .oxi-addons-loading-wrap-content{
                    max-width: 700px;
                    padding: 10px 20px;
                    font-size: 20px;
                    color: #fff;
                    text-transform:capitalize;
                    z-index: 1;
                }
               
                .oxi-addons-loading-wrap-heading{
                    max-width: 700px;
                    padding: 10px 20px;
                    color: #fff;
                    font-size: 60px;
                    font-weight: 600;
                    line-height: 1;
                    -webkit-animation: bounce 2s infinite 0s;
                    -moz-animation: bounce 2s infinite 0s;
                    -o-animation: bounce 2s infinite 0s;
                    animation: bounce 2s infinite 0s;
                    -webkit-transition: opacity 2s ease-in-out 0s;
                    -moz-transition: opacity 2s ease-in-out 0s;
                    transition: opacity 2s ease-in-out 0s;
                }
                @-webkit-keyframes bounce {
                    from,
                    20%,
                    53%,
                    80%,
                    to {
                      -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
                      animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
                      -webkit-transform: translate3d(0, 0, 0);
                      transform: translate3d(0, 0, 0);
                    }

                    40%,
                    43% {
                      -webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
                      animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
                      -webkit-transform: translate3d(0, -30px, 0);
                      transform: translate3d(0, -30px, 0);
                    }

                    70% {
                      -webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
                      animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
                      -webkit-transform: translate3d(0, -15px, 0);
                      transform: translate3d(0, -15px, 0);
                    }

                    90% {
                      -webkit-transform: translate3d(0, -4px, 0);
                      transform: translate3d(0, -4px, 0);
                    }
                  }

                  @keyframes bounce {
                    from,
                    20%,
                    53%,
                    80%,
                    to {
                      -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
                      animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
                      -webkit-transform: translate3d(0, 0, 0);
                      transform: translate3d(0, 0, 0);
                    }

                    40%,
                    43% {
                      -webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
                      animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
                      -webkit-transform: translate3d(0, -30px, 0);
                      transform: translate3d(0, -30px, 0);
                    }

                    70% {
                      -webkit-animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
                      animation-timing-function: cubic-bezier(0.755, 0.05, 0.855, 0.06);
                      -webkit-transform: translate3d(0, -15px, 0);
                      transform: translate3d(0, -15px, 0);
                    }

                    90% {
                      -webkit-transform: translate3d(0, -4px, 0);
                      transform: translate3d(0, -4px, 0);
                    }
                  }

                  .bounce {
                    -webkit-animation-name: bounce;
                    animation-name: bounce;
                    -webkit-transform-origin: center bottom;
                    transform-origin: center bottom;
                  }
                  .oxi-addons-pei-chart{
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    left: 50%;
                    top: 50%;
                    transform:translate(-50%, -50%);
                    z-index:0;
                  }
                  .oxi-addons-pei-chart-wrap{
                    width: 0%; 
                    height: 100%;
                    position: absolute;
                    background: #F15540;
                    transition: width 1s;
                  }
                  ';
    wp_add_inline_style('oxi-addons-admin', $css);
    $modaldata = '<div class="oxi-addons-loading-wrap">
                      <div class="oxi-addons-pei-chart">
                            <div class="oxi-addons-pei-chart-wrap"></div>
                      </div>
                      <div class="oxi-addons-pei-data">
                            <div class="oxi-addons-loading-wrap-heading">Please Wait ..</div>
                            <div class="oxi-addons-loading-wrap-content">Elements Downloading</div>
                      </div>
                  </div>
                  ';


    $modaldata = preg_replace("/\r\n|\r|\n/", ' ', $modaldata);
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery("#wpwrap").append('<?php echo $modaldata; ?>');
        });
    </script>
    <?php
    update_option('oxiaddonsinitialinstallelements', $versionvalid);
} else if (count($DIRfiles) < 1) {
    $url = admin_url("admin.php?page=oxi-addons-import");
    echo '<script type="text/javascript"> document.location.href = "' . $url . '"; </script>';
    exit;
} else {
    $elementsapi = SHORTCODEADDONS\Shortcode_Remote::shortcode_get_instance()->categories_list();

    oxi_addons_font_familly('Bree+Serif');
    oxi_addons_font_familly('Source+Sans+Pro');
//    echo '<pre>';
//    print_r($importdata);
//    echo '</pre>';
    ?>
    <div class="wrap">   
        <!--- Admin Menu--->
        <?php
        echo OxiAddonsAdmAdminMenu($oxitype, '', 'other');
        echo '<input type="hidden" name="oxi-addons-admin-ajax-nonce" id="oxi-addons-admin-ajax-nonce" value="' . wp_create_nonce("oxi_addons_admin_ajax_nonce") . '"/>';
        ?>
        <div class="oxi-addons-wrapper">
            <div class="oxi-addons-wrapper">
                <input class="form-control" type="text" id='oxi_addons_search' placeholder="Search..">
                <?php
                foreach ($catnewdata as $key => $elements) {
                    $elementshtml = '';
                    $elementsnumber = 0;
                    asort($elements);
                    foreach ($elements as $value) {
                        $arraycheck = '';
                        $arraycheck = (array_key_exists($key, $elementsapi[0]) ? (array_key_exists($value['name'], $elementsapi[0][$key]) ? 'YES' : 'NAI') : 'NAI');
                        if ($value['control'] && $arraycheck == 'YES') {
                            if (version_compare(((float) $elementsapi[0][$key][$value['name']][1] - 0.1), $value['version'], '>')) {
                                $versiondata = ' <form method="post">
                                                    <input type="button" class="btn btn-info btn-sm text-right OxiElementsADD oxi-addons-home-button-bounce" name="OxiElementsADD" OXIAddonsElements="' . $value['name'] . '" value="Update">
                                                  </form>';
                            } else {
                                $versiondata = '<form method="post" class="OXIAddonsElementsDeleteSubmit">
                                                    <input type="hidden" id="OXIAddonsElements" name="OXIAddonsElements" value="' . $value['name'] . '">
                                                    <input type="submit" class="btn btn-outline-warning btn-sm text-right oxi-addons-addons-element-btn-warning " name="OxiElementsDLT" value="Delete">
                                                    ' . wp_nonce_field('Oxi-Addons-Delete-Elements-Nonce') . '
                                                </form>';
                            }
                        } else {
                            $versiondata = '<form method="post" class="OXIAddonsElementsDeleteSubmit">
                                                <input type="hidden" id="OXIAddonsElements" name="OXIAddonsElements" value="' . $value['name'] . '">
                                                <input type="submit" class="btn btn-outline-warning btn-sm text-right oxi-addons-addons-element-btn-warning " name="OxiElementsDLT" value="Delete">
                                                ' . wp_nonce_field('Oxi-Addons-Delete-Elements-Nonce') . '
                                            </form>';
                        }
                        $oxilink = 'admin.php?page=oxi-addons&oxitype=' . $value['homepage'];
                        $elementsnumber++;

                        $elementshtml .= ' <div class="oxi-addons-shortcode-import" id="' . $value['name'] . '" oxi-addons-search="' . $value['homepage'] . '">
                                                <a href="' . admin_url($oxilink) . '">
                                                    <div class="oxi-addons-shortcode-import-top">
                                                        ' . oxi_addons_admin_font_awesome('oxi-' . $value['homepage'] . '') . '
                                                    </div>
                                                </a>
                                                <div class="oxi-addons-shortcode-import-bottom">
                                                    <span>' . oxi_addons_shortcode_name_converter($value['name']) . '</span>
                                                    ' . $versiondata . '
                                                </div>
                                           </div>';
                    }
                    if ($elementsnumber > 0) {
                        echo '  <div class="oxi-addons-text-blocks-body-wrapper">
                                    <div class="oxi-addons-text-blocks-body">
                                        <div class="oxi-addons-text-blocks">
                                            <div class="oxi-addons-text-blocks-heading">' . $key . '</div>
                                            <div class="oxi-addons-text-blocks-border">
                                                <div class="oxi-addons-text-block-border"></div>
                                            </div>
                                            <div class="oxi-addons-text-blocks-content">Installed (' . $elementsnumber . ')</div>
                                        </div>
                                    </div>
                                </div>';
                        echo $elementshtml;
                    }
                }

                wp_add_inline_script('oxi-addons-bootstrap-jquery', 'function oxiequalHeight(group) {
                                tallest = 0;
                                group.each(function () {
                                thisHeight = jQuery(this).height();
                                if (thisHeight > tallest) {
                                tallest = thisHeight;
                                }
                                });
                                group.height(tallest);
                                }
                                setTimeout(function () {
                                oxiequalHeight(jQuery(".oxi-addons-shortcode-import-bottom"));
                                }, 500);
                                jQuery("#oxi_addons_search").on("keyup", function() {
                                var value = jQuery(this).val().toLowerCase();
                                jQuery(".oxi-addons-shortcode-import").filter(function() {
                                jQuery(this).toggle(jQuery(this).attr("oxi-addons-search").toLowerCase().indexOf(value) > -1);
                                });
                                if (jQuery.trim(jQuery(this).val()).length) {
                                jQuery(".oxi-addons-text-blocks-body-wrapper").not(":first").fadeOut("slow")
                                } else {
                                jQuery(".oxi-addons-text-blocks-body-wrapper").fadeIn("slow")
                                }
                                });');
                $jquery = 'jQuery(".oxilab-admin-menu li:eq(0) a").addClass("active");';
                wp_add_inline_script('oxi-addons-bootstrap-jquery', $jquery);
                ?>
            </div>
        </div>
    </div>
    <?php
}

$css = '.oxi-addons-wrapper ul.oxilab-admin-menu li a:hover,
        .oxi-addons-wrapper ul.oxilab-admin-menu li a.active{ 
            background: #7c00b5;
            position: relative;
            color: #fff;
        };';
echo OxiAddonsInlineCSSData($css, 'oxi-addons-admin');
