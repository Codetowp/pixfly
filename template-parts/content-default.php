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
	
	<header class="entry-header"> <img src="<?php the_post_thumbnail_url('pixfly_blog_post'); ?>">
		<div class="content-block"> <a href="<?php the_permalink(); ?>">
			<h2><?php the_title(); ?></h2>
		</a>
		<p><?php echo esc_html( wp_trim_words( get_the_content(), 10, '...' ));?></p>
		<span class="date-article"><?php pixfly_days_ago(); ?></span> <a href="<?php the_permalink(); ?>" class="btn btn-nobordered"><i class="fa fa-arrow-right"></i> <?php esc_html_e('Read more','pixfly'); ?></a> </div>
	</header>

</article>
