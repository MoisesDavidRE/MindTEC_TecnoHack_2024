<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
            display: flex;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            width: 250px;
            background-color: #1f6764;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1rem;
            transition: width 0.3s;
            overflow: hidden;
        }
        .sidebar.collapsed {
            width: 80px;
        }
        .sidebar h3 {
            margin-bottom: 1.5rem;
        }
        .sidebar .user-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 1rem;
            border: 2px solid #fff;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            width: 100%;
        }
        .sidebar li {
            width: 100%;
            margin-bottom: 0.5rem;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 1.25rem 1rem;
            width: 100%;
            text-align: center;
            border-radius: 0.25rem;
            font-size: 1.25rem;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color: #0D9247;
        }
        .content {
            flex-grow: 1;
            padding: 2rem;
            background-color: #f8f9fa;
            overflow-y: auto;
        }
        .content h1 {
            color: #343a40;
        }
        .content-section {
            display: none;
        }
        .content-section.active {
            display: block;
        }
        .search-bar {
            margin-bottom: 2rem;
        }
        .card {
            margin-bottom: 1rem;
        }
        .stress-level.leve {
            color: green;
        }
        .stress-level.moderado {
            color: orange;
        }
        .stress-level.severo {
            color: red;
        }
        .toggle-btn {
            background-color: #343a40;
            color: #fff;
            border: none;
            padding: 20px;
            cursor: pointer;
            position: absolute;
            top: 10px;
            left: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
    <div class="sidebar" id="sidebar">
        <h3>Bienvenido</h3>
        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjanOSM6VOk51zTOU-k25AONwIzmtGzE_UfMUueEIi_jWSCZ30pxhmi51qljxj_o8_ukqHDkyNTVjyhf0zqlA6SwJ8aP_7QD4u6rKebAIvS4giOdZ4134I7y9gBPBcVb9sLKy8bdJlUU9uycDmcuETBo4Wel4-aR2m6KLqDihyphenhyphen05HtYxsVHdIlbYNLa1Wr3/w320-h320/online,%20psicologa%20sp.jpg" alt="Usuario" class="user-image">
        <ul>
            <li><a href="#" onclick="loadSection('reportesPersonalizados')">Reportes Personalizados</a></li>
            <li><a href="#" onclick="loadSection('reportesGrupales')">Reportes Grupales</a></li>
            <li><a href="#" onclick="loadSection('alertas')">Alertas</a></li>
            <li><a href="#" onclick="loadSection('recursos')">Recursos</a></li>
        </ul>
    </div>
    <div class="content">
        <div id="sectionContainer">
            <!-- Carga inicial de cada módulo de la pagina -->
            @include('sections.reportesPersonalizados')
            @include('sections.reportesGrupales')
            @include('sections.alertas')
            @include('sections.recursos')
        </div>
    </div>

    <script>
        function loadSection(section) {
            fetch(`/section/${section}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al cargar la sección');
                    }
                    return response.text();
                })
                .then(html => {
                    document.getElementById('sectionContainer').innerHTML = html;
                })
                .catch(error => console.error(error));
        }
    </script>
</body>
</html>
