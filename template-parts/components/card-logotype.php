<?php
/**
 * @var array $args  - массив с данными карточки
 */
wp_enqueue_style('didistudio-art-component-card-logotype');
?>

<div class="card-logotype">
    <div class="card-logotype__src">
        <img src="<?= $args['preview_picture'] ?>" class="card-logotype__image" alt="">
    </div>
    <div class="card-logotype__content">
        <div class="card-logotype__title"><?= $args['post_title'] ?></div>
    </div>
</div>
