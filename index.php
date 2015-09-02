<?php
/**
 * The main template file.
 */
?>

<?php get_header(); ?>

<h2>Welcome to <?php echo strtoupper(wp_get_theme()->get( 'Name' )); ?></h2>
<ul>
    <li>Theme name: <?php echo SP_THEME_NAME; ?></li>
    <li>Theme version: <?php echo SP_THEME_VERSION; ?></li>
    <li>Text domain: <?php echo SP_TEXT_DOMAIN; ?></li>
</ul>
	
<?php get_footer(); ?>