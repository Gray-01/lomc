<?php get_header(); ?>

    <main>
        <section class="hero section" id="home">
            <div class="container hero-grid">
                <div class="hero-text">
                    <div class="pill">КНП Луганської обласної ради</div>
                    <h1>
                        Луганський обласний медичний центр<br>
                        <span class="gradient-text">соціально небезпечних інфекційних хвороб</span>
                    </h1>
                    <p class="lead">
                        Метою діяльності Підприємства є організація та надання третинної (високоспеціалізованої)
                        медичної допомоги з лікування та профілактики захворюваності на туберкульоз, ВІЛ-інфекції/СНІД
                        та інші соціально небезпечні інфекційні хвороби в амбулаторних та стаціонарних умовах, у
                        плановому та екстреному випадках, проведення діагностики, надання консультацій, психосоціальна
                        підтримка та медична реабілітація пацієнтів (хворих) незалежно від місця їх проживання та адреси
                        реєстрації.
                    </p>
                    <div class="hero-actions">
                        <a href="#contacts" class="btn primary">Зв'язатися</a>
                        <a href="#mission" class="btn ghost">Дізнатись більше</a>
                    </div>
                </div>
                <div class="hero-image reveal">
                    <div class="image-wrapper">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/main.jpg" alt="Фото медичного центру">
                        <div class="image-decoration"></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section mission" id="mission">
            <div class="container">
                <div class="section-head">
                    <p class="eyebrow">Наш курс</p>
                    <h2>Місія, переміщення і роль</h2>
                    <p class="muted">Вся ключова інформація про заклад, його задачі та координуючу роль в області.</p>
                </div>
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