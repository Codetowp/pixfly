<?php
/**
* Template part for displaying portfolio content in frontpage
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Pixfly
*/

?>
<section id="portfolio-type-a">
  <div class="full-section container-fluid no-padding infinite-container waypoint"> <!-- Container -->

    <div class="categories">
      <ul class="cat">
        <li >
          <ol class="type">
           <?php
           $pixfly_portfolio_terms = get_theme_mod( 'pixfly_portfolio_terms' );
                       $terms = get_terms($pixfly_portfolio_terms); //change to a different POST TYPE (Jetpack Portfolio Project/Category Type)
                       $count = count($terms);
                       $tab_count = get_theme_mod( 'pixfly_portfolio_tab_count',4);
                       
                       echo '<li><a href="#" data-filter="*" class="active">All</a></li>'; //default "All"
                       if ( $count > 0 && $tab_count >0 ){
                        $i = 1;
                        foreach ( $terms as $term ) {

                         $termname = strtolower($term->name);
                         $termname = str_replace(' ', '-', $termname);
                       echo '<li><a href="#" data-filter=".'.esc_html($termname).'">'.esc_html($term->name).'</a></li>'; //show our custom post type categories
                       if($i++ == $tab_count) break;

                     }
                   }
                   ?>
                 </ol>
               </li>
             </ul>
             <div class="clearfix"></div>
           </div>
           <div id="lightbox"  >
             <?php 
             $posts_per_page_portfolio = get_theme_mod( 'pixfly_portfolio_section_count',8 );
             
             $args = array(
              'post_type'      => 'jetpack-portfolio',
              'posts_per_page' => $posts_per_page_portfolio,
              'paged' => ( get_query_var('page', 1)),
            );
             
             
             $project_query = new WP_Query ( $args );

             if ( post_type_exists( 'jetpack-portfolio' ) && $project_query -> have_posts() ) :

               while ( $project_query -> have_posts() ) : $project_query -> the_post();

                $pixfly_portfolio_terms = get_theme_mod( 'pixfly_portfolio_terms' );

                    $terms = get_the_terms( $post->ID, $pixfly_portfolio_terms ); //get our portfolio categories to a single project                  

                    if ( $terms && ! is_wp_error( $terms ) ) : 
                      $links = array();

                      foreach ( $terms as $term ) {
                        $links[] = $term->name;
                      }
                      $tax_links = join( " ", str_replace(' ', '-', $links));          
                      $tax = strtolower($tax_links);

                    else :  
                      $tax = '';                  
                    endif; 
                    ?>
                    <div class=" col-md-12 col-lg-12 col-xs-12 <?php echo esc_html($tax); ?> loader-g infinite-item">
                      <div class="portfolio-item">
                        <div class="hover-bg"> <a href="<?php the_permalink();?>">
                          <div class="hover-text"> <small>
                           <?php 
                           $pixfly_portfolio_terms = get_theme_mod( 'pixfly_portfolio_terms' );
                           $terms=get_the_terms(get_the_ID(), $pixfly_portfolio_terms); 
                           foreach ($terms as $term) {
                             echo esc_html( $term->name);
                             if (next($terms )) {
                              echo esc_html(','); 
                            }
                          }
                          ?>
                        </small>
                        <h2><?php the_title(); ?></h2>
                        <div class="clearfix"></div>
                        <p class="read-well"><?php esc_html_e('Vew Case Study','pixfly'); ?></p> </div>
                        <img src="<?php the_post_thumbnail_url('pixfly_portfolio-default');?>" class="img-responsive" alt="..."> </a> </div>
                      </div>
                    </div>
                  <?php  endwhile; endif; wp_reset_postdata(); ?> 
                </div>

                <!--page nav-->
                <nav class="navigation posts-navigation  wow fdeInUp" role="navigation" >
                  <ul>
                    
                   <?php
                   global $wp_query;
                   
                   $count_posts = wp_count_posts('jetpack-portfolio');
                   $published_posts = $count_posts->publish;
                   $page = get_query_var( 'page', 1 );  
$big = 999999999; // need an unlikely integer

$paginate_links= paginate_links( array(
  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
  'format' => '?paged=%#%',
  'total' => $published_posts,
  'current'=>$page,
) );
if ( $paginate_links ) {
  echo '<li>';
  echo wp_kses_post($paginate_links);
  echo '</li>';
  
}
?>   
</ul>
</nav>
<!--page nav--> 

</div>
</section>
