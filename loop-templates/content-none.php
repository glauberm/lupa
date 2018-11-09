<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

?>

<section class="no-results not-found">

	<header class="page-header">

		<h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'understrap' ); ?></h2>

	</header><!-- .page-header -->

	<div class="page-content">

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

			<p>Parece que a página que você procura não existe ou foi removida. Talvez a busca possa te ajudar.</p>
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

	</div><!-- .page-content -->

</section><!-- .no-results -->
