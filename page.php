<?php
/**
 * Шаблон обычной страницы (page.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
get_header(); // подключаем header.php ?>
<section>
	<div class="container">
		<div class="row">
			<aside class="sidebar_left">
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

			<div class="center_block"
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
						<div align="left"><h2><?php the_title(); // заголовок поста ?></h2></div>
						<?php the_content(); // контент ?>
					</article>
				<?php endwhile; // конец цикла ?>
			</div>
			<?php get_sidebar(); // подключаем sidebar.php ?>
		</div>
	</div>
</section>
<?php get_footer(); // подключаем footer.php ?>