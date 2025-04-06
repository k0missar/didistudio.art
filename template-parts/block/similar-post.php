<?php
wp_enqueue_style('didistudio-art-similar-post');

$arParam = [
    'post_type' => 'portfolio',
];

$arResult = new WP_Query($arParam);
?>

<?php if ($arResult->have_posts()): ?>

    <div class="similar-post">
        <div class="container">
            <div class="similar-post__wrapper wrapper">
                <div class="similar-post__list">
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
                            if ($count > 3) break; // Останавливаем цикл после 4 записей

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
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>

    <?php wp_reset_postdata(); ?>
<?php endif; ?>
