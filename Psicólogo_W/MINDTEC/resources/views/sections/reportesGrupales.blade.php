<div id="reportesGrupales" class="content-section active">
    <h2 class="text-center mb-4" style="color: #1f6764; font-weight: bold;">Reportes Grupales</h2>
    <div class="row justify-content-center">
        <!-- Grupo 1 -->
        <div class="col-md-4 mb-4">
            <div class="card" onclick="expandGroup('grupo1')">
                <div class="card-body text-center">
                    <h5 class="card-title">Grupo 1</h5>
                </div>
            </div>
        </div>
        <!-- Grupo 2 -->
        <div class="col-md-4 mb-4">
            <div class="card" onclick="expandGroup('grupo2')">
                <div class="card-body text-center">
                    <h5 class="card-title">Grupo 2</h5>
                </div>
            </div>
        </div>
        <!-- Grupo 3 -->
        <div class="col-md-4 mb-4">
            <div class="card" onclick="expandGroup('grupo3')">
                <div class="card-body text-center">
                    <h5 class="card-title">Grupo 3</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección de Gráficas Expansivas -->
    <div id="gráficas" class="gráficas-section" style="display: none;">
        <h4 class="text-center">Gráficas del Grupo Seleccionado</h4>
        <div class="row justify-content-center">
            <div class="col-md-6 mb-4 gráfico">
                <canvas id="chart1"></canvas>
            </div>
            <div class="col-md-6 mb-4 gráfico">
                <canvas id="chart2"></canvas>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 mb-4 gráfico">
                <canvas id="chart3"></canvas>
            </div>
            <div class="col-md-6 mb-4 gráfico">
                <canvas id="chart4"></canvas>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 mb-4 gráfico">
                <canvas id="chart5"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Estilos -->
<style>
    body {
        font-family: 'Arial', sans-serif; /* Cambiar a una fuente más moderna */
        background-color: #e9ecef; /* Color de fondo suave */
    }

    #reportesGrupales {
        padding: 2rem;
        background-color: #ffffff; /* Fondo blanco para el contenedor */
        border-radius: 8px; /* Bordes redondeados */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
        margin: 2rem auto; /* Centrar el contenedor */
        max-width: 1200px; /* Ancho máximo del contenedor */
    }

    h2 {
        color: #343a40; /* Color del título */
        font-weight: bold; /* Hacer el título más destacado */
    }

    .card {
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #dee2e6; /* Borde gris claro */
        border-radius: 8px; /* Bordes redondeados */
        background-color: #f8f9fa; /* Fondo de la tarjeta */
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .gráficas-section {
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-top: 30px;
        padding: 20px;
    }

    .gráfico {
        width: 90%; /* Cambiado a 90% para ocupar el ancho de la columna */
        max-width: 45%; /* Ajustado a 45% para que quepan dos gráficas por fila */
        height: 300px; /* Altura fija para las gráficas */
        margin: 0 auto; /* Centrar la gráfica */
 border-radius: 8px; /* Bordes redondeados para las gráficas */
        overflow: hidden; /* Para que el canvas no sobresalga */
        background-color: #f8f9fa; /* Fondo de las gráficas */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Sombra suave para las gráficas */
    }

    canvas {
        width: 100% !important; /* Asegurar que el canvas ocupe el 100% del contenedor */
        height: 100% !important; /* Asegurar que el canvas ocupe el 100% del contenedor */
    }

    .row {
        margin-top: 20px; /* Espaciado entre filas */
    }

    @media (max-width: 768px) {
        .gráfico {
            height: 200px; /* Ajustar altura en pantallas pequeñas */
            max-width: 100%; /* Asegurar que ocupe el 100% en pantallas pequeñas */
        }
    }
</style>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function expandGroup(group) {
        // Mostrar la sección de gráficas solo si se selecciona un grupo
        document.getElementById("gráficas").style.display = "block";

        // Limpiar las gráficas previas
        clearPreviousCharts();

        // Mostrar las gráficas correspondientes al grupo seleccionado
        switch (group) {
            case 'grupo1':
                createGroup1Charts();
                break;
            case 'grupo2':
                createGroup2Charts();
                break;
            case 'grupo3':
                createGroup3Charts();
                break;
        }
    }

    // Función para limpiar las gráficas anteriores
    function clearPreviousCharts() {
        const chartIds = ['chart1', 'chart2', 'chart3', 'chart4', 'chart5'];
        chartIds.forEach(id => {
            const ctx = document.getElementById(id);
            if (ctx) {
                const chart = Chart.getChart(ctx);
                if (chart) chart.destroy();  // Destruir la gráfica si ya existe
            }
        });
    }

    // Crear gráficas para el Grupo 1
    function createGroup1Charts() {
        createChart('chart1', [10, 20, 30, 40, 50], 'Estrés Nivel - Grupo 1', 'rgba(255, 99, 132, 1)');
        createChart('chart2', [60, 65, 70, 75, 80], 'Ritmo Cardiaco - Grupo 1', 'rgba(54, 162, 235, 1)');
        createChart('chart3', [95, 96, 97, 94, 98], 'Oxigenación - Grupo 1', 'rgba(75, 192, 192, 1)');
        createChart('chart4', [6, 7, 8, 6, 5], 'Sueño - Grupo 1 (hrs)', 'rgba(153, 102, 255, 1)');
        createChart('chart5', [80, 85, 90, 85, 80], 'Estrés Semanal - Grupo 1', 'rgba(255, 159, 64, 1)');
    }

    // Crear gráficas para el Grupo 2
    function createGroup2Charts() {
        createChart('chart1', [50, 60, 70, 80, 90], 'Estrés Nivel - Grupo 2', 'rgba(255, 99, 132, 1)');
        createChart('chart2', [80, 70, 65, 60, 55], 'Ritmo Cardiaco - Grupo 2', 'rgba(54, 162, 235, 1)');
        createChart('chart3', [98, 97, 95, 96, 94], 'Oxigenación - Grupo 2', 'rgba(75, 192, 192, 1)');
        createChart('chart4', [7, 6, 8, 6, 7], 'Sueño - Grupo 2 (hrs)', 'rgba(153, 102, 255, 1)');
        createChart('chart5', [75, 70, 65, 60, 55], 'Estrés Semanal - Grupo 2', 'rgba(255, 159, 64, 1)');
    }

        // Crear gráficas para el Grupo 3
        function createGroup3Charts() {
        createChart('chart1', [90, 85, 80, 75, 70], 'Estrés Nivel - Grupo 3', 'rgba(255, 99, 132, 1)');
        createChart('chart2', [60, 65, 70, 72, 75], 'Ritmo Cardiaco - Grupo 3', 'rgba(54, 162, 235, 1)');
        createChart('chart3', [96, 97, 95, 98, 94], 'Oxigenación - Grupo 3', 'rgba(75, 192, 192, 1)');
        createChart('chart4', [6, 7, 6, 7, 8], 'Sueño - Grupo 3 (hrs)', 'rgba(153, 102, 255, 1)');
        createChart('chart5', [70, 75, 80, 85, 90], 'Estrés Semanal - Grupo 3', 'rgba(255, 159, 64, 1)');
    }

    // Función para crear una gráfica
    function createChart(chartId, data, label, backgroundColor) {
        const ctx = document.getElementById(chartId).getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
                datasets: [{
                    label: label,
                    data: data,
                    backgroundColor: backgroundColor,
                    borderColor: backgroundColor,
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
</script>
