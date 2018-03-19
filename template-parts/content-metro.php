<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pixfly
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="wow fadeInUp">
	<header class="entry-header" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
		<div class="container">
			<div class="row"> <a href="<?php the_permalink(); ?>">
				<?php
$category = get_the_category(); 

?><small><?php echo esc_html($category[0]->cat_name); ?></small>
				<h2><?php the_title(); ?></h2>
			<div class="clearfix"></div>
                <a class="read-well" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','intensify'); ?></a></div>
		</div>
	</header>  
</article>