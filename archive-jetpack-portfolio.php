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
 $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
 $posts_per_page_portfolio = get_theme_mod( 'pixfly_portfolio_section_count',8);
 $args = array(
  'post_type'      => 'jetpack-portfolio',
  'paged' =>$paged,
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
          <div class="row"> <a href="<?php the_permalink(); ?>">
            <h2><?php the_title(); ?></h2>
          </a> <span class="date-article">10 days ago</span> <a href="<?php the_permalink(); ?>" class="btn btn-nobordered"><i class="fa fa-arrow-right"></i> <?php esc_html_e('Read more','pixfly'); ?></a> </div>
        </div>
      </header>
    </article>
    <!--/article 1--> 
  <?php  endwhile;  endif; ?> 


  <!--page nav-->
  <nav class="navigation posts-navigation  wow fdeInUp" role="navigation" >
    <ul>
      <?php
                   global $wp_query;
                   
                   $count_posts = wp_count_posts('jetpack-portfolio');
                   $posts_display_count = 4;
                   $published_posts = $count_posts->publish;
                   $total =$published_posts / $posts_display_count;
                   if(is_float($total)){ $page_total= $total + 1 ;}

                   $page = get_query_var( 'paged', 1 );  
                  $big = 999999999; // need an unlikely integer

                  $paginate_links= paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'total' => $page_total,
                    'current'=>$page,
                  ) );
                  if ( $paginate_links ) {
                    echo '<li>';
                    echo wp_kses_post($paginate_links);
                    echo '</li>';
                    
                  }
                  wp_reset_postdata();
                  ?>   
    </ul>

  </nav>
<?php  

  get_footer();