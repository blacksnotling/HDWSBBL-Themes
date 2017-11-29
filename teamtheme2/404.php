<?php get_header(); ?>
		<div id="breadcrumb">
			<p><a href="<?php echo home_url(); ?>" title="Back to the front of <?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> &raquo; File Not Found!</p>
		</div>
<div class="entry">
	<h2>Turnover!</h2>
	<p>It looks like the page you are looking for has moved or the link you where given was incorrect. Please feel free to use the search box below to find what you are looking for:</p>
	<p><?php include (TEMPLATEPATH . '/searchform.php'); ?></p>
	<p class="postmeta"></p>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>