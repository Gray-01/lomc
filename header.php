<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="noise-bg"></div>

    <!-- Панель доступності для слабозорих -->
    <div class="accessibility-panel" id="accessibility-panel">
        <div class="container accessibility-inner">
            <button class="accessibility-toggle" id="accessibility-toggle" aria-label="Версія для слабозорих">
                <span class="accessibility-icon">👁️</span>
                <span class="accessibility-text">Для слабозорих</span>
            </button>
            <div class="accessibility-controls" id="accessibility-controls">
                <div class="accessibility-group">
                    <span class="accessibility-label">Розмір шрифту:</span>
                    <button class="accessibility-btn" id="font-decrease" aria-label="Зменшити шрифт">A-</button>
                    <button class="accessibility-btn" id="font-reset" aria-label="Скинути шрифт">A</button>
                    <button class="accessibility-btn" id="font-increase" aria-label="Збільшити шрифт">A+</button>
                </div>
                <div class="accessibility-group">
                    <span class="accessibility-label">Тема:</span>
                    <button class="accessibility-btn theme-btn" id="theme-normal" aria-label="Звичайна тема"
                        title="Звичайна">🌙</button>
                    <button class="accessibility-btn theme-btn" id="theme-contrast" aria-label="Контрастна тема"
                        title="Контрастна">⬛</button>
                    <button class="accessibility-btn theme-btn" id="theme-light" aria-label="Світла тема"
                        title="Світла">⬜</button>
                </div>
                <button class="accessibility-btn reset-all" id="reset-all">Скинути все</button>
            </div>
        </div>
    </div>

    <header class="top-nav">
        <div class="container nav-inner">
            <div class="brand">
                <div class="brand-mark">
                    <a href="<?php echo esc_url(home_url('/')); ?>">ЛОМЦСНІХ</a>
                </div>
            </div>
            <nav class="nav-links" id="nav-links">
                <?php
                // Получаем текущий URL для проверки активного пункта меню
                $current_url = $_SERVER['REQUEST_URI'];
                $is_front_page = is_front_page();
                ?>

                <a href="<?php echo esc_url(home_url('/')); ?>"
                   class="nav-link <?php echo $is_front_page ? 'active' : ''; ?>">
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

                <a href="<?php echo esc_url(home_url('/news')); ?>"
                   class="nav-link <?php echo strpos($current_url, '/news') !== false ? 'active' : ''; ?>">
                   Новини
                </a>

                <a href="<?php echo esc_url(home_url('/medications')); ?>"
                   class="nav-link <?php echo strpos($current_url, '/medications') !== false ? 'active' : ''; ?>">
                   Залишки
                </a>

                <div class="nav-dropdown">
                    <a href="<?php echo $is_front_page ? '#contacts' : esc_url(home_url('/#contacts')); ?>"
                       class="nav-link">Контакти <span class="dropdown-arrow">▾</span></a>
                    <div class="dropdown-menu">
                        <a href="<?php echo $is_front_page ? '#contacts' : esc_url(home_url('/#contacts')); ?>"
                           class="dropdown-item">📍 Адреси та телефони</a>
                        <a href="<?php echo $is_front_page ? '#contacts' : esc_url(home_url('/#contacts')); ?>"
                           class="dropdown-item">🛡️ Антикорупційний розділ</a>
                    </div>
                </div>
            </nav>
            <div class="nav-cta">
                <a class="phone" href="tel:+380506833065">(050) 683-30-65</a>
                <button class="burger" id="burger" aria-label="Відкрити меню">
                    <span></span><span></span><span></span>
                </button>
            </div>
        </div>
    </header>