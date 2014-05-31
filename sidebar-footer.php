<?php if(is_active_sidebar('first-footer-widget-area')): ?>
	<div class="column col4 footer_column">
		<?php dynamic_sidebar('first-footer-widget-area'); ?>
	</div>
<?php endif; ?>

<?php if(is_active_sidebar('second-footer-widget-area')): ?>
	<div class="column col4 widget_second">
		<?php dynamic_sidebar('second-footer-widget-area'); ?>
	</div>
<?php endif; ?>

<?php if(is_active_sidebar('third-footer-widget-area')): ?>
	<div class="column col4 widget_third">
		<?php dynamic_sidebar('third-footer-widget-area'); ?>
	</div>
<?php endif; ?>

	<div class="column col4 col-last widget_last">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Sidebar 4') ) : ?>
					<?php endif;?>
	</div>