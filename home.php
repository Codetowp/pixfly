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
 * @package pixfly
 */

get_header(); ?>
<?php $blog_layout = get_theme_mod('pixfly_blog_layout',__('default','pixfly')); 

if($blog_layout =='default'){ 
  ?>
  <div class="container">
    <div class="row"> 
      <!--blog  container-->
      <div class="col-md-8 col-sm-12">
        <?php if ( have_posts() ) :
        /* Start the Loop */
        while ( have_posts() ) : the_post();
          
          get_template_part( 'template-parts/content', 'default' );
          
          endwhile; ?>
          
          
          <!--page nav-->
         
        <!--page nav--> 
      <?php else :
      
      get_template_part( 'template-parts/content', 'none' );
      
      endif; ?>
     <nav class="navigation posts-navigation  wow fdeInUp" role="navigation" >
            <ul>
              <li>
               <?php
               the_posts_pagination(
                array(
                  'prev_text' => '<i class="fa fa-chevron-left"></i>' ,
                  'next_text' =>  '<i class="fa fa-chevron-right"></i>',
                )
              );
              ?>
            </li>
          </ul>
        </nav>
    </div>
    <!--blog container--> 
    
    <!--aside-->
    <aside class="col-md-4 col-sm-12" > 
      <?php get_sidebar(); ?>
      
    </aside>
    <!--aside-->
    
    <div class="clearfix"></div>
  </div>
</div>
<?php } else{?>
<section class="page-article-block text-center"> 
  
  <!--/article 1--> 
  <?php if ( have_posts() ) :
  /* Start the Loop */
  while ( have_posts() ) : the_post();
    
    get_template_part( 'template-parts/content', 'metro' );
    
    endwhile; ?>
    
    
    
  <!--page nav--> 
<?php else :

get_template_part( 'template-parts/content', 'none' );

endif; ?>
<!--page nav--> 
<nav class="navigation posts-navigation  wow fdeInUp" role="navigation" >
            <ul>
              <li>
               <?php
               the_posts_pagination(
                array(
                  'prev_text' => '<i class="fa fa-chevron-left"></i>' ,
                  'next_text' =>  '<i class="fa fa-chevron-right"></i>',
                )
              );
              ?>
            </li>
          </ul>
        </nav>
</section>


<?php }
get_footer();