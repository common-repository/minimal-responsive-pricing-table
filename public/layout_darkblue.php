
<!-- Plans -->
<section class="container minimal-pricing-table">
  <div class="container-fluid">
   
    <div class="row">
      <?php 
      $entries = get_post_meta( $post->ID, '_mrpt_mini_plan_group', true );
      $nb_entries = count($entries);

      
      if (is_array($entries) || is_object($entries))
        foreach ($entries as $key => $plans) {
          if (!empty($plans['_mrpt_currency_sign'])){
            $currency_sign = $plans['_mrpt_currency_sign'];

          }
          if (!empty($plans['_mrpt_recommended'])){
            $recommended = $plans['_mrpt_recommended'];


          }
          if (!empty($plans['_mrpt_header_background_color'])){
            $header_background_color = $plans['_mrpt_header_background_color'];
          }else {
            $header_background_color = '#043844';
          }

          if (!empty($plans['_mrpt_header_font_color'])){
            $header_font_color = $plans['_mrpt_header_font_color'];
          }else {
            $header_font_color = '#FFFFFF';
          }

          if (!empty($plans['_mrpt_button_background_color'])){
            $button_background_color = $plans['_mrpt_button_background_color'];
          }else {
            $button_background_color = '#1E7488';
          }

          if (!empty($plans['_mrpt_button_font_color'])){
            $button_font_color = $plans['_mrpt_button_font_color'];
          }else {
            $button_font_color = '#FFFFFF';
          }
          if (!empty($plans['_mrpt_pricing_background_color'])){
            $pricing_background_color = $plans['_mrpt_pricing_background_color'];
          }else {
            $pricing_background_color = '#1E7488';
          }

          if (!empty($plans['_mrpt_pricing_font_color'])){
            $pricing_font_color = $plans['_mrpt_pricing_font_color'];
          }else {
            $pricing_font_color = '#FFFFFF';
          }

          ?>                <!-- item -->
          <div class="col-sm-4 col-xs-12 text-center">
            <div class="panel panel-success panel-pricing" style="border-color:<?php echo $header_background_color; ?>;">
              <div class="panel-heading" style="background:<?php echo $header_background_color; ?>; border-color:<?php echo $header_background_color; ?>; ">          
                  
             <?php 
                    if (!empty($plans['_mrpt_recommended'])){
                        $plans['_mrpt_recommended'] = true;
                        if($plans['_mrpt_recommended'] == true){ ?>
                        <span class="glyphicon glyphicon-star-empty recommended-plan" aria-hidden="true"></span>              
                        <?php }
                      }
                  ?> 
                  
               <h2 class="title" style="text-align: center; color:<?php echo $header_font_color; ?>">
                 <?php if (!empty($plans['_mrpt_header_title'])){ 
                  echo $plans['_mrpt_header_title'];
                }?>
              </h2>   
            </div>

            <div class="panel-body text-center" style="background:<?php echo $pricing_background_color; ?>;color:<?php echo $pricing_font_color; ?> ">
              <p class="price">
                <sup>
                  <?php if (!empty($plans['_mrpt_currency_sign'])){
                    echo $plans['_mrpt_currency_sign']; } ?>
                  </sup>
                  <span>
                   <?php if (!empty($plans['_mrpt_price'])){ 
                     echo $plans['_mrpt_price'];  } ?>
                   </span>
                   <sub><?php if (!empty($plans['_mrpt_recurrence'])){ 
                    echo $plans['_mrpt_recurrence']; }?>
                  </sub>
                </p>
                <p class="subtitle">
                 <?php
                 if (!empty($plans['_mrpt_header_subtitle'])){
                  echo $plans['_mrpt_header_subtitle']; } 
                  ?>
                </p>
              </div>
              <ul class="list-group text-center">
                <?php

                if (!empty($plans['_mrpt_features'])){ 
                  $feature_list = $plans['_mrpt_features'];
                  $all_features = explode("\n", $feature_list);
                  $all_features = array_filter($all_features, 'trim');

                  foreach ($all_features as $key => $feature) { ?>

                  <li class="list-group-item"><i class="fa fa-check"></i><?php echo $feature; ?></li>

                  <?php }} ?> 
                </ul>
                <div class="panel-footer">
                  
                  <?php if (!empty($plans['_mrpt_button_text'])){  ?>
                  <a class="btn btn-lg btn-block btn-success" style="background-color: <?php echo $button_background_color;?>; border-color: <?php echo $button_background_color;?>;  color: <?php echo $button_font_color;?>; " href="<?php echo $plans['_mrpt_button_link']; ?>">
                    <?php echo $plans['_mrpt_button_text'];} ?>
                  </a>
                </div>
              </div>
            </div>
            <!-- /item -->

            
            <?php


            
          }

          
          ?>
        </div>
      </div>
    </section>
    <!-- /Plans -->