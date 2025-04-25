<?php
get_header();

$term = get_queried_object();
wp_enqueue_style('didistudio-art-taxonomy-portfolio-logotype');
?>

<!--<h1>--><?php //echo esc_html($term->name); ?><!--</h1>-->

<?php
    get_template_part('template-parts/components/portfolio-menu');
?>

<section class="logotype">
    <div class="container">
        <div class="logotype__wrapper wrapper">
            <?php if (have_posts()) : $count = 1; ?>
                <div class="logotype__list">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="logotype__item">
                            <?php
                                global $post;

                                $arLogotype['post_title'] = $post->post_title;
                                $arLogotype['post_description'] = get_field('portfolio_description');
                                $arLogotype['preview_picture'] = get_the_post_thumbnail_url($post, 'full');
                                $arLogotype['post_number'] = $count;

                                get_template_part('template-parts/components/card-logotype', '', $arLogotype);
                                $count++
                            ?>
                        </div>
                    <?php endwhile; ?>
                </div>

                <div class="logotype__pagination">
                    <?php custom_posts_pagination(); ?>
                </div>
            <?php else : ?>
                <p>Пока нет работ в этой категории.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>

