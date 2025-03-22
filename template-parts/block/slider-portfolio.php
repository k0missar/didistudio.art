<?php
    wp_enqueue_style('didistudio-art-component-slider-portfolio');
    wp_enqueue_script('js-slider-portfolio');

    $arParam = [
        'post_type' => 'portfolio',
    ];

    $arResult = new WP_Query($arParam);
?>

<?php if ($arResult->have_posts()): ?>

    <div class="portfolio-block">
        <div class="portfolio-block__wrapper wrapper">
            <div class="portfolio-block__content">
                <h2 class="portfolio-block__title h1">Портфолио</h2>
                <div class="portfolio-block__description">
                    Наша команда стремится к успеху, тщательно анализируя сферу вашего бизнеса и рынок, что позволяет нам выявить ключевые задачи и предложить эффективные решения.
                </div>
                <a href="#" class="portfolio-block__link">Смотреть все</a>
            </div>
            <div class="portfolio-slider js-portfolio-slider">
                <div class="portfolio-slider__wrapper swiper-wrapper">
                    <?php while ($arResult->have_posts()): $arResult->the_post(); ?>
                        <div class="portfolio-slider__slide swiper-slide">
                            <?php
                                global $post;
                                $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');

                                $arPost['title'] = $post->post_title;
                                $arPost['link'] = $post->guid;
                                $arPost['description'] = get_field('portfolio_description');

                                if ($thumbnail_url) {
                                    $arPost['preview_picture'] = $thumbnail_url;
                                }

                                get_template_part('template-parts/components/home.card-portfolio', '', $arPost);
                            ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>

    <?php wp_reset_postdata(); ?>
<?php endif; ?>


