<?php
wp_enqueue_style('didistudio-art-block-progress');
wp_enqueue_script('js-slider-progress');

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
            <h2 class="progress__title h1">Достижения</h2>
            <div class="h2">
                В 2024 году мы много трудились и достигли больших успехов. Делимся ими с вами!
            </div>
        </div>
        <div class="progress__content">
            <div class="progress-slider js-progress-slider swiper">
                <ul class="progress__list swiper-wrapper">
                    <?php
                        if ($query->have_posts()) : $count = 1;
                            while ($query->have_posts()) : $query->the_post();
                                global $post;
                        //echo '<pre>' . print_r($post, 1) . '</pre>';
                    ?>
                        <li class="progress__item swiper-slide" data-progress-count="<?= str_pad($count, 2, 0, STR_PAD_LEFT) ?>">
                            <span class="h2"><?php the_title()  ?></span>
                            <?php the_excerpt(); ?>
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

<script>
    window.addEventListener('DOMContentLoaded', ()=> {
        let progressSlider = null;

        function initOrDestroyProgressSlider() {
            const windowWidth = window.innerWidth;

            if (windowWidth <= 700 && progressSlider === null) {
                progressSlider = new Swiper('.js-progress-slider', {
                    loop: true,
                    slidesPerView: 'auto',
                    spaceBetween: 10,
                    observer: true,
                    observeParents: true,
                    observeSlideChildren: true,
                    resizeObserver: true,
                })
            } else if (windowWidth > 700 && progressSlider !== null) {
                progressSlider.destroy(true, true);
                progressSlider = null;
            }
        }

        initOrDestroyProgressSlider();

        window.addEventListener('resize', () => {
            clearTimeout(window.progressSliderTimeout);
            window.progressSliderTimeout = setTimeout(initOrDestroyProgressSlider, 200);
        });
    })
</script>
