<?php
    /**
     * @var array $args - массив переданных значений поста;
     * */
    wp_enqueue_style('didistudio-art-component-home-card-portfolio');
?>

<?php if (!empty($args)): ?>
    <article class="home card-portfolio">
        <div class="home card-portfolio__container">
            <div class="home card-portfolio__src">
                <img width="440" height="530" src="<?php echo $args['preview_picture'];?>" alt="" class="home card-portfolio__image">
            </div>
        </div>
        <div class="home card-portfolio__content">
            <div class="home card-portfolio__title h2">
                <a class="home card-portfolio__link h2" href="<?php echo $args['link'];?>">
                    <span><?php echo $args['title'];?></span>
                    <span class="home card-portfolio__arrow">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 15L15 1M15 1V9.8421M15 1H6.1579" stroke="#7E7E7D" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </a>
            </div>
            <div class="home card-portfolio__description h3 h3--c-200">
                <?php echo $args['description'];?>
            </div>
        </div>
    </article>
<?php endif; ?>
