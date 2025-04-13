<?php
/**
 * @var array $args - массив переданных значений поста;
 * */
wp_enqueue_style('didistudio-art-component-archive-card-portfolio');
?>

<?php //echo '<pre>' . print_r($args, 1) . '</pre>'; ?>

<article class="archive card-portfolio">
    <div class="archive card-portfolio__wrapper">
        <div class="archive card-portfolio__container">
            <div class="archive card-portfolio__src">
                <div class="archive card-portfolio__animation">
                    <img src="<?php echo $args['preview_picture'];?>" class="archive card-portfolio__img" alt="<?php echo $args['title'];?>">
                </div>
            </div>
        </div>
        <div class="archive card-portfolio__number number">
            <div class="js-animation-number">
                <?php echo $args['number'];?>
            </div>
        </div>
        <div class="archive card-portfolio__content">
            <h2 class="archive card-portfolio__title">
                <?php echo $args['title'];?>
            </h2>
            <div class="archive card-portfolio__description">
                <?php echo $args['post_excerpt'];?>
            </div>
            <a href="<?php echo $args['link'];?>" class="archive card-portfolio__link">Подробнее</a>
        </div>
    </div>
</article>
