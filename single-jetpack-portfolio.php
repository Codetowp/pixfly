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
  
  <!-- banner Page
    ==========================================-->
  <div id="page-banner" style="background-image: url(<?php the_post_thumbnail_url('full');?>);"> </div>
  <!-- portfolio conten
    ==========================================-->
<section class="portfolio-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>
                    <?php the_title(); ?>
                </h1>
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <p><?php the_content(); ?></p>
                <?php 
                    endwhile;endif;
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>
  
  <!-- portfolio navigation
    ==========================================-->
  <section class="porfolio-page-nav">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <ul>
            <li class="prev-nav"><a href="#">previous project</a></li>
            <li class="back-nav"><a href="#">back to all projects</a></li>
            <li class="next-nav"><a href="#">next project</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  
  <!-- get in touch Section
    ==========================================-->

<?php
    $background_img   =  get_theme_mod( 'getin_touch_section_bck_ground_image' );   
?>
  <section class="get-in-touch text-center" style="background-image:url(<?php echo esc_url( $background_img ); ?>);">
    <div class="content">
      <h2>
          <?php 
                $pixfly_main_title  = get_theme_mod( 'getin_touch_section_header', esc_html__('GET IN TOUCH', 'pixfly' ));
          
                if ($pixfly_main_title != '') echo '<span>  ' . wp_kses_post($pixfly_main_title) . ' </span>'; 
            ?>
      </h2>
      <p>
          <?php 
                $pixfly_tag_line  = get_theme_mod( 'getin_touch_section_tag_line', esc_html__('Design is the creation of a plan', 'pixfly' ));
          
                if ($pixfly_tag_line != '') echo '<span>  ' . wp_kses_post($pixfly_tag_line) . ' </span>'; 
            ?></p>
      <a href="#" class="btn">contact us</a> </div>
  </section>
<?php
get_footer();
