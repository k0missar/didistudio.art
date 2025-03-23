<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package didistudio.art
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="header">
    <div class="container">
        <div class="header__wrapper">
            <div class="header__logo logo">
                <a href="/">
                    <img
                        src="<?php echo get_template_directory_uri() . '/assets/images/didi-logo.svg';?>"
                        alt=""
                        srcset="
                            <?php echo get_template_directory_uri() . '/assets/images/didi-logo-mobile.svg';?> 700w,
                            <?php echo get_template_directory_uri() . '/assets/images/didi-logo-tablet.svg';?> 1200w,
                            <?php echo get_template_directory_uri() . '/assets/images/didi-logo.svg';?> 2000w"
                        sizes="(max-width: 700px) 100vw, (max-width: 1200px) 50vw, 2000px">
                </a>
            </div>
            <nav class="header__menu js-header-menu">
                <div class="header__menu-mobile">
                    <div class=header__menu-mobile">Меню</div>
                    <div class="header__menu-close-btn js-menu-close-btn">
                        <div class="--close-line"></div>
                        <div class="--close-line --close-line--"></div>
                    </div>
                </div>
                <?php wp_menu_primary(); ?>
            </nav>
            <div class="header__contact">
                <a href="tel:+70000000000">+7 (000) 000 00 00</a>
            </div>
            <div class="header__menu-btn js-menu-btn">
                <div class="--line"></div>
                <div class="--line"></div>
                <div class="--line"></div>
            </div>
        </div>
    </div>
</header>

<script>
    const mBody = document.querySelector('body')
    const menu = document.querySelector('.js-header-menu')
    const menuBtn = document.querySelector('.js-menu-btn')
    const menuCloseBtn = document.querySelector('.js-menu-close-btn')

    if(menu && menuBtn && menuCloseBtn) {
        menuBtn.addEventListener('click', ()=> {
            menu.classList.add('header__menu--show')
            mBody.style.overflow = 'hidden'
        })

        menuCloseBtn.addEventListener('click', ()=> {
            menu.classList.remove('header__menu--show')
            mBody.style.overflow = 'auto'
        })
    }
</script>
