<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package understrap
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="col-md-4 col-md-offset-1 widget-area" role="complementary">

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	
</div><!-- .widget-area -->
