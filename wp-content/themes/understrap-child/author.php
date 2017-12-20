<?php
/**
 * The template for displaying the author pages.
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );
?>


<div class="wrapper" id="author-wrapper">

	<div class="styled-header">

		<div class="<?php echo esc_attr( $container ); ?>">

			<div class="row align-center">
				<?php if ( ! empty( $curauth->ID ) ) : ?>
					<div class="mr-3">
						<?php echo get_avatar( $curauth->ID ); ?>
					</div>
				<?php endif; ?>

				<h1><?php echo esc_html( $curauth->nickname ); ?></h1>
			</div>

		</div>

	</div><!-- .page-header -->

	<div class="<?php echo esc_attr( $container ); ?> content" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php if ( 'left' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

				<?php get_sidebar( 'left' ); ?>

			<?php endif; ?>

			<?php get_template_part( 'global-templates/primary-check' ); ?>

				<main class="site-main" id="main">

					<header class="page-header author-header">

						<dl>
							<?php if ( ! empty( $curauth->user_url ) ) : ?>
								<dt>Site</dt>
								<dd>
									<a href="<?php echo esc_url( $curauth->user_url ); ?>"><?php echo esc_html( $curauth->user_url ); ?></a>
								</dd>
							<?php endif; ?>

							<?php if ( ! empty( $curauth->user_description ) ) : ?>
								<dt>Descrição</dt>
								<dd><?php echo $curauth->user_description; ?></dd>
							<?php endif; ?>
						</dl>

						<h2>Postagens de <?php echo esc_html( $curauth->nickname ); ?>:</h2>

					</header><!-- .page-header -->

					<ul class="author-posts">

						<!-- The Loop -->
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<li>
									<a rel="bookmark" href="<?php the_permalink() ?>" title="Permanent Link: <?php the_title(); ?>"> <?php the_title(); ?></a>
									<br/>
									<div class="entry-footer"><span><?php understrap_posted_on(); ?> <?php esc_html_e( 'in',
									'understrap' ); ?> <?php the_category( ' & ' ); ?></span></div>
								</li>
							<?php endwhile; ?>

						<?php else : ?>

							<?php get_template_part( 'loop-templates/content', 'none' ); ?>

						<?php endif; ?>

						<!-- End Loop -->

					</ul>

				</main><!-- #main -->

				<!-- The pagination component -->
				<?php understrap_pagination(); ?>

			</div><!-- #primary -->

			<!-- Do the right sidebar check -->
			<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

				<?php get_sidebar( 'right' ); ?>

			<?php endif; ?>

		</div> <!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
