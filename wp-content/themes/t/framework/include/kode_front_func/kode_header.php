<?php
/*	
*	Kodeforest Header File
*	---------------------------------------------------------------------
*	This file contains Header style of theme
*	---------------------------------------------------------------------
*/
	if( !function_exists('kode_get_header') ){	
		function kode_get_header ($theme_option) { 
			if($theme_option['kode-header-style'] == 'header-style-1'){ 
				$sticky_class = '';
				if(isset($theme_option['enable-header-sticky'])){
					if($theme_option['enable-header-sticky'] == 'enable'){
						$sticky_class = 'header-sticky';
					}else{
						$sticky_class = '';
					}
				} ?>
				<header class="<?php echo esc_attr($sticky_class);?>" id="mainheader">
				<?php if( $theme_option['enable-top-bar'] == 'enable'){ ?>
					<!--// Top Baar //-->
					<div class="kd-topbar">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<?php 
										if( !empty($theme_option['top-bar-right-text']) ) 
											echo do_shortcode($theme_option['top-bar-right-text']); 
									?>
								</div>
								<div class="col-md-6">
									<ul class="kd-userinfo">
										<?php if($theme_option['enable-social-icon'] == 'enable'){ ?>
										<li>
											<div class="kd-social-network">
												<?php kode_print_header_social_icon(); ?>
											</div>
										</li>
										<?php }?>
										<?php if($theme_option['enable-login-signup'] == 'enable'){ ?>
										<li>
											<?php kode_signup_form();?>
										</li>
										<li>
											<?php kode_signin_form();?>
										</li>
										<?php }?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!--// Top Baar //-->
					<?php }?>
					<!--// Header Baar //-->
					<div class="kd-headbar">
						<div class="container">
							<div class="row">
								<div class="col-md-3">
									<div class="logo">
										<a href="<?php echo esc_url(home_url()); ?>" >
											<?php 
												if(empty($theme_option['logo'])){ 
													echo kode_get_image(KODE_PATH . '/images/logo.png');
												}else{
													echo kode_get_image($theme_option['logo']);
												}
											?>						
										</a>
									</div>
								</div>
								<div class="col-md-9">
									<div class="kd-rightside">
										<?php
										// mobile navigation
											if( class_exists('kode_dlmenu_walker') && has_nav_menu('main_menu') &&
											( empty($theme_option['enable-responsive-mode']) || $theme_option['enable-responsive-mode'] == 'enable' ) ){
												echo '<div class="kode-responsive-navigation dl-menuwrapper" id="kode-responsive-navigation" >';
													echo '<button class="dl-trigger">Open Menu</button>';
														wp_nav_menu( array(
															'theme_location'=>'main_menu', 
															'container'=> '', 
															'menu_class'=> 'dl-menu kode-main-mobile-menu',
															'walker'=> new kode_dlmenu_walker() 
														) );						
												echo '</div>';
											}						
										?>	
										<?php get_template_part( 'header', 'nav' ); ?>	
										<div class="kd-search">
											<a data-target="#searchmodalbox" data-toggle="modal" class="kd-searchbtn" href="#"><i class="fa fa-search"></i></a>
											<!-- Modal -->
											<div aria-hidden="true" role="dialog" tabindex="-1" id="searchmodalbox" class="modal fade kd-loginbox">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-body">
															<a aria-label="Close" data-dismiss="modal" class="close" href="#"><span aria-hidden="true">×</span></a>
															<div class="kd-login-title">
																<h2>поиск по сайту</h2>
															</div>
															<?php
																$search_val = get_search_query();
																if( empty($search_val) ){
																	$search_val = __("Type keywords..." , "kode_forest");
																}
															?>
															<form method="get" id="searchform" action="<?php  echo esc_url(home_url()); ?>/">
																<p><i class="fa fa-search"></i> <input type="text" name="s" id="s" autocomplete="off" data-default="<?php echo esc_attr($search_val); ?>" placeholder="Поиск..."></p>
																<p><input type="submit" class="thbg-color" value="Поиск"> </p>
															</form>

														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--// Header Baar //-->
				</header>
			<?php
			}else if($theme_option['kode-header-style'] == 'header-style-2'){ ?>
				<header class="header4">
					<div class="kode-mainheader">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="logo">
										<a href="<?php echo esc_url(home_url()); ?>" >
										<?php 
											if(empty($theme_option['logo'])){ 
												echo kode_get_image(KODE_PATH . '/images/logo.png');
											}else{
												echo kode_get_image($theme_option['logo']);
											}
										?>						
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="mainheader kd-mainnav">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="right-section">
										<?php
											// mobile navigation
											if( class_exists('kode_dlmenu_walker') && has_nav_menu('main_menu') &&
												( empty($theme_option['enable-responsive-mode']) || $theme_option['enable-responsive-mode'] == 'enable' ) ){
												echo '<div class="kode-responsive-navigation dl-menuwrapper" id="kode-responsive-navigation" >';
												echo '<button class="dl-trigger">Open Menu</button>';
												wp_nav_menu( array(
													'theme_location'=>'main_menu', 
													'container'=> '', 
													'menu_class'=> 'dl-menu kode-main-mobile-menu',
													'walker'=> new kode_dlmenu_walker() 
												) );						
												echo '</div>';
											}						
										?>	
										<?php get_template_part( 'header', 'nav' ); ?>	
										<div class="kd-search">
											<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
											<div class="searchform th-bordercolor">
												<form method="get" id="searchform" action="<?php  echo esc_url(home_url()); ?>/">
													<?php
														$search_val = get_search_query();
														if( empty($search_val) ){
															$search_val = __("Type keywords..." , "kode_forest");
														}
													?>
													<input type="text" name="s" id="s" autocomplete="off" data-default="<?php echo esc_attr($search_val); ?>" placeholder="Search">
													<input type="submit" id="searchsubmit" value="go" class="thbg-color">
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</header>
			<?php
			}else if($theme_option['kode-header-style'] == 'header-style-3'){ ?>
				<header class="header-2">
					<div class="kode-mainheader">
						<div class="container">
							<div class="row">
								<div class="col-md-3">
									<div class="logo">
										<a href="<?php echo esc_url(home_url()); ?>" >
											<?php 
												if(empty($theme_option['logo'])){ 
													echo kode_get_image(KODE_PATH . '/images/logo.png');
												}else{
													echo kode_get_image($theme_option['logo']);
												}
											?>						
										</a>
									</div>
								</div>
								<div class="col-md-9">
									<div class="right-section">
										<?php
										// mobile navigation
										if( class_exists('kode_dlmenu_walker') && has_nav_menu('main_menu') &&
										( empty($theme_option['enable-responsive-mode']) || $theme_option['enable-responsive-mode'] == 'enable' ) ){
											echo '<div class="kode-responsive-navigation dl-menuwrapper" id="kode-responsive-navigation" >';
											echo '<button class="dl-trigger">Open Menu</button>';
											wp_nav_menu( array(
												'theme_location'=>'main_menu', 
												'container'=> '', 
												'menu_class'=> 'dl-menu kode-main-mobile-menu',
												'walker'=> new kode_dlmenu_walker() 
											) );						
											echo '</div>';
										}						
										?>	
										<?php get_template_part( 'header', 'nav' ); ?>
										<div class="kd-search">
											<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
											<div class="searchform th-bordercolor">
												<form method="get" id="searchform" action="<?php  echo esc_url(home_url()); ?>/">
													<?php
														$search_val = get_search_query();
														if( empty($search_val) ){
															$search_val = esc_attr__("Type keywords..." , "kode_forest");
														}
													?>
													<input type="text" name="s" id="s" autocomplete="off" data-default="<?php echo esc_attr($search_val); ?>" placeholder="Search">
													<input type="submit" id="searchsubmit" value="go" class="thbg-color">
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</header>
			<?php
			}else{ ?>
			<header class="kode-header-1">
				<div class="topbaar">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<?php 
									if( !empty($theme_option['top-bar-right-text']) ) 
										echo do_shortcode($theme_option['top-bar-right-text']); 
								?>
								<?php 
									//kode_get_woocommerce_nav();
								?>
							</div>
							<div class="col-md-6">
								<div class="socialnetwork">
									<?php kode_print_header_social_icon(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="mainheader">
					<div class="container">
						<div class="row">
							<div class="col-md-3">
								<div class="logo">
									<a href="<?php echo esc_url(home_url()); ?>" >
									<?php 
										if(empty($theme_option['logo'])){ 
											echo kode_get_image(KODE_PATH . '/images/logo.png');
										}else{
											echo kode_get_image($theme_option['logo']);
										}
									?>						
									</a>
								</div>
							</div>
							<div class="col-md-9">
								<div class="right-section">
									<?php
										// mobile navigation
										if( class_exists('kode_dlmenu_walker') && has_nav_menu('main_menu') &&
											( empty($theme_option['enable-responsive-mode']) || $theme_option['enable-responsive-mode'] == 'enable' ) ){
											echo '<div class="kode-responsive-navigation dl-menuwrapper" id="kode-responsive-navigation" >';
											echo '<button class="dl-trigger">Open Menu</button>';
											wp_nav_menu( array(
												'theme_location'=>'main_menu', 
												'container'=> '', 
												'menu_class'=> 'dl-menu kode-main-mobile-menu',
												'walker'=> new kode_dlmenu_walker() 
											) );						
											echo '</div>';
										}						
									?>	
									<?php get_template_part( 'header', 'nav' ); ?>	
									<div class="kd-search">
										<a href="#" class="search-btn"><i class="fa fa-search"></i></a>
										<div class="searchform th-bordercolor">
											<form method="get" id="searchform" action="<?php  echo esc_url(home_url()); ?>/">
												<?php
													$search_val = get_search_query();
													if( empty($search_val) ){
														$search_val = __("Type keywords..." , "kode_forest");
													}
												?>
												<input type="text" name="s" id="s" autocomplete="off" data-default="<?php echo esc_attr($search_val); ?>" placeholder="Search">
												<input type="submit" id="searchsubmit" value="go" class="thbg-color">
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<?php
			}
		}
	}
