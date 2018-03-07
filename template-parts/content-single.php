<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Pixfly
 */

?>
<?php 
$single_layout= get_theme_mod('pixfly_single_blog_layout',__('default','pixfly'));
?>
<header class="entry-header" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
	<div class="content  wow fdeInUp">
		<div class="container "> 
			<h1><?php the_title(); ?></h1>
			<span class="date-article"><?php pixfly_posted_on(); ?></span> </div>
		</div>
	</header>

	<!--Post container-->

	<div class="container">
		<div class="row wow fdeInUp"> 
			<!--blog posts container-->
			<div class="col-md-8 <?php if($single_layout=='default'){ ?>col-md-offset-2<?php } ?> col-sm-12 single-post">
				<article class="post">
					<p><?php the_content(); ?></p>
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
				
			</div>
			<!--/share-->

			<hr>
			<div class="clearfix"></div>
			<div> <b><?php esc_html_e('Tags','pixfly');?>:</b>
				<?php
				$tags = get_the_tags();
				if( $tags !='' ){
					?>    
					<?php
					foreach ( $tags as $tag ) {
						echo  '<a rel="tag" href="' . esc_url( get_category_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a> ';
					}
					?><?php } ?>
				</div>
				<div>

					<b><?php esc_html_e('Category','pixfly'); ?>:</b>
					<?php
					$categories = get_the_category();
					if( $categories !='' ){
						?>    
						<?php
						foreach ( $categories as $category ) {
							echo  '<a rel="tag" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a> ';
						}
						?><?php } ?>


					</div>
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
				<?php if($single_layout=='sidebar-post'){ ?>
				<aside class="col-md-4 col-sm-12" > 
					<?php get_sidebar(); ?> 
				</aside>
				<?php } ?>
				<div class="clearfix"></div>
			</div>
		</div>