<?php
/*
Template Name: Under Contruction
*/?>

<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title('|', true, 'right'); ?></title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,300' rel='stylesheet' type='text/css'>
		<style type="text/css">
			body{
				font-family: 'Open Sans', sans-serif;
				line-height: 1.5em;
			}
			.construction{
				padding-top: 30px;
			}
			.construction h1 { 
				font-size: 36px; 
				color: #444444;
			}
			p { color:#6c6c6c; }
			/*img {
				min-width: 100%;
				height: auto;
			}*/
			a { 
				color: #3b5998;
				text-decoration: none;
			}
			a:hover { text-decoration: underline; }
			@-ms-viewport{
			  width: device-width;
			}
			@media all and (max-width: 699px) {
			  .construction{
				padding-top: 20px;
			}
			}
		</style>
</head>	

<body <?php body_class(); ?>>
<center class="construction">
	<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
	<?php endwhile; ?>
</center>
<?php wp_footer(); ?>
</body>
</html>