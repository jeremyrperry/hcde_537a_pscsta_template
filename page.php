<?php get_header(); ?>

<?php if(have_posts()) while(have_posts()): the_post(); ?>

<?php if(get_post_meta(get_the_ID(), 'page_title', true) != 0) get_template_part('element', 'page-header'); ?>
	
<div id="main" class="main">
	<div class="container">
		<section id="content" class="content <?php cpotheme_sidebar_position(); ?>">
		<?php if (is_page('Home')) { 
			$last = wp_get_recent_posts( '1');
			$last_id = $last['0']['ID'];
			query_posts( 'p='.$last_id );?>
			<?php while ( have_posts() ) : the_post(); ?>
			<br /><br />
			<h1>News</h1>
			<div id="main_page_banner">
				<div id ="main_page_news">
					<h3><?php the_title(); ?></h3>
					<?php echo get_my_excerpt(35)?><a href="<?php the_permalink() ?>"> ...more</a>
					<!--<script>
						jQuery(document).ready(function(){
							var pHtml = jQuery('#main_page_news p').html();
							pHtml = pHtml.slice(0, -1) +'<a href="<?php the_permalink(); ?>"> ...more</a>';
							jQuery('#main_page_news p').html(pHtml);
						});
					</script>-->
				</div>
			</div>
			<h3 style="text-align: right;"><a href="/wp/news/">Read more PSCSTA News ...</a></h3>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
			<?php } ?>	
		<?php if( !is_front_page() ) : ?>
		<h1><?php the_title(); ?></h1>
		<?php endif; ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="page-content">
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => '<div class="page-link">'.__('Pages', 'cpotheme').':', 'after' => '</div>')); ?>
				</div>
			</div>
			<?php //comments_template('', true); ?>
		</section>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>