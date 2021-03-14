<?php

if (!defined('ABSPATH')) {
    exit;
}

function oxi_footer_info_style_5_shortcode($styledata = false, $listdata = false, $user = 'user') {
    $oxiid = $styledata['id'];
    $stylefiles = explode('||#||', $styledata['css']);
    $styledata = explode('|', $stylefiles[0]);
    echo '<div class="oxi-addons-container">
        <div class="oxi-addons-FI-5-' . $oxiid . '">
            <div class="oxi-addons-FI-5-row">
                <div class="oxi-addons-FI-5-image" ' . OxiAddonsAnimation($styledata, 67) . '>
                    <a href="' . OxiAddonsUrlConvert($stylefiles[4]) . '" target="' . $styledata[75] . '"><img class="oxi-addons-FI-5-img" src="' . OxiAddonsUrlConvert($stylefiles[2]) . '"/></a>
                </div>
                <div class="oxi-addons-FI-5-content" ' . OxiAddonsAnimation($styledata, 67) . '>
                    ' . OxiAddonsTextConvert($stylefiles[6]) . '
                </div>
            </div>
        </div>
    </div>';

 $css = '.oxi-addons-FI-5-' . $oxiid . '{
            width: 100%;
            float: left;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 45) . ';
        }
        .oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-row{
            width: 100%;
            margin: auto;
            border: ' . $styledata[7] .'px ' . $styledata[8] .'  ' . $styledata[11] .';
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 13) . ';
            ' . OxiAddonsBoxShadowSanitize($styledata, 61) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 29) . ';
            ' . OxiAddonsBGImage($styledata, 3) . ';
            overflow: auto;
        }
        .oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-image{
            width: 100%;
            float: left;
            text-align: center;
        }
        .oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-img{
            width: 100%;
            max-width: ' . $styledata[71] . 'px;
            height: auto;
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 105) . '; 
        }
        .oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-content{
            width: 100%;
            float: left;
            font-size: ' . $styledata[77] . 'px;
            color: ' . $styledata[81] . ';
            ' . OxiAddonsFontSettings($styledata, 83) . '
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 89) . '; 
        }
        @media only screen and (min-width : 669px) and (max-width : 993px){
        .oxi-addons-FI-5-' . $oxiid . '{
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 46) . ';
        }
        .oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-row{
            border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 14) . ';
            padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 30) . ';
        }
        .oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-img{
            max-width: ' . $styledata[72] . 'px;
            padding: 10px; 
        }
        .oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-content{
            font-size: ' . $styledata[78] . 'px;
            padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 90) . '; 
        }
    }
    @media only screen and (max-width : 668px){
     .oxi-addons-FI-5-' . $oxiid . '{
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 47) . ';
    }
    .oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-row{
        border-radius: ' . OxiAddonsPaddingMarginSanitize($styledata, 15) . ';
        padding: ' . OxiAddonsPaddingMarginSanitize($styledata, 31) . ';
    }
    .oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-img{
        max-width: ' . $styledata[73] . 'px;
        padding: 10px;
        
        
    }
    .oxi-addons-FI-5-' . $oxiid . ' .oxi-addons-FI-5-content{
        font-size: ' . $styledata[79] . 'px;
        padding:  ' . OxiAddonsPaddingMarginSanitize($styledata, 91) . ';
        
    }      

         }';
    echo OxiAddonsInlineCSSData($css);
}
