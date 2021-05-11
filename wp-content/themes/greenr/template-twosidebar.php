<?php
/**
 * Template Name: 2 Sidebars : Right and Left
 */

get_header(); 
get_template_part('breadcrumb'); 
do_action('greenr_before_content');?>	
<?php do_action('greenr_single_page_flexslider_featured_image'); ?>
<div id="content" class="site-content container">

 	<?php get_sidebar('left'); ?>

	<div id="primary" class="content-area eight columns">
		
		<main id="main" class="site-main" role="main">
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>
		</main><!-- #main -->
		
	</div><!-- #primary -->
	

	<?php get_sidebar(); ?>
	
<?php get_footer(); ?>