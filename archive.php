<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pixfly
 */

get_header(); ?>


<div class="container with-sidebar blog-layout-b">
	<div class="row"> 
		<!--blog  container-->
		<div class="col-md-8 col-sm-12">

			<?php
			if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'archive' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

			endif; ?>

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
<?php
get_footer();
