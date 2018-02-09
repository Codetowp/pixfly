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
  <div class="container"> <!-- Container -->

    <div class="categories">
      <ul class="cat">
        <li >
          <ol class="type">
           <?php
           $pixfly_portfolio_terms = get_theme_mod( 'pixfly_portfolio_terms',__('jetpack-portfolio-type','pixfly') );
                       $terms = get_terms($pixfly_portfolio_terms); //change to a different POST TYPE (Jetpack Portfolio Project/Category Type)
                       $count = count($terms);
                       $tab_count = get_theme_mod( 'pixfly_portfolio_tab_count',3 );

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
           <div id="lightbox" class="row">
             <?php 
             $posts_per_page_portfolio = get_theme_mod( 'pixfly_portfolio_section_count',8 );
             $args = array(
              'post_type'      => 'jetpack-portfolio',
              'posts_per_page' => $posts_per_page_portfolio,
            );
             $project_query = new WP_Query ( $args );

             if ( post_type_exists( 'jetpack-portfolio' ) && $project_query -> have_posts() ) :

               while ( $project_query -> have_posts() ) : $project_query -> the_post();

                $pixfly_portfolio_terms = get_theme_mod( 'pixfly_portfolio_terms','jetpack-portfolio-type' );

                    $terms = get_the_terms( $post->ID, $pixfly_portfolio_terms); //get our portfolio categories to a single project                  

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
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xs-12 <?php echo esc_html($tax); ?>">
                      <div class="portfolio-item">
                        <div class="hover-bg"> <a href="<?php the_permalink(); ?>">
                          <div class="hover-text"> <small>
                            <?php 
                            $pixfly_portfolio_terms = get_theme_mod( 'pixfly_portfolio_terms',__('jetpack-portfolio-type','pixfly'));
                            $terms=get_the_terms(get_the_ID(), $pixfly_portfolio_terms); 
                            foreach ($terms as $term) {
                             echo esc_html( $term->name);
                             if (next($terms )) {
                              echo esc_html(','); 
                            }
                          }
                          ?></small>
                          <h2><?php the_title(); ?></h2>
                          <div class="clearfix"></div>
                          <span><?php echo esc_html__('Vew Case Study','pixfly') ; ?></span> </div>
                          <img src="<?php the_post_thumbnail_url('pixfly_default_portfolio');?>" class="img-responsive" alt="..."> </a> </div>
                        </div>
                      </div>
                    <?php  endwhile; endif;  wp_reset_postdata();?> 
                  </div>
                </div>
              </section>