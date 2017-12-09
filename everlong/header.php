<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="wrapper">
 *
 * @package Everlong
 * @since 1.0
 * @version 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php do_action( 'everlong_headmeta' ); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="everlong-header"><?php do_action( 'everlong_header' ); ?></div>

  <div id=wrapper>
    <a class="skip-link screen-reader-text" href="#maincontent"><?php _e( 'Skip to content', 'everlong' ); ?></a>

    <div id=header>
      <?php get_template_part( 'inc/template/header', 'image' ); ?>
      <?php get_template_part( 'inc/template/site', 'branding' ); ?>
    </div><!-- end of #header -->

    <div ="navcontainer">
      <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_id' => 'navigation' ) ); ?>
    </div><!-- end of #navcontainer -->

    <div id="pagecontent">

      <?php do_action( 'everlong_precontent' ); ?>

      <div ="maincontent">
