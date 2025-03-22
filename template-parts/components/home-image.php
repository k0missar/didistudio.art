<?php
    wp_enqueue_style('didistudio-art-component-home-image');
?>
<div class="home-image <?php echo $args['class'] ?? null;?>">
    <img width="1360" height="590" src="<?php the_field('home-picture', 'option'); ?>" alt="Изображение на главной">
</div>
