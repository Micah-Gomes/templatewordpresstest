<?php get_header(); ?>

<?php if (have_posts()) : ?>

<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

<?php /* If this is a category archive */ if (is_category()) { ?>				
<h2> Arquivo da categoria '<?php echo single_cat_title(); ?>'</h2><br /><br />

<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
<h2> Arquivo da tag '<?php single_tag_title(); ?>'</h2><br /><br />
	
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h2> Arquivo de <?php the_time('j/m/y'); ?></h2><br /><br />
		
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2> Arquivo de <?php the_time('m/Y'); ?></h2><br /><br />

<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h2> Arquivo de <?php the_time('Y'); ?></h2><br /><br />
		
<?php /* If this is a search */ } elseif (is_search()) { ?>
<h2> Resultados da Busca</h2><br /><br />
		
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<h2> Arquivo por Autor</h2><br /><br />

<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h2> Arquivos do Blog</h2><br /><br />

<?php } ?>

<?php query_posts($query_string.'&posts_per_page=10'); while (have_posts()) : the_post(); ?>

<div class="post">
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
<?php if(has_post_thumbnail()) {
the_post_thumbnail(array(100,100), array('class' => 'thumb'));
} else {echo '<img src="/wp-content/themes/bow01/images/semimagem.jpg" class="thumb"/>';
}?></a>


<span class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Link Permanente: <?php the_title(); ?>"> <?php the_title(); ?></a></span>

<span class="data"><?php the_date(); ?> | <?php the_category(', ') ?>  <?php edit_post_link('(Editar)'); ?></span><br />
<?php echo excerpt(25); ?><br /><br />
</div>
<div class="space"></div>
<br />
				
<!--
<?php trackback_rdf(); ?>
-->


<?php endwhile; ?>
<div class="space"></div>
<hr />
<?php pagination()?><br />

<?php else : ?>

<span class="page-title"> Nenhum Resultado para a Busca</span><br />
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
<?php endif; ?>
		

<?php get_footer(); ?>