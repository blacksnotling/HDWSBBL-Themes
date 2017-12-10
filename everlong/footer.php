<?php
/**
 * The footer for our theme.
 *
 * The final file loaded, closes all the structures on the page and executes
 * final code
 *
 * @package Everlong
 * @since 1.0
 * @version 1.0
 */
?>

      </div><!-- end of #maincontent -->

      <div id="footer">
        <div id="footer-main">
<?php
        if ( is_active_sidebar( 'footer-main' ) ) {
          dynamic_sidebar( 'footer-main' );
        }
?>
        </div>
        <div id="footer-sub">
<?php
        if ( is_active_sidebar( 'footer-sub' ) ) {
          dynamic_sidebar( 'footer-sub' );
        }
?>
        </div>
      </div><!-- end of #footer -->

    </div><!-- end of #pagecontent -->

  </div><!-- end of #wrapper -->

<?php wp_footer(); ?>
</body>
</html>
