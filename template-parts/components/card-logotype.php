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
    <div class="card-logotype__number number">
        <?= str_pad($args['post_number'], 2, 0, STR_PAD_LEFT) ?>
    </div>
    <div class="card-logotype__content">
        <h2 class="card-logotype__title"><?= $args['post_title'] ?></h2>
        <div class="card-logotype__description"><?= $args['post_description'] ?></div>
    </div>
</div>
