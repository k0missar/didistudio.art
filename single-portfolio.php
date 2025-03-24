<?php
get_header();
?>

<main id="primary" class="site-main">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>

            <div class="entry-thumbnail">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large'); ?>
                <?php endif; ?>
            </div>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <footer class="entry-footer">
                <a href="<?php echo get_post_type_archive_link('portfolio'); ?>" class="back-to-portfolio">
                    ← Назад в портфолио
                </a>
            </footer>
        </article>
    <?php endwhile; else : ?>
        <p>Работа не найдена.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
