<?php
// Получаем только текст логотипа (цвета управляются через functions.php)
$logo_text = get_field('logo_text', 'option') ?: 'ЛОМЦСНІХ';

// Получаем данные секции Футер
$footer_section = get_posts(array(
    'post_type' => 'site_sections',
    'title' => 'Футер',
    'post_status' => 'publish',
    'numberposts' => 1
));

// Значения по умолчанию
$description = 'Луганський обласний медичний центр соціально небезпечних інфекційних хвороб';
$description_size = '14';
$description_color = '#a8b3c7';
$copyright = '© ' . date('Y') . ' «ЛОМЦСНІХ». Всі права захищені.';
$copyright_size = '14';
$copyright_color = '#a8b3c7';

// Получаем данные из ACF если секция найдена
if($footer_section) {
    $section_id = $footer_section[0]->ID;

    // Описание
    $acf_description = get_field('footer_description', $section_id);
    if($acf_description) {
        $description = $acf_description;
    }

    $acf_desc_size = get_field('description_font_size', $section_id);
    if($acf_desc_size) {
        $description_size = intval($acf_desc_size);
    }

    $acf_desc_color = get_field('description_color', $section_id);
    if($acf_desc_color) {
        $description_color = $acf_desc_color;
    }

    // Копирайт
    $acf_copyright = get_field('copyright_text', $section_id);
    if($acf_copyright) {
        // Заменяем [current_year] на текущий год
        $current_year = date('Y');
        $copyright = str_replace('[current_year]', $current_year, $acf_copyright);
    }

    $acf_copyright_size = get_field('copyright_font_size', $section_id);
    if($acf_copyright_size) {
        $copyright_size = intval($acf_copyright_size);
    }

    $acf_copyright_color = get_field('copyright_color', $section_id);
    if($acf_copyright_color) {
        $copyright_color = $acf_copyright_color;
    }
}
?>

<footer class="footer">
    <div class="container footer-inner">
        <div>
            <div class="brand-mark">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php echo esc_html($logo_text); ?>
                </a>
            </div>
            <?php if($description): ?>
                <p class="muted" style="font-size: <?php echo esc_attr($description_size); ?>px; color: <?php echo esc_attr($description_color); ?>;">
                    <?php echo nl2br(esc_html($description)); ?>
                </p>
            <?php endif; ?>
        </div>
        <?php if($copyright): ?>
            <p class="muted" style="font-size: <?php echo esc_attr($copyright_size); ?>px; color: <?php echo esc_attr($copyright_color); ?>;">
                <?php echo nl2br(esc_html($copyright)); ?>
            </p>
        <?php endif; ?>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>