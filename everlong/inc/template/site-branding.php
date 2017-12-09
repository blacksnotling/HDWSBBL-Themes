<?php
/**
 * Displays header site branding
 *
 * @package Everlong
 * @since 1.0
 * @version 1.0
 */

?>
<div class="site-branding">

	<?php the_custom_logo(); ?>

	<div class="site-branding-text">

    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<p class="site-description"><?php bloginfo( 'description' ); ?></p>

  </div><!-- .site-branding-text -->

</div><!-- .site-branding -->
