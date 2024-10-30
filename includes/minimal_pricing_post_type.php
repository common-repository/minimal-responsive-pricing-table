<?php 

//=========================================//
// Start
// Register Minimal Pricing Table post type
//=========================================//
add_action( 'init', 'register_mrpt_type' );
$post_type_prefix = 'minimal-responsive-Minimal Pricing-table';
function register_mrpt_type() {
	$labels = array(
		'name'               => __( 'Pricing Tables', $post_type_prefix ),
		'singular_name'      => __( 'Pricing Table', $post_type_prefix ),
		'menu_name'          => __( 'Minimal Pricing Tables', $post_type_prefix ),
		'name_admin_bar'     => __( 'Minimal Pricing Table', $post_type_prefix ),
		'add_new'            => __( 'Add New', $post_type_prefix ),
		'add_new_item'       => __( 'Add New Minimal Pricing Table', $post_type_prefix ),
		'new_item'           => __( 'New Minimal Pricing Table', $post_type_prefix ),
		'edit_item'          => __( 'Edit Pricing Table', $post_type_prefix ),
		'view_item'          => __( 'View Minimal Pricing Table', $post_type_prefix ),
		'all_items'          => __( 'All Pricing Tables', $post_type_prefix ),
		'search_items'       => __( 'Search Minimal Pricing Tables', $post_type_prefix ),
		'not_found'          => __( 'No Minimal Pricing Tables found.', $post_type_prefix ),
		'not_found_in_trash' => __( 'No Minimal Pricing Tables found in Trash.', $post_type_prefix )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
        'show_in_admin_bar'  => false,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'supports'           => array( 'title' ),
        'menu_icon'          => 'dashicons-list-view'
	);
	register_post_type( 'mrpt_pricing_table', $args );
}

 ?>