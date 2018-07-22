<?php
/**
 * Запись в цикле (loop-posters.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */ 
?>
<div class="posters_container">
	<?
	query_posts('cat=5'); // вместо "5" указываем идентификатор вашей рубрики.
	$i = 0;
	$id = 0;
	while (have_posts() and $i < 4) : the_post();
		$id = get_the_ID(); /*получение id записи*/
		$i = ++$i;?>
		<div class="one_poster">
			<div class="posters_head"></div>
			<!--здесь задается миниатюра записи и её размер-->
			<? $thumbnail_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' ); // возвращает массив параметров миниатюры?>
			<!--здесь выводится миниатюра записи-->
			<div class="posters_thumbnail"><a href="<?php the_permalink(); ?>"><img class="posters_img" src="<?php echo $thumbnail_attributes[0]; /*URL миниатюры*/ ?>"></a></div>
			<div class="posters_more_info"><a href="<?php the_permalink(); ?>">ПОДРОБНЕЕ</a></div>
			<div class="posters_hall_plan popmake-253" <?php check_tag($id, 'План зала');?>>План зала</div>
			<?php check_tag_2($id, 'Бронь');?> <?/* тут выводится кнопка "забранировать билет", либо "Вход свободный, взависимости от тега" */?>
		</div>
	<?
	endwhile;
	wp_reset_query(); 
	?>
</div>