<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package didistudio.art
 */

get_header();
?>
<?php
    if (is_home()) {
        wp_enqueue_style('didistudio-art-page-home');
    }
?>
<main>
    <div class="container">
        <?php
            get_template_part('template-parts/components/home-image', '', ['class' => 'home__home-image']);
            get_template_part('template-parts/components/about-me', '', ['class' => 'home__about-me']);
        ?>

        <?php
        if ( have_posts() ) :

            if ( is_home() && ! is_front_page() ) :
                ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>
                <?php
            endif;

            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', get_post_type() );
            endwhile;

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif;
        ?>
    </div>
</main>

<?php
get_sidebar();
get_footer();
