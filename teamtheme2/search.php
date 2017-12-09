<?php get_header(); ?>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<div class="entry">

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<p class="postdate"><?php vonlipwig_posted_on() ?></p>

					<?php the_content(); ?>

					<?php wp_link_pages( array( 'before' => '<div class="subnav">' . __( 'Pages:', 'vonlipwig' ), 'after' => '</div>' ) ); ?>

					<p class="postmeta"><?php vonlipwig_posted_in() ?> <?php edit_post_link( __( 'Edit', 'vonlipwig' ), ' <strong>[</strong> ', ' <strong>]</strong> '); ?></p>

				</div>

			</div>

		<?php endwhile; ?>
	<?php else : ?>

		<div class="entry">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<h2 class="entry-title"><?php _e( 'Not Found!', 'vonlipwig' ); ?></h2>
				<p><?php _e( 'The search returned nothing. Please Try again!' , 'vonlipwig' ) ?></p>
				<?php get_search_form(); ?>

			</div>
		</div>

	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
