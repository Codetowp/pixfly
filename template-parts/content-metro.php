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
				<h2><?php the_title(); ?></h2>
			</a> <span class="date-article"><?php pixfly_days_ago(); ?></span> <a href="<?php the_permalink(); ?>" class="btn btn-nobordered"><i class="fa fa-arrow-right"></i><?php esc_html_e('Read more','pixfly'); ?></a> </div>
		</div>
	</header>  
</article>