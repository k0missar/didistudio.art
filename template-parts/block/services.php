<?php
    wp_enqueue_style('didistudio-art-block-services');

    $blockName = get_field('block_service', 'option');
    $blockServiceName = 'Услуги';
    $blockServiceDescription = 'Описание блока услуг';
    if ($blockName) {
        $blockServiceName = $blockName['block_service_name'];
        $blockServiceDescription = $blockName['block_service_description'];
    }
?>

<div class="service" id="service">
    <div class="service__wrapper wrapper">
        <div class="service__content">
            <h2 class="service__title h1">
                <?= $blockServiceName ?>
            </h2>
            <div class="service__description">
                <?= $blockServiceDescription ?>
            </div>
        </div>
        <div class="service__price">
            <?php
                $terms = get_terms(['taxonomy' => 'service-section']);
                usort($terms, function ($a, $b) {
                    $a_order = get_term_meta($a->term_id, 'sort_order', true);
                    $b_order = get_term_meta($b->term_id, 'sort_order', true);
                    return intval($a_order) - intval($b_order);
                });
                if (!empty($terms) && !is_wp_error($terms)) :
                    $count = 1;
                    foreach ($terms as $term) : ?>
                    <div class="service__price-block">
                        <div class="service__price-title h2">
                            <div class="service__top-line"></div>
                            <label for="service-<?= $term->term_id ?>" class="h2" data-count="<?= str_pad($count++, 2, 0, STR_PAD_LEFT) ?>">
                                <span><?= $term->name ?></span>
                            </label>
                            <div class="service__price-icon">
                                <svg width="24" height="25">
                                    <use href="<?php echo get_template_directory_uri() . '/assets/images/sprite.svg#plus';?>"></use>
                                </svg>
                            </div>
                            <input type="checkbox" id="service-<?= $term->term_id ?>" name="service-<?= $term->term_id ?>">
                            <div class="service__bottom-line"></div>
                        </div>
                        <?php
                            $posts = get_posts([
                                'post_type' => 'service',
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'service-section',
                                        'terms' => $term->term_id,
                                    ]
                                ],
                                'posts_per_page' => -1,
                            ]);

                            if (!empty($posts)) : ?>
                                <ul class="service__list">
                                    <?php foreach ($posts as $post) : ?>
                                        <li class="service__item">
                                            <span><?= the_title() ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php wp_reset_postdata();
                            endif;
                        ?>
                    </div>
                    <?php endforeach;
                endif;
            ?>
        </div>
    </div>
</div>
