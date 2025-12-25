<?php
// Подключение favicon
function lomcsnih_add_favicon() {
    echo '<link rel="icon" type="image/svg+xml" href="' . get_template_directory_uri() . '/assets/images/favicon.svg">';
}
add_action('wp_head', 'lomcsnih_add_favicon', 5);

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

// Динамические стили для логотипа - приоритет 15
function lomcsnih_logo_styles() {
    // Получаем цвета логотипа из ACF
    $logo_bg_color_1 = get_field('logo_bg_color_1', 'option') ?: '#59f0ff';
    $logo_bg_color_2 = get_field('logo_bg_color_2', 'option') ?: '#7c6bff';
    $logo_text_color = get_field('logo_text_color', 'option') ?: '#070c1a';

    ?>
    <style id="lomcsnih-logo-styles">
        /* Стили для логотипа ВЕЗДЕ (header и footer) */
        .brand-mark {
            background: linear-gradient(120deg, <?php echo esc_attr($logo_bg_color_1); ?>, <?php echo esc_attr($logo_bg_color_2); ?>) !important;
            color: <?php echo esc_attr($logo_text_color); ?> !important;
        }

        .brand-mark a {
            color: <?php echo esc_attr($logo_text_color); ?> !important;
            text-decoration: none !important;
        }

        .brand-mark a:hover {
            color: <?php echo esc_attr($logo_text_color); ?> !important;
            opacity: 0.9 !important;
        }
    </style>
    <?php
}
add_action('wp_head', 'lomcsnih_logo_styles', 15);

// Динамические стили для панели доступности - приоритет 16
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
            /* Стили ТОЛЬКО для панели доступности */
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
add_action('wp_head', 'lomcsnih_accessibility_styles', 16);

// Регистрируем меню
function lomcsnih_register_menus() {
    register_nav_menus(
        array(
            'primary' => __('Основное меню', 'lomcsnih'),
            'mobile'  => __('Мобильное меню', 'lomcsnih'),
        )
    );
}
add_action('init', 'lomcsnih_register_menus');

// Кастомный Walker для меню с поддержкой dropdown
class Lomcsnih_Nav_Walker extends Walker_Nav_Menu {

    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);

        // Для первого уровня - dropdown меню
        if ($depth === 0) {
            $output .= "\n{$indent}<div class=\"dropdown-menu\">\n";
        }
    }

    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);

        if ($depth === 0) {
            $output .= "{$indent}</div>\n";
        }
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Определяем активный класс
        $active_class = '';
        $current_url = $_SERVER['REQUEST_URI'];
        $is_front_page = is_front_page();

        // URL для ссылки
        $item_url = $item->url;

        // Если это главная страница
        if ($item_url == home_url('/') || $item_url == '/') {
            $item_url = home_url('/');
            // Активна только на главной
            if ($is_front_page) {
                $active_class = 'active';
            }
        }
        // Если это якорная ссылка (#mission, #services и т.д.)
        elseif (strpos($item_url, '#') === 0) {
            // Если мы на главной - оставляем как есть
            if ($is_front_page) {
                // Для якорных ссылок на главной не делаем активными
                $active_class = '';
            } else {
                // Если не на главной - добавляем путь к главной
                $item_url = home_url('/') . $item_url;
            }
        }
        // Для страниц /news и /medications
        elseif (strpos($current_url, $item_url) !== false) {
            $active_class = 'active';
        }

        // Если это пункт первого уровня
        if ($depth === 0) {
            // Если есть дочерние элементы - добавляем класс nav-dropdown
            if ($args->walker->has_children) {
                $output .= $indent . '<div class="nav-dropdown">' . "\n";
                $output .= $indent . "\t" . '<a class="nav-link ' . $active_class . '" href="' . esc_url($item_url) . '">';

                // Текст ссылки
                $title = esc_html($item->title);
                $output .= '<span class="menu-text">' . $title . '</span>';
                $output .= ' <span class="dropdown-arrow">▾</span>';
                $output .= '</a>' . "\n";
            } else {
                // Обычная ссылка
                $output .= $indent . '<a class="nav-link ' . $active_class . '" href="' . esc_url($item_url) . '">';
                $title = esc_html($item->title);
                $output .= '<span class="menu-text">' . $title . '</span>';
                $output .= '</a>' . "\n";
            }
        }
        // Если это подпункт (второй уровень)
        else if ($depth === 1) {
            // Для подпунктов внутри dropdown
            $title = esc_html($item->title);
            $icon = '';

            // Проверяем есть ли эмодзи в начале
            if (strlen($title) >= 2) {
                $first_char = mb_substr($title, 0, 1, 'UTF-8');
                if (preg_match('/[\x{1F300}-\x{1F9FF}]/u', $first_char)) {
                    $icon = $first_char;
                    $title = mb_substr($title, 1, null, 'UTF-8');
                }
            }

            // URL для подпунктов dropdown
            $dropdown_url = $item->url;
            if (strpos($dropdown_url, '#') === 0 && !$is_front_page) {
                $dropdown_url = home_url('/') . $dropdown_url;
            }

            $output .= $indent . '<a href="' . esc_url($dropdown_url) . '" class="dropdown-item">';

            if ($icon) {
                $output .= '<span class="dropdown-icon">' . $icon . '</span>';
            }

            $output .= '<span class="dropdown-text">' . trim($title) . '</span>';
            $output .= '</a>' . "\n";
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = null) {
        if ($depth === 0 && $args->walker->has_children) {
            $output .= "</div>\n";
        }
    }
}

// Динамические стили для меню
function lomcsnih_menu_styles() {
    // Получаем цвета меню из ACF
    $menu_text_color = get_field('menu_text_color', 'option') ?: '#a8b3c7';
    $menu_hover_text_color = get_field('menu_hover_text_color', 'option') ?: '#e7ecf5';
    $menu_hover_bg_color = get_field('menu_hover_bg_color', 'option') ?: 'rgba(255, 255, 255, 0.06)';

    ?>
    <style id="lomcsnih-menu-styles">
        /* Стили для меню */
        .nav-links .nav-link {
            color: <?php echo esc_attr($menu_text_color); ?> !important;
        }

        .nav-links .nav-link:hover,
        .nav-links .nav-link.active {
            color: <?php echo esc_attr($menu_hover_text_color); ?> !important;
            background: <?php echo esc_attr($menu_hover_bg_color); ?> !important;
        }

        /* Dropdown меню */
        .nav-links .dropdown-menu a {
            color: <?php echo esc_attr($menu_text_color); ?> !important;
        }

        .nav-links .dropdown-menu a:hover {
            color: <?php echo esc_attr($menu_hover_text_color); ?> !important;
            background: <?php echo esc_attr($menu_hover_bg_color); ?> !important;
        }
    </style>
    <?php
}
add_action('wp_head', 'lomcsnih_menu_styles', 17); // Приоритет 17 - после логотипа (15) и панели (16)

// Динамические стили для телефона/ссылки в меню
function lomcsnih_nav_phone_styles() {
    // Получаем цвет из ACF
    $nav_phone_color = get_field('nav_phone_color', 'option') ?: '#e7ecf5';

    ?>
    <style id="lomcsnih-nav-phone-styles">
        /* Стили для телефона/ссылки в меню */
        .nav-phone-wrapper,
        .nav-phone-wrapper a,
        .nav-phone-wrapper .phone,
        .nav-cta .phone {
            color: <?php echo esc_attr($nav_phone_color); ?> !important;
            font-weight: 700 !important;
            text-decoration: none !important;
            cursor: pointer !important;
            transition: opacity 0.2s ease !important;
        }

        .nav-phone-wrapper a:hover,
        .nav-phone-wrapper .phone:hover,
        .nav-cta .phone:hover {
            opacity: 0.8 !important;
        }
    </style>
    <?php
}
add_action('wp_head', 'lomcsnih_nav_phone_styles', 18); // Приоритет 18 - после всего


// НАСТРОЙКИ ДЛЯ HERO СЕКЦИИ (ДЛЯ HEX ЦВЕТОВ) таблетка

function lomcsnih_check_hero_acf() {

    if (is_front_page() || is_home()) {
        echo '<!-- === ПРОВЕРКА HERO ACF (HEX) === -->';

        $home_page_id = false;

        if (get_option('page_on_front')) {
            $home_page_id = get_option('page_on_front');
            echo '<!-- Способ 1 (page_on_front): ID = ' . $home_page_id . ' -->';
        }
        elseif (get_option('page_for_posts')) {
            $home_page_id = get_option('page_for_posts');
            echo '<!-- Способ 2 (page_for_posts): ID = ' . $home_page_id . ' -->';
        }
        else {
            $home_page = get_page_by_path('home');
            if ($home_page) {
                $home_page_id = $home_page->ID;
                echo '<!-- Способ 3 (get_page_by_path): ID = ' . $home_page_id . ' -->';
            }
        }

        if (!$home_page_id) {
            echo '<!-- ОШИБКА: ID страницы Home не найден! -->';
            return;
        }

        echo '<!-- Найден ID страницы Home: ' . $home_page_id . ' -->';

        // Прямая проверка через get_post_meta (обход ACF)
        echo '<!-- Прямая проверка через get_post_meta: -->';
        $meta_fields = array(
            'hero_pill_text' => 'Текст плашки',
            'hero_pill_bg_color' => 'Цвет фона плашки (HEX)',
            'hero_pill_text_color' => 'Цвет текста плашки (HEX)',
            'hero_pill_border_color' => 'Цвет границы плашки (RGBA)'
        );

        foreach ($meta_fields as $field => $description) {
            $meta_value = get_post_meta($home_page_id, $field, true);
            echo '<!-- ' . $description . ': ' .
                 ($meta_value !== '' ? '"' . $meta_value . '"' : 'ПУСТО') . ' -->';
        }

        // Проверяем поля ACF
        if (function_exists('get_field')) {
            echo '<!-- Проверка через get_field(): -->';
            $acf_fields = array(
                'hero_pill_text' => 'Текст плашки (ACF)',
                'hero_pill_bg_color' => 'Цвет фона (ACF)',
                'hero_pill_text_color' => 'Цвет текста (ACF)',
                'hero_pill_border_color' => 'Цвет границы (ACF)'
            );

            foreach ($acf_fields as $field => $description) {
                $acf_value = get_field($field, $home_page_id);
                echo '<!-- ' . $description . ': ' .
                     ($acf_value !== false && $acf_value !== null && $acf_value !== '' ?
                      '"' . $acf_value . '"' : 'ПУСТО или false') . ' -->';
            }
        } else {
            echo '<!-- ACF функция get_field() не доступна -->';
        }

        // Проверяем правила ACF
        if (function_exists('acf_get_field_groups')) {
            echo '<!-- Проверка групп полей ACF для страницы ID ' . $home_page_id . ': -->';
            $groups = acf_get_field_groups(array('post_id' => $home_page_id));

            if (empty($groups)) {
                echo '<!-- НЕТ групп полей ACF для этой страницы! -->';
                echo '<!-- Проверьте правило в ACF: Страница равна Home -->';
            } else {
                echo '<!-- Найдено групп: ' . count($groups) . ' -->';
                foreach ($groups as $group) {
                    echo '<!-- Группа: ' . $group['title'] . ' (ID: ' . $group['ID'] . ') -->';
                }
            }
        }

        echo '<!-- === КОНЕЦ ПРОВЕРКИ === -->';
    }
}


// Создаем тип записи для секций сайта
function create_site_sections_cpt() {
    $args = array(
        'public' => true,
        'label'  => 'Секции сайта',
        'menu_icon' => 'dashicons-layout',
        'supports' => array('title', 'editor', 'custom-fields'),
        'show_in_rest' => true,
        'has_archive' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 20,
    );
    register_post_type('site_sections', $args);
}
add_action('init', 'create_site_sections_cpt');