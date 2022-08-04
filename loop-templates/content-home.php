<?php
/**
 * Partial template for content in home.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="row">
		<?php echo divh_tagline();?>
		<div class="col-md-4">
			<img src="https://experiments.middcreate.net/extras/imgs/loop-stack-3d.png" class="sidebar-img">
		</div>

		<?php
		divh_home_repeater();
		divh_home_posts('News');
		divh_home_posts('Research');
		divh_supporters_repeater();
		the_content();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
