<?php
get_header();
?>

<main class="portfolio-single">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php
            global $post;

            //echo '<pre>' . print_r($post, 1) . '</pre>';

            // content_block
            // images_block_list
            // images_block_item
            // text_content_block
            // big_image_block
            // text_content_block2

            $resPost = get_post($post->ID);
            $arPost['id'] = $resPost->ID;
            $arPost['title'] = $resPost->post_title;
            $arPost['post_excerpt'] = $resPost->post_excerpt;
            $arPost['link'] = get_permalink($post->ID);
            $arPost['preview_picture'] = get_the_post_thumbnail_url($post->ID, 'full');
            $arPost['post_content'] = $resPost->post_content;
            $arPost['content_block'] = [];

            if(have_rows('content_block')) {
                while(have_rows('content_block')) {
                    the_row();

                    // Список маленьких изображений
                    if(have_rows('images_block_list')) {
                        $arContentBlock['images_block_list'] = [];
                         while(have_rows('images_block_list')) {
                             the_row();
                             $arContentBlock['images_block_list'][] = get_sub_field('images_block_item');
                         }
                    }

                    // Список больших изображений
                    if(have_rows('big_image_block_list')) {
                        $arContentBlock['big_image_block_list'] = [];
                        while(have_rows('big_image_block_list')) {
                            the_row();
                            $arContentBlock['big_image_block_list'][] = get_sub_field('big_image_block_item');
                        }
                    }

                    $arContentBlock['text_content_block'] = get_sub_field('text_content_block');
                    $arContentBlock['big_image_block'] = get_sub_field('big_image_block');
                    $arContentBlock['text_content_block2'] = get_sub_field('text_content_block2');

                    $arPost['content_block'][] = $arContentBlock;
                }
            }
        ?>

        <?php get_template_part('template-parts/components/article-portfolio', '', $arPost); ?>
    <?php endwhile; else : ?>
        <p>Работа не найдена.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
