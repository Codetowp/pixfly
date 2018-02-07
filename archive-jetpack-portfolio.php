<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pixfly
 */

get_header(); ?> 
<section class="page-article-block text-center"> 
 <?php 
 $posts_per_page_portfolio = get_theme_mod( 'pixfly_portfolio_section_count',8);
 $args = array(
  'post_type'      => 'jetpack-portfolio',
  'posts_per_page' => $posts_per_page_portfolio,
);
 $project_query = new WP_Query ( $args );

 if ( post_type_exists( 'jetpack-portfolio' ) && $project_query -> have_posts() ) :

  while ( $project_query -> have_posts() ) : $project_query -> the_post();
    ?>
    <!--article 1-->
    <article>
      <header class="entry-header" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
        <div class="container">
          <div class="row"> <a href="#">
            <h2><?php the_title(); ?></h2>
          </a> <span class="date-article">10 days ago</span> <a href="<?php the_permalink(); ?>" class="btn btn-nobordered"><i class="fa fa-arrow-right"></i> <?php esc_html_e('Read more','pixfly'); ?></a> </div>
        </div>
      </header>
    </article>
    <!--/article 1--> 
  <?php  endwhile; endif;  wp_reset_postdata();?> 


  <!--page nav-->
  <nav class="navigation posts-navigation  wow fdeInUp" role="navigation" >
    <ul>
      <li class="pull-left">
        <div class="nav-previous"><a href="http://localhost/wordpress/page/2/"><i class="fa fa-chevron-left"></i></a></div>
      </li>
      <li><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li class="pull-right">
        <div class="nav-next"><a href="http://localhost/wordpress/page/2/"><i class="fa fa-chevron-right"></i></a></div>
      </li>
    </ul>
  </nav>
  <?php
  get_footer();