<?php
/* Template Name: Страница новостей */
get_header();
?>

<main>
    <section class="section news-page" id="news-list">
        <div class="container">
            <div class="section-head">
                <p class="eyebrow">Актуальні події</p>
                <h2>Новини</h2>
                <p class="muted">Останні новини та події нашого центру</p>
            </div>

            <div class="news-list" id="news-container">
                <?php
                $news_query = new WP_Query(array(
                    'category_name' => 'news',
                    'posts_per_page' => -1,
                ));

                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post(); ?>
                        <div class="news-card" onclick="location.href='<?php the_permalink(); ?>'">
                            <div class="news-card-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php
                                    // ПРОСТОЙ вариант - используем medium
                                    the_post_thumbnail('medium', array(
                                        'style' => 'width: 100%; height: 200px; object-fit: cover;'
                                    ));
                                    ?>
                                <?php else : ?>
                                    <!-- Временная заглушка -->
                                    <div class="placeholder-icon">📄</div>
                                <?php endif; ?>
                            </div>

                            <div class="news-card-content">
                                <div class="news-card-date"><?php echo get_the_date('d.m.Y'); ?></div>
                                <h3 class="news-card-title"><?php the_title(); ?></h3>
                                <p class="news-card-excerpt"><?php echo get_the_excerpt(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="news-card-link">
                                    Читати далі →
                                </a>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p>Новостей пока нет.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>