<?php
/**
 * @var array $args - массив значений поста
 */

wp_enqueue_style('didistudio-art-component-similar-card');
?>

<div class="similar-card">
    <div class="similar-card__container">
        <div class="similar-card__src">
            <img src="<?= $args['preview_picture'] ?>" class="similar-card__img" alt="">
        </div>
    </div>
    <div class="similar-card__content">
        <a href="<?= $args['link'] ?>" class="similar-card__title h2">
            <span><?= $args['title'] ?></span>
            <span class="similar-card__arrow">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 15L15 1M15 1V9.8421M15 1H6.1579" stroke="#7E7E7D" stroke-linejoin="round"/>
                </svg>
            </span>
        </a>
        <div class="similar-card__description">
            <?= $args['description'] ?>
        </div>
    </div>
</div>
