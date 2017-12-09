<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<h2><?php _e( 'Blog Archives', 'crownstar' ); ?></h2>

		<?php while (have_posts()) : the_post(); ?>

			<div class="entry">

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<p class="postdate"><?php crownstar_posted_on() ?></p>

					<?php the_content(); ?>

					<?php wp_link_pages( array( 'before' => '<div class="subnav">' . __( 'Pages:', 'crownstar' ), 'after' => '</div>' ) ); ?>

					<p class="postmeta"><?php crownstar_posted_in() ?> <?php edit_post_link( __( 'Edit', 'crownstar' ), ' <strong>[</strong> ', ' <strong>]</strong> '); ?></p>

				</div>

			</div>

		<?php endwhile; ?>
	<?php else : ?>

		<div class="entry">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<h2 class="entry-title"><?php _e( 'Not Found!', 'crownstar' ); ?></h2>
				<p><?php _e( 'Sorry, but you are looking for something that is not here.' , 'crownstar' ) ?></p>
				<?php get_search_form(); ?>

			</div>
		</div>

	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
