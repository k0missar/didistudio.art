<?php
// Контактные данные
define('CONTACT_EMAIL', get_field('contact_email', 'option'));
define('CONTACT_PHONE', get_field('contact_phone', 'option'));
define('CONTACT_TELEGRAM', get_field('contact_telegram', 'option'));
define('CONTACT_WHATSAPP', get_field('contact_whatsapp', 'option'));

// Реквизиты
define('REQUISITE_ACTIVITY', get_field('activity', 'option'));
define('REQUISITE_INN', get_field('inn', 'option'));
define('REQUISITE_ADDRESS', get_field('address', 'option'));

$args = array(
    'show_all'     => false, // показаны все страницы участвующие в пагинации
    'end_size'     => 0,     // количество страниц на концах
    'mid_size'     => 1,     // количество страниц вокруг текущей
    'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
    'prev_text'    => 'Назад',
    'next_text'    => 'Дальше',
    'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
    'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
    'screen_reader_text' => 'Навигация',
    'class'        => 'pagination', // CSS класс, добавлено в 5.5.0.
);
define('PAGINATION', $args);

