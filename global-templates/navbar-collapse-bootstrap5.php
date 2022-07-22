<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav id="main-nav" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>


	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div id="main-menu">
		      <!--   <ul>
		          <li><a href="#mission">Mission</a></li>
		          <li><a href="#research">Research</a></li>
		          <li><a href="#team">Our Team</a></li>
		          <li><a href="#partnership">Partners</a></li>
		          <li><a href="#press">Press</a></li>
		        </ul> -->
		        <?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'foo',
				'container_id'    => 'main-menu-ul',
				'menu_class'      => 'navbar-nav ms-auto',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu-li',
				'depth'           => 1,
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		);
		?>
		        <div class="dots">
			        <svg id="Layer_2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 939.2 216.2"><g id="Layer_1-2"><circle stroke="#1A374D" id="c1" class="cls-1" cx="108" cy="108" r="108"/><circle stroke="#1A374D" id="c2" class="cls-1" cx="469" cy="108" r="108"/><circle stroke="#1A374D" id="c3" class="cls-1" cx="831" cy="108" r="108"/></g></svg>
			      </div>
			  </div>

			</div>
			<div class="col-md-8">
				<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
					<img class="dh-logo" src="<?php echo get_stylesheet_directory_uri() . '/imgs/logo.svg'?>" alt="Diverting Hate logo.">
				</a>
			</div>
		</div>
		<!-- end custom logo -->

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- The WordPress Menu goes here -->
		

	</div><!-- .container(-fluid) -->

</nav><!-- .site-navigation -->
