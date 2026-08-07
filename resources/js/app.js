import './bootstrap';
import Alpine from 'alpinejs';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
// flatpickr
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';

window.Alpine = Alpine;

import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

window.ClassicEditor = ClassicEditor;

Alpine.start();

// Initialize components on DOM ready
document.addEventListener('DOMContentLoaded', () => {
 

    if (document.querySelector('.student-stories-swiper')) {
        new Swiper('.student-stories-swiper', {
            modules: [Navigation, Pagination, Autoplay],
            loop: true,
            speed: 600,
            spaceBetween: 16,
            grabCursor: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: {
                el: '.student-stories-swiper .swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.student-stories-swiper .swiper-button-next',
                prevEl: '.student-stories-swiper .swiper-button-prev',
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 14,
                },
                 639: {
                    slidesPerView: 2,
                    spaceBetween: 14,
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 18,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 24,
                },
            },
        });
    }
});
