<?php
    wp_enqueue_style('didistudio-art-component-slider-portfolio');
    wp_enqueue_script('js-slider-portfolio');

    $blockName = get_field('block_portfolio', 'option');
    $blockPortfolioName = 'Портфолио';
    $blockPortfolioDescription = 'Описание блока портфолио';
    $blockPortfolioLink = '#';
    $blockPortfolioAnchor = 'Смотреть все';
    if ($blockName) {
        $blockPortfolioName = $blockName['block_portfolio_name'];
        $blockPortfolioDescription = $blockName['block_portfolio_description'];
        $blockPortfolioLink = $blockName['block_portfolio_link'];
        $blockPortfolioAnchor = $blockName['block_portfolio_anchor'];
    }

    $arParam = [
        'post_type' => 'portfolio',
        'tax_query'      => [
            [
                'taxonomy' => 'portfolio-section', // Замените на нужную таксономию, если это не категория
                'field'    => 'slug',
                'terms'    => 'work',  // Замените 'work' на нужный терм
                'operator' => 'IN',
            ],
        ],
        'posts_per_page' => 4,
    ];

    $arResult = new WP_Query($arParam);
?>

<?php if ($arResult->have_posts()): ?>

    <div class="portfolio-block">
        <div class="portfolio-block__wrapper wrapper">
            <div class="portfolio-block__content">
                <h2 class="portfolio-block__title h1"><?= $blockPortfolioName ?></h2>
                <div class="portfolio-block__description">
                    <?= $blockPortfolioDescription ?>
                </div>
                <a href="<?= $blockPortfolioLink ?>" class="portfolio-block__link"><?= $blockPortfolioAnchor ?></a>
            </div>
            <div class="portfolio-slider js-portfolio-slider">
                <div class="portfolio-slider__wrapper swiper-wrapper">
                    <?php $count = 0; // Счетчик записей ?>
                    <?php while ($arResult->have_posts()): $arResult->the_post(); ?>
                        <?php
                        global $post;
                        $terms = get_the_terms($post->ID, 'portfolio-section');
                        $has_work = false;

                        if ($terms && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                if ($term->slug === 'work') {
                                    $has_work = true;
                                    break;
                                }
                            }
                        }

                        if ($has_work):
                            $count++; // Увеличиваем счетчик
                            if ($count > 4) break; // Останавливаем цикл после 4 записей

                            $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
                            $arPost = [
                                'title' => get_the_title(),
                                'link' => get_permalink(),
                                'description' => get_field('portfolio_description'),
                                'preview_picture' => $thumbnail_url ?: '',
                            ];
                            ?>
                            <div class="portfolio-slider__slide swiper-slide">
                                <?php get_template_part('template-parts/components/home.card-portfolio', '', $arPost); ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>

    <?php wp_reset_postdata(); ?>
<?php endif; ?>


