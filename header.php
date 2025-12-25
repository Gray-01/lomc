<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="noise-bg"></div>

    <?php
    // Получаем настройки из ACF для верхней панели
    $toggle_text = get_field('accessibility_toggle_text', 'option') ?: 'Для слабозорих';
    $font_label = get_field('accessibility_font_label', 'option') ?: 'Розмір шрифту:';
    $theme_label = get_field('accessibility_theme_label', 'option') ?: 'Тема:';
    $reset_text = get_field('accessibility_reset_text', 'option') ?: 'Скинути все';
    ?>

    <!-- Панель доступності для слабозорих -->
    <div class="accessibility-panel" id="accessibility-panel">
        <div class="container accessibility-inner">
            <button class="accessibility-toggle" id="accessibility-toggle" aria-label="Версія для слабозорих">
                <span class="accessibility-icon">👁️</span>
                <span class="accessibility-text"><?php echo esc_html($toggle_text); ?></span>
            </button>
            <div class="accessibility-controls" id="accessibility-controls">
                <div class="accessibility-group">
                    <span class="accessibility-label"><?php echo esc_html($font_label); ?></span>
                    <button class="accessibility-btn" id="font-decrease" aria-label="Зменшити шрифт">A-</button>
                    <button class="accessibility-btn" id="font-reset" aria-label="Скинути шрифт">A</button>
                    <button class="accessibility-btn" id="font-increase" aria-label="Збільшити шрифт">A+</button>
                </div>
                <div class="accessibility-group">
                    <span class="accessibility-label"><?php echo esc_html($theme_label); ?></span>
                    <button class="accessibility-btn theme-btn" id="theme-normal" aria-label="Звичайна тема" title="Звичайна">🌙</button>
                    <button class="accessibility-btn theme-btn" id="theme-contrast" aria-label="Контрастна тема" title="Контрастна">⬛</button>
                    <button class="accessibility-btn theme-btn" id="theme-light" aria-label="Світла тема" title="Світла">⬜</button>
                </div>
                <button class="accessibility-btn reset-all" id="reset-all"><?php echo esc_html($reset_text); ?></button>
            </div>
        </div>
    </div>

    <?php
    // Получаем настройки логотипа из ACF (один раз, используется и в header и в footer)
    $logo_text = get_field('logo_text', 'option') ?: 'ЛОМЦСНІХ';
    ?>

    <header class="top-nav">
        <div class="container nav-inner">
            <div class="brand">
                <div class="brand-mark">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php echo esc_html($logo_text); ?>
                    </a>
                </div>
            </div>

            <nav class="nav-links" id="nav-links">
                <?php
                // Выводим WordPress меню или запасной вариант
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => '',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'depth'          => 2, // Только 2 уровня: основной и dropdown
                        'walker'         => new Lomcsnih_Nav_Walker(),
                    ));
                } else {
                    // Запасной вариант если меню не создано
                    $current_url = $_SERVER['REQUEST_URI'];
                    $is_front_page = is_front_page();
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link <?php echo $is_front_page ? 'active' : ''; ?>">
                        Головна
                    </a>

                    <?php if ($is_front_page): ?>
                        <a href="#mission" class="nav-link">Місія</a>
                        <a href="#services" class="nav-link">Послуги</a>
                        <a href="#structure" class="nav-link">Структура</a>
                        <a href="#team" class="nav-link">Адміністрація</a>
                    <?php else: ?>
                        <a href="<?php echo esc_url(home_url('/#mission')); ?>" class="nav-link">Місія</a>
                        <a href="<?php echo esc_url(home_url('/#services')); ?>" class="nav-link">Послуги</a>
                        <a href="<?php echo esc_url(home_url('/#structure')); ?>" class="nav-link">Структура</a>
                        <a href="<?php echo esc_url(home_url('/#team')); ?>" class="nav-link">Адміністрація</a>
                    <?php endif; ?>

                    <a href="<?php echo esc_url(home_url('/news')); ?>" class="nav-link <?php echo strpos($current_url, '/news') !== false ? 'active' : ''; ?>">
                        Новини
                    </a>

                    <a href="<?php echo esc_url(home_url('/medications')); ?>" class="nav-link <?php echo strpos($current_url, '/medications') !== false ? 'active' : ''; ?>">
                        Залишки
                    </a>

                    <div class="nav-dropdown">
                        <a href="<?php echo $is_front_page ? '#contacts' : esc_url(home_url('/#contacts')); ?>" class="nav-link">
                            Контакти <span class="dropdown-arrow">▾</span>
                        </a>
                        <div class="dropdown-menu">
                            <a href="<?php echo $is_front_page ? '#contacts' : esc_url(home_url('/#contacts')); ?>" class="dropdown-item">
                                📍 Адреси та телефони
                            </a>
                            <a href="<?php echo $is_front_page ? '#contacts' : esc_url(home_url('/#contacts')); ?>" class="dropdown-item">
                                🛡️ Антикорупційний розділ
                            </a>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </nav>

            <div class="nav-cta">
                <?php
                // Получаем настройки телефона/ссылки из ACF
                $nav_phone_content = get_field('nav_phone_link', 'option');
                $nav_phone_color = get_field('nav_phone_color', 'option') ?: '#e7ecf5';

                // Если есть контент из ACF
                if ($nav_phone_content) {
                    echo '<div class="nav-phone-wrapper" style="color: ' . esc_attr($nav_phone_color) . ';">';
                    echo apply_filters('the_content', $nav_phone_content);
                    echo '</div>';
                } else {
                    // Запасной вариант
                    echo '<a class="phone" href="tel:+380506833065" style="color: ' . esc_attr($nav_phone_color) . ';">(050) 683-30-65</a>';
                }
                ?>

                <button class="burger" id="burger" aria-label="Відкрити меню">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </header>