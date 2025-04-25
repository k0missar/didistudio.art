<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package didistudio.art
 */

?>
<footer class="footer">
    <div class="container">
        <div class="footer__wrapper">
            <div class="footer__menu">
                <div class="footer__title">Карта сайта:</div>
                <?php
                    wp_menu_footer();
                ?>
            </div>

            <div class="footer__activity">
                <div class="footer__title">Реквизиты:</div>
                <ul class="footer__activity-list">
                    <li><?= REQUISITE_ACTIVITY ?></li>
                    <li><?= REQUISITE_INN ?></li>
                    <li><?= REQUISITE_ADDRESS ?></li>
                </ul>
            </div>

            <div class="footer__contact" id="contact">
                <div class="footer__contact-wrapper">
                <?php if (CONTACT_TELEGRAM || CONTACT_WHATSAPP): ?>
                    <div class="footer__social-list">
                        <?php if (CONTACT_TELEGRAM): ?>
                            <a class="footer__social-item" href="https://t.me/<?php echo CONTACT_TELEGRAM;?>">telegram</a>
                        <?php endif; ?>
                        <?php if (CONTACT_WHATSAPP): ?>
                            <a class="footer__social-item" href="https://api.whatsapp.com/send/?phone=<?php echo CONTACT_WHATSAPP;?>&text&type=phone_number&app_absent=0">whatsapp</a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                    <div class="footer__contact-list">
                        <div class="footer__contact-item">
                            <div class="footer__contact-animation">
                                <a href="tel:<?= CONTACT_PHONE ?>" class="footer__contact-link">
                                    <?php echo format_phone(CONTACT_PHONE);?>
                                </a>
                            </div>
                        </div>
                        <div class="footer__contact-item">
                            <div class="footer__contact-animation">
                                <a href="mailto:<?= CONTACT_EMAIL ?>" class="footer__contact-link">
                                    <?= CONTACT_EMAIL ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php wp_footer(); ?>
</footer>
</body>
</html>
