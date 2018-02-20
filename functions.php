<?php

remove_action( 'wp_head', 'index_rel_link' );
add_action('init', 'remheadlink');
function remheadlink() {
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
}

// Thumbnail
if (function_exists( 'add_theme_support' ) ) :
add_theme_support( 'post-thumbnails' );
endif;

//Limitar Excerpt
function excerpt($limit) {
$excerpt = explode(' ', get_the_excerpt(), $limit);
if (count($excerpt)>=$limit) {
array_pop($excerpt);
$excerpt = implode(" ",$excerpt).'...';
} else {
$excerpt = implode(" ",$excerpt);
}
$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
return $excerpt;
}

//Comentarios
function mytheme_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<?php echo get_avatar( $comment, 50); ?> 
<div>
<div class="comment <?php if (1 == $comment->user_id) $oddcomment = "authcomment"; echo $oddcomment;?>" id="li-comment-<?php comment_ID() ?>">
<span class="commentname"> <em><b><?php comment_author_link(); ?></b></em> | <?php comment_date('d-m-Y') ?> às <?php comment_time('H:i'); ?>  
<?php comment_reply_link(array_merge( $args, array('reply_text' => __('| Responder'),'depth' => $depth, 'max_depth' => $args['max_depth']))) ?> <?php edit_comment_link(' (Editar)','',''); ?>
</span>
<hr/>
<?php comment_text() ?> 
<?php if ($comment->comment_approved == '0') : ?>
<b>Seu comentário precisa ser aprovado</b><br /><br />
<?php endif; ?>
</div>
<?php
}

//Paginação
function pagination($pages = '', $range = 5)
{
$showitems = ($range * 2)+1;
global $paged;
if(empty($paged)) $paged = 1;
if($pages == ''){
global $wp_query;
$pages = $wp_query->max_num_pages;
if(!$pages){
$pages = 1;
}
}
if(1 != $pages){
echo "<div class=\"pagination\"><span class=\"current\">Página ".$paged." de ".$pages."</span>";
if($paged > 1 && $showitems < $pages) echo "<a title=\"Anterior\" href='".get_pagenum_link($paged - 1)."'>&laquo;</a>";
for ($i=1; $i <= $pages; $i++)
{
if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
{
echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a title=\"Página $i\" href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
}
}
if ($paged < $pages && $showitems < $pages) echo "<a title=\"Próxima\" href=\"".get_pagenum_link($paged + 1)."\">&raquo;</a>";
echo "</div>\n";
}
}



?>