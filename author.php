<?php
/**
 * Страница автора (author.php)
 * @package WordPress
 * @subpackage ZTthemes
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

			<div class="center_block">
			    <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); // получим данные о авторе ?>
				<h1>Посты автора <?php echo $curauth->nickname; ?></h1>
				<?php /* Немного инфы о авторе */ ?>
				<div class="media">
					<div class="media-left">
						<?php echo get_avatar($curauth->ID, 64, '', $curauth->nickname, array('class' => 'media-object')); // покажим аватарку ?>
					</div>
				<div class="media-body">
					<h4 class="media-heading"><?php echo $curauth->display_name; // тут может быть имя или ник, в зависимости что выберет автор ?></h4>
					<?php if ($curauth->user_url) echo '<a href="'.$curauth->user_url.'">'.$curauth->user_url.'</a>'; // если есть сайт ?>
					<?php if ($curauth->description) echo '<p>'.$curauth->description.'</p>'; // если есть описание ?>
				</div>
				</div>

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