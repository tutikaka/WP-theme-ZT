<?php
/**
 * Страница архивов записей (archive.php)
 * @package WordPress
 * @subpackage ZTthemes
 */
get_header(); // подключаем header.php ?> 
<section>
	<div class="container">
		<div class="row">

			<aside class="sidebar_left"> <!-- левый сайтбар -->
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
				<h1><?php // заголовок архивов
					if (is_day()) : printf('Daily Archives: %s', get_the_date()); // если по дням
					elseif (is_month()) : printf('Monthly Archives: %s', get_the_date('F Y')); // если по месяцам
					elseif (is_year()) : printf('Yearly Archives: %s', get_the_date('Y')); // если по годам
					else : 'Archives';
				endif; ?></h1>
				<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
					<?php get_template_part('loop'); // для отображения каждой записи берем шаблон loop.php ?>
				<?php endwhile; // конец цикла
				else: echo '<p>Нет записей.</p>'; endif; // если записей нет, напишим "простите" ?>	 
				<?php pagination(); // пагинация, функция нах-ся в function.php ?>
			</div>
			<?php get_sidebar(); // подключаем sidebar.php ?>
		</div>
	</div>
</section>
<?php get_footer(); // подключаем footer.php ?>