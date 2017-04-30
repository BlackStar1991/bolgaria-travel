

<?php 
	global $theme_option;

	echo '<div class="kode-navigation-wrapper">';

	// navigation
	if( has_nav_menu('main_menu') ){
		if( class_exists('kode_menu_walker') ){
			echo '<nav class="navbar navbar-default navigation" id="kode-main-navigation" role="navigation">';
			wp_nav_menu( array(
				'theme_location'=>'main_menu', 
				'container'=> 'div', 
				'container_class'=> 'collapse navbar-collapse', 
				'container_id'=> 'navbar-collapse-1',
				'menu_class'=> 'nav navbar-nav',
				'walker'=> new kode_menu_walker() 
			) );
		}else{ 
			echo '<nav class="navigation" role="navigation">';
			wp_nav_menu( array(
			'theme_location'=>'main_menu',
			'container'       => 'div', 
			'container_class' => 'collapse navbar-collapse', 
			'container_id'    => 'navbar-collapse-1',
			'menu_class'=> 'nav navbar-nav'
			) );
		}
		
		echo '</nav>'; // kode-navigation
	}else{
	
		$args = array(
		'sort_column' => 'menu_order, post_title',
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
		'show_home'   => false,
		'menu'            => '', 
		'container'       => '', 
		'link_before' => '',
		'link_after'  => '' );
		echo '<nav class="navbar navbar-default navigation" id="kode-main-navigation" role="navigation"><div class="nav navbar-nav">';
			wp_page_menu( $args );
		echo '</div></nav>';
	
	}
	
	echo '<div class="clear"></div>';
	echo '</div>'; // kode-navigation-wrapper
   	
?>
