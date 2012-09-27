		<h2><a id="comments" href="#comments">Comments</a></h2>
		<ol class="comments">
			<?php foreach ($comments as $comment) : ?>
			<li id="comment-<?php comment_ID() ?>">
				<?php 
					$author_url = get_comment_author_url();
					if ( $author_url!='' ) { echo "<a href='". $author_url ."'>" . get_avatar( $comment, 40 ) . "</a>"; }
					else { echo get_avatar( $comment, 40 ); }
				?>
				<?php if (current_user_can( 'edit_comment', $comment->comment_ID )) : ?>
				<p class="edit"><?php edit_comment_link(); ?></p>
				<?php endif ?>
				<p class="author"><?php comment_author_link() ?> (<a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F jS, Y') ?></a>)</p>
				<div class="message">
					<?php comment_text() ?>
					<?php if ($comment->comment_approved == '0') : ?>
					<p class="alert">Your comment is awaiting moderation.</p>
					<?php endif; ?>
				</div>
			</li>
			<?php endforeach; ?>
		</ol>
		<?php /*comment_form();*/ ?>
		<?php
			$commenter = wp_get_current_commenter();
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );
			$fields =  array(
				'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'domainreference' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' . 
							'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
				'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> ' .
							'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
				'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
							'<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
			);
			
			global $current_user;
			get_currentuserinfo();
			$comments_args = array(
					'fields' => $fields,
					'logged_in_as' => get_avatar( $current_user->user_email, 40 ).'<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
					'comment_notes_before' => get_avatar( $current_user->user_email, 40 ).'<p class="comment-notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>'
			);
			comment_form($comments_args);
		?>
