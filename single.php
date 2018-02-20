<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post">
<div class="post-title">
<a href="<?php the_permalink(); ?>" rel="bookmark" title="Link Permanente: <?php the_title(); ?>"> <?php the_title(); ?></a>
</div>

<span class="data"><?php the_time('l',true); ?> <?php the_date(); ?> às <?php the_time('H:i',true); ?> | Arquivado em: <?php the_category( ', '); ?>  <?php edit_post_link('| Editar'); ?></span><br/>

<?php the_content(); ?>

<br />

<?php wp_link_pages('before=<div class="pagination"><span class="current">Páginas:</span>&after=</div>'); ?><br/>

<?php $orig_post = $post;
global $post;
$categories = get_the_category($post->ID);
if ($categories) {
$category_ids = array();
foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
$args=array(
'category__in' => $category_ids,
'post__not_in' => array($post->ID),
'posts_per_page'=> 5, // Number of related posts that will be shown.
'caller_get_posts'=>1
);
$my_query = new wp_query( $args );
if( $my_query->have_posts() ) {
echo '<h2>Posts Relacionados</h2><br />';
while( $my_query->have_posts() ) {
$my_query->the_post();?>
<div class="relacionados">
<a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">
<?php if(has_post_thumbnail()) {
the_post_thumbnail(array(100,100), array( 'class' => 'relthumb' ));
} else {echo '<img src="/wp-content/themes/bow01/images/semimagem.jpg" width="100" height ="100"/>';
}?></a>
<div class="titulo"><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
</div>
<?
}
echo '';
}
}
$post = $orig_post;
wp_reset_query(); ?>

<div class="space"></div><br/><br /><br />





<?php if (function_exists('paged_comments_template')) paged_comments_template(); else comments_template(); ?>
	
<?php endwhile; else: ?>
<?php _e('Sorry, no posts matched your criteria.'); ?>
<?php endif; ?>
<?php get_footer(); ?>