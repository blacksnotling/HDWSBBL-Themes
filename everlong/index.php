<?php
/**
 *
 * The generic fallback template for the Wordpress Theme
 *
 * @package Everlong
 * @since 1.0
 * @version 1.0
 */
 ?>
<?php get_header(); ?>
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>

            <div class="entry">

      				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      					<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
      					<p class="postdate">DATE</p>

      					<?php the_content(); ?>

      					<?php wp_link_pages( array( 'before' => '<div class="subnav">' . __( 'Pages:', 'everlong' ), 'after' => '</div>' ) ); ?>

      					<p class="postmeta"></p>

      				</div>

      			</div>


          <?php endwhile; ?>
        <?php endif; ?>

<?php get_footer(); ?>
