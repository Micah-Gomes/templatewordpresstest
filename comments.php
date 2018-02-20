<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
<p>This post is password protected. Enter the password to view comments.</p>
<?php return;} ?>

<!-- You can start editing here. -->

<h2><?php comments_number('Nenhum comentário', '1 Comentário', '% Comentários' );?> em <em>&#8220;<?php the_title(); ?>&#8221;</em> </h2><br />



<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
<div class="pagination">
<?php paginate_comments_links(array('prev_text' => '&laquo;', 'next_text' => '&raquo;')); ?>
</div>

<div class="space"></div><br/>
<!-- .navigation -->
<?php endif; // check for comment navigation ?>


<?php if ( have_comments() ) : ?>
<?php wp_list_comments('callback=mytheme_comment&style=div'); ?><br/>


<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>

<div class="space"></div><br/>

<div class="pagination">
<?php paginate_comments_links(array('prev_text' => '&laquo;', 'next_text' => '&raquo;')); ?>
</div>



<div class="space"></div><br/>
<!-- .navigation -->
<?php endif; // check for comment navigation ?>


<?php else :?>

<?php if ( comments_open() ) : ?>

<!-- If comments are open, but there are no comments. -->

<?php else :?>

<!-- If comments are closed. -->

<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>


<!-- nothing to see here -->
	

<div id="respond"><h1><?php comment_form_title( 'Comentar', 'Responder para <b>%s</b>' ); ?></h1> <br/>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>Você deve estar <a href="<?php echo wp_login_url( get_permalink() ); ?>">logado</a> para postar um comentário.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( is_user_logged_in() ) : ?>

<?php else : ?>


<div class="space"></div>


<p><label for="author"> Nome <strong>*</strong>:</label> <br/>	
<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></p>

<p><label for="email"> E-mail <strong>*</strong>:</label> <br/>
<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></p>
	
<p><label for="url"> Site/Blog:</label> <br />
<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" /></p>
	
<?php endif; ?>
	
<p><label for="url"> Comentário:</label>  <span class="right"><?php cancel_comment_reply_link('Clique para cancelar a resposta'); ?></span><br />
<textarea name="comment" id="comment" cols="78" rows="10" tabindex="4"></textarea></p>
<span class="center"><?php do_action('comment_toolbar', 'comment');?></span>
<p><input name="submit" type="submit" id="submit" tabindex="5" value="Comentar" /><?php comment_id_fields(); ?></p>
<?php do_action('comment_form', $post->ID); ?>
</form>


<?php endif; ?>
</div> <!-- respond -->

<?php endif; ?>