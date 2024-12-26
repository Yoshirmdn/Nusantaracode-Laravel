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

document.addEventListener("DOMContentLoaded", function () {
    const editor = document.getElementById("quill-editor");
    if (editor) {
        // Inisialisasi Quill
        const quill = new Quill(editor, {
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
                    // Inline styling
                    [{ color: [] }, { background: [] }],
                    // Media dan link
                    ["link", "image", "video"],
                    // Misc
                    ["code-block", "blockquote", "clean"],
                ],
            },
        });

        // Update hidden input saat content berubah
        quill.on("text-change", function () {
            const about = document.querySelector("#about");
            if (about) {
                about.value = quill.root.innerHTML;
            }
        });

        // Handle form submission Course
        const form = editor.closest("form");
        if (form) {
            form.addEventListener("submit", function (e) {
                const about = document.querySelector("#about");
                if (about) {
                    about.value = quill.root.innerHTML;
                }

                // Optional: Log untuk debugging
                console.log("Form submitted with content:", about.value);
            });
        }
        quill.on("text-change", function () {
            const content = document.querySelector("#content");
            if (content) {
                content.value = quill.root.innerHTML;
            }
        });

        // Handle form submission Lesson
        const form2 = editor.closest("form");
        if (form2) {
            form2.addEventListener("submit", function (e) {
                const content = document.querySelector("#content");
                if (content) {
                    content.value = quill.root.innerHTML;
                }

                // Optional: Log untuk debugging
                console.log("Form submitted with content:", content.value);
            });
        }
    }
});
