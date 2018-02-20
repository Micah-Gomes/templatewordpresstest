<?php get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post">
<span class="page-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"> <?php the_title(); ?></a></span>
<?php edit_post_link('Editar esta página'); ?><br />


<?php the_content(); ?>
</div>

<div class="space"></div> <br/>
   
<?php endwhile; endif; ?>


<?php get_footer(); ?>