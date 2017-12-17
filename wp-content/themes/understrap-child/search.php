<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<div class="wrapper" id="search-wrapper">

	<header class="page-header styled-header">

		<div class="<?php echo esc_attr( $container ); ?>">

			<?php if ( have_posts() ) : ?>

				<h1 class="page-title"><?php printf(
				/* translators:*/
				 esc_html__( 'Search Results for: %s', 'understrap' ),
					'<span>' . get_search_query() . '</span>' ); ?></h1>

			<?php else : ?>

				<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'understrap' ); ?></h1>

			<?php endif; ?>

		</div>

	</header><!-- .page-header -->

	<div class="<?php echo esc_attr( $container ); ?> content" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php if ( 'left' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

				<?php get_sidebar( 'left' ); ?>

			<?php endif; ?>

			<?php get_template_part( 'global-templates/primary-check' ); ?>

				<main class="site-main" id="main">

					<?php if ( have_posts() ) : ?>

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'loop-templates/content', 'search' );
							?>

						<?php endwhile; ?>

					<?php else : ?>

							<?php
							if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

								<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'understrap' ), array(
						'a' => array(
							'href' => array(),
						),
					) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

							<?php elseif ( is_search() ) : ?>

								<p class="mb-0"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'understrap' ); ?></p>
								<?php
							else : ?>

								<p class="mb-0"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'understrap' ); ?></p>
								<?php
							endif; ?>

					<?php endif; ?>

				</main><!-- #main -->

				<!-- The pagination component -->
				<?php understrap_pagination(); ?>

			</div><!-- #primary -->

			<!-- Do the right sidebar check -->
			<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

				<?php get_sidebar( 'right' ); ?>

			<?php endif; ?>

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
