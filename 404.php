<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Pixfly
 */

get_header(); ?>

	 <div class="container">
    <div class="row wow fdeInUp text-center"> 
      <!--blog posts container-->
      <div class="col-md-8 col-md-offset-2 col-sm-12 single-post">
        <article class="post" style="padding-bottom: 100px;">
          <h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'pixfly' ); ?></h1>
          <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'pixfly' ); ?></p>
          <?php
            get_search_form();
          ?>
           <div class="clearfix"></div>
        </article>
    </div>
</div>
</div>
<?php
get_footer();
