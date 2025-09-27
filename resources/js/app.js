import './bootstrap';
import '../sass/app.scss';
import noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css';
import './sliders';

import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// The following is used to scroll to the filter section when the event is triggered
window.addEventListener('scroll-to-filters', () => {
    const target = document.getElementById('spinner');
    if (target) {
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
});

// The following is use to toggle the filter form in the comparator page, specially on mobile devices
$('.toggle-filter').on('click', function (e) {
    $('#filter-wrapper').toggleClass('hide-form')
})

// The following is used to toggle the filter form in the school pages
$('.collapse-trigger').on('click', function () {
    $('.school-filter-wrapper').toggleClass('collapsed');
    $(this).toggleClass('bi-chevron-double-down bi-chevron-double-up');
});

$('#reset-filter').on('click', function (e) {
    e.preventDefault();
    const targetId = $(this).data('target');
    const target = document.getElementById(targetId);
    if (target) {
        const inputs = target.querySelectorAll('input[type="checkbox"], input[type="radio"]');
        inputs.forEach(input => input.checked = false);
        const selects = target.querySelectorAll('select');
        selects.forEach(select => select.selectedIndex = 0);
        // Dispatch a change event to notify Livewire of the changes
        const event = new Event('change', { bubbles: true });
        target.dispatchEvent(event);
    }
});

// The following is used to show a spinner when Livewire is loading
document.addEventListener('livewire:load', function () {
    Livewire.hook('message.sent', (message, component) => {
        $('#spinner').show();
    });

    Livewire.hook('message.processed', (message, component) => {
        $('#spinner').hide();
    });
});

// The following is used to scroll to a specific element with an offset of 35px
window.scrollToElement = (elementId, offset = 35) => {
    console.log('Scrolling to element:', elementId);
    const element = document.getElementById(elementId);
    if (element) {
        const y = element.getBoundingClientRect().top + window.pageYOffset - offset;
        window.scrollTo({ top: y, behavior: 'smooth' });
    }
    $('#filter-wrapper').addClass('hide-form');
    // for mobile devices we need to toggle the filter form
    if (window.innerWidth <= 768) {
        console.log('Mobile device detected');
        // document.querySelector('.toggle-filter').click();
        $('#filter-wrapper').addClass('hide-form');
    }
};