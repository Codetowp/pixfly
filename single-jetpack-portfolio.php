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
                <div class="clearfix"></div>
               <div><b>Project-types:</b> <?php 
                      $before='';
                      $after='';
                      $separator=',';
                      the_terms(get_the_ID(), 'jetpack-portfolio-type', $before, $separator, $after); 
                      ?></div>
               <div><b>Project-tags:</b><?php 
                      $before='';
                      $after='';
                      $separator=',';
                      the_terms(get_the_ID(), 'jetpack-portfolio-tag', $before, $separator, $after); 
                      ?></div>
            
            <?php  endwhile;endif;
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
              <li class="prev-nav"><?php previous_post_link('%link', 'Previous Project'); ?> </li>
              <li class="back-nav"><a href="<?php echo esc_url(home_url( '/portfolio' )); ?>"><?php esc_html_e('back to all projects','pixfly'); ?></a></li>
              <li class="next-nav"><?php next_post_link('%link', 'Next Project'); ?></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

  <!-- get in touch Section
    ==========================================-->

    <?php
    $background_img   =  get_theme_mod( 'getin_touch_section_image',esc_url(get_template_directory_uri() . '/assets/img/bg-1.jpg') );   
    ?>
    <section class="get-in-touch text-center" style="background-image:url(<?php echo esc_url( $background_img ); ?>);">
      <div class="content">
        <h2>
          <?php 
          $pixfly_main_title  = get_theme_mod( 'pixfly_getin_touch_section_header', esc_html__('Section Title', 'pixfly' ));
          
          if ($pixfly_main_title != '') echo '<span>  ' . wp_kses_post($pixfly_main_title) . ' </span>'; 
          ?>
        </h2>
        <p>
          <?php 
          $pixfly_tag_line  = get_theme_mod( 'pixfly_getin_touch_section_tag_line', esc_html__('Section Tag Line', 'pixfly' ));
          
          if ($pixfly_tag_line != '') echo '<span>  ' . wp_kses_post($pixfly_tag_line) . ' </span>'; 
          ?></p>
          <a href="<?php echo esc_url(get_theme_mod('pixfly_getin_touch_button_url','#')); ?>" class="btn"><?php echo esc_html(get_theme_mod('pixfly_getin_touch_button_text','Button Text')); ?></a> </div>
        </section>
        <?php
        get_footer();
