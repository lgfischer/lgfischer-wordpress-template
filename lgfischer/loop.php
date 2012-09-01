<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>">
		<h1><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s (permalink)', 'lgfischer' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<p title="Posted on <?php the_date() ?>, <?php the_time() ?>" class="date"><span><?php the_time('d') ?></span><span><?php the_time('M') ?></span><span>'<?php the_time('y') ?></span></p>
		<p class="author">Written by <?php the_author() ?></p>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'lgfischer' ) ); ?>
	<?php
		$tags_list = get_the_tag_list( '', '', '' );
		if ( $tags_list ):
	?>
		<p><?php printf( __( 'Tags: %1$s', 'lgfischer' ), $tags_list ); ?></p>
	<?php endif; ?>
	<?php if ( !is_singular($post) ): ?>
		<h3><?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post'); ?></h3>
	<?php endif; ?>
		<?php comments_template(); ?>
	</article>
<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation">
			<?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'lgfischer' ) ); ?>
			<?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'lgfischer' ) ); ?>
		</div>
<?php endif; ?>