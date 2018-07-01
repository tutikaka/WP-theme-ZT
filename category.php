<?php
/**
 * Шаблон рубрики (category.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
get_header(); // подключаем header.php ?> 
<section>
	<div class="container">
		<div class="row">

			<aside class="sidebar_left">   <!-- левый сайдбар -->
				<div class="menu_left_div">
					<?php wp_nav_menu( array( 
						'container'=> false, // обертка списка, тут не нужна, 
						'theme_location' => 'left',
						'items_wrap' => '<ul id="%1$s" class="menu_left">%3$s</ul>', //nav navbar-nav  %2$s
						'menu_class' => 'top-menu', // класс для ul, первые 2 обязательны
						'walker' => new bootstrap_menu(true) // верхнее меню выводится по разметке бутсрапа, см класс в functions.php, если по наведению субменю не раскрывать то передайте false		  
						) ); ?>
					</div>
					<div class="sidebar_left_div">
						<?php  dynamic_sidebar( 'sidebar_left' ); ?>
					</div>
			</aside>
			
			<div class="center_block">
				<div class="<?php content_class_by_sidebar(); // функция подставит класс в зависимости от того есть ли сайдбар, лежит в functions.php ?>">
					<h1><?php single_cat_title(); // название категории ?></h1>
					<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
						<?php get_template_part('loop'); // для отображения каждой записи берем шаблон loop.php ?>
					<?php endwhile; // конец цикла
					else: echo '<p>Нет записей.</p>'; endif; // если записей нет, напишим "простите" ?>	 
					<?php pagination(); // пагинация, функция нах-ся в function.php ?>
				</div>
			</div>
			<?php get_sidebar(); // подключаем sidebar.php ?>
		</div>
	</div>
</section>
<?php get_footer(); // подключаем footer.php ?>