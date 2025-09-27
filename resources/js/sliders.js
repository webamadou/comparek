// resources/js/sliders.js
import noUiSlider from 'nouislider';

// ---- Formatters -------------------------------------------------
const fmt = {
    cfa: v => new Intl.NumberFormat('fr-FR').format(Math.round(v)) + ' CFA',
    minutes: v => Math.round(v) + ' min',
    sms: v => Math.round(v) + ' SMS',
    data: v => {
        v = Math.round(v); // value in Mo
        if (v >= 1024) return Math.round(v / 102.4) / 10 + ' Go'; // 1 decimal
        return v + ' Mo';
    },
    raw: v => Math.round(v)
};

// ---- Pips sets (you can tweak per slider) ----------------------
function pipsFor(el, min, max) {
    const id = el.id;
    if (id === 'priceSlider') return [50, 100, 500, 1000, 2000, 3000, 4000, 5000]; // more ticks
    if (id === 'creditSlider') return [0, 50, 100];            // fewer ticks
    if (id === 'minutesSlider') return [0, 10, 20, 50, 100];      // skewed to left
    if (id === 'smsSlider') return [0, 25, 50, 75, 100];
    if (id === 'dataSlider') return [0, 100, 1024, (3072 / max) * 100, (5120 / max) * 100, (16400 / max) * 100];
    /* if (id === 'dataSlider') return [0, 100, 200, 500, 1024, 2048, 3072, 4096, 5120]; */
    return [0, 25, 50, 75, 100];
}

// ---- Init helper -----------------------------------------------
function sendToLivewire(eventName, payload) {
    const lw = window.Livewire || {};
    if (typeof lw.emit === 'function') {
        // Livewire v2
        lw.emit(eventName, payload);
    } else {
        // Livewire v3 — use a DOM CustomEvent that bubbles to window
        window.dispatchEvent(new CustomEvent(eventName, { detail: payload }));
    }
}

function initRange(el) {
    if (!el || el.noUiSlider) return;

    const min = Number(el.dataset.min);
    const max = Number(el.dataset.max);
    const step = Number(el.dataset.step || 1);
    const start = JSON.parse(el.dataset.start ?? `[${min},${max}]`);
    const event = el.dataset.event || 'rangeChanged';
    const formatKey = el.dataset.format || (
        el.id.includes('price') ? 'cfa' :
            el.id.includes('credit') ? 'cfa' :
                el.id.includes('data') ? 'data' :
                    el.id.includes('minutes') ? 'minutes' :
                        el.id.includes('sms') ? 'sms' : 'raw'
    );
    const f = fmt[formatKey];

    noUiSlider.create(el, {
        start, step, connect: true,
        range: { min, max },
        tooltips: [{ to: f }, { to: f }],
        pips: {
            mode: 'positions',
            values: pipsFor(el, min, max),
            density: 3,
            format: { to: f }
        }
    });

    // Emit to Livewire ONLY when user releases handles.
    el.noUiSlider.on('change', (values) => {
        const arr = values.map(v => Math.round(+v));
        sendToLivewire(event, arr); // ✅ not livewireEvent
    });

    // Allow server to set slider programmatically (reset etc.)
    window.addEventListener(`${event}:set`, (e) => {
        const [a, b] = e.detail;
        el.noUiSlider.set([a, b]);
    });
}

// ---- Auto-init on DOM ready & after Livewire updates -----------
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('#filter-wrapper [id$="Slider"]').forEach(initRange);
});

// If the filter panel is conditionally shown/hidden or re-rendered,
// ask Livewire to re-init any sliders that were not present at DOMContentLoaded.
document.addEventListener('livewire:navigated', () => {
    document.querySelectorAll('#filter-wrapper [id$="Slider"]').forEach(initRange);
});
