<?php 
function mrpt_register_group_metabox() {    

    $prefix = '_mrpt_';   
    //=========================================//
    // Start
    // Metabox For Layouts 
    // Using CMB2 Framework:
    // ========================================//
    $layout_group = new_cmb2_box( array(
        'id' => $prefix . 'layout_metabox',
        'title' => '<span style="font-weight:400;">'.__( 'Layouts', 'responsive-pricing-table' ).'</span>',
        'object_types' => array( 'mrpt_pricing_table' ),
        'context' => 'side',
        'priority' => 'low',
        )); 
        //Radio Field For Selecting Layouts:
    $layout_group->add_field( array(
        'name' => __( 'Select Layout', 'minimal-responsive-pricing-table' ),
        'id' => $prefix . 'layout',
        'type'             => 'radio',
        'show_option_none' => false,
        'default'          => 'red',
        'options'          => array(
            'blue' => __( '<img src="' . plugin_dir_url(__FILE__  ) . 'layouts/blue.png" style="height:300px; width:200px">', 'layouts' ),
            'green'   => __( '<img src="' . plugin_dir_url(__FILE__  ) . 'layouts/green.png" style="height:300px; width:200px">', 'layouts' ),
            'red'     => __( '<img src="' . plugin_dir_url(__FILE__  ) . 'layouts/red.png" style="height:300px; width:200px">', 'layouts' ),
            'darkblue'     => __( '<img src="' . plugin_dir_url(__FILE__  ) . 'layouts/darkBlue.png" style="height:300px; width:200px">', 'layouts' ),
            ),
        ) );
    //=========================================//
    //End Metabox For Layouts 
    //=========================================//
    

    //=========================================//
    //Start
    // Metabox For Pricing Table:     
    //=========================================//

    $top_group = new_cmb2_box( array(
        'id'            => $prefix . 'main_plan_metabox',
        'title'         => __( 'Minimal Pricing Table', 'minimal-responsive-pricing-table' ),
    'object_types'  => array( 'mrpt_pricing_table', ), // Post type    
    ) );
    //Repeatable group for mutliple plans:
    $mrpt_plan_group = $top_group->add_field( array(
        'id' => $prefix . 'mini_plan_group',
        'type' => 'group',
        'options' => array(
            'group_title' => __('Sub-Plan {#}', 'minimal-responsive-pricing-table' ),
            'add_button' => __('Add another Sub-Plan', 'minimal-responsive-pricing-table' ),
            'remove_button' => __('Remove Sub-Plan', 'minimal-responsive-pricing-table' ),
            'sortable' => true,
            'single' => false,
            'closed' => false,

            ),
        ));
    // Heading for pricing table head section:
    $top_group->add_group_field($mrpt_plan_group, array(
        'name'       => __( 'Header Section', 'minimal-responsive-pricing-table' ),
        'desc'       => __( '<img src="' . plugin_dir_url(__FILE__  ) . 'images/header.png" style="height:200px; width:200px">', 'minimal-responsive-pricing-table' ),
        'id'         => $prefix . 'header_heading',
        'type'       => 'title',
        'row_classes' => 'my-heading',
        ) );
    // Title for pricing table:
    $top_group->add_group_field($mrpt_plan_group, array(
        'name' => __( 'Header Title', 'minimal-responsive-pricing-table' ),
        'desc' => __( 'e.g: Basic, Advance', 'minimal-responsive-pricing-table' ),
        'id'   => $prefix . 'header_title',
        'type' => 'text',
        ) );
    // Subtitle For Pricing Table
    $top_group->add_group_field($mrpt_plan_group, array(
        'name' => __( 'Subtitle', 'minimal-responsive-pricing-table' ),
        'desc' => __( 'e.g:Basic Plan Included', 'minimal-responsive-pricing-table' ),
        'id'   => $prefix . 'header_subtitle',
        'type' => 'text',
        ) );
    // Subtitle For Pricing Table
    $top_group->add_group_field($mrpt_plan_group, array(
        'name' => __( 'Subtitle', 'minimal-responsive-pricing-table' ),
        'desc' => __( 'e.g:Unlimited Features, Best Choice', 'minimal-responsive-pricing-table' ),
        'id'   => $prefix . 'header_subtitle',
        'type' => 'text',
        ) );
    // Header Background Color For Pricing Table
    $top_group->add_group_field($mrpt_plan_group, array(
        'name' => __( 'Background Color', 'minimal-responsive-pricing-table' ),
        'desc' => __( 'Select Header Background Color', 'minimal-responsive-pricing-table' ),
        'id'   => $prefix . 'header_background_color',
        'type'    => 'colorpicker',
        ) );
    // Header font Color For Pricing Table
    $top_group->add_group_field($mrpt_plan_group, array(
        'name' => __( 'font Color', 'minimal-responsive-pricing-table' ),
        'desc' => __( 'Select Header font Color', 'minimal-responsive-pricing-table' ),
        'id'   => $prefix . 'header_font_color',
        'type'    => 'colorpicker',
        ) );
    // Heading For Pricing Section
    $top_group->add_group_field($mrpt_plan_group, array(
        'name'       => __( 'Pricing Section', 'minimal-responsive-pricing-table' ),
        'desc'       => __( '<img src="' . plugin_dir_url(__FILE__  ) . 'images/pricing.png" style="height:200px; width:200px">', 'minimal-responsive-pricing-table' ),
        'id'         => $prefix . 'features_heading',
        'type'       => 'title',
        'row_classes' => 'my-heading',
        ) );
    // Price Input Field For Pricing Table
    $top_group->add_group_field($mrpt_plan_group, array(
        'name' => __( 'Price', 'minimal-responsive-pricing-table' ),
        'desc' => __( 'e.g: 500,1000 Without Currnecy Sign', 'minimal-responsive-pricing-table' ),
        'id'   => $prefix . 'price',
        'type' => 'text',
        ) );
    // Currency Sign Input Field For Pricing Table
    $top_group->add_group_field($mrpt_plan_group, array(
        'name' => __( 'Currency Sign', 'minimal-responsive-pricing-table' ),
        'desc' => __( 'e.g: $, €, £ ', 'minimal-responsive-pricing-table' ),
        'id'   => $prefix . 'currency_sign',
        'type' => 'text',
        ) );
    // Recurrence Input Field For Pricing Table
    $top_group->add_group_field($mrpt_plan_group, array(
        'name' => __( 'Recurrence', 'minimal-responsive-pricing-table' ),
        'desc' => __( 'e.g: per month, weekly, annually ', 'minimal-responsive-pricing-table' ),
        'id'   => $prefix . 'recurrence',
        'type' => 'text',
        ) );
    // Recommended plan Checkbox For Pricing Table
    $top_group->add_group_field($mrpt_plan_group, array(
        'name' => __( 'Recommended plan', 'minimal-responsive-pricing-table' ),
        'desc' => __( 'Mark as recommended', 'minimal-responsive-pricing-table' ),
        'id'   => $prefix . 'recommended',
        'type' => 'checkbox',
        'default' => false,
        ) );
    // Background Color For Pricing Section 
    $top_group->add_group_field($mrpt_plan_group, array(
        'name' => __( 'Background Color', 'minimal-responsive-pricing-table' ),
        'desc' => __( 'Leave clear for default layouts', 'minimal-responsive-pricing-table' ),
        'id'   => $prefix . 'pricing_background_color',
        'type' => 'colorpicker',
        ) );
    // Font Color For Pricing Section
    $top_group->add_group_field($mrpt_plan_group, array(
        'name' => __( 'Font Color', 'minimal-responsive-pricing-table' ),
        'desc' => __( 'Leave clear for default layouts', 'minimal-responsive-pricing-table' ),
        'id'   => $prefix . 'pricing_font_color',
        'type' => 'colorpicker',
        ) );
    // Heading For Feature Section
    $top_group->add_group_field($mrpt_plan_group, array(
        'name'       => __( 'Feature Section', 'minimal-responsive-pricing-table' ),
        'desc'       => __( '<img src="' . plugin_dir_url(__FILE__  ) . 'images/features.png" style=" width:auto">', 'minimal-responsive-pricing-table' ),
        'id'         => $prefix . 'feature_heading',
        'type'       => 'title',
        'row_classes' => 'my-heading',
        ) );
    // Feature list For Pricing Table
    $top_group->add_group_field($mrpt_plan_group, array(
        'name' => __( 'Feature list', 'minimal-responsive-pricing-table' ),
        'id' => $prefix . 'features',
        'type' => 'textarea',
        'desc' => __( 'Enter Feature line by line. As above Demo Picture.', 'minimal-responsive-pricing-table' ),
        ) );
    // Heading For Button Section
    $top_group->add_group_field($mrpt_plan_group, array(
        'name'       => __( 'Button Section', 'minimal-responsive-pricing-table' ),
        'desc'       => __( '<img src="' . plugin_dir_url(__FILE__  ) . 'images/button.png" style="height:200px; width:200px">', 'minimal-responsive-pricing-table' ),
        'id'         => $prefix . 'button_heading',
        'type'       => 'title',
        'row_classes' => 'my-heading',
        ) );
    // Button Text For Pricing Table
    $top_group->add_group_field($mrpt_plan_group, array(
        'name' => __( 'Button Text', 'minimal-responsive-pricing-table' ),
        'desc' => __( 'e.g: Sing Up, Get It Now, Subscribe', 'minimal-responsive-pricing-table' ),
        'id'   => $prefix . 'button_text',
        'type' => 'text',
        ) );
    // Button Link For Pricing Table
    $top_group->add_group_field($mrpt_plan_group, array(
        'name' => __( 'Button Link', 'minimal-responsive-pricing-table' ),
        'desc' => __( 'e.g: http://yourlink.com', 'minimal-responsive-pricing-table' ),
        'id'   => $prefix . 'button_link',
        'type' => 'text_url',
        ) );
    // Button Background Color For Pricing Table
    $top_group->add_group_field($mrpt_plan_group, array(
        'name' => __( 'Button Background Color', 'minimal-responsive-pricing-table' ),
        'desc' => __( 'Select Button Header Background Color', 'minimal-responsive-pricing-table' ),
        'id'   => $prefix . 'button_background_color',
        'type'    => 'colorpicker',
        ) );
    // Button font Color For Pricing Table
    $top_group->add_group_field($mrpt_plan_group, array(
        'name' => __( 'Button font Color', 'minimal-responsive-pricing-table' ),
        'desc' => __( 'Select Button font Color', 'minimal-responsive-pricing-table' ),
        'id'   => $prefix . 'button_font_color',
        'type'    => 'colorpicker',
        ) );
    //=========================================//
    //End Metabox For Pricing Table:
    //=========================================//

}

?>