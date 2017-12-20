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

								<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'understrap' ); ?></p>
								<?php
							else : ?>

								<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'understrap' ); ?></p>
								<?php
							endif; ?>

						<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

						<?php if ( understrap_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>

							<div class="widget widget_categories">

								<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'understrap' ); ?></h2>

								<ul>
									<?php
									wp_list_categories( array(
										'orderby'    => 'count',
										'order'      => 'DESC',
										'show_count' => 1,
										'title_li'   => '',
										'number'     => 10,
									) );
									?>
								</ul>

							</div><!-- .widget -->

						<?php endif; ?>

						<?php

						/* translators: %1$s: smiley */
						$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'understrap' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

						the_widget( 'WP_Widget_Tag_Cloud' );
						?>

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
