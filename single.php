<?php
/**
 * Шаблон отдельной записи (single.php)
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
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
							<h1><?php the_title(); // заголовок поста ?></h1>
							<div class="meta">
								<p>Опубликовано: <?php the_time(get_option('date_format')." в ".get_option('time_format')); ?></p> <?php // дата и время создания ?>
								 <?php // ссылки на категории в которых опубликован пост, через зпт ?>
								<?php the_tags('<p>Тэги: ', ',', '</p>'); // ссылки на тэги поста ?>
							</div>
							<?php the_content(); // контент ?>
						</article>
					<?php endwhile; // конец цикла ?>
					<?php previous_post_link('<br />', '%link', '<- Предыдущий пост: %title', TRUE); // ссылка на предыдущий пост ?> 
					<?php next_post_link('%link', 'Следующий пост: %title ->', TRUE); // ссылка на следующий пост ?> 
									</div>
			</div>
			<?php get_sidebar(); // подключаем sidebar.php ?>
		</div>
	</div>
</section>
<?php get_footer(); // подключаем footer.php ?>
