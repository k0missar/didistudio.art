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
                <div class="header__contact-mobile contact-mobile">
                    <div>
                        <?php if (CONTACT_TELEGRAM): ?>
                            <a class="contact-mobile__item" href="https://t.me/<?php echo CONTACT_TELEGRAM;?>">telegram</a>
                        <?php endif; ?>
                        <?php if (CONTACT_WHATSAPP): ?>
                            <a class="contact-mobile__item" href="https://api.whatsapp.com/send/?phone=<?php echo CONTACT_WHATSAPP;?>&text&type=phone_number&app_absent=0">whatsapp</a>
                        <?php endif; ?>
                    </div>
                    <?php if (CONTACT_PHONE): ?>
                        <a class="contact-mobile__item contact-mobile__item--phone" href="tel:+<?php echo CONTACT_PHONE;?>"><?php echo format_phone(CONTACT_PHONE);?></a>
                    <?php endif; ?>
                </div>
            </nav>
            <div class="header__contact">
                <?php if (CONTACT_PHONE): ?>
                    <a href="tel:+<?php echo CONTACT_PHONE;?>"><?php echo format_phone(CONTACT_PHONE);?></a>
                <?php endif; ?>
            </div>
            <div class="header__menu-btn js-menu-btn">
                <div class="--line"></div>
                <div class="--line"></div>
                <div class="--line"></div>
            </div>
        </div>
    </div>
</header>
