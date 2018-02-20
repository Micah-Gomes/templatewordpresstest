<img src="/wp-content/themes/bow01/images/blog-name.png" alt="" class="center"/> 


<div id="perfil">
texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto  </div>


<h1>Contato</h1>
<ul class="colleft">
<li><a href="http://www.facebook.com/user" title="Facebook">Facebook</a></li>
<li><a href="http://flickr.com/user" title="Flickr">Flickr</a></li>
</ul>
<ul class="colright">
<li><a href="http://twitter.com/user" title="Twitter">Twitter</a></li>
<li><a href="http://twitpic.com/photos/user" title="Email">Email</a></li>

</ul>

<div class="space"></div>

<h1>Flickr</h1>
<div id="flickr"><script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=6&amp;display=latest&amp;size=s&amp;layout=h&amp;source=user&amp;user=xxxxxx"></script></div>


<h1>Categorias</h1>

<?php
$cats = explode("<br />",wp_list_categories('title_li=&echo=0&depth=0&style=none'));
$cat_n = count($cats) - 1;
for ($i=0;$i<$cat_n;$i++):
if ($i<$cat_n/2):
$cat_left = $cat_left.'<li>'.$cats[$i].'</li>';
elseif ($i>=$cat_n/2):
$cat_right = $cat_right.'<li>'.$cats[$i].'</li>';
endif;
endfor;
?>
<ul class="colleft">
<?php echo $cat_left;?>
</ul>
<ul class="colright">
<?php echo $cat_right;?>
</ul>


<h1>Últimos Posts</h1>
<?php $lastposts = get_posts('numberposts=3&offset=0');
foreach($lastposts as $post) : setup_postdata($post);?><ul>
<li><a href="<?php the_permalink(); ?>" id="<?php the_ID(); ?>"><?php the_title(); ?></a><br />
<?php the_time('d',true); ?> de <?php the_time('F',true); ?> | <?php comments_number('Nenhum comentário','1 comentário','% comentários'); ?></li></ul>
<?php endforeach; ?>  
<br/>

<h1>Busca</h1>
<?php get_search_form(); ?>