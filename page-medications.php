<?php
/**
 * Template Name: Залишки препаратів
 */

// ===== ФУНКЦИИ ДЛЯ ВЫВОДА =====

/**
 * Получает данные из записи "Секции сайта"
 */
function get_medications_section_data() {
    // Ищем запись типа "Секции сайта"
    $args = array(
        'post_type' => 'site_sections',
        'title' => 'Страница Залишки',
        'post_status' => 'publish',
        'posts_per_page' => 1
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $query->the_post();
        $section_id = get_the_ID();
        $cards = get_field('medication_cards', $section_id);
        wp_reset_postdata();

        return $cards;
    }

    // Если не нашли по названию, пробуем по ID 267
    $section_id = 267;
    $cards = get_field('medication_cards', $section_id);

    if ($cards !== false) {
        return $cards;
    }

    return false;
}

/**
 * Выводит файл из сложной структуры ACF
 */
function display_complex_file($file_data, $default_name = 'Файл') {
    if (empty($file_data)) {
        return;
    }

    $url = '#';
    $name = $default_name;
    $size = '—';
    $icon = $file_data['file_icon'] ?? '📎';

    // Проверяем наличие файла
    if (!empty($file_data['file']) && is_array($file_data['file'])) {
        $url = $file_data['file']['url'] ?? '#';
        $name = $file_data['file_name'] ?? ($file_data['file']['filename'] ?? $default_name);

        if (isset($file_data['file']['filesize'])) {
            $size = size_format($file_data['file']['filesize'], 2);
        }
    } elseif (!empty($file_data['file_name'])) {
        // Если есть только название файла
        $name = $file_data['file_name'];
    }
    ?>
    <div class="medication-file">
        <div class="file-icon"><?php echo esc_html($icon); ?></div>
        <div class="file-info">
            <div class="file-name"><?php echo esc_html($name); ?></div>
            <div class="file-size"><?php echo esc_html($size); ?></div>
        </div>
        <a href="<?php echo esc_url($url); ?>" class="file-download" download title="Завантажити">⬇️</a>
    </div>
    <?php
}

// ===== НАЧАЛО ВЫВОДА HTML =====
get_header();
?>

<div class="noise-bg"></div>

<main>
    <section class="section medications-page">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">Моніторинг запасів</p>
                <h2>Остатки препаратов</h2>
                <p class="muted">Архів документів про залишки препаратів</p>
            </div>

            <div class="medications-list" id="medications-container">
                <?php
                if (!function_exists('get_field')) {
                    echo '<div style="background:#f00;color:#fff;padding:20px;border-radius:8px;text-align:center;">';
                    echo '<h3>❌ Плагин ACF не найден</h3>';
                    echo '</div>';
                } else {
                    // Получаем карточки из записи "Секции сайта"
                    $cards = get_medications_section_data();

                    // Если нет карточек - показываем сообщение
                    if (empty($cards)) {
                        if (current_user_can('administrator')) {
                            echo '<div style="background:#ff9800;color:#000;padding:20px;border-radius:8px;margin-bottom:20px;">';
                            echo '<h3>ℹ️ Информация для администратора</h3>';
                            echo '<p><strong>Структура определена, но данные не заполнены</strong></p>';
                            echo '<p>Заполните поля в записи "Секции сайта" с названием <strong>"Страница Залишки"</strong> (ID: 267):</p>';
                            echo '<ol style="margin-left:20px;">';
                            echo '<li>Найдите запись типа "Секции сайта" с названием "Страница Залишки"</li>';
                            echo '<li>Нажмите "Добавить карточку" в поле medication_cards</li>';
                            echo '<li>Заполните card_period (например: "Січень 2024")</li>';
                            echo '<li>Добавьте файлы в card_files</li>';
                            echo '</ol>';
                            echo '</div>';
                        }

                        // Показываем тестовую карточку
                        $cards = array(
                            array(
                                'card_period' => 'Січень 2024',
                                'card_title' => 'Залишки препаратів',
                                'card_files' => array(
                                    array('file_name' => 'Остатки_січень_2024.xlsx', 'file_icon' => '📊'),
                                    array('file_name' => 'Звіт_січень_2024.pdf', 'file_icon' => '📄'),
                                    array('file_name' => 'Додаток_січень_2024.docx', 'file_icon' => '📝')
                                )
                            )
                        );
                    }

                    // Выводим все карточки
                    foreach ($cards as $card) {
                        $date_style = !empty($card['date_color']) ? 'style="color: ' . esc_attr($card['date_color']) . ';"' : '';
                        $title_style = !empty($card['title_color']) ? 'style="color: ' . esc_attr($card['title_color']) . ';"' : '';
                        ?>
                        <div class="medication-card">
                            <div class="medication-date" <?php echo $date_style; ?>>
                                <?php echo esc_html($card['card_period'] ?? 'Січень 2024'); ?>
                            </div>
                            <h3 class="medication-title" <?php echo $title_style; ?>>
                                <?php echo esc_html($card['card_title'] ?? 'Залишки препаратів'); ?>
                            </h3>

                            <?php if (!empty($card['card_files']) && is_array($card['card_files'])) : ?>
                                <div class="medication-files">
                                    <?php foreach ($card['card_files'] as $file) :
                                        display_complex_file($file);
                                    endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>