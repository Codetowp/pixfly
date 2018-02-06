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
            <div class="content-block"> <a href="#">
              <h2><?php the_title(); ?></h2>
              </a>
              <p><?php echo esc_html( wp_trim_words( get_the_content(), 10, '...' ));?></p>
              <span class="date-article">2 days ago</span> <a href="#" class="btn btn-nobordered"><i class="fa fa-arrow-right"></i> Read more</a> </div>
          </header>
        
</article>
