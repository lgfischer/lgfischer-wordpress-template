<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php bloginfo( 'name' ) ?></title>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/google-code-prettify/prettify.css" />
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/google-code-prettify/prettify.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/lgfischer.js"></script>
</head>
<body>
	<header>
		<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<ul>
			<?php foreach ( get_pages() as $page ) { ?>
			<li><a href="<?php echo get_page_link( $page->ID )?>"><?php echo $page->post_title ?></a></li>
			<?php } ?>
		</ul>
	</header>