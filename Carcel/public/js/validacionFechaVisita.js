document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form"); // Asegúrate de que este sea el formulario correcto
    form.addEventListener("submit", function (event) {
        const fechaInicioInput = document.getElementById("fecha_hora_inicio");
        const fechaFinInput = document.getElementById("fecha_hora_fin");
        const fechaInicio = new Date(fechaInicioInput.value);
        const fechaFin = new Date(fechaFinInput.value);

        // Verificar que la fecha sea un domingo
        if (fechaInicio.getDay() !== 0) {
            alert("Las visitas solo están permitidas los domingos.");
            event.preventDefault();
            return;
        }

        // Verificar que la hora de inicio esté dentro del horario permitido
        const horaInicio =
            fechaInicio.getHours() + fechaInicio.getMinutes() / 60;
        if (horaInicio < 14 || horaInicio >= 17) {
            alert("El horario de visitas es de 14:00 a 17:00.");
            event.preventDefault();
            return;
        }

        // Verificar que la hora de fin esté dentro del horario permitido
        const horaFin = fechaFin.getHours() + fechaFin.getMinutes() / 60;
        if (horaFin > 17 || horaFin <= 14 || fechaInicio >= fechaFin) {
            alert(
                "El horario de visitas debe estar dentro de 14:00 a 17:00, y la hora de fin debe ser después de la hora de inicio."
            );
            event.preventDefault();
            return;
        }
    });
});
