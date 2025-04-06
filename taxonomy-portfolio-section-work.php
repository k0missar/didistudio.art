<?php
get_header();

wp_enqueue_style('didistudio-art-taxonomy-portfolio-work');
$term = get_queried_object();
?>

<!--<h1>--><?php //echo esc_html($term->name); ?><!--</h1>-->

<?php
    get_template_part('template-parts/components/portfolio-menu');
?>

<section class="taxonomy-work">
    <?php if (have_posts()) : $count = 1; ?>
        <div class="taxonomy-work__list">
            <?php while (have_posts()) : the_post(); ?>
                <div class="taxonomy-work__item">
                    <div class="container">
                        <div class="taxonomy-work__wrapper wrapper">
                            <?php
                                global $post;
                                $arPost = [];

                                $arPost['preview_picture'] = get_the_post_thumbnail_url($post->ID, 'full');
                                $arPost['number'] = str_pad($count, 2, '0', STR_PAD_LEFT);
                                $arPost['title'] = $post->post_title;
                                $arPost['post_excerpt'] = $post->post_excerpt;
                                $arPost['link'] = get_the_permalink($post->ID);

                                get_template_part('/template-parts/components/archive.card-portfolio', '', $arPost);

                                $count++;
                            ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>
        <p>Пока нет работ в этой категории.</p>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
