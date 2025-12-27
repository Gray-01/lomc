<?php
/**
 * Template for single news posts
 */
get_header();
?>

<section class="section news-detail">
    <div class="container">
        <!-- Кнопка "Назад" -->
        <?php
        // Получаем ссылку на страницу новостей
        $news_page_id = 0;

        // Попробуем найти страницу "Новини"
        $pages = get_pages(array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'page-news.php'
        ));

        if (!empty($pages)) {
            $news_page_id = $pages[0]->ID;
        }

        // Если не нашли по шаблону, ищем по заголовку
        if (!$news_page_id) {
            $page = get_page_by_title('Новини');
            if ($page) $news_page_id = $page->ID;
        }

        // Если всё равно не нашли, используем домашнюю
        $back_url = $news_page_id ? get_permalink($news_page_id) : home_url();
        ?>
        <a href="<?php echo esc_url($back_url); ?>" class="back-link">← Назад до новин</a>

        <div id="news-detail-content">
            <!-- Дата -->
            <div class="news-detail-date"><?php echo get_the_date('d F Y'); ?></div>

            <!-- Заголовок -->
            <h1 class="news-detail-title"><?php the_title(); ?></h1>

            <!-- Изображение записи -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="news-detail-image">
                    <?php
                    // ПРОСТОЙ вариант - используем large
                    the_post_thumbnail('large', array(
                        'class' => 'news-detail-main-image',
                        'style' => 'width: 100%; height: auto; max-height: 400px; object-fit: cover;'
                    ));
                    ?>
                </div>
            <?php endif; ?>

            <!-- Полный контент записи -->
            <div class="news-detail-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>