<?php 
//=========================================//
// Start
// Updating CPT Messages:
//=========================================//

add_filter( 'post_updated_messages', 'mrpt_pricing_table_updated_messages' );

/**
 * My Post Type update messages.
 *
 * @param array $messages Existing post update messages.
 *
 * @return array Amended post update messages with new CPT update messages.
 */

function mrpt_pricing_table_updated_messages( $messages ) {

	$post             = get_post();
	$post_type        = get_post_type( $post );
	$post_type_object = get_post_type_object( $post_type );
	
		$slug = $post->post_name;
        $shortcode = '<span style="display:inline-block;border:solid 2px lightgray; background:white; padding:0 8px; font-size:13px; line-height:25px; vertical-align:middle;">[min-res-pt name="'.$slug.'"]</span>';
	    
	
	$messages['mrpt_pricing_table'] = array(
		0  => '', // Unused. Messages start at index 1.
		1  => __( 'Your plan is updated. Copy Shortcode and paste in required page or post.'.$shortcode.'' ),
		2  => __( 'Custom field updated.' ),
		3  => __( 'Custom field deleted.'),
		4  => __( 'My Post Type updated. Copy Shortcode and paste in required page or post.' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Your plan is restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6  => __( 'Your plan is published. Copy Shortcode and paste in required page or post.'.$shortcode.'' ),
		7  => __( 'Your plan is saved. Copy Shortcode and paste in required page or post.' ),
		8  => __( 'Your plan is submitted. Copy Shortcode and paste in required page or post.' ),
		9  => sprintf(
			__( 'Your plan is scheduled for: <strong>%1$s</strong>.' ), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) )
		),
		10 => __( 'Your plan is draft updated.' )
	);
	return $messages;
}

 ?>