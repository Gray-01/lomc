// Mobile menu toggle
const burger = document.getElementById('burger');
const navLinks = document.getElementById('nav-links');

if (burger) {
    burger.addEventListener('click', () => {
        navLinks.classList.toggle('open');
    });
}

// Smooth scroll for nav links
const links = document.querySelectorAll('.nav-link');
links.forEach(link => {
    link.addEventListener('click', (e) => {
        const targetId = link.getAttribute('href');
        if (targetId?.startsWith('#')) {
            e.preventDefault();
            navLinks.classList.remove('open');
            document.querySelector(targetId)?.scrollIntoView({ behavior: 'smooth' });
        }
    });
});

// Intersection Observer for reveal animations
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.2 });

document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// Active nav link on scroll
const sections = document.querySelectorAll('section[id]');
function setActiveNav() {
    const scrollPos = window.scrollY + 120;
    sections.forEach(sec => {
        const top = sec.offsetTop;
        const bottom = sec.offsetTop + sec.offsetHeight;
        const id = sec.getAttribute('id');
        const link = document.querySelector(`.nav-link[href="#${id}"]`);
        if (scrollPos >= top && scrollPos < bottom && link) {
            links.forEach(l => l.classList.remove('active'));
            link.classList.add('active');
        }
    });
}

window.addEventListener('scroll', setActiveNav);
setActiveNav();

// Convert emoji to WordPress Twemoji SVG images
function convertEmojiToSVG() {
    const emojiMap = {
        // Structure icons
        '🏥': '1f3e5',
        '🩺': '1fa79',
        '💉': '1f489',
        '🫁': '1f9e1',
        '📊': '1f4ca',
        '💊': '1f48a',
        '🦠': '1f9a0',
        '👨‍⚕️': '1f468-200d-2695-fe0f',
        '👶': '1f476',
        '📈': '1f4c8',
        '📷': '1f4f7',
        '🔬': '1f52c',
        '🧫': '1f9eb',
        '🧪': '1f9ea',
        '🔍': '1f50d'
    };

    // Convert emoji in structure cards (departments) only
    const structureIcons = document.querySelectorAll('.structure-card-icon');
    structureIcons.forEach(container => {
        const emoji = container.textContent.trim();
        if (emojiMap[emoji]) {
            const img = document.createElement('img');
            img.draggable = false;
            img.role = 'img';
            img.className = 'emoji';
            img.alt = emoji;
            img.src = `https://s.w.org/images/core/emoji/17.0.2/svg/${emojiMap[emoji]}.svg`;
            container.textContent = '';
            container.appendChild(img);
        }
    });
    
    // Portrait initials keep original emoji (no conversion)
}

// Run emoji conversion after DOM is loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', convertEmojiToSVG);
} else {
    convertEmojiToSVG();
}

// Set current year in footer
const yearElement = document.getElementById('current-year');
if (yearElement) {
    yearElement.textContent = new Date().getFullYear();
}

// Accessibility Panel for visually impaired
(function() {
    const toggle = document.getElementById('accessibility-toggle');
    const controls = document.getElementById('accessibility-controls');
    const fontDecrease = document.getElementById('font-decrease');
    const fontReset = document.getElementById('font-reset');
    const fontIncrease = document.getElementById('font-increase');
    const themeNormal = document.getElementById('theme-normal');
    const themeContrast = document.getElementById('theme-contrast');
    const themeLight = document.getElementById('theme-light');
    const resetAll = document.getElementById('reset-all');

    if (!toggle || !controls) return;

    // Font sizes
    const fontSizes = ['', 'font-size-large', 'font-size-larger', 'font-size-largest'];
    let currentFontSize = 0;

    // Load saved settings
    function loadSettings() {
        const savedFont = localStorage.getItem('accessibility-font');
        const savedTheme = localStorage.getItem('accessibility-theme');
        const panelOpen = localStorage.getItem('accessibility-panel-open');

        if (savedFont) {
            currentFontSize = parseInt(savedFont);
            applyFontSize();
        }

        if (savedTheme) {
            applyTheme(savedTheme);
        }

        if (panelOpen === 'true') {
            controls.classList.add('open');
        }
    }

    // Apply font size
    function applyFontSize() {
        fontSizes.forEach(cls => {
            if (cls) document.body.classList.remove(cls);
        });
        if (fontSizes[currentFontSize]) {
            document.body.classList.add(fontSizes[currentFontSize]);
        }
        localStorage.setItem('accessibility-font', currentFontSize);
        updateFontButtons();
    }

    // Update font buttons state
    function updateFontButtons() {
        fontDecrease.classList.toggle('active', currentFontSize === 0);
        fontReset.classList.toggle('active', currentFontSize === 0);
        fontIncrease.classList.toggle('active', currentFontSize === fontSizes.length - 1);
    }

    // Apply theme
    function applyTheme(theme) {
        document.body.classList.remove('theme-contrast', 'theme-light');
        if (theme && theme !== 'normal') {
            document.body.classList.add(`theme-${theme}`);
        }
        localStorage.setItem('accessibility-theme', theme || 'normal');
        updateThemeButtons(theme || 'normal');
    }

    // Update theme buttons state
    function updateThemeButtons(theme) {
        themeNormal.classList.toggle('active', theme === 'normal');
        themeContrast.classList.toggle('active', theme === 'contrast');
        themeLight.classList.toggle('active', theme === 'light');
    }

    // Toggle panel
    toggle.addEventListener('click', () => {
        controls.classList.toggle('open');
        localStorage.setItem('accessibility-panel-open', controls.classList.contains('open'));
    });

    // Font controls
    fontDecrease.addEventListener('click', () => {
        if (currentFontSize > 0) {
            currentFontSize--;
            applyFontSize();
        }
    });

    fontReset.addEventListener('click', () => {
        currentFontSize = 0;
        applyFontSize();
    });

    fontIncrease.addEventListener('click', () => {
        if (currentFontSize < fontSizes.length - 1) {
            currentFontSize++;
            applyFontSize();
        }
    });

    // Theme controls
    themeNormal.addEventListener('click', () => applyTheme('normal'));
    themeContrast.addEventListener('click', () => applyTheme('contrast'));
    themeLight.addEventListener('click', () => applyTheme('light'));

    // Reset all
    resetAll.addEventListener('click', () => {
        currentFontSize = 0;
        applyFontSize();
        applyTheme('normal');
    });

    // Initialize
    loadSettings();
})();

console.log('ЛОМЦСНІХ — лендинг запущено');

