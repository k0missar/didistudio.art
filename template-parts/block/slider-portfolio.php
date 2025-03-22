<?php
    wp_enqueue_style('didistudio-art-component-slider-portfolio');

    $arParam = [
        'post_type' => 'portfolio',
    ];

    $arResult = new WP_Query($arParam);
?>

<?php if ($arResult->have_posts()): ?>

    <section class="portfolio-block">
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
    </section>

    <?php wp_reset_postdata(); ?>
<?php endif; ?>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        let portfolioSlider = null;

        function initOrDestroyPortfolioSlider() {
            const windowWidth = window.innerWidth;

            if (windowWidth <= 1200 && portfolioSlider === null) {
                portfolioSlider = new Swiper('.js-portfolio-slider', {
                    loop: true,
                    spaceBetween: 20,
                    slidesPerView: 'auto',
                    observer: true,
                    observeParents: true,
                    observeSlideChildren: true,
                    resizeObserver: true,
                });
            } else if (windowWidth > 1200 && portfolioSlider !== null) {
                portfolioSlider.destroy(true, true);
                portfolioSlider = null;
            }
        }

        initOrDestroyPortfolioSlider();

        window.addEventListener('resize', () => {
            clearTimeout(window.portfolioSliderTimeout);
            window.portfolioSliderTimeout = setTimeout(initOrDestroyPortfolioSlider, 200);
        });
    });
</script>

