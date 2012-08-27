<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>">
		<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s (permalink)', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<span title="Posted on <?php the_date() ?>, <?php the_time() ?>" class="date"><span><?php the_time('d') ?></span><span><?php the_time('M') ?></span><span>'<?php the_time('y') ?></span></span>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>
		<p><?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); ?></p>
		<?php comments_template(); ?>
	</article>
<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation">
			<?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?>
			<?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>
		</div>
<?php endif; ?>