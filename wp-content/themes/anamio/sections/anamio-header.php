<?php 					
	$anamio_hide_show_social= get_theme_mod('hide_show_social','1'); 
	$anamio_hs_contact_infos= get_theme_mod('hide_show_contact_infos','1'); 
?>

<header id="header-section" class="header transparent-header  nav-anamio" role="banner">
	<?php if ( ($anamio_hide_show_social) || ($anamio_hs_contact_infos) == '1') : ?>
	<div id="unique-header" class="header-top-info d-lg-block d-none">
		<div class="container">
			<div class="header-widget row">
						<div class="col-lg-8 col-md-7 col-12">
							<div id="header-top-left" class="text-lg-right text-center">
								<?php 
									$anamio_header_email  = get_theme_mod('header_email'); 
									$anamio_header_contact= get_theme_mod('header_contact_num'); 
								?>
								<?php if($anamio_hs_contact_infos == '1') { ?>
									<!-- Start Contact Info -->
									<?php if($anamio_header_email) { ?> 
										<div class="widget widget_info">
											<a href="mailto:<?php echo esc_html($anamio_header_email); ?>">
												<i class="fa fa-envelope"></i>
												<span><?php echo esc_html($anamio_header_email); ?></span>
											</a>
										</div>
									<?php } ?>
									
									<?php if($anamio_header_contact) { ?> 
										<div class="widget widget_info">
											<a href="tel:<?php echo esc_html($anamio_header_contact); ?>">
												<i class="fa fa-phone"></i>
												<span><?php echo esc_html($anamio_header_contact); ?></span>
											</a>
										</div>
									<?php } ?>
									<!-- /End Contact Info -->
								<?php } ?>							
							</div>
						</div>
						
						
						<div class="col-lg-4 col-md-5 col-12">
							<div id="header-top-right" class="text-lg-left text-center">
								<!-- Start Social Media Icons -->
								<?php 
									$anamio_facebook_link		= get_theme_mod('facebook_link',''); 
									$anamio_linkedin_link		= get_theme_mod('linkedin_link',''); 
									$anamio_twitter_link		= get_theme_mod('twitter_link',''); 
									$anamio_googleplus_link 	= get_theme_mod('googleplus_link',''); 
									$anamio_instagram_link		= get_theme_mod('instagram_link',''); 
									$anamio_dribble_link		= get_theme_mod('dribble_link',''); 
									$anamio_github_link			= get_theme_mod('github_link',''); 
									$anamio_bitbucket_link		= get_theme_mod('bitbucket_link',''); 
									$anamio_email_link			= get_theme_mod('email_link',''); 
									$anamio_skype_link			= get_theme_mod('skype_link',''); 
									$anamio_skype_action_link	= get_theme_mod('skype_action_link',''); 
									$anamio_vk_link				= get_theme_mod('vk_link','');
									$anamio_pinterest_link		= get_theme_mod('pinterest_link','');					
								?>				
								<?php if($anamio_hide_show_social == '1') { ?>
									<aside id="social_widget" class="widget widget_social_widget">
										<ul>
											<?php if($anamio_facebook_link) { ?> 
												<li><a class="tool-bounce tool-bottom-left" href="<?php echo esc_url($anamio_facebook_link); ?>" aria-label="fa-facebook"><i class="fa fa-facebook"></i></a></li>
											<?php } ?>
											
											<?php if($anamio_linkedin_link) { ?> 
												<li><a class="tool-bounce tool-bottom-left" href="<?php echo esc_url($anamio_linkedin_link); ?>" aria-label="fa-linkedin"><i class="fa fa-linkedin"></i></a></li>
											<?php } ?>
											
											<?php if($anamio_twitter_link) { ?> 
												<li><a class="tool-bounce tool-bottom-left" href="<?php echo esc_url($anamio_twitter_link); ?>" aria-label="fa-twitter"><i class="fa fa-twitter"></i></a></li>
											<?php } ?>
											
											<?php if($anamio_googleplus_link) { ?> 
												<li><a class="tool-bounce tool-bottom-left" href="<?php echo esc_url($anamio_googleplus_link); ?>" aria-label="fa-google-plus"><i class="fa fa-google-plus"></i></a></li>
											<?php } ?>
											
											<?php if($anamio_instagram_link) { ?> 
												<li><a class="tool-bounce tool-bottom-left" href="<?php echo esc_url($anamio_instagram_link); ?>" aria-label="fa-instagram"><i class="fa fa-instagram"></i></a></li>
											<?php } ?>
											
											<?php if($anamio_dribble_link) { ?> 
												<li><a class="tool-bounce tool-bottom-left" href="<?php echo esc_url($anamio_dribble_link); ?>" aria-label="fa-dribbble"><i class="fa fa-dribbble"></i></a></li>
											<?php } ?>
											
											<?php if($anamio_github_link) { ?> 
												<li><a class="tool-bounce tool-bottom-left" href="<?php echo esc_url($anamio_github_link); ?>" aria-label="fa-github-alt"><i class="fa fa-github-alt"></i></a></li>
											<?php } ?>
											
											<?php if($anamio_bitbucket_link) { ?> 
												<li><a class="tool-bounce tool-bottom-left" href="<?php echo esc_url($anamio_bitbucket_link); ?>" aria-label="fa-bitbucket"><i class="fa fa-bitbucket"></i></a></li>
											<?php } ?>
											
											<?php if($anamio_email_link) { ?> 
												<li><a class="tool-bounce tool-bottom-left" href="mailto:<?php echo esc_attr($anamio_email_link); ?>" aria-label="fa-envelope-o"><i class="fa fa-envelope-o"></i></a></li>
											<?php } ?>
											
											<?php if($anamio_skype_link) { ?> 
												<li><a class="tool-bounce tool-bottom-left" href="<?php echo esc_attr($anamio_skype_link); ?>?<?php echo esc_attr($anamio_skype_action_link); ?>" aria-label="fa-skype"><i class="fa fa-skype"></i></a></li>
											<?php } ?>
											
											<?php if($anamio_vk_link) { ?> 
												<li><a class="tool-bounce tool-bottom-left" href="<?php echo esc_url($anamio_vk_link); ?>" aria-label="fa-vk"><i class="fa fa-vk"></i></a></li>
											<?php } ?>
											
											<?php if($anamio_pinterest_link) { ?> 
												<li><a class="tool-bounce tool-bottom-left" href="<?php echo esc_url($anamio_pinterest_link); ?>" aria-label="fa-pinterest-square"><i class="fa fa-pinterest-square"></i></a></li>
											<?php } ?>
										</ul>
									</aside>
								<?php } ?>
								<!-- /End Social Media Icons-->
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>