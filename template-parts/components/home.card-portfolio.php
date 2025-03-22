<?php
    /**
     * @var array $args - массив переданных значений поста;
     * */
    wp_enqueue_style('didistudio-art-component-home-card-portfolio');
?>

<?php if (!empty($args)): ?>
    <article class="home card-portfolio">
        <div class="home card-portfolio__src">
            <img width="440" height="530" src="<?php echo $args['preview_picture'];?>" alt="" class="home.card-portfolio__image">
        </div>
        <div class="home card-portfolio__content">
            <div class="home card-portfolio__title h2">
                <a class="home card-portfolio__link" href="<?php echo $args['link'];?>"><?php echo $args['title'];?></a>
            </div>
            <div class="home card-portfolio__description h3 h3--c-200">
                <?php echo $args['description'];?>
            </div>
        </div>
    </article>
<?php endif; ?>
