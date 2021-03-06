<?php 

function rooten_widgets_init() {
	
	// Blog Widgets
	register_sidebar(array( 'name' => esc_html_x('Blog Widgets', 'backend', 'rooten' ), 'id' => 'blog-widgets', 'description' => esc_html_x( 'These are widgets for the Blog sidebar.', 'backend', 'rooten' ), 'before_widget' => '<div id="%1$s" class="widget bdt-grid-margin %2$s"><div class="bdt-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3 class="bdt-card-title">', 'after_title' => '</h3>' ));

	register_sidebar(array( 'name' => esc_html_x('Header Bar', 'backend', 'rooten' ), 'id' => 'headerbar', 'description' => esc_html_x( 'These are widgets for showing widgets (such as countdown, search small ads etc) on header top right corner .', 'backend', 'rooten' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3 class="bdt-hidden">', 'after_title' => '</h3>' ));


	// Search Results Widgets
	register_sidebar(array( 'name' => esc_html_x('Search Results Widgets', 'backend', 'rooten' ), 'id' => 'search-results-widgets', 'description' => esc_html_x( 'These are widgets for the Search Results sidebar. These sidebar widgets show on right side.', 'backend', 'rooten' ), 'before_widget' => '<div id="%1$s" class="widget bdt-grid-margin %2$s"><div class="bdt-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3 class="bdt-card-title">', 'after_title' => '</h3>' ));
	

   	// WooCommerce Widgets
	if (class_exists('Woocommerce')){
		register_sidebar(array( 'name' => esc_html_x('Shop Widgets', 'backend', 'rooten' ), 'id' => 'shop-widgets', 'description' => esc_html_x( 'These are widgets for the Shop sidebar.', 'backend', 'rooten' ), 'before_widget' => '<div id="%1$s" class="widget bdt-grid-margin %2$s"><div class="bdt-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3 class="bdt-card-title">', 'after_title' => '</h3>' ));
	}

	// BBPress Widgets
	if (class_exists('bbPress')){
		register_sidebar(array( 'name' => esc_html_x('Forum Widgets', 'backend', 'rooten' ), 'id' => 'forum-widgets', 'description' => esc_html_x( 'These are widgets for the Forum sidebar.', 'backend', 'rooten' ), 'before_widget' => '<div id="%1$s" class="widget bdt-grid-margin %2$s"><div class="bdt-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3 class="bdt-card-title">', 'after_title' => '</h3>' ));
	}

	// Bottom
	register_sidebar(array( 'name' => esc_html_x('Bottom Widgets', 'backend', 'rooten' ), 'id' => 'bottom-widgets', 'description' => esc_html_x( 'These are widgets for the bottom area on footer position.', 'backend', 'rooten' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="bdt-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3 class="bdt-card-title">', 'after_title' => '</h3>' ));

	// Footer Widgets
	register_sidebar(array( 'name' => esc_html_x('Footer Widgets 1', 'backend', 'rooten' ), 'id' => 'footer-widgets', 'description' => esc_html_x( 'These are widgets for the Footer.', 'backend', 'rooten' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="bdt-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3 class="bdt-card-title">', 'after_title' => '</h3>' ));
	
	register_sidebar(array( 'name' => esc_html_x('Footer Widgets 2', 'backend', 'rooten' ), 'id' => 'footer-widgets-2', 'description' => esc_html_x( 'These are widgets for the Footer.', 'backend', 'rooten' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="bdt-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3 class="bdt-card-title">', 'after_title' => '</h3>' ));


	register_sidebar(array( 'name' => esc_html_x('Footer Widgets 3', 'backend', 'rooten' ), 'id' => 'footer-widgets-3', 'description' => esc_html_x( 'These are widgets for the Footer.', 'backend', 'rooten' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="bdt-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3 class="bdt-card-title">', 'after_title' => '</h3>' ));

	register_sidebar(array( 'name' => esc_html_x('Footer Widgets 4', 'backend', 'rooten' ), 'id' => 'footer-widgets-4', 'description' => esc_html_x( 'These are widgets for the Footer.', 'backend', 'rooten' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="bdt-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3 class="bdt-card-title">', 'after_title' => '</h3>' ));
	
	// Mobile Off-Canvas position widgets
	register_sidebar(array( 'name' => esc_html_x('Off-Canvas', 'backend', 'rooten' ), 'id' => 'offcanvas', 'description' => esc_html_x( 'These are widgets for off-canvas bar (it\'s only show in small device mode) and it\'s show under off-canvas menu.', 'backend', 'rooten' ), 'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="bdt-panel"><div class="panel-content">', 'after_widget' => '</div></div></div>', 'before_title' => '<h3 class="bdt-card-title">', 'after_title' => '</h3>' ));
}
   	
add_action( 'widgets_init', 'rooten_widgets_init' );


function rooten_drawer_widgets_params($params) {

    $sidebar_id = $params[0]['id'];
    if ( $sidebar_id == 'drawer' ) {
        $total_widgets = wp_get_sidebars_widgets();
        $sidebar_widgets = count($total_widgets[$sidebar_id]);

        $params[0]['before_widget'] = str_replace('class="widget', 'class="widget bdt-width-1-' . $sidebar_widgets . ' ', $params[0]['before_widget']);
    }

    return $params;
}
add_filter('dynamic_sidebar_params','rooten_drawer_widgets_params');


function rooten_widget_customize_form($t,$return,$instance){
    $instance = wp_parse_args( (array) $instance, array('style' => 0, 'center' => 0, 'xlarge' => 0, 'large' => 0, 'medium' => 0, 'small' => 0) );
    ?>
    <p>
	    <ul class="rooten-visiblity-control">
		    <li class="display-xlarge-field">
		    	<label for="<?php echo esc_attr($t->get_field_id('xlarge')); ?>" title="<?php echo esc_html_x('Set Extra Large Screen Visiblity.', 'backend', 'rooten'); ?>">
			        <input id="<?php echo esc_attr($t->get_field_id('xlarge')); ?>" name="<?php echo esc_attr($t->get_field_name('xlarge')); ?>" type="checkbox" <?php checked(isset($instance['xlarge']) ? $instance['xlarge'] : 0); ?> />
			        <i class="dashicons display-xlarge"></i>
			        <?php echo esc_html_x('xLarge', 'backend', 'rooten'); ?>
		        </label>
		    </li>
		    <li class="display-large-field">
		    	<label for="<?php echo esc_attr($t->get_field_id('large')); ?>" title="<?php echo esc_html_x('Set Large Screen Visiblity.', 'backend', 'rooten'); ?>">
			        <input id="<?php echo esc_attr($t->get_field_id('large')); ?>" name="<?php echo esc_attr($t->get_field_name('large')); ?>" type="checkbox" <?php checked(isset($instance['large']) ? $instance['large'] : 0); ?> />
			        <i class="dashicons display-large"></i>
			        <?php echo esc_html_x('Large', 'backend', 'rooten'); ?>
		        </label>
		    </li>
		    <li class="display-medium-field">
		    	<label for="<?php echo esc_attr($t->get_field_id('medium')); ?>" title="<?php echo esc_html_x('Set Medium Screen Visiblity.', 'backend', 'rooten'); ?>">
			        <input id="<?php echo esc_attr($t->get_field_id('medium')); ?>" name="<?php echo esc_attr($t->get_field_name('medium')); ?>" type="checkbox" <?php checked(isset($instance['medium']) ? $instance['medium'] : 0); ?> />
			        <i class="dashicons display-medium"></i>
			        <?php echo esc_html_x('Medium', 'backend', 'rooten'); ?>
		        </label>
		    </li>

		    <li class="display-small-field">
		    	<label for="<?php echo esc_attr($t->get_field_id('small')); ?>" title="<?php echo esc_html_x('Set Small Screen Visiblity.', 'backend', 'rooten'); ?>">
			        <input id="<?php echo esc_attr($t->get_field_id('small')); ?>" name="<?php echo esc_attr($t->get_field_name('small')); ?>" type="checkbox" <?php checked(isset($instance['small']) ? $instance['small'] : 0); ?> />
			        <i class="dashicons display-small"></i>
			        <?php echo esc_html_x('Small', 'backend', 'rooten'); ?>
		        </label>
		    </li>
	    </ul>
    </p>
	
	<p>
		<label for="<?php echo esc_attr($t->get_field_name('style')); ?>"><?php echo esc_html_x('Select Widget Style', 'backend', 'rooten'); ?>
		    <select class="widefat" name="<?php echo esc_attr($t->get_field_name('style')); ?>" id="<?php echo esc_attr($t->get_field_id('style')); ?>">
		    	<option value='0' <?php selected($instance['style'], '0');?>>Blank</option>
				<option value='default' <?php selected($instance['style'], 'default');?>>Default</option>
				<option value='primary' <?php selected($instance['style'], 'primary');?>>Primary</option>
				<option value='secondary' <?php selected($instance['style'], 'secondary');?>>Secondary</option>
		    	<option value='hover' <?php selected($instance['style'], 'hover');?>>Hover</option>
		    </select>
	    </label>
    </p>

    <p>
		<label for="<?php echo esc_attr($t->get_field_name('center')); ?>">
		    <input id="<?php echo esc_attr($t->get_field_id('center')); ?>" name="<?php echo esc_attr($t->get_field_name('center')); ?>" type="checkbox" <?php checked(isset($instance['center']) ? $instance['center'] : 0); ?> />
		    <?php echo esc_html_x('Center the widgets content', 'backend', 'rooten'); ?>
	    </label>
    </p>

    <?php
    $retrun = null;
    return array($t,$return,$instance);
}


function rooten_widget_customize_form_update($instance, $new_instance, $old_instance){
	$instance['xlarge'] = isset($new_instance['xlarge']);
	$instance['large']  = isset($new_instance['large']);
	$instance['medium'] = isset($new_instance['medium']);
	$instance['small']  = isset($new_instance['small']);
	$instance['style']  = $new_instance['style'];
	$instance['center'] = isset($new_instance['center']);
    return $instance;
}

function rooten_widget_customize_params($params){
    global $wp_registered_widgets;
	$widget_id  = $params[0]['widget_id'];
	$widget_obj = $wp_registered_widgets[$widget_id];
	$widget_opt = get_option($widget_obj['callback'][0]->option_name);
	$widget_num = $widget_obj['params'][0]['number'];
	$display    = $style = array();

    if (isset($widget_opt[$widget_num]['style']) and $widget_opt[$widget_num]['style'] != '0' ){
        $style[] = 'bdt-card bdt-card-body bdt-card-'.$widget_opt[$widget_num]['style'];
    } else {
        $style[] = 'bdt-panel';
    }
    if (isset($widget_opt[$widget_num]['center']) and $widget_opt[$widget_num]['center'] == 1 ){
        $style[] = 'bdt-text-center';
    }
    if (isset($widget_opt[$widget_num]['xlarge']) and $widget_opt[$widget_num]['xlarge'] == 1){
        $display[] = 'bdt-visible@xl';
    } 
    if (isset($widget_opt[$widget_num]['large']) and $widget_opt[$widget_num]['large'] == 1){
        $display[] = 'bdt-visible@l';
    } 
    if (isset($widget_opt[$widget_num]['medium']) and $widget_opt[$widget_num]['medium'] == 1){
        $display[] = 'bdt-visible@m';
    }
    if (isset($widget_opt[$widget_num]['small']) and $widget_opt[$widget_num]['small'] == 1){
        $display[] = 'bdt-visible@s';
    }
    
    if ($display != null or $style != null) {
    	if ($display != null) {
		    $display = implode(' ', $display);
		    $params[0]['before_widget'] = preg_replace('/class="/', 'class="'.$display.' ',  $params[0]['before_widget'], 1);
    	}
    	if ($style != null) {
		    $style = implode(' ', $style);
	    	$params[0]['before_widget'] = preg_replace('/class="bdt-panel/', 'class="'.$style.' ',  $params[0]['before_widget'], 1);
    	}
    	return $params;
    } else {
    	return null;
    }
}

//Add input fields(priority 5, 3 parameters)
add_action('in_widget_form', 'rooten_widget_customize_form',5,3);

//Callback function for options update (priority 5, 3 parameters)
add_filter('widget_update_callback', 'rooten_widget_customize_form_update',5,3);

//add class names (default priority, one parameter)
add_filter('dynamic_sidebar_params', 'rooten_widget_customize_params');