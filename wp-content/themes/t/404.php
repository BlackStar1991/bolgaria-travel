<?php
/**
 * The template for displaying 404 pages (Not Found).
 */
get_header(); ?>
		<!--// Main Content //-->
		<div style="padding:50px 0px 50px 0px" class="main-content kd-pagesection">
			<div class="container">
				<div class="kd-404">
					<h1><?php esc_attr_e('!404', 'kode_forest'); ?></h1>
					<span><?php esc_attr_e('Страница не найдена', 'kode_forest'); ?></span>
					<p><?php esc_attr_e('Возможно вы неправильно ввели адрес.', 'kode_forest'); ?></p>
				</div>
			</div>
		</div>
		<!--// Main Content //-->
<?php get_footer(); ?>