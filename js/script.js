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

    //Toma todos los formularios
    const forms = document.querySelectorAll(".needs-validation");

    //Recorre todos y previene la propagación
    Array.from(forms).forEach((form) => {
        form.addEventListener(
            "submit",
            (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }

                form.classList.add("was-validated");
            },
            false
        );
    });
})();

// Obtener boton
let mybutton = document.getElementById("myBtn");

// Cuando el usuario baja de 20px, muestra el boton
window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
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


$(document).ready(function () {
    $('.js-scroll-trigger').click(function () {
        $('.navbar-collapse').collapse('hide');
    });
});