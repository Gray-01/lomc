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
    $main_css_path = get_template_directory() . '/assets/css/styles.css';
    if (file_exists($main_css_path)) {
        wp_enqueue_style(
            'lomcsnih-style',
            $theme_uri . '/assets/css/styles.css',
            array(),
            filemtime($main_css_path)
        );
    }

    // === FONTS ===
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

        wp_localize_script(
            'lomcsnih-main',
            'lomcsnih_Data',
            array('templateUrl' => $theme_uri)
        );
    }
}
add_action('wp_enqueue_scripts', 'lomcsnih_enqueue_assets');

// Создаем страницу настроек темы
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Настройки темы LOMCSNIH',
        'menu_title'    => 'Настройки темы',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

// Динамические стили ТОЛЬКО для панели доступности
function lomcsnih_accessibility_styles() {
    // Получаем цвета из ACF
    $panel_bg = get_field('panel_bg_color', 'option') ?: 'rgba(7, 12, 26, 0.95)';
    $button_bg = get_field('button_bg_color', 'option') ?: 'rgba(255, 255, 255, 0.06)';
    $button_text = get_field('button_text_color', 'option') ?: '#e7ecf5';
    $button_border = get_field('button_border_color', 'option') ?: 'rgba(255, 255, 255, 0.12)';
    $button_hover_bg = get_field('button_hover_bg_color', 'option') ?: 'rgba(255, 255, 255, 0.12)';
    $button_hover_border = get_field('button_hover_border_color', 'option') ?: '#59f0ff';

    // Добавляем только если есть хотя бы один цвет
    if ($panel_bg || $button_bg || $button_text || $button_border || $button_hover_bg || $button_hover_border) {
        ?>
        <style id="lomcsnih-accessibility-styles">
            /* Стили ТОЛЬКО для панели доступности - не затрагивают CSS переменные! */
            .accessibility-panel {
                background: <?php echo esc_attr($panel_bg); ?> !important;
                border-bottom: 1px solid <?php echo esc_attr($button_border); ?> !important;
            }

            /* Кнопка переключения панели */
            .accessibility-panel .accessibility-toggle {
                background: <?php echo esc_attr($button_bg); ?> !important;
                border: 1px solid <?php echo esc_attr($button_border); ?> !important;
                color: <?php echo esc_attr($button_text); ?> !important;
            }

            .accessibility-panel .accessibility-toggle:hover {
                background: <?php echo esc_attr($button_hover_bg); ?> !important;
                border-color: <?php echo esc_attr($button_hover_border); ?> !important;
            }

            /* Все кнопки внутри панели */
            .accessibility-panel .accessibility-btn {
                background: <?php echo esc_attr($button_bg); ?> !important;
                border: 1px solid <?php echo esc_attr($button_border); ?> !important;
                color: <?php echo esc_attr($button_text); ?> !important;
            }

            .accessibility-panel .accessibility-btn:hover {
                background: <?php echo esc_attr($button_hover_bg); ?> !important;
                border-color: <?php echo esc_attr($button_hover_border); ?> !important;
            }

            .accessibility-panel .accessibility-btn.active {
                background: <?php echo esc_attr($button_hover_border); ?> !important;
                color: #070c1a !important;
                border-color: <?php echo esc_attr($button_hover_border); ?> !important;
            }

            /* Кнопка сброса */
            .accessibility-panel .accessibility-btn.reset-all {
                background: transparent !important;
                border-color: <?php echo esc_attr($button_border); ?> !important;
                color: #a8b3c7 !important;
            }

            .accessibility-panel .accessibility-btn.reset-all:hover {
                color: <?php echo esc_attr($button_text); ?> !important;
                border-color: <?php echo esc_attr($button_hover_border); ?> !important;
            }

            /* Текст меток */
            .accessibility-panel .accessibility-label {
                color: #a8b3c7 !important;
            }

            /* Иконка глаза */
            .accessibility-panel .accessibility-icon {
                color: <?php echo esc_attr($button_text); ?> !important;
            }
        </style>
        <?php
    }
}
// Приоритет 20 - чтобы шло ПОСЛЕ основного CSS файла
add_action('wp_head', 'lomcsnih_accessibility_styles', 20);