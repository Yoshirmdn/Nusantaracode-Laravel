import "./bootstrap";
import "flowbite";

import Alpine from "alpinejs";
import $ from "jquery"; // Impor jQuery
import "slick-carousel"; // Impor Slick Carousel
import "slick-carousel/slick/slick.css"; // Impor CSS Slick Carousel
import "slick-carousel/slick/slick-theme.css"; // Impor tema Slick Carousel

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function () {
    $(".category-carousel").slick({
        slidesToShow: 3, // Jumlah slide yang ditampilkan
        slidesToScroll: 1, // Jumlah slide yang digulirkan saat tombol ditekan
        autoplay: true, // Mengaktifkan autoplay
        autoplaySpeed: 2000, // Kecepatan autoplay
        dots: true, // Menampilkan titik navigasi
        infinite: true, // Mengaktifkan infinite scrolling
        speed: 300,
        centerMode: true,
        variableWidth: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2, // Jumlah slide untuk layar lebih kecil
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1, // Jumlah slide untuk layar lebih kecil
                    slidesToScroll: 1,
                },
            },
        ],
    });
});
