<?php
/**
 * Запись в цикле (loop.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */ 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2> <?php // заголовок поста и ссылка на его полное отображение (single.php) ?>
<div class="row">
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="col-sm-3">
			<a href="<?php the_permalink(); ?>" class="thumbnail">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>
	<?php } ?>
	<div class="<?php if ( has_post_thumbnail() ) { ?>col-sm-9<?php } else { ?>col-sm-12<?php } // разные классы в зависимости есть ли миниатюра ?>">
		<?php the_excerpt(); // пост превью, до more ?>
	</div>
	<div class="posts_meta">
		<div class="posts_meta_date">Опубликовано: <?php the_time(get_option('date_format')." в ".get_option('time_format')); ?></div> <?php // дата и время создания ?>
		<?php // ссылки на категории в которых опубликован пост, через зпт ?>
		<?php // the_tags('<p>Тэги: ', ',', '</p>'); // ссылки на тэги поста ?>
		<a class="read_more" href="<?php the_permalink(); ?>">
			Читать далее...
		</a>
	</div>
</div>
</article>