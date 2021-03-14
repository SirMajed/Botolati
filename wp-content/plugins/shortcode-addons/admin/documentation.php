<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
echo oxi_addons_public_isotope();
$jquery = 'jQuery(window).load(function(){
                            jQuery(".oxi-addons-category-data").isotope({
                                filter: "*",
                                animationOptions: {
                                    duration: 750,
                                    easing: "linear",
                                    queue: false
                                },
                                layoutMode: "masonry",
                            });
                    });';

wp_add_inline_script('oxi-addons-jquery.isotope.v3.0.2', $jquery);
echo OxiAddonsAdmAdminMenu('', '', 'other');
?>
<div class="about-wrap">
    <h1>Welcome to Shortcode Addons</h1>
    <div class="about-text">
        Thank you for choosing Shortcode Addons, The most friendly WordPress addons or all in one Package Plugin. Here's how to get started.
    </div>
    <h2 class="nav-tab-wrapper">
        <a class="nav-tab nav-tab-active">
            Getting Started		
        </a>
    </h2>
    <div class="feature-section">
        <p>Shortcode Addons is easy to use and extremely powerful. We have tons of helpful features that allows us to give you everything you need on your Designs. Follow the four Steps to create Shortcode. If get any troubles watch learning Videos or Documentation</p>
        <p>&nbsp; &nbsp; <strong>Step 1 :-</strong>&nbsp; Select Elements form Shortcode Elements Page.</p>
        <p>&nbsp; &nbsp; <strong>Step 2 :-</strong>&nbsp; Confirm your Layouts.</p>
        <p>&nbsp; &nbsp; <strong>Step 3 :-</strong>&nbsp; Add or Customize layout data.</p>
        <p>&nbsp; &nbsp; <strong>Step 4 :-</strong>&nbsp; Paste Shortcode into your Post, Page or Page Builders.</p>
    </div>
    <div class="feature-section">
        <div class="about-container">
            <div class="about-addons-videos"><iframe src="//www.youtube.com/embed/Ovvqi7iZJ-s" frameborder="0" allowfullscreen class="about-video"></iframe></div>
        </div>
    </div>
    <div class="feature-section">
        <h3>Have any Bugs or Suggestion</h3>
        <p>Your suggestions will make this plugin even better, Even if you get any bugs on Shortcode Addons so let us to know, We will try to solved within few hours</p>
        <p>
            <a href="https://www.oxilab.org/contact-us" target="_blank" rel="noopener" class="ihewc-image-features-button button button-primary">Contact Us</a>
            <a href="https://wordpress.org/plugins/shortcode-addons/" target="_blank" rel="noopener" class="ihewc-image-features-button button button-primary">Support Forum</a>
        </p>

    </div>
</div>