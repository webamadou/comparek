import './bootstrap';
import '../sass/app.scss';

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