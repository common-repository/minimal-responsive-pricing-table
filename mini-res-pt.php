<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://digitsol.co
 * @since             1.0.0
 * @package           Mini_Res_Pt
 *
 * @wordpress-plugin
 * Plugin Name:       Minimal Responsive Pricing Table 
 * Plugin URI:        http://plugins.digitsol.co/free/minimal-responsive-pricing-table/
 * Description:       Minimal Responsive Pricing Table plugin helps you to create clean and responsive pricing tables with multiple layouts
 * Version:           1.0
 * Author:            DigitSol
 * Author URI:        http://digitsol.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mini-res-pt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mini-res-pt-activator.php
 */
function activate_mini_res_pt() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mini-res-pt-activator.php';
	Mini_Res_Pt_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mini-res-pt-deactivator.php
 */

function deactivate_mini_res_pt() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mini-res-pt-deactivator.php';
	Mini_Res_Pt_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mini_res_pt' );
register_deactivation_hook( __FILE__, 'deactivate_mini_res_pt' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mini-res-pt.php';


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mini_res_pt() {


	$plugin = new Mini_Res_Pt();
	//=========================================//
	// Start
	// Hook Custom Meta Box-2 FrameWork:
	//=========================================//
	
	if ( file_exists( dirname( __FILE__ ) . '/includes/cmb2/init.php' ) ) {
		require_once dirname( __FILE__ ) . '/includes/cmb2/init.php';
	} elseif ( file_exists( dirname( __FILE__ ) . '/includes/CMB2/init.php' ) ) {
		require_once dirname( __FILE__ ) . '/includes/CMB2/init.php';
	}


	// Registering Pricing Table metaboxes:
	add_action( 'cmb2_init', 'mrpt_register_group_metabox' );

	// Pricing Table Custom Post Type:
	require_once plugin_dir_path( __FILE__ ) .'includes/minimal_pricing_post_type.php';
	
	// Prcing Table Metaboxes:
	require_once plugin_dir_path( __FILE__  ) .'includes/mrpt-metaboxes.php';
	
	// Message Updated for Cusotm Post Type:
	require_once plugin_dir_path( __FILE__  ) .'admin/message-updated.php';
		
	//=========================================//
	// Start
	// Create Shortcode Column in Post Type:
	//=========================================//
	add_filter( 'manage_edit-mrpt_pricing_table_columns', 'edit_mrpt_shotcode_columns' ) ;

	function edit_mrpt_shotcode_columns( $columns ) {
		$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'All Pricing Tables' ),
			'duration' => __( 'Shortcodes' ),
			'date' => __( 'Date' )
			);
		return $columns;
	}

	//=========================================//
	// Start
	// Print Shortcode in shortcode coulmn
	//=========================================//
	add_action( 'manage_mrpt_pricing_table_posts_custom_column', 'manage_mrpt_columns', 10, 2 );

	function manage_mrpt_columns( $data) {
		
		global $post;
		$slug = '' ;
		$slug = $post->post_name;
		$shortcode = '<span style="display:inline-block;border:solid 2px lightgray; background:white; padding:0 8px; font-size:13px; line-height:25px; vertical-align:middle;">[min-res-pt name="'.$slug.'"]</span>';
		echo $shortcode;
		
	}

	//=========================================//
	// Start
	// Registering Shortcode
	//=========================================//
	
	add_action( 'init', 'register_mrpt_shortcodes');
	
	function register_mrpt_shortcodes(){
		add_shortcode('min-res-pt', 'minimal_pricing_shortcode');	
	}
	
	function minimal_pricing_shortcode( $atts ){
		extract(shortcode_atts(array(
			"name" => ''
			), $atts));

	//=========================================//
	// Start
	// Selecting file according to
	// Selected Layout
	//=========================================//
		global $post;

		$args = array(
				'post_type' => 'mrpt_pricing_table', 
				'name' => $name
				);

		$mrpt_all_posts = get_posts($args);
		ob_start();
		foreach($mrpt_all_posts as $post) : setup_postdata($post);
		$layout = get_post_meta( $post->ID, '_mrpt_layout', true );
		require plugin_dir_path( __FILE__  ) .'public/layout_'.$layout.'.php';
		$output = ob_get_clean();
    	return $output;

		endforeach; 
		wp_reset_postdata();
	}

	$plugin->run();

}
run_mini_res_pt();
