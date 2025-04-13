<?php
    wp_enqueue_style('didistudio-art-block-progress');
    wp_enqueue_script('js-slider-progress');

    $blockName = get_field('block_progress', 'option');
    $blockProgressName = 'Достижения';
    $blockProgressDescription = 'Описание блока достижений';
    if ($blockName) {
        $blockProgressName = $blockName['block_progress_name'];
        $blockProgressDescription = $blockName['block_progress_description'];
    }

    $args = array(
        'post_type'      => 'progress', // Тип записи
        'posts_per_page' => -1,         // Все записи
        'post_status'    => 'publish',  // Только опубликованные
    );

    $query = new WP_Query($args);
?>
<div class="progress">
    <div class="progress__wrapper wrapper">
        <div class="progress__header">
            <h2 class="progress__title h1"><?= $blockProgressName ?></h2>
            <div class="h2 progress__description">
                <?= $blockProgressDescription ?>
            </div>
        </div>
        <div class="progress__content">
            <div class="progress-slider js-progress-slider swiper">
                <ul class="progress__list swiper-wrapper">
                    <?php
                        if ($query->have_posts()) : $count = 1;
                            while ($query->have_posts()) : $query->the_post();
                                global $post;
                    ?>
                        <li class="progress__item swiper-slide">
                            <div class="progress__item-header">
                                <span>
                                    <?= str_pad($count, 2, 0, STR_PAD_LEFT) ?>
                                </span>
                                <span class="h2 progress__item-title"><?php the_title()  ?></span>
                            </div>
                            <div class="progress__item-description">
                                <?php the_excerpt(); ?>
                            </div>
                        </li>
                    <?php
                        $count++;
                        endwhile;
                        wp_reset_postdata();
                        endif;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
