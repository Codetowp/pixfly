<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Pixfly
*/

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>
<?php  $blog_layout = get_theme_mod('pixfly_blog_layout',__('default','pixfly'));?>
<body <?php if( is_home() && $blog_layout =='default'){  body_class('with-sidebar blog-layout-b'); } else{ body_class();}?>>
<!--Top Nav content-->
<div id="mySidenav" class="sidenav"> <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<nav>
<?php
wp_nav_menu( array(
 'theme_location' => 'menu-1',
 'menu_id'        => 'primary-menu',
) );
?>
</nav>
<hr>
<?php
wp_nav_menu( array(
'theme_location' => 'menu-2',
'menu_id'        => 'secondary-menu',
'menu_class'     => 'other-nav',
) );
?>


<!--share -->
<div class="share-navs">
<ul>
<?php
if ( $socials = get_theme_mod( 'social' ) ){
$socials = $socials ? array_filter( $socials ) : array();
foreach ( $socials as $social => $name ) {
  printf(' <li> <a href="%s" ><i class="fa fa-%s"></i></a></li> ', esc_url( $name ), esc_html( $social ) );
}
}
if( get_theme_mod( 'social' ) == '' ){ ?>
<li><i class="fa fa-share-alt"></i></li>
<li><a href="#"><i class="fa fa-facebook"></i></a></li>
<li><a href="#"><i class="fa fa-twitter"></i></a></li>
<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
<li><a href="#"><i class="fa fa-behance"></i></a></li>
<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
<li><a href="#"><i class="fa fa-tumblr"></i></a></li>
<?php } ?>
</ul>
</div>
<!--/share--> 

</div>
<!--Top Nav content-->

<div id="main-block"> 

<!-- Header section -->
<header id="top-header">
<div class="container">
<div class="row">
  <?php
  $custom_logo = get_theme_mod( 'custom_logo' );
  $logo = wp_get_attachment_image_src( $custom_logo , 'full' );
  $img = esc_url( $logo[0] );
  ?>
  <div class="col-md-3 header-col-1"> <?php if ( has_custom_logo() )
  {

    ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="company-logo"> <img src="<?php echo esc_url($img);  ?>" class="pull-left logo"></a><?php } ?></div>
    <div class="col-md-6  header-col-2"><?php if ( has_custom_logo() )
    {

      ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="company-logo"> <img src="<?php echo esc_url($img);  ?>" class="pull-left logo"></a><?php } ?>
      <div class="clearfix"></div>
      <?php

      echo '<span class="company-name">' . esc_html(get_bloginfo( 'name' )) . '</span>';

      $pixfly_header_description  = get_theme_mod( 'pixfly_header_description',__( 'Section Description' , 'pixfly' ));

      if ($pixfly_header_description != '') echo '<p class="head-content wow fadeInDown" >' . wp_kses_post( $pixfly_header_description ) . ' </p>'; 

      $pixfly_header_tagline  = get_theme_mod( 'pixfly_header_tagline',__( 'Tagline' , 'pixfly' ));

      if ($pixfly_header_tagline != '') echo '<span class="header-tagline wow zoomIn">' . esc_html( $pixfly_header_tagline ) . ' </span> '; 
      ?>
    </div>
    <div class="col-md-3 header-col-3"> <span  class="pull-right openmenu-nav" onclick="openNav()"><i class="fa  fa-bars "></i></span></div>
  </div>
</div>
</header>
<!-- /Header section --> 
