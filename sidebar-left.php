<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TPG_theme
 */

if ( ! is_active_sidebar( 'sidebar-left' ) ) {
	return;
}
?>
<aside class="secondary" role="complementary">
    <div class="panel panel-default">
      <div class="panel-heading"></div>
          <div class="panel-body">
            <?php dynamic_sidebar( 'sidebar-left' ); ?>
          </div>
    </div>
        
</aside><!-- #secondary -->
	</div><!--row-->
</div><!--container-->