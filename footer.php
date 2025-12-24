<?php
// Получаем только текст логотипа (цвета управляются через functions.php)
$logo_text = get_field('logo_text', 'option') ?: 'ЛОМЦСНІХ';
?>

<footer class="footer">
    <div class="container footer-inner">
        <div>
            <div class="brand-mark">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php echo esc_html($logo_text); ?>
                </a>
            </div>
            <p class="muted">Луганський обласний медичний центр соціально небезпечних інфекційних хвороб</p>
        </div>
        <p class="muted">&copy; <span id="current-year"></span> «<?php echo esc_html($logo_text); ?>». Всі права захищені.</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>