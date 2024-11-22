<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Citas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }
        .student-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 15px;
            transition: transform 0.2s;
        }
        .student-card:hover {
            transform: translateY(-5px);
        }
        .student-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
            object-fit: cover;
        }
        .student-card h2 {
            font-size: 1.2rem;
            margin: 10px 0;
        }
        .student-card p {
            font-size: 0.9rem;
            color: #555;
        }
        .student-card .anxiety-level {
            font-weight: bold;
            color: #008080;
        }
        .student-card button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
            font-size: 1rem;
        }
        .student-card button:hover {
            background-color: #45a049;
        }
        .appointment {
            margin-top: 10px;
            color: #777;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: white;
            margin: 5% auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 400px;
        }
        .modal-content input {
            padding: 10px;
            width: 100%;
            font-size: 1rem;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .modal-content button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
        }
        .modal-content button:hover {
            background-color: #45a049;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 1.5rem;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div id="alertas" class="content-section active">
<h2 class="text-center mb-4" style="color: #1f6764; font-weight: bold;">Alertas y Citas</h2>
    <div class="container">
        <div class="student-card">
            <img src="https://static-cse.canva.com/blob/759729/RidoCanva.jpg" alt="Foto del Alumno 1">
            <h2>Juan Pérez</h2>
            <p>Matrícula: 21TE0568</p>
            <p class="anxiety-level">Nivel de Ansiedad: Bajo</p>
            <button onclick="openCalendar('123456')">Programar Cita</button>
            <p id="appointment-123456" class="appointment">No hay citas programadas</p>
        </div>
        <div class="student-card">
            <img src="https://b2472105.smushcdn.com/2472105/wp-content/uploads/2023/09/Poses-Perfil-Profesional-Mujeres-ago.-10-2023-1-819x1024.jpg?lossy=1&strip=1&webp=1" alt="Foto del alumno">
            <h2>María López</h2>
            <p>Matrícula: 21TE6987</p>
            <p class="anxiety-level">Nivel de Ansiedad: Medio</p>
            <button onclick="openCalendar('123457')">Programar Cita</button>
            <p id="appointment-123457" class="appointment">No hay citas programadas</p>
        </div>
        <div class="student-card">
            <img src="https://media.istockphoto.com/id/1171169127/pt/foto/headshot-of-cheerful-handsome-man-with-trendy-haircut-and-eyeglasses-isolated-on-gray.jpg?s=612x612&w=0&k=20&c=mvD-0a5ew-kTYC1hvHVPftjuPWJQ09xVkBUepHkZSyw=" alt="Foto del Alumno 3">
            <h2>Luis Torres</h2>
            <p>Matrícula: 21TE0168</p>
            <p class="anxiety-level">Nivel de Ansiedad: Alto</p>
            <button onclick="openCalendar('123458')">Programar Cita</button>
            <p id="appointment-123458" class="appointment">No hay citas programadas</p>
        </div>
        <div class="student-card">
            <img src="https://plus.unsplash.com/premium_photo-1689977968861-9c91dbb16049?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Zm90byUyMGRlJTIwcGVyZmlsfGVufDB8fDB8fHww" alt="Foto del Alumno 3">
            <h2>Gabriel Sánchez</h2>
            <p>Matrícula: 21TE0587</p>
            <p class="anxiety-level">Nivel de Ansiedad: Alto</p>
            <button onclick="openCalendar('123458')">Programar Cita</button>
            <p id="appointment-123458" class="appointment">No hay citas programadas</p>
        </div>
        <div class="student-card">
            <img src="https://plugins-media.makeupar.com/smb/blog/post/2023-12-08/092faf18-ff6e-4c45-900c-6c0c60c15e60.jpg" alt="Foto del Alumno 3">
            <h2>Carolina Díaz</h2>
            <p>Matrícula: 21TE6098</p>
            <p class="anxiety-level">Nivel de Ansiedad: Alto</p>
            <button onclick="openCalendar('123458')">Programar Cita</button>
            <p id="appointment-123458" class="appointment">No hay citas programadas</p>
        </div>
        <div class="student-card">
            <img src="https://vivolabs.es/wp-content/uploads/2022/03/perfil-mujer-vivo.png" alt="Foto del Alumno 3">
            <h2>Sofía Martínez</h2>
            <p>Matrícula: 21TE7632</p>
            <p class="anxiety-level">Nivel de Ansiedad: Alto</p>
            <button onclick="openCalendar('123458')">Programar Cita</button>
            <p id="appointment-123458" class="appointment">No hay citas programadas</p>
        </div>
        <div class="student-card">
            <img src="https://images.squarespace-cdn.com/content/v1/5d77a7f8ad30356d21445262/97973e92-51e0-4d33-8a88-738d15f19d8b/fotos-de-perfil-hombre.jpg" alt="Foto del Alumno 3">
            <h2>Cristian Mendoza</h2>
            <p>Matrícula: 21TE8314</p>
            <p class="anxiety-level">Nivel de Ansiedad: Alto</p>
            <button onclick="openCalendar('123458')">Programar Cita</button>
            <p id="appointment-123458" class="appointment">No hay citas programadas</p>
        </div>
        <div class="student-card">
            <img src="https://images.ctfassets.net/h6goo9gw1hh6/2sNZtFAWOdP1lmQ33VwRN3/e40b6ea6361a1abe28f32e7910f63b66/1-intro-photo-final.jpg?w=1200&h=992&fl=progressive&q=70&fm=jpg" alt="Foto del Alumno 3">
            <h2>Gabriel Pérez</h2>
            <p>Matrícula: 21TE9965</p>
            <p class="anxiety-level">Nivel de Ansiedad: Alto</p>
            <button onclick="openCalendar('123458')">Programar Cita</button>
            <p id="appointment-123458" class="appointment">No hay citas programadas</p>
        </div>

    </div>

    <div id="calendar-modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeCalendar()">&times;</span>
            <input type="date" id="appointment-date">
            <button onclick="saveAppointment()">Guardar Cita</button>
        </div>
    </div>

    <script>
        function openCalendar(studentId) {
            document.getElementById('calendar-modal').style.display = 'block';
            document.getElementById('calendar-modal').dataset.studentId = studentId;
        }

        function closeCalendar() {
            document.getElementById('calendar-modal').style.display = 'none';
        }

        function saveAppointment() {
            const studentId = document.getElementById('calendar-modal').dataset.studentId;
            const date = document.getElementById('appointment-date').value;
            document.getElementById(`appointment-${studentId}`).innerText = `Cita programada para: ${date}`;
            closeCalendar();
        }
    </script>
</body>
</html>
