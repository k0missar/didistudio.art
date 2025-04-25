<?php
wp_enqueue_style('didistudio-art-similar-post');

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
    'posts_per_page' => 3,
];

$arResult = new WP_Query($arParam);
?>

<?php if ($arResult->have_posts()): ?>

    <div class="similar-post">
        <div class="similar-post__wrapper">
            <div class="similar-post__list">
                <?php $count = 0; // Счетчик записей ?>
                <?php while ($arResult->have_posts()): $arResult->the_post(); ?>
                    <?php
                    global $post;
                        $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'full');
                        $arPost = [
                            'title' => get_the_title(),
                            'link' => get_permalink(),
                            'description' => get_field('portfolio_description'),
                            'preview_picture' => $thumbnail_url ?: '',
                        ];
                        ?>
                        <div class="similar-post__item">
                            <?php get_template_part('template-parts/components/similar-card', '', $arPost); ?>
                        </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <?php wp_reset_postdata(); ?>
<?php endif; ?>
