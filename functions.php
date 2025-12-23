<?php
// Подключение favicon
function lomcsnih_add_favicon() {
    echo '<link rel="icon" type="image/svg+xml" href="' . get_template_directory_uri() . '/assets/images/favicon.svg">';
}
add_action('wp_head', 'lomcsnih_add_favicon');

// Подключаем стили, скрипты и шрифты
function lomcsnih_enqueue_assets() {
    $theme_uri = get_template_directory_uri();

    // === CSS ===
    // Основной CSS файл - УБЕРИ зависимость от lomcsnih-reset!
    $main_css_path = get_template_directory() . '/assets/css/styles.css';
    if (file_exists($main_css_path)) {
        wp_enqueue_style(
            'lomcsnih-style',
            $theme_uri . '/assets/css/styles.css',
            array(), // ← ПУСТОЙ массив! Без зависимости от reset
            filemtime($main_css_path)
        );
    }

    // === FONTS ===
    // Подключение Google Fonts
    wp_enqueue_style(
        'lomcsnih-google-fonts',
        'https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap',
        array(),
        null
    );

    // === JS ===
    $main_js_path = get_template_directory() . '/assets/js/script.js';
    if (file_exists($main_js_path)) {
        wp_enqueue_script(
            'lomcsnih-main',
            $theme_uri . '/assets/js/script.js',
            array(),
            filemtime($main_js_path),
            true
        );

        // === Передаём путь темы в JS ===
        wp_localize_script(
            'lomcsnih-main',
            'lomcsnih_Data',
            array('templateUrl' => $theme_uri)
        );
    }
}
add_action('wp_enqueue_scripts', 'lomcsnih_enqueue_assets');