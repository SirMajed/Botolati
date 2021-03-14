<?php

/**
 * APIs.
 *
 * @package LFE
 */

namespace SHORTCODEADDONS;

defined('ABSPATH') || exit;

/**
 * Handle Remote API requests.
 *
 * @package SAEL
 */
class Shortcode_Remote {

    protected static $lfe_instance = NULL;

    const TRANSIENT_CATEGORY = 'shortcode_addons_elements';
    const CATEGORIES = 'https://www.shortcode-addons.com/wp-json/shortcode-elementor/v1/elements';

    public function __construct() {
       
    }

    /**
     * Access plugin instance. You can create further instances by calling
     */
    public static function shortcode_get_instance() {
        if (NULL === self::$lfe_instance)
            self::$lfe_instance = new self;

        return self::$lfe_instance;
    }

    /**
     * Get a templates categories.
     * @return mixed|\WP_Error
     */
    public function categories_list($force_update = FALSE) {
        $response = get_transient(self::TRANSIENT_CATEGORY);

        if (!$response || $force_update) {

            $request = wp_remote_request(self::CATEGORIES);
            if (!is_wp_error($request)) {
                $response = json_decode(wp_remote_retrieve_body($request), true);
                set_transient(self::TRANSIENT_CATEGORY, $response, 10 * DAY_IN_SECONDS);
            } else {
                $response = $request->get_error_message();
            }
        }
        return $response;
    }

}

new Shortcode_Remote();
