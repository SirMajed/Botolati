<?php
/**
 * Bulk Revokes Tool
 *
 * @package     GamiPress\Admin\Tools\Bulk_Revokes
 * @author      GamiPress <contact@gamipress.com>, Ruben Garcia <rubengcdev@gmail.com>
 * @since       1.4.3
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Register Bulk Revokes Tool meta boxes
 *
 * @since  1.4.3
 *
 * @param array $meta_boxes
 *
 * @return array
 */
function gamipress_bulk_revokes_tool_meta_boxes( $meta_boxes ) {

    // Grab our points types as an array
    $points_types_options = array(
        '' => __( 'Choose a points type', 'gamipress' )
    );

    foreach( gamipress_get_points_types() as $slug => $data ) {
        $points_types_options[$slug] = $data['plural_name'];
    }

    $meta_boxes['bulk-revokes'] = array(
        'title' => gamipress_dashicon( 'no-alt' ) . __( 'Bulk Revokes', 'gamipress' ),
        'fields' => apply_filters( 'gamipress_bulk_revokes_tool_fields', array(

            // Points

            'bulk_revoke_points' => array(
                'name' => __( 'Points to Deduct', 'gamipress' ),
                'desc' => __( 'Points amount to deduct (the amount will be deducted to the current user balance).', 'gamipress' ),
                'type' => 'text_small',
                'default' => '0',
            ),
            'bulk_revoke_points_type' => array(
                'name' => __( 'Points Type', 'gamipress' ),
                'desc' => __( 'Points type of points amount to deduct.', 'gamipress' ),
                'type' => 'select',
                'options' => $points_types_options
            ),
            'bulk_revoke_points_all_users' => array(
                'name' => __( 'Deduct to all users', 'gamipress' ),
                'desc' => __( 'Check this option to deduct the points amount to all users.', 'gamipress' ),
                'type' => 'checkbox',
                'classes' => 'gamipress-switch'
            ),
            'bulk_revoke_points_users' => array(
                'name' => __( 'Users to deduct', 'gamipress' ),
                'desc' => __( 'Choose users to deduct this points amount.', 'gamipress' ),
                'type' => 'select',
            ),
            'bulk_revoke_points_button' => array(
                'label' => __( 'Deduct Points', 'gamipress' ),
                'type' => 'button',
                'button' => 'primary'
            ),

            // Achievements

            'bulk_revoke_achievements' => array(
                'name' => __( 'Achievements to Revoke', 'gamipress' ),
                'desc' => __( 'Choose the achievements to revoke.', 'gamipress' ),
                'type' => 'select',
            ),
            'bulk_revoke_achievements_all_users' => array(
                'name' => __( 'Revoke to all users', 'gamipress' ),
                'desc' => __( 'Check this option to revoke the achievements to all users.', 'gamipress' ),
                'type' => 'checkbox',
                'classes' => 'gamipress-switch'
            ),
            'bulk_revoke_achievements_users' => array(
                'name' => __( 'Users to revoke', 'gamipress' ),
                'desc' => __( 'Choose users to revoke this achievements.', 'gamipress' ),
                'type' => 'select',
            ),
            'bulk_revoke_achievements_button' => array(
                'label' => __( 'Revoke Achievements', 'gamipress' ),
                'type' => 'button',
                'button' => 'primary'
            ),

            // Ranks

            'bulk_revoke_rank' => array(
                'name' => __( 'Rank to Revoke', 'gamipress' ),
                'desc' => __( 'Choose the rank to revoke.', 'gamipress' )
                . '<br>' . __( '<strong>Important!</strong> Users on higher rank will be downgrade to this rank.', 'gamipress' ),
                'type' => 'select',
            ),
            'bulk_revoke_rank_all_users' => array(
                'name' => __( 'Revoke to all users', 'gamipress' ),
                'desc' => __( 'Check this option to revoke the rank to all users.', 'gamipress' ),
                'type' => 'checkbox',
                'classes' => 'gamipress-switch'
            ),
            'bulk_revoke_rank_users' => array(
                'name' => __( 'Users to revoke', 'gamipress' ),
                'desc' => __( 'Choose users to revoke this rank.', 'gamipress' ),
                'type' => 'select',
            ),
            'bulk_revoke_rank_button' => array(
                'label' => __( 'Revoke Rank', 'gamipress' ),
                'type' => 'button',
                'button' => 'primary'
            ),
        ) ),
        'vertical_tabs' => true,
        'tabs' => apply_filters( 'gamipress_bulk_revokes_tool_tabs', array(
            'bulk_revoke_points' => array(
                'icon' => 'dashicons-star-filled',
                'title' => __( 'Points', 'gamipress' ),
                'fields' => array(
                    'bulk_revoke_points',
                    'bulk_revoke_points_type',
                    'bulk_revoke_points_all_users',
                    'bulk_revoke_points_users',
                    'bulk_revoke_points_button',
                ),
            ),
            'bulk_revoke_achievements' => array(
                'icon' => 'dashicons-awards',
                'title' => __( 'Achievements', 'gamipress' ),
                'fields' => array(
                    'bulk_revoke_achievements',
                    'bulk_revoke_achievements_all_users',
                    'bulk_revoke_achievements_users',
                    'bulk_revoke_achievements_button',
                ),
            ),
            'bulk_revoke_rank' => array(
                'icon' => 'dashicons-rank',
                'title' => __( 'Ranks', 'gamipress' ),
                'fields' => array(
                    'bulk_revoke_rank',
                    'bulk_revoke_rank_all_users',
                    'bulk_revoke_rank_users',
                    'bulk_revoke_rank_button',
                ),
            )
        ) )
    );

    return $meta_boxes;

}
add_filter( 'gamipress_tools_general_meta_boxes', 'gamipress_bulk_revokes_tool_meta_boxes' );

/**
 * AJAX handler for the recount activity tool
 *
 * @since 1.4.3
 */
function gamipress_ajax_bulk_revokes_tool() {

    global $wpdb;

    // Check user capabilities
    if( ! current_user_can( gamipress_get_manager_capability() ) ) {
        wp_send_json_error( __( 'You are not allowed to perform this action.', 'gamipress' ) );
    }

    // Check parameters received
    if( ! isset( $_POST['bulk_revoke'] ) || empty( $_POST['bulk_revoke'] ) ) {
        wp_send_json_error( __( 'You are not allowed to perform this action.', 'gamipress' ) );
    }

    $bulk_revoke = $_POST['bulk_revoke'];
    $loop = ( ! isset( $_POST['loop'] ) ? 0 : absint( $_POST['loop'] ) );
    $limit = 100;
    $offset = $limit * $loop;
    $run_again = false;

    ignore_user_abort( true );

    if ( ! gamipress_is_function_disabled( 'set_time_limit' ) ) {
        set_time_limit( 0 );
    }

    $points_types = gamipress_get_points_types();
    $rank_types = gamipress_get_rank_types();

    if( $bulk_revoke === 'points' ) {
        // Check points parameters

        $points_to_revoke = absint( $_POST['bulk_revoke_points'] );

        if( $points_to_revoke === 0 ) {
            wp_send_json_error( __( 'Choose a valid points amount to deduct.', 'gamipress' ) );
        }

        $points_type_to_revoke = $_POST['bulk_revoke_points_type'];

        if( $points_type_to_revoke === '' || ! isset( $points_types[$points_type_to_revoke] ) ) {
            wp_send_json_error( __( 'Choose a valid points type.', 'gamipress' ) );
        }

        $to_all_users = isset( $_POST['bulk_revoke_points_all_users'] );

        if( ! $to_all_users ) {
            $specific_users = isset( $_POST['bulk_revoke_points_users'] ) ? $_POST['bulk_revoke_points_users'] : array();
        }

    } else if( $bulk_revoke === 'achievements' ) {
        // Check achievements parameters

        $achievements = isset( $_POST['bulk_revoke_achievements'] ) ? $_POST['bulk_revoke_achievements'] : array();

        if( empty( $achievements ) ) {
            wp_send_json_error( __( 'Choose at least one achievement to be revoked.', 'gamipress' ) );
        }

        $to_all_users = isset( $_POST['bulk_revoke_achievements_all_users'] );

        if( ! $to_all_users ) {
            $specific_users = isset( $_POST['bulk_revoke_achievements_users'] ) ? $_POST['bulk_revoke_achievements_users'] : array();
        }

    } else if( $bulk_revoke === 'rank' ) {
        // Check rank parameters

        $rank_id = absint( $_POST['bulk_revoke_rank'] );

        $rank = get_post( $rank_id );

        if( ! $rank || ! isset( $rank_types[$rank->post_type] ) ) {
            wp_send_json_error( __( 'Choose a valid rank to be revoked.', 'gamipress' ) );
        }

        $to_all_users = isset( $_POST['bulk_revoke_rank_all_users'] );

        if( ! $to_all_users ) {
            $specific_users = isset( $_POST['bulk_revoke_rank_users'] ) ? $_POST['bulk_revoke_rank_users'] : array();
        }

    }

    // Check users parameters
    if( ! $to_all_users && empty( $specific_users ) ) {
        wp_send_json_error( __( 'Choose at least one user to revoke.', 'gamipress' ) );
    }

    if( $to_all_users ) {

        // Get all stored users
        $users = $wpdb->get_results( "SELECT ID FROM {$wpdb->users} ORDER BY ID ASC LIMIT {$offset}, {$limit}" );

        if( empty( $users ) && $loop !== 0 ) {
            // Return a success message
            wp_send_json_success( __( 'Bulk award process has been done successfully.', 'gamipress' ) );
        } else {
            $run_again = true;
        }

    } else {
        // Get specific stored users
        $users = $wpdb->get_results( "SELECT ID FROM {$wpdb->users} WHERE ID IN( " . implode( ', ', $specific_users ) . " )" );
    }

    if( empty( $users ) ) {
        wp_send_json_error( __( 'Could not find users to revoke.', 'gamipress' ) );
    }

    // Let's to bulk revoke
    foreach( $users as $user ) {

        if( $bulk_revoke === 'points' ) {

            // When an admin revokes points to user is required to set the total points balance
            $user_points = gamipress_get_user_points( $user->ID, $points_type_to_revoke );

            // Deduct points
           gamipress_deduct_points_to_user( $user->ID, $user_points - $points_to_revoke, $points_type_to_revoke, array( 'admin_id' => get_current_user_id() ) );

        } else if( $bulk_revoke === 'achievements' ) {

            // Revoke achievements
            foreach( $achievements as $achievement ) {
                gamipress_revoke_achievement_to_user( absint( $achievement ), $user->ID );
            }

        } else if( $bulk_revoke === 'rank' ) {

            $user_rank_id = gamipress_get_user_rank_id( $user->ID, $rank->post_type );

            // Revoke rank
            gamipress_revoke_rank_to_user( $user->ID, $user_rank_id, $rank_id, array( 'admin_id' => get_current_user_id() ) );

        }

    }

    if( $run_again ) {

        $awarded_users = $limit * ( $loop + 1 );
        $users_count = absint( $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->users} ORDER BY ID ASC" ) );

        // Return a run again message (just when revoking to all users)
        wp_send_json_success( array(
            'run_again' => $run_again,
            'message' => sprintf( __( '%d remaining users', 'gamipress' ), ( $users_count - $awarded_users ) ),
        ) );

    } else {
        // Return a success message
        wp_send_json_success( __( 'Bulk revoke process has been done successfully.', 'gamipress' ) );
    }


}
add_action( 'wp_ajax_gamipress_bulk_revokes_tool', 'gamipress_ajax_bulk_revokes_tool' );