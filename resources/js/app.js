const THEME_KEY = 'circle-theme';
const ACCENT_KEY = 'circle-accent';

const DEFAULT_THEME = 'system';
const DEFAULT_ACCENT = 'blue';

const ACCENTS = [
    'blue',
    'indigo',
    'violet',
    'emerald',
    'cyan',
    'rose',
    'amber',
];

function getStoredTheme() {
    const theme = localStorage.getItem(THEME_KEY);

    return ['light', 'dark', 'system'].includes(theme)
        ? theme
        : DEFAULT_THEME;
}

function getStoredAccent() {
    const accent = localStorage.getItem(ACCENT_KEY);

    return ACCENTS.includes(accent)
        ? accent
        : DEFAULT_ACCENT;
}

function resolveTheme(theme) {
    if (theme === 'system') {
        return window.matchMedia(
            '(prefers-color-scheme: dark)'
        ).matches
            ? 'dark'
            : 'light';
    }

    return theme;
}

function applyTheme(theme = getStoredTheme()) {
    const root = document.documentElement;
    const resolvedTheme = resolveTheme(theme);

    root.classList.toggle(
        'dark',
        resolvedTheme === 'dark'
    );

    root.dataset.theme = theme;
    root.style.colorScheme = resolvedTheme;
}

function applyAccent(accent = getStoredAccent()) {
    const root = document.documentElement;

    if (!ACCENTS.includes(accent)) {
        accent = DEFAULT_ACCENT;
    }

    root.dataset.accent = accent;
}

function setTheme(theme) {
    if (!['light', 'dark', 'system'].includes(theme)) {
        return;
    }

    localStorage.setItem(THEME_KEY, theme);

    applyTheme(theme);

    window.dispatchEvent(
        new CustomEvent('circle-theme-changed', {
            detail: { theme },
        })
    );
}

function setAccent(accent) {
    if (!ACCENTS.includes(accent)) {
        return;
    }

    localStorage.setItem(ACCENT_KEY, accent);

    applyAccent(accent);

    window.dispatchEvent(
        new CustomEvent('circle-accent-changed', {
            detail: { accent },
        })
    );
}

function initializeAppearance() {
    applyTheme();
    applyAccent();

    const media = window.matchMedia(
        '(prefers-color-scheme: dark)'
    );

    media.addEventListener('change', () => {
        if (getStoredTheme() === 'system') {
            applyTheme('system');
        }
    });
}

/*
|--------------------------------------------------------------------------
| INITIALIZE IMMEDIATELY
|--------------------------------------------------------------------------
*/

initializeAppearance();

/*
|--------------------------------------------------------------------------
| GLOBAL API
|--------------------------------------------------------------------------
*/

window.CircleAppearance = {
    getTheme: getStoredTheme,
    getAccent: getStoredAccent,

    setTheme,
    setAccent,

    applyTheme,
    applyAccent,

    accents: ACCENTS,
};

/*
|--------------------------------------------------------------------------
| LUCIDE
|--------------------------------------------------------------------------
*/

document.addEventListener('DOMContentLoaded', () => {
    if (
        typeof lucide !== 'undefined' &&
        typeof lucide.createIcons === 'function'
    ) {
        lucide.createIcons();
    }
});