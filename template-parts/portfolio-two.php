<?php
/**
* Template part for displaying portfolio content in frontpage
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Pixfly
*/

?>
<section id="portfolio-type-b">
  <div class="container"> <!-- Container -->
    <div class="categories">
      <ul class="cat">
        <li >
          <ol class="type"> 
           <?php
           $pixfly_portfolio_terms = get_theme_mod( 'pixfly_portfolio_terms','jetpack-portfolio-type');
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
         <div id="pic-block" class="photos clearfix">
          <?php 
          $posts_per_page_portfolio = get_theme_mod( 'pixfly_portfolio_section_count',8);
          $args = array(
            'post_type'      => 'jetpack-portfolio',
            'posts_per_page' => $posts_per_page_portfolio,
          );
          $project_query = new WP_Query ( $args );

          if ( post_type_exists( 'jetpack-portfolio' ) && $project_query -> have_posts() ) :

           while ( $project_query -> have_posts() ) : $project_query -> the_post();

            $pixfly_portfolio_terms = get_theme_mod( 'pixfly_portfolio_terms' ,'jetpack-portfolio-type'));

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

                  <div class="photo <?php echo esc_html($tax); ?>">
                   <a href="<?php the_permalink();?>"> <img src="<?php the_post_thumbnail_url();?>" alt="..."></a>
                 </div>
               <?php  endwhile; endif;  wp_reset_postdata();?> 
             </div>
           </div>
         </section>