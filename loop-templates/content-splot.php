<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		
	</header><!-- .entry-header -->
	<div class="row">
		<div class="col-md-6">
			<?php 
			if (has_post_thumbnail()){
				echo get_the_post_thumbnail( $post->ID, 'large' ); 
			} else {
				echo '<img class="img-fluid splot-screenshot" src="' . get_field('image')['sizes']['large'] . '">';
			}
			;?>
		</div>
		
		<div class="entry-content col-md-6">

			<?php the_content(); ?>
			<div class="splot-description">
				<?php echo splot_get_field('description');?>
			</div>
			</div>
			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
					'after'  => '</div>',
				)
			);
			?>

		</div><!-- .entry-content -->
		<div class="splot-meta row">
				<div class="col-md-12"><a class="btn btn-splot" href="<?php echo splot_get_field('url');?>">See the SLOT Live</a></div>		
				<div class="meta-holder col-md-4">
					<h2>Media Focus</h2>
					<?php 
					$cats = get_the_category($post->ID);
					if ( ! empty( $cats ) ) {
						echo '<ul>';
						foreach ($cats as $key => $cat) {
							echo '<li><a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a></li>';
						}					   
						echo '</ul>';
					}

					?>
				</div>
				<div class="meta-holder col-md-4">
					<h2>SPLOT Type</h2>
					<?php 
					$cats = get_the_terms($post->ID, 'type');
					if ( ! empty( $cats ) ) {
						echo '<ul>';
						foreach ($cats as $key => $cat) {
							echo '<li><a href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . esc_html( $cat->name ) . '</a></li>';
						}					   
						echo '</ul>';
					}
					?>
				</div>
				<div class="meta-holder col-md-4">
					<h2>Examples</h2>
				</div>
	</div>

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
