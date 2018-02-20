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

<h1>Últimos Posts</h1>
<?php $lastposts = get_posts('numberposts=3&offset=0');
foreach($lastposts as $post) : setup_postdata($post);?><ul>
<li><a href="<?php the_permalink(); ?>" id="<?php the_ID(); ?>"><?php the_title(); ?></a><br />
<?php the_time('d',true); ?> de <?php the_time('F',true); ?> | <?php comments_number('Nenhum comentário','1 comentário','% comentários'); ?></li></ul>
<?php endforeach; ?>  
<br/>

<h1>Busca</h1>
<?php get_search_form(); ?>