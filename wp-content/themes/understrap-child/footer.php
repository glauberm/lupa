<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

						<div class="row align-items-start">
				            <div class="col-sm-4 col-xs-6 justify-content-start text-left">
				                <small>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?></small>
				            </div>
				            <div class="col-sm-4 col-xs-6 order-sm-3 order-xs-2 justify-content-end text-right">
				                <small><a href="https://github.com/glauberm/lupa" target="_blank">Código</a> por <a href="https://github.com/glauberm" target="_blank">Glauber Mota</a></small>
				            </div>
							<div class="col-sm-4 order-sm-2 order-xs-3 justify-content-center text-center">
								<small><a href="http://uff.br/" target="_blank" title="Universidade Federal Fluminense (UFF)">
									<img src="<?php echo get_template_directory_uri(); ?>-child/img/uff.svg" alt="Universidade Federal Fluminense (UFF)"/>
								</a></small>
							</div>
				        </div>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>
