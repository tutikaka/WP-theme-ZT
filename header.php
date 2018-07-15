<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); // вывод атрибутов языка ?>>
<head>

	<script type="text/javascript" src="https://vk.com/js/api/openapi.js?154"></script>
	<meta charset="<?php bloginfo( 'charset' ); // кодировка ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php /* RSS и всякое */ ?>
	<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php /* Все скрипты и стили теперь подключаются в functions.php */ ?>

	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); // необходимо для работы плагинов и функционала ?>
</head>
<body <?php body_class(); // все классы для body ?>>
	<header>
		<div class="main_container_header">
			<div class="container_shadow"></div>
			<div class="row">
				<div class="map_site_img header_buttons" onclick="location.href='http://new.dkzt.ru/sitemap/';"></div>
				<div class="feedback_img header_buttons popmake-129"></div>
				<div class="title_img header_buttons" onclick="location.href='<?php echo get_home_url(); ?>';"></div>
				<div itemprop="Copy" class="bt_widget-vi-on eye_img header_buttons bvi-panel-open" onclick="location.href='#' ;"></div>
				<div class="menu_top"> <!-- col-md-12 -->
					<nav class="header_block">
						<div class="main_page_button" onclick="location.href='<?php echo get_home_url(); ?>';"></div>
						<div class="menu_top_container" id="topnav"> <!-- menu_top_container = collapse navbar-collapse -->
							<?php $args = array( // опции для вывода верхнего меню, чтобы они работали, меню должно быть создано в админке
								'theme_location' => 'top', // идентификатор меню, определен в register_nav_menus() в functions.php
								'container'=> false, // обертка списка, тут не нужна
						  		'menu_id' => 'top-nav-ul', // id для ul
						  		'items_wrap' => '<ul id="%1$s" class="menu_top_ul %2$s">%3$s</ul>', //nav navbar-nav 
								'menu_class' => 'top-menu', // класс для ul, первые 2 обязательны
						  		'walker' => new bootstrap_menu(true) // верхнее меню выводится по разметке бутсрапа, см класс в functions.php, если по наведению субменю не раскрывать то передайте false		  
					  			);
								wp_nav_menu($args); // выводим верхнее меню
							?>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>