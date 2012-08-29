	<article>
<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array( 'post_type' => 'post', 'posts_per_page' => 50, 'paged' => $paged );
	$wp_query = new WP_Query($args);
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( 'echo=0' ) ?>" rel="bookmark"><?php the_title(); ?></a></p>
<?php endwhile; else: ?>
		<?php _e('Sorry, no posts matched your criteria.'); ?>
<?php endif; ?>
	</article>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation">
			<?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'lgfischer' ) ); ?>
			<?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'lgfischer' ) ); ?>
		</div>
<?php endif; ?>