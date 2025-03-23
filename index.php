<?php
ob_start();
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

        <section class="home__portfolio-block">
            <?php
                get_template_part('template-parts/block/slider-portfolio', '', []);
            ?>
        </section>

        <section class="home__service">
            <?php
                get_template_part('template-parts/block/services', '', []);
            ?>
        </section>

        <section class="home__progress">
            <?php
            get_template_part('template-parts/block/progress', '', []);
            ?>
        </section>
    </div>
</main>

<?php
get_footer();


function modify_final_output()
{
    $html = ob_get_clean(); // Получаем весь HTML-код страницы
    if (strpos($_SERVER['HTTP_HOST'], 'wsl') !== false) {
        if (strpos($html, '<use') !== false) {
            $html = preg_replace('/(<use\s+href=")http:\/\/didistudio\.art/', '$1http://didistudio.wsl', $html);
        }
    }
    echo $html; // Выводим изменённый HTML
}

modify_final_output();
