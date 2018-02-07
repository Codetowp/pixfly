<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pixfly
 */

?>

<footer class="footer-bottom">
  <div class="container">
    <div class="row text-center"> 

      <!--footer logos-->
      <?php
      $custom_logo = get_theme_mod( 'custom_logo' );
      $logo = wp_get_attachment_image_src( $custom_logo , 'full' );
      $img = esc_url( $logo[0] );
      ?>
      <div class="col-md-12 footer-logos"><?php if ( has_custom_logo() )
      {

        ?> <a href="#" class="company-logo"> <img src="<?php echo esc_url($img);  ?>" class="logo"></a><?php } 

        echo '<span class="company-name">' . esc_html(get_bloginfo( 'name' )) . '</span>'; ?> </div>
        <!--/footer logos--> 
        
        <!--footer nav-->
        <div class="col-md-12 footer-nav">
         <?php
         wp_nav_menu( array( 
          'theme_location'    => 'menu-3', 
          'menu_class'        => 'footer-nav',
          'container'         => '',
          'container-class'   => '',
        ) );
        ?>
      </div>
      <!--/footer nav--> 
      
      <!--footer social-->
      <div class="col-md-12 footer-social">
        <ul>
         <?php
         if ( $socials = get_theme_mod( 'pixfly_social' ) ){
          $socials = $socials ? array_filter( $socials ) : array();
          foreach ( $socials as $social => $name ) {
            printf(' <li> <a href="%s" ><i class="fa fa-%s"></i></a></li> ', esc_url( $name ), esc_html( $social ) );
          }
        }
        if( get_theme_mod( 'social' ) == '' ){ ?>
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
        <li><a href="#"><i class="fa fa-behance"></i></a></li>
        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        <?php } ?>
      </ul>
    </div>
    <!--/footer social--> 
    
    <!--footer copyright-->
    <div class="col-md-12 footer-copyright">
      <p><?php esc_html_e('ALL RIGHTS RESERVED. COPYRIGHT &#169; 2017. A theme by', 'pixfly');?> </p>
    </div>
    <!--/footer copyright--> 
    
  </div>
</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
