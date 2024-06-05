document.addEventListener("DOMContentLoaded", (event) => {
    const htmlElement = document.documentElement;
    const switchElement = document.getElementById("darkModeSwitch");
    // Cambiar el tema a dark por default si no hay configuración en local storage
    const currentTheme = localStorage.getItem("bsTheme") || "dark";
    htmlElement.setAttribute("data-bs-theme", currentTheme);
    switchElement.checked = currentTheme === "dark";

    switchElement.addEventListener("change", function () {
        if (this.checked) {
            htmlElement.setAttribute("data-bs-theme", "dark");
            localStorage.setItem("bsTheme", "dark");
        } else {
            htmlElement.setAttribute("data-bs-theme", "light");
            localStorage.setItem("bsTheme", "light");
        }
    });
});

(() => {
    "use strict";
    window.addEventListener(
        "load",
        function () {
            var forms = document.getElementsByClassName("needs-validation");
            var validation = Array.prototype.filter.call(
                forms,
                function (form) {
                    form.addEventListener(
                        "submit",
                        function (event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            } else {
                                event.preventDefault();
                                var formData = new FormData(form);
                                fetch("functions/procesar_formulario.php", {
                                    method: "POST",
                                    body: formData,
                                })
                                    .then((response) => response.json())
                                    .then((data) => {
                                        console.log(data);
                                        alert(data.message);
                                    })
                                    .catch((error) => {
                                        console.error("Error:", error);
                                    });
                            }
                            form.classList.add("was-validated");
                        },
                        false
                    );
                }
            );
        },
        false
    );
})();

// Obtener boton
let mybutton = document.getElementById("myBtn");

// Cuando el usuario baja de 20px, muestra el boton
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

// Cuando el usuario hace click en el boton, sube al inicio del documento
function topFunction() {
    document.body.scrollTop = 0; // Para Safari
    document.documentElement.scrollTop = 0; // Para Chrome, Firefox, IE y Opera
}

//TODO: Hacer que el menu se cierre al hacer click en un enlace, no funciona en este momento
// $(document).ready(function () {
//     $('.js-scroll-trigger').click(function () {
//         $('.navbar-collapse').collapse('hide');
//     });
// });

function selectOption(option) {
    // Desplazar al formulario
    document.getElementById("contacto").scrollIntoView({ behavior: "smooth" });

    // Seleccionar la opción correspondiente
    const selectElement = document.getElementById("state");
    selectElement.value = option;
}

document.addEventListener("DOMContentLoaded", function () {
    fetch("dummy_data/testimonials.json")
        .then((response) => response.json())
        .then((data) => {
            const testimonialContainer = document.getElementById(
                "testimonial-container"
            );
            data.forEach((testimonial) => {
                const slide = document.createElement("div");
                slide.className = "swiper-slide";
                slide.innerHTML = `
                    <div class="card">
                        <div class="card-body p-4 p-xxl-5">
                            <div class="bsb-ratings text-warning mb-3" data-bsb-star="5" data-bsb-star-off="0"></div>
                            <blockquote class="bsb-blockquote-icon mb-3">${testimonial.testimonial}</blockquote>
                            <figure class="d-flex align-items-center m-0 p-0">
                                <img class="img-fluid rounded rounded-circle m-0 border border-5 testimonial" loading="lazy" src="${testimonial.image}" alt="">
                                <figcaption class="ms-3">
                                    <h4 class="mb-1 h5">${testimonial.name}</h4>
                                    <h5 class="fs-6 text-secondary mb-0">${testimonial.location}</h5>
                                    <h5 class="fs-6 text-secondary mb-0">${testimonial.profession}</h5>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                `;
                testimonialContainer.appendChild(slide);
            });

            // Inicializar Swiper
            const swiper = new Swiper(".swiper", {
                // Optional parameters
                direction: "horizontal",
                loop: true,
                autoHeight: true,
                slidesPerView: 2,
                spaceBetween: 30,

                // Navigation arrows
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },

                // And if we need scrollbar
                scrollbar: {
                    el: ".swiper-scrollbar",
                },
            });
        })
        .catch((error) => console.error("Error loading testimonials:", error));
});
