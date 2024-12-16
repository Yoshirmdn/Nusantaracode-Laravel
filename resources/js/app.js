import "./bootstrap";
import "flowbite";
// rich editor quill
import Quill from "quill";
import "quill/dist/quill.snow.css";
// sweetalert
import Swal from "sweetalert2";
window.Swal = Swal;
// Alpine.js
import Alpine from "alpinejs";
import $ from "jquery"; // Impor jQuery
import "slick-carousel"; // Impor Slick Carousel
import "slick-carousel/slick/slick.css"; // Impor CSS Slick Carousel
import "slick-carousel/slick/slick-theme.css"; // Impor tema Slick Carousel

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function () {
    $(".category-carousel").slick({
        slidesToShow: 2, // Jumlah slide yang ditampilkan
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
                    centerMode: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1, // Jumlah slide untuk layar lebih kecil
                    slidesToScroll: 1,
                    centerMode: true,
                },
            },
        ],
    });
});
// Inisialisasi Quill
document.addEventListener("DOMContentLoaded", function () {
    const editor = document.querySelector("#quill-editor");
    if (editor) {
        new Quill(editor, {
            theme: "snow",
            placeholder: "Tulis sesuatu di sini...",
            modules: {
                toolbar: [
                    // Format teks
                    ["bold", "italic", "underline", "strike"],
                    // Header dan font-size
                    [{ header: [1, 2, 3, 4, 5, 6, false] }],
                    [{ font: [] }],
                    // List, indentasi, dan perataan
                    [{ list: "ordered" }, { list: "bullet" }],
                    [{ indent: "-1" }, { indent: "+1" }],
                    [{ align: [] }],
                    // Inline styling (warna teks dan latar belakang)
                    [{ color: [] }, { background: [] }],
                    // Media dan link
                    ["link", "image", "video"],
                    // Misc
                    ["code-block", "blockquote", "clean"],
                ],
            },
        });
    }
});
