<?php 
	$anamio_hs_cta				= get_theme_mod('hide_show_call_actions','on'); 
	$anamio_cta_bg_setting		= get_theme_mod('call_action_background_setting',esc_url(get_template_directory_uri() .'/images/cta.jpg'));
	$anamio_cta_btn_lbl			= get_theme_mod('call_action_button_label');
	$anamio_cta_btn_link		= get_theme_mod('call_action_button_link');
	$anamio_cta_btn_target		= get_theme_mod('call_action_button_target');
	$anamio_cta_btn_middle_text	= get_theme_mod('call_action_btn_middle_text');
	$anamio_cta_button_label2	= get_theme_mod('call_action_button_label2');
	$anamio_cta_button_link2	= get_theme_mod('call_action_button_link2');
	$anamio_cta_button_title	= get_theme_mod('call_action_button_title','');
	$anamio_cta_button2_icon	= get_theme_mod('call_action_button2_icon','fa-phone');
	$anamio_cta_button_review_ttl= get_theme_mod('call_action_review_ttl');
	$anamio_cta_button3_icon	= get_theme_mod('call_action_button3_icon','fa-phone');
	$anamio_cta_button3_title	= get_theme_mod('call_action_button3_title');
	$anamio_cta_button_label3	= get_theme_mod('call_action_button_label3');
	$anamio_cta_button_link3	= get_theme_mod('call_action_button_link3');
	
	if($anamio_hs_cta == 'on') :
?>
<section id="cta-unique" class="call-to-action-anamio wow fadeInDown">
	<div class="background-overlay">
        <div class="container">
            <div class="row padding-top-25 padding-bottom-25">                
                <div class="col-md-6 flexing">
					<?php 
						$anamio_aboutusquery1 = new wp_query('page_id='.get_theme_mod('call_action_page',true)); 
						if( $anamio_aboutusquery1->have_posts() ) 
						{   while( $anamio_aboutusquery1->have_posts() ) { $anamio_aboutusquery1->the_post(); 
						?>
						<h2 class="demo1"> <?php the_title(); ?> <span class="rotate"> <?php the_content(); ?></span> </h2>
						
						<?php if(!empty($anamio_cta_button_review_ttl)): ?>
						<p class="ttl"><?php echo wp_kses_post($anamio_cta_button_review_ttl); ?></p>
						<?php endif; ?>
						<?php } } wp_reset_postdata(); ?>
				</div>				
				
                <div class="col-md-6 text-right flexing flexing-lg-end">
					<?php if(!empty($anamio_cta_button2_icon) || !empty($anamio_cta_button_title) || !empty($anamio_cta_button_label2)): ?>
					<div class="call-wrapper call-wrapper1">
						<div class="cta-info">
							<?php if(!empty($anamio_cta_button_title)): ?>
							<div class="call-title"><?php echo wp_kses_post($anamio_cta_button_title); ?></div>
							<?php endif; ?>
							<?php if(!empty($anamio_cta_button_label2)): ?>
							<div class="call-phone"><a href="tel:<?php echo esc_url($anamio_cta_button_link2); ?>"><?php echo wp_kses_post($anamio_cta_button_label2); ?></a></div>
							<?php endif; ?>		
						</div>
						<?php if(!empty($anamio_cta_button2_icon)): ?>
						<div class="call-icon-box"><i class="fa <?php echo esc_attr($anamio_cta_button2_icon); ?>"></i></div>
						<?php endif; ?>	
					</div>
					<?php endif; ?>	
					
					<?php if(!empty($anamio_cta_button3_icon) || !empty($anamio_cta_button3_title) || !empty($anamio_cta_button_label3)): ?>
					<div class="call-wrapper call-wrapper2">
						<?php if(!empty($anamio_cta_button3_icon)): ?>
						<div class="call-icon-box"><i class="fa <?php echo esc_attr($anamio_cta_button3_icon); ?>"></i></div>
						<?php endif; ?>	
						<div class="cta-info">
							<?php if(!empty($anamio_cta_button3_title)): ?>
							<div class="call-title"><?php echo wp_kses_post($anamio_cta_button3_title); ?></div>
							<?php endif; ?>
							<?php if(!empty($anamio_cta_button_label3)): ?>
							<div class="call-phone"><a href="mailto:<?php echo esc_url($anamio_cta_button_link3); ?>"><?php echo wp_kses_post($anamio_cta_button_label3); ?></a></div>
							<?php endif; ?>		
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="clearfix"></div>
<?php endif; ?>
