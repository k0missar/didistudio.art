<?php
/**
* Template Name: Archive Portfolio
* Шаблон для вывода архива портфолио
*/

get_header(); ?>

<main id="primary" class="site-main">
    <?php if (have_posts()) : ?>
        <header class="page-header">
            <h1 class="page-title">Наше портфолио</h1>
        </header>

        <div class="portfolio-items">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                        <h2><?php the_title(); ?></h2>
                    </a>
                </article>
            <?php endwhile; ?>
        </div>

        <?php the_posts_navigation(); ?>
    <?php else : ?>
        <p>Работы не найдены.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
