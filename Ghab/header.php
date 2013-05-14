<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:<?php language_attributes(); ?>>
<head>
	<meta <?php bloginfo('charset'); ?>>
	<title><?php bloginfo('name') ?><?php wp_title('|',true,'left') ?></title>
	<meta name="descrition" content="<?php bloginfo('descrition');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url');?>">
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
	<div class="none" id="navctr">
		<aside>
			<div id="stickylogo">
				<h3><a href="<?php echo home_url(); ?>"><?php bloginfo('name') ?></a></h3>
			</div>
			<?php wp_nav_menu(array(
				'theme_location'=>'sticky-menu'
			)); ?>
			
				<?php get_search_form(); ?>
			
		</aside>
	</div>
	<div class="container_24 container">
		<div class="header">
			<header>
				<?php 
					//Get options
					$options = get_option('Ghab_custom_settings');
				 ?>	

				<center>
					<?php  $logo = $options['logo']; ?>
					
						<a href="<?php echo home_url();?>"><img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>" /></a>

					
				</center>
				<hr>
				<nav>
					<?php wp_nav_menu(array(
				'theme_location'=>'top-menu'
			)); ?>
				</nav>
			</header>
		</div> <!-- /.header -->