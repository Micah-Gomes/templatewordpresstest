<?php get_header(); ?>

<?php if (have_posts()) : ?>

<div class="post">
<h1> Resultados da Busca: <em>

<?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e
(''); echo $count . ' '; _e
('resultados para '); _e
('<strong>&#8220;'); echo $key; _e('&#8221;</strong>'); 
 wp_reset_query(); ?></em>
</h1><br />

<?php query_posts($query_string.'&posts_per_page=10'); while (have_posts()) : the_post(); ?>		
  

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
	
<?php endwhile; ?>
<?php else : ?>

<span class="page-title"> Página não Encontrada</span><br />

<p>Nenhum resultado para sua busca. </p>

<?php endif; ?>
<div class="space"></div>
<hr/>
<?php pagination()?><br />

<?php get_footer(); ?>