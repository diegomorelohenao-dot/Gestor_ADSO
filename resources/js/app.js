import "./bootstrap";

import Alpine from "alpinejs";
import Swal from "sweetalert2";

window.Alpine = Alpine;
window.Swal = Swal;

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    const flash = window.flashMessages ?? {};
    if (flash.success)
        Swal.fire({
            icon: "success",
            title: "Listo",
            text: flash.success,
            timer: 2800,
            showConfirmButton: false,
        });
    if (flash.error)
        Swal.fire({
            icon: "error",
            title: "No fue posible completar la acción",
            text: flash.error,
        });
    if (flash.errors?.length)
        Swal.fire({
            icon: "error",
            title: "Revisa los datos",
            text: flash.errors.join("\n"),
        });

    document.querySelectorAll("[data-confirm]").forEach((form) => {
        form.addEventListener("submit", (event) => {
            event.preventDefault();
            Swal.fire({
                icon: "warning",
                title: "¿Eliminar este registro?",
                text: "Esta acción no se puede deshacer.",
                showCancelButton: true,
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar",
                confirmButtonColor: "#8d3f45",
                cancelButtonColor: "#4A5C6A",
            }).then((result) => {
                if (result.isConfirmed) form.submit();
            });
        });
    });
});
