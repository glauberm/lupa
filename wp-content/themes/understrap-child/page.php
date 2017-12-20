<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

?>

<div class="wrapper" id="page-wrapper" itemscope itemtype="https://schema.org/Article">

	<header class="entry-header styled-header">

		<div class="<?php echo esc_attr( $container ); ?>">

			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		</div>

	</header><!-- .entry-header -->

	<div class="<?php echo esc_attr( $container ); ?> content" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php if ( 'left' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

				<?php get_sidebar( 'left' ); ?>

			<?php endif; ?>

			<?php get_template_part( 'global-templates/primary-check' ); ?>

				<main class="site-main" id="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

							<div class="entry-content">

								<div itemprop="articleBody">
									<?php the_content(); ?>
								</div>

								<?php
								wp_link_pages( array(
									'before' => '<div class="page-links" itemprop="pagination">' . __( 'Pages:', 'understrap' ),
									'after'  => '</div>',
								) );
								?>

							</div><!-- .entry-content -->

							<div class="entry-footer">

								<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

							</div><!-- .entry-footer -->

						</article><!-- #post-## -->

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

			<!-- Do the right sidebar check -->
			<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

				<?php get_sidebar( 'right' ); ?>

			<?php endif; ?>

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
