<?php
/**
 * @var array $args - массив переданных значений поста;
 * */
wp_enqueue_style('didistudio-art-component-article-portfolio');
?>

<article class="article-portfolio container">
    <div class="article-portfolio__wrapper wrapper">

        <header class="article-portfolio__header">
            <div class="article-portfolio__detail-picture">
                <img src="<?= $args['preview_picture'] ?>" alt="">
            </div>
        </header>

        <?php if (!empty($args['title'] || !empty($args['post_content']))): ?>
            <div class="article-portfolio__content">

                <?php if (!empty($args['title'])): ?>
                    <h1 class="article-portfolio__title"><?= $args['title']; ?></h1>
                <?php endif; ?>

                <?php if (!empty($args['post_content'])): ?>
                    <div class="article-portfolio__post-content --content">
                        <?= html_entity_decode($args['post_content']) ?>
                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>

        <?php if (!empty($args['content_block'])): ?>
            <?php foreach ($args['content_block'] as $contentBlock): ?>
                <div class="article-portfolio__content-block">

                    <?php if (!empty($contentBlock['images_block_list'])): ?>
                        <div class="article-portfolio__block-list">
                            <?php foreach ($contentBlock['images_block_list'] as $imagesBlockItem): ?>
                                <div class="article-portfolio__block-item">
                                    <img src="<?= $imagesBlockItem ?>" alt="">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($contentBlock['text_content_block'])): ?>
                        <div class="article-portfolio__text-block --content">
                            <div class="--column">
                                <?= html_entity_decode($contentBlock['text_content_block']) ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($contentBlock['big_image_block_list'])): ?>
                        <?php foreach ($contentBlock['big_image_block_list'] as $bigImagesBlockItem): ?>
                        <div class="article-portfolio__big-src">
                            <img class="article-portfolio__big-image" src="<?= $bigImagesBlockItem ?>" alt="">
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if (!empty($contentBlock['text_content_block2'])): ?>
                        <div class="article-portfolio__text-block --content">
                            <div class="--column">
                                <?= html_entity_decode($contentBlock['text_content_block2']) ?>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</article>
<aside>
    <?php
        get_template_part('template-parts/block/similar-post');
    ?>
</aside>

