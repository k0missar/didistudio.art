<?php
/**
* Template Name: Archive Portfolio
* Шаблон для вывода архива портфолио
*/

get_header(); ?>

<main class="portfolio-archive">
    <div class="portfolio-archive__list">
        <?php if (have_posts()) : $count = 1;?>
            <div class="portfolio-archive__items">

                <?php while (have_posts()) : the_post(); ?>

                <?php
                    global $post;
                    $resPost = get_post($post->ID);
                    $arPost['id'] = $resPost->ID;
                    $arPost['number'] = $count;
                    $arPost['title'] = $resPost->post_title;
                    $arPost['post_excerpt'] = $resPost->post_excerpt;
                    $arPost['link'] = get_permalink($post->ID);
                    $arPost['preview_picture'] = get_the_post_thumbnail_url($post->ID, 'full');
                ?>

                    <?php get_template_part('template-parts/components/archive.card-portfolio', '', $arPost); ?>
                    <?php $count++; ?>
                <?php endwhile; ?>
            </div>

            <?php //the_posts_navigation(); ?>
        <?php else : ?>
            <p>Работы не найдены.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
