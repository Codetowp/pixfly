<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pixfly
 */

?>
<section class="single">
<header class="entry-header" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);">
  <div class="content  wow fdeInUp">
    <div class="container "> <a href="<?php the_permalink(); ?>">
      <h1><?php the_title(); ?></h1>
    </a> <span class="date-article"><?php pixfly_posted_on(); ?></span> </div>
  </div>
</header>
</section>
<!--Post container-->

<div class="container">
  <div class="row wow fdeInUp"> 
    <!--blog posts container-->
    <div class="col-md-8 col-md-offset-2 col-sm-12 single-post">
      <article class="post">
        <?php the_content(); ?>
      </article>
      <div class="clearfix"></div>
      
      <!--publisher-info -->
      <div class="publisher-info"><?php
      $user = wp_get_current_user();
      
      if ( $user ) :
        ?>
        <img src="<?php echo esc_url( get_avatar_url( $user->ID ,array('size'=>30)) ); ?>" />
      <?php endif; ?>
      <h6><?php pixfly_posted_by(); ?></h6>
    </div>
    <!--/publisher-info--> 
    
    <!--share -->
    <div class="share-article">
      <ul>
        <li><i class="fa fa-share-alt"></i></li>
        <?php
        if ( $socials = get_theme_mod( 'pixfly_social' ) ){
          $socials = $socials ? array_filter( $socials ) : array();
          foreach ( $socials as $social => $name ) {
            printf(' <li> <a href="%s" ><i class="fa fa-%s"></i></a></li> ', esc_url( $name ), esc_html( $social ) );
          }
        } ?>
      </ul>
    </div>
    <!--/share-->
    
    <hr>
    <div class="clearfix"></div>
    
    <!--posts navigation-->
    <nav class="navigation posts-navigation"  role="navigation">
      <ul>
        <?php $prev_post = get_adjacent_post(false, '', true);
        $prev = get_permalink(get_adjacent_post(false,'',true));
        if(!empty($prev_post)) { ?>
        <li class="pull-left">
          <div class="nav-previous"><a href="<?php echo esc_url($prev); ?>"><i class="fa fa-chevron-left"></i> <?php esc_html_e('Previous post','pixfly'); ?></a></div>
        </li>
        <?php }
        $next_post = get_adjacent_post(false, '', false);
        $next = get_permalink(get_adjacent_post(false,'',false));
        if(!empty($next_post)) { ?>
        <li class="pull-right">
          <div class="nav-next"><a href="<?php echo esc_url($next);  ?>"><?php esc_html_e('Next post','pixfly'); ?> <i class="fa fa-chevron-right"></i></a></div>
        </li>
        <?php } ?>
      </ul>
    </nav>
    <!--/posts navigation-->
    <?php if ( get_edit_post_link() ) : ?>
      <?php
      edit_post_link(
        sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Edit <span class="screen-reader-text">%s</span>', 'pixfly' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          get_the_title()
        ),
        '<span class="edit-link">',
        '</span>'
      );
      ?>
    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <!--comment-->
    <?php
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;
    ?>
    <!--/comment--> 
    
  </div>
  
  <!--blog posts container-->
 
 
  <div class="clearfix"></div>
</div>
</div>
