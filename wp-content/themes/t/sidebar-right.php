<?php
/**
 * A template for calling the right sidebar in everypage
 */
 
	global $kode_sidebar;
		
	if( $kode_sidebar['type'] == 'right-sidebar' || $kode_sidebar['type'] == 'both-sidebar' ){ ?>
	<div class="kode-sidebar kode-right-sidebar columns">
		<?php dynamic_sidebar($kode_sidebar['right-sidebar']); 		
		?>
	</div>
	<?php } ?>	
<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
    <div id="secondary" class="widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-2' ); ?>
    </div>
<?php endif; ?>