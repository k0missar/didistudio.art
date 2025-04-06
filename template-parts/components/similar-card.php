<?php
/**
 * @var array $args - массив значений поста
 */

wp_enqueue_style('didistudio-art-component-similar-card');
?>

<div class="similar-card">
    <div class="similar-card__src">
        <img src="<?= $args['preview_picture'] ?>" class="similar-card__img" alt="">
    </div>
    <div class="similar-card__content">
        <a href="<?= $args['link'] ?>" class="similar-card__title h2">
            <?= $args['title'] ?>
        </a>
        <div class="similar-card__description">
            <?= $args['description'] ?>
        </div>
    </div>
</div>
