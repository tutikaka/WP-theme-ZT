<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
?>
	<footer>
		<div class="container">
			<div class="row">
				<div class="footer"><div class="footer_head"></div>

					<?php $args = array( // опции для вывода нижнего меню, чтобы они работали, меню должно быть создано в админке
						'theme_location' => 'bottom', // идентификатор меню, определен в register_nav_menus() в function.php
						'container'=> false, // обертка списка, false - это ничего
						'menu_class' => 'nav nav-pills bottom-menu', // класс для ul
				  		'menu_id' => 'bottom-nav', // id для ul
				  		'fallback_cb' => false
				  	);
					wp_nav_menu($args); // выводим нижние меню
					?>

					<div class="footer_sidebar_div">
						<?php  dynamic_sidebar( 'footer_sidebar_left' ); ?>
					</div>

					<div class="footer_sidebar_div">
						<?php  dynamic_sidebar( 'footer_sidebar_center' ); ?>
					</div>
					
					<div class="footer_sidebar_div">
						<?php  dynamic_sidebar( 'footer_sidebar_right' ); ?>
					</div>
				
				</div>
			</div>
		</div>
	</footer>
<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>
</body>
</html>