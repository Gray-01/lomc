<?php get_header(); ?>

    <main>

    <section class="hero section" id="home">
    <div class="container hero-grid">
        <div class="hero-text">
            <?php

            // 1. ОПРЕДЕЛЯЕМ ID СТРАНИЦЫ HOME
            $home_page_id = false;

            if (get_option('page_on_front')) {
                $home_page_id = get_option('page_on_front');
            }
            elseif (get_option('page_for_posts')) {
                $home_page_id = get_option('page_for_posts');
            }
            else {
                $home_page = get_page_by_path('home');
                if ($home_page) {
                    $home_page_id = $home_page->ID;
                }
            }

            // 2. ДЕФОЛТНЫЕ ЗНАЧЕНИЯ ДЛЯ ПИЛЮЛИ
            $pill_text = 'КНП Луганської обласної ради';
            $pill_bg_color = '#ffffff1f';
            $pill_text_color = '#a8b3c7';
            $pill_border_color = '#ffffff1f';

            // 3. ДЕФОЛТНЫЕ ЗНАЧЕНИЯ ДЛЯ ЗАГОЛОВКА И ТЕКСТА
            $title_line1 = 'Луганський обласний медичний центр';
            $title_line2 = 'соціально небезпечних інфекційних хвороб';
            $title_color1 = '#e7ecf5';
            $gradient_start = '#59f0ff';
            $gradient_end = '#7c6bff';
            $description = 'Метою діяльності Підприємства є організація та надання третинної (високоспеціалізованої) медичної допомоги з лікування та профілактики захворюваності на туберкульоз, ВІЛ-інфекції/СНІД та інші соціально небезпечні інфекційні хвороби в амбулаторних та стаціонарних умовах, у плановому та екстреному випадках, проведення діагностики, надання консультацій, психосоціальна підтримка та медична реабілітація пацієнтів (хворих) незалежно від місця їх проживання та адреси реєстрації.';
            $description_color = '#a8b3c7';

            // 4. ДЕФОЛТНЫЕ ЗНАЧЕНИЯ ДЛЯ КНОПОК
            $btn1_text = 'Зв\'язатися';
            $btn1_text_color = '#070c1a';
            $btn1_gradient_start = '#59f0ff';
            $btn1_gradient_end = '#7c6bff';
            $btn1_link = '#contacts';

            $btn2_text = 'Дізнатись більше';
            $btn2_text_color = '#e7ecf5';
            $btn2_bg_color = 'rgba(255, 255, 255, 0.06)';
            $btn2_border_color = 'rgba(255, 255, 255, 0.12)';
            $btn2_link = '#mission';

            // 5. ПОЛУЧАЕМ ДАННЫЕ ИЗ ACF
            if (function_exists('get_field') && $home_page_id) {
                // ПИЛЮЛЯ
                $acf_pill_text = get_field('hero_pill_text', $home_page_id);
                $acf_pill_bg_color = get_field('hero_pill_bg_color', $home_page_id);
                $acf_pill_text_color = get_field('hero_pill_text_color', $home_page_id);
                $acf_pill_border_color = get_field('hero_pill_border_color', $home_page_id);

                if (!empty($acf_pill_text)) $pill_text = $acf_pill_text;
                if (!empty($acf_pill_bg_color)) $pill_bg_color = $acf_pill_bg_color;
                if (!empty($acf_pill_text_color)) $pill_text_color = $acf_pill_text_color;
                if (!empty($acf_pill_border_color)) $pill_border_color = $acf_pill_border_color;

                // ЗАГОЛОВОК
                $acf_title_line1 = get_field('hero_title_line1', $home_page_id);
                $acf_title_line2 = get_field('hero_title_line2', $home_page_id);
                $acf_title_color1 = get_field('hero_title_color1', $home_page_id);
                $acf_gradient_start = get_field('hero_gradient_start', $home_page_id);
                $acf_gradient_end = get_field('hero_gradient_end', $home_page_id);

                if ($acf_title_line1 !== false && $acf_title_line1 !== null && trim($acf_title_line1) !== '') {
                    $title_line1 = $acf_title_line1;
                }
                if ($acf_title_line2 !== false && $acf_title_line2 !== null && trim($acf_title_line2) !== '') {
                    $title_line2 = $acf_title_line2;
                }
                if (!empty($acf_title_color1)) $title_color1 = $acf_title_color1;
                if (!empty($acf_gradient_start)) $gradient_start = $acf_gradient_start;
                if (!empty($acf_gradient_end)) $gradient_end = $acf_gradient_end;

                // ТЕКСТ
                $acf_description = get_field('hero_description', $home_page_id);
                $acf_description_color = get_field('hero_description_color', $home_page_id);

                if ($acf_description !== false && $acf_description !== null && trim($acf_description) !== '') {
                    $description = $acf_description;
                }
                if (!empty($acf_description_color)) $description_color = $acf_description_color;

                // КНОПКИ
                $acf_btn1_text = get_field('hero_btn1_text', $home_page_id);
                $acf_btn1_text_color = get_field('hero_btn1_text_color', $home_page_id);
                $acf_btn1_gradient_start = get_field('hero_btn1_gradient_start', $home_page_id);
                $acf_btn1_gradient_end = get_field('hero_btn1_gradient_end', $home_page_id);
                $acf_btn1_link = get_field('hero_btn1_link', $home_page_id);

                $acf_btn2_text = get_field('hero_btn2_text', $home_page_id);
                $acf_btn2_text_color = get_field('hero_btn2_text_color', $home_page_id);
                $acf_btn2_bg_color = get_field('hero_btn2_bg_color', $home_page_id);
                $acf_btn2_border_color = get_field('hero_btn2_border_color', $home_page_id);
                $acf_btn2_link = get_field('hero_btn2_link', $home_page_id);

                if (!empty($acf_btn1_text)) $btn1_text = $acf_btn1_text;
                if (!empty($acf_btn1_text_color)) $btn1_text_color = $acf_btn1_text_color;
                if (!empty($acf_btn1_gradient_start)) $btn1_gradient_start = $acf_btn1_gradient_start;
                if (!empty($acf_btn1_gradient_end)) $btn1_gradient_end = $acf_btn1_gradient_end;
                if (!empty($acf_btn1_link)) $btn1_link = $acf_btn1_link;

                if (!empty($acf_btn2_text)) $btn2_text = $acf_btn2_text;
                if (!empty($acf_btn2_text_color)) $btn2_text_color = $acf_btn2_text_color;
                if (!empty($acf_btn2_bg_color)) $btn2_bg_color = $acf_btn2_bg_color;
                if (!empty($acf_btn2_border_color)) $btn2_border_color = $acf_btn2_border_color;
                if (!empty($acf_btn2_link)) $btn2_link = $acf_btn2_link;
            }

            // Безопасная обработка HTML для заголовков
            $allowed_title_tags = array(
                'a' => array('href', 'title', 'target', 'class', 'id'),
                'strong' => array(),
                'em' => array(),
                'b' => array(),
                'i' => array(),
                'span' => array('class', 'style'),
                'br' => array()
            );
            ?>

            <!-- ПИЛЮЛЯ -->
            <div class="pill" style="
                background: <?php echo esc_attr($pill_bg_color); ?>;
                border-color: <?php echo esc_attr($pill_border_color); ?>;
                color: <?php echo esc_attr($pill_text_color); ?>;">
                <?php echo esc_html($pill_text); ?>
            </div>

            <!-- ЗАГОЛОВОК С ГРАДИЕНТОМ -->
            <h1 style="color: <?php echo esc_attr($title_color1); ?>;">
                <?php echo wp_kses($title_line1, $allowed_title_tags); ?><br>
                <span class="gradient-text" style="background: linear-gradient(120deg, <?php echo esc_attr($gradient_start); ?>, <?php echo esc_attr($gradient_end); ?>);
                                                   -webkit-background-clip: text;
                                                   background-clip: text;
                                                   color: transparent;">
                    <?php echo wp_kses($title_line2, $allowed_title_tags); ?>
                </span>
            </h1>

            <!-- ТЕКСТ ОПИСАНИЯ -->
            <div class="lead" style="color: <?php echo esc_attr($description_color); ?>;">
                <?php echo apply_filters('the_content', $description); ?>
            </div>

            <!-- КНОПКИ -->
            <div class="hero-actions">
                <!-- Первая кнопка (primary) -->
                <a href="<?php echo esc_attr($btn1_link); ?>"
                   class="btn primary"
                   style="background: linear-gradient(120deg, <?php echo esc_attr($btn1_gradient_start); ?>, <?php echo esc_attr($btn1_gradient_end); ?>);
                          color: <?php echo esc_attr($btn1_text_color); ?>;
                          box-shadow: 0 10px 40px rgba(89, 240, 255, 0.2);">
                    <?php echo esc_html($btn1_text); ?>
                </a>

                <!-- Вторая кнопка (ghost) -->
                <a href="<?php echo esc_attr($btn2_link); ?>"
                   class="btn ghost"
                   style="color: <?php echo esc_attr($btn2_text_color); ?>;
                          background: <?php echo esc_attr($btn2_bg_color); ?>;
                          border-color: <?php echo esc_attr($btn2_border_color); ?>;">
                    <?php echo esc_html($btn2_text); ?>
                </a>
            </div>
        </div> <!-- Закрываем .hero-text -->

        <!-- ИЗОБРАЖЕНИЕ (отдельно от .hero-text) -->

        <!-- ИЗОБРАЖЕНИЕ -->
<div class="hero-image reveal">
    <div class="image-wrapper">
        <?php
        // Дефолтные значения
        $hero_image_url = get_template_directory_uri() . '/assets/images/main.jpg';
        $hero_image_alt = 'Фото медичного центру';

        // Получаем данные из ACF
        if (function_exists('get_field') && $home_page_id) {
            $acf_hero_image = get_field('hero_image', $home_page_id);
            $acf_hero_image_alt = get_field('hero_image_alt', $home_page_id);

            // Обрабатываем изображение (массив от ACF)
            if (!empty($acf_hero_image) && is_array($acf_hero_image)) {
                // Берем URL из массива
                $hero_image_url = $acf_hero_image['url'];

                // Можно также использовать определенный размер:
                // if (!empty($acf_hero_image['sizes']['medium'])) {
                //     $hero_image_url = $acf_hero_image['sizes']['medium'];
                // }

                // Берем alt из массива, если есть
                if (!empty($acf_hero_image['alt'])) {
                    $hero_image_alt = $acf_hero_image['alt'];
                }
            }

            // Альтернативный текст из отдельного поля (если заполнено)
            if (!empty($acf_hero_image_alt)) {
                $hero_image_alt = $acf_hero_image_alt;
            }

            // Отладка (можно включить для проверки)
            // echo '<!-- ACF изображение: ';
            // print_r($acf_hero_image);
            // echo ' -->';
        }
        ?>

        <img src="<?php echo esc_url($hero_image_url); ?>"
             alt="<?php echo esc_attr($hero_image_alt); ?>">
        <div class="image-decoration"></div>
    </div>
</div>

    </div>

</section>

                <section class="section mission" id="mission">
            <div class="container">
                <?php
                $mission_section = get_posts(array(
                    'post_type' => 'site_sections',
                    'title' => 'Секция: Миссия',
                    'post_status' => 'publish',
                    'numberposts' => 1
                ));

                if($mission_section) :
                    $section_id = $mission_section[0]->ID;

                    // Получаем цвета
                    $eyebrow_color = get_field('mission_eyebrow_color', $section_id) ?: '#a8b3c7';
                    $heading_color = get_field('mission_heading_color', $section_id) ?: '#e7ecf5';
                    $description_color = get_field('mission_description_color', $section_id) ?: '#a8b3c7';
                ?>

                <!-- Инлайн стили для цветов -->
                <style>
                    /* Сбрасываем стили WordPress для параграфов */
                    #mission .section-head .eyebrow p,
                    #mission .section-head h2 p,
                    #mission .section-head .muted p {
                        all: initial !important;
                        all: unset !important;
                        display: inline !important;
                        margin: 0 !important;
                        padding: 0 !important;
                        line-height: inherit !important;
                        font-size: inherit !important;
                        font-weight: inherit !important;
                        color: inherit !important;
                    }

                    /* Применяем кастомные цвета */
                    #mission .section-head .eyebrow,
                    #mission .section-head .eyebrow * {
                        color: <?php echo esc_attr($eyebrow_color); ?> !important;
                    }

                    #mission .section-head h2,
                    #mission .section-head h2 * {
                        color: <?php echo esc_attr($heading_color); ?> !important;
                    }

                    #mission .section-head .muted,
                    #mission .section-head .muted * {
                        color: <?php echo esc_attr($description_color); ?> !important;
                    }
                </style>

                <div class="section-head">
                    <?php if( $eyebrow = get_field('mission_eyebrow', $section_id) ): ?>
                        <div class="eyebrow"><?php echo $eyebrow; ?></div>
                    <?php endif; ?>

                    <?php if( $heading = get_field('mission_heading', $section_id) ): ?>
                        <h2><?php echo $heading; ?></h2>
                    <?php endif; ?>

                    <?php if( $description = get_field('mission_description', $section_id) ): ?>
                        <div class="muted"><?php echo $description; ?></div>
                    <?php endif; ?>
                </div>

                <?php endif; ?>

                 <?php
                // Выводим карточки из Repeater
                if( have_rows('mission_cards', $section_id) ): ?>
                    <div class="card-grid">
                        <?php while( have_rows('mission_cards', $section_id) ): the_row();
                            $icon = get_sub_field('card_icon');
                            $title = get_sub_field('card_title');
                            $description = get_sub_field('card_description');
                            $tag = get_sub_field('card_tag');
                        ?>
                            <article class="card reveal">
                                <?php if( $icon ): ?>
                                    <div class="card-icon"><?php echo esc_html($icon); ?></div>
                                <?php endif; ?>

                                <?php if( $title ): ?>
                                    <div class="card-title">
                                        <?php echo $title; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if( $description ): ?>
                                    <div class="card-description">
                                        <?php echo $description; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if( $tag ): ?>
                                    <span class="tag"><?php echo esc_html($tag); ?></span>
                                <?php endif; ?>
                            </article>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <!-- Если карточек нет, показываем статические (для обратной совместимости) -->
                    <div class="card-grid">
                        <article class="card reveal">
                            <div class="card-icon">📍</div>
                            <h3>Переміщення центру</h3>
                            <p>Заклад тимчасово переміщено за розпорядженням від 01.11.2022 №429 з м. Сіверськодонецьк до с.
                                Геронимівка, Черкаська область.</p>
                            <span class="tag">Геронимівка, вул. Диспансерна, 1</span>
                        </article>
                        <article class="card reveal">
                            <div class="card-icon">🎯</div>
                            <h3>Високоспеціалізована допомога</h3>
                            <p>Діагностика і лікування туберкульозу, вірусних гепатитів В і С, ВІЛ-інфекції, тестування,
                                АРТ, моніторинг та забезпечення препаратами.</p>
                            <span class="tag">III рівень</span>
                        </article>
                        <article class="card reveal">
                            <div class="card-icon">🤝</div>
                            <h3>Координація</h3>
                            <p>Надання організаційно-методичної і консультативної допомоги закладам охорони здоров'я, які
                                розташовуються на території області</p>
                            <span class="tag">Статистика та підтримка</span>
                        </article>
                    </div>
                <?php endif; ?>

            </div>
        </section>

        <section class="section services-v2" id="services">
            <div class="container">
                <div class="section-header-v2">
                    <span class="section-label">Наші послуги</span>
                    <h2 class="section-title-v2">Що ми пропонуємо</h2>
                </div>
                <div class="services-v2__grid">
                    <div class="service-card-v2 reveal">
                        <div class="service-card-v2__icon">🫁</div>
                        <h3 class="service-card-v2__title">Діагностика та лікування туберкульозу</h3>
                        <p class="service-card-v2__desc">Комплексна діагностика, виявлення та лікування всіх форм
                            туберкульозу з використанням сучасних методів</p>
                        <ul class="service-card-v2__list">
                            <li>Діагностика та виявлення</li>
                            <li>Рентген-діагностика</li>
                            <li>Лабораторні дослідження</li>
                            <li>Контрольоване лікування</li>
                        </ul>
                    </div>
                    <div class="service-card-v2 reveal">
                        <div class="service-card-v2__icon">🧬</div>
                        <h3 class="service-card-v2__title">Діагностика та лікування вірусних гепатитів В та С</h3>
                        <p class="service-card-v2__desc">Діагностика та терапія вірусних гепатитів В і С з застосуванням
                            сучасних протоколів лікування</p>
                        <ul class="service-card-v2__list">
                            <li>Діагностика та виявлення</li>
                            <li>Швидке тестування</li>
                            <li>Молекулярна діагностика</li>
                            <li>Противірусна терапія</li>
                        </ul>
                    </div>
                    <div class="service-card-v2 reveal">
                        <div class="service-card-v2__icon">💉</div>
                        <h3 class="service-card-v2__title">Діагностика та лікування ВІЛ-інфекціі/СНІДУ</h3>
                        <p class="service-card-v2__desc">Надання АРТ, моніторинг лікування, забезпечення препаратами та
                            технічна підтримка</p>
                        <ul class="service-card-v2__list">
                            <li>Діагностика та виявлення</li>
                            <li>Тестування на ВІЛ</li>
                            <li>Призначення АРТ</li>
                            <li>Моніторинг терапії</li>
                        </ul>
                    </div>
                    <div class="service-card-v2 reveal">
                        <div class="service-card-v2__icon">🔬</div>
                        <h3 class="service-card-v2__title">Лабораторна діагностика</h3>
                        <p class="service-card-v2__desc">Повний спектр клініко-діагностичних та бактеріологічних
                            досліджень</p>
                        <ul class="service-card-v2__list">
                            <li>Клінічні аналізи</li>
                            <li>Бактеріологія</li>
                            <li>Імунологія</li>
                        </ul>
                    </div>
                    <div class="service-card-v2 reveal">
                        <div class="service-card-v2__icon">🩻</div>
                        <h3 class="service-card-v2__title">Рентген-діагностика</h3>
                        <p class="service-card-v2__desc">Сучасне рентгенологічне обладнання для точної діагностики
                            захворювань</p>
                        <ul class="service-card-v2__list">
                            <li>Рентгенографія</li>
                        </ul>
                    </div>
                    <div class="service-card-v2 reveal">
                        <div class="service-card-v2__icon">👶</div>
                        <h3 class="service-card-v2__title">Педіатрична допомога</h3>
                        <p class="service-card-v2__desc">Спеціалізована допомога дітям, хворим на соціально небезпечні
                            інфекційні хвороби</p>
                        <ul class="service-card-v2__list">
                            <li>Діагностика</li>
                            <li>Лікування</li>
                            <li>Профілактика</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="section structure" id="structure">
            <div class="container">
                <div class="section-head">
                    <p class="eyebrow">Напрями та структура</p>
                    <h2>Відділення та кабінети центру</h2>
                    <p class="muted">Повний перелік підрозділів, що працюють у складі центру</p>
                </div>
                <div class="structure-grid-wp">
                    <div class="structure-card reveal">
                        <div class="structure-card-icon">🏥</div>
                        <h3 class="structure-card-title">Диспансерне відділення</h3>
                    </div>
                    <div class="structure-card reveal">
                        <div class="structure-card-icon">🩺</div>
                        <h3 class="structure-card-title">Міжрайонний протитуберкульозний кабінет /"Довіра"/сайт АРТ</h3>
                    </div>
                    <div class="structure-card reveal">
                        <div class="structure-card-icon">💉</div>
                        <h3 class="structure-card-title">Відділення легеневого туберкульозу №1</h3>
                    </div>
                    <div class="structure-card reveal">
                        <div class="structure-card-icon">🫁</div>
                        <h3 class="structure-card-title">Відділення легеневого туберкульозу №2</h3>
                    </div>
                    <div class="structure-card reveal">
                        <div class="structure-card-icon">📊</div>
                        <h3 class="structure-card-title">Кабінет з функціональної діагностики</h3>
                    </div>
                    <div class="structure-card reveal">
                        <div class="structure-card-icon">💊</div>
                        <h3 class="structure-card-title">Кабінет контрольованого лікування</h3>
                    </div>
                    <div class="structure-card reveal">
                        <div class="structure-card-icon">🦠</div>
                        <h3 class="structure-card-title">Відділення для лікування хворих на ВІЛ/СНІД №3</h3>
                    </div>
                    <div class="structure-card reveal">
                        <div class="structure-card-icon">👨‍⚕️</div>
                        <h3 class="structure-card-title">Амбулаторно-поліклінічне відділення</h3>
                    </div>
                    <div class="structure-card reveal">
                        <div class="structure-card-icon">🏥</div>
                        <h3 class="structure-card-title">Кабінет "Довіра"</h3>
                    </div>
                    <div class="structure-card reveal">
                        <div class="structure-card-icon">👶</div>
                        <h3 class="structure-card-title">Дитяче лікувально-діагностичне відділення</h3>
                    </div>
                    <div class="structure-card reveal">
                        <div class="structure-card-icon">📈</div>
                        <h3 class="structure-card-title">Відділ моніторингу і оцінки (МіО)</h3>
                    </div>
                    <div class="structure-card reveal">
                        <div class="structure-card-icon">📷</div>
                        <h3 class="structure-card-title">Рентген-діагностичне відділення</h3>
                    </div>
                    <div class="structure-card reveal">
                        <div class="structure-card-icon">🔬</div>
                        <h3 class="structure-card-title">Клініко-діагностична лабораторія</h3>
                    </div>
                    <div class="structure-card reveal">
                        <div class="structure-card-icon">🧫</div>
                        <h3 class="structure-card-title">Відділ бактеріології</h3>
                    </div>
                    <div class="structure-card reveal">
                        <div class="structure-card-icon">🧪</div>
                        <h3 class="structure-card-title">Відділ діагностики ВІЛ та вірусних гепатитів, сифілісу та інших
                            Torch-інфекцій</h3>
                    </div>
                    <div class="structure-card reveal">
                        <div class="structure-card-icon">🔍</div>
                        <h3 class="structure-card-title">Кабінет ендоскопічний</h3>
                    </div>
                </div>
            </div>
        </section>

        <section class="section team" id="team">
            <div class="container">
                <div class="portrait-header">
                    <h2 class="header-title">Керівництво</h2>
                </div>
                <div class="portrait-grid">
                    <div class="portrait-card main reveal">
                        <div class="portrait-frame">
                            <div class="portrait-initials">👔</div>
                        </div>
                        <div class="portrait-info">
                            <h3>Нужний Роман Андрійович</h3>
                            <p>Генеральний директор</p>
                        </div>
                    </div>
                    <div class="portrait-card main reveal">
                        <div class="portrait-frame">
                            <div class="portrait-initials">👨‍⚕️</div>
                        </div>
                        <div class="portrait-info">
                            <h3>Джаббаров Адалат Магомед Огли</h3>
                            <p>Медичний директор</p>
                        </div>
                    </div>
                    <div class="portrait-card reveal">
                        <div class="portrait-frame">
                            <div class="portrait-initials">💼</div>
                        </div>
                        <div class="portrait-info">
                            <h3>Михайлюченко Лідія Борисівна</h3>
                            <p>Заступник генерального директора з економічних питань</p>
                        </div>
                    </div>
                    <div class="portrait-card reveal">
                        <div class="portrait-frame">
                            <div class="portrait-initials">🏥</div>
                        </div>
                        <div class="portrait-info">
                            <h3>Попкова Оксана Валентинівна</h3>
                            <p>Завідувач диспансерного відділення</p>
                        </div>
                    </div>
                    <div class="portrait-card reveal">
                        <div class="portrait-frame">
                            <div class="portrait-initials">🫁</div>
                        </div>
                        <div class="portrait-info">
                            <h3>Дранник Антон Ігорович</h3>
                            <p>Завідувач Відділення легеневого туберкульозу №1</p>
                        </div>
                    </div>
                    <div class="portrait-card reveal">
                        <div class="portrait-frame">
                            <div class="portrait-initials">🩺</div>
                        </div>
                        <div class="portrait-info">
                            <h3>Нужна Олена Юріївна</h3>
                            <p>Завідувач амбулаторно-поліклінічного відділення</p>
                        </div>
                    </div>
                    <div class="portrait-card reveal">
                        <div class="portrait-frame">
                            <div class="portrait-initials">📷</div>
                        </div>
                        <div class="portrait-info">
                            <h3>Кучеренко Інна Ремівна</h3>
                            <p>Завідувач рентгендіагностичного відділення</p>
                        </div>
                    </div>
                    <div class="portrait-card reveal">
                        <div class="portrait-frame">
                            <div class="portrait-initials">👨‍⚕️</div>
                        </div>
                        <div class="portrait-info">
                            <h3>Ринковий Олександр Михайлович</h3>
                            <p>Головний медичний брат</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section contacts" id="contacts">
            <div class="container contacts-grid">
                <div class="contact-card reveal">
                    <p class="eyebrow">Поточна адреса</p>
                    <h3>Черкаська область, Черкаський р-н,<br>с. Геронимівка, вул. Диспансерна, 1</h3>
                </div>
                <div class="contact-card reveal">
                    <p class="eyebrow">Юридична адреса</p>
                    <h3>93400, Луганська область,<br>м. Сіверськодонецьк, вул. Сметаніна, 5</h3>
                </div>
                <div class="contact-card reveal">
                    <p class="eyebrow">Телефон для довідок</p>
                    <a class="phone-large" href="tel:+380506833065">(050) 683-30-65</a>
                </div>
                <div class="contact-card anticor-card reveal">
                    <p class="eyebrow">🛡️ Антикорупційний розділ</p>
                    <h3>Повідомити про факти корупції</h3>
                    <div class="anticor-contacts">
                        <a href="mailto:anticor.lomtsnih@ukr.net" class="anticor-link">
                            <span class="anticor-icon">✉️</span>
                            <span>anticor.lomtsnih@ukr.net</span>
                        </a>
                        <a href="tel:+380506833065" class="anticor-link">
                            <span class="anticor-icon">📞</span>
                            <span>(050) 683-30-65</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>