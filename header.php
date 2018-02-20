<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset=<?php bloginfo('charset'); ?> />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Arquivo <?php } ?> <?php wp_title(); ?></title>
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) )	wp_enqueue_script( 'comment-reply' ); wp_head();?>
<!--[if lt IE 9]><script src="/wp-content/themes/bow01/html5.js"></script><![endif]-->

</head>
<body>
<div id="page">
<header id="header">
</header>

<aside id="sidebar">
<?php get_sidebar(); ?>
</aside>


<nav id="menu">
<ul>
<li<?php if ( is_home() || is_category() || is_archive() || is_search() || is_single() || is_date() ) { echo ' class="current"'; } ?>><a href="<?php bloginfo('siteurl'); ?>" title="Home">Home</a></li>
<li<?php if ( is_page('sobre') ) { echo ' class="current"'; } ?>><a href="<?php bloginfo('siteurl'); ?>/about" title="Sobre o Site">About</a></li>
<li<?php if ( is_page('links') ) { echo ' class="current"'; } ?>><a href="<?php bloginfo('siteurl'); ?>/blogroll" title="Blogroll">Blogroll</a></li>
<li<?php if ( is_page('contato') ) { echo ' class="current"'; } ?>><a href="<?php bloginfo('siteurl'); ?>/contato" title="Contato">Contato</a></li>
</ul>
</nav>

<article id="content">