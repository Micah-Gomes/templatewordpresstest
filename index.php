<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post">
<div class="post-title">
<a href="<?php the_permalink(); ?>" rel="bookmark" title="Link Permanente: <?php the_title(); ?>"> <?php the_title(); ?></a>
</div>

<span class="data"><?php the_time('l',true); ?> <?php the_date(); ?> às <?php the_time('H:i',true); ?> | Arquivado em: <?php the_category( ', '); ?> <?php edit_post_link('| Editar'); ?></span><br/>

<?php the_content( ); ?>

<span class="right"><?php comments_popup_link(__('Comentários'), __('1 comentário'), __('%  comentários'),'commentslink', __('Comentários Fechados')); ?></span><br />

</div>

<span class="data"><?php the_tags('Tags: ', ', ', '<br />'); ?></span><br />

<br />

<?php endwhile; ?>

<?php pagination()?><br />


<?php else : ?>
<?php endif; ?>
<?php get_footer(); ?>