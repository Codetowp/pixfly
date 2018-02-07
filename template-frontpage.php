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
<Section id="home-banner" >
  <div class=" wow fdeInUp"  data-wow-duration="1s"> 
    
    <!--image row with content-->
    <div class="col-md-6 row-with-content">
      <div class="content-row">
        <?php 
        $pixfly_header_intro_header_text  = get_theme_mod( 'pixfly_header_intro_header_text',__( 'Section Main Title' , 'pixfly' ));
        $pixfly_header_intro_sub_heading  = get_theme_mod('pixfly_header_intro_sub_heading',__('Section sub heading','pixfly'));
        $pixfly_header_intro_link_text  = get_theme_mod('pixfly_header_intro_link_text',__('Link Text','pixfly'));
        $pixfly_header_intro_link_url  = get_theme_mod('pixfly_header_intro_link_url','#');

        if ($pixfly_header_intro_header_text != '') echo '<h1 class="wow fadeInUp">' . esc_html( $pixfly_header_intro_header_text ) . '</h1>';
        if ($pixfly_header_intro_sub_heading != '') echo '<span class="wow fadeInUp">' . esc_html( $pixfly_header_intro_header_text ) . '</span>';
        $pixfly_link_url=get_theme_mod( 'pixfly_Banner_link_url',esc_url('#','pixfly'));
        ?>
        <a href="<?php echo esc_url($pixfly_header_intro_link_url); ?>"><?php echo esc_html($pixfly_header_intro_link_text); ?></a> 
    </div>
</div>
<!--/image row with content--> 

<!--image row  without content-->
<?php 
$pixfly_header_intro_image= get_theme_mod('pixfly_header_intro_image',get_template_directory_uri() . '/assets/img/bg-1.jpg');
?>
<div class="col-md-6 row-without-content wow fadeInLeft" style="background-image:url(<?php echo esc_url($pixfly_header_intro_image); ?>);"> </div>
<!--image row without content--> 

</div>
</Section>

  <!-- Portfolio Section
    ==========================================-->
    <?php 
    $portfolio_home_layouts = get_theme_mod('pixfly_portfolio_layout',__('default','pixfly'));
    get_template_part( 'template-parts/portfolio', $portfolio_home_layouts );        
    get_footer();
