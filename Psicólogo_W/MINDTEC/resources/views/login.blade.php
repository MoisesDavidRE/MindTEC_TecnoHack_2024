<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindTEC</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #0D9247, #D3FEFF);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            background: white;
            padding: 3rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px; /* Aumenta el ancho del contenedor */
        }
        .login-container h1 {
            margin-bottom: 1rem;
            color: #66ac92;
            font-size: 2rem; /* Tamaño más grande para "MindTEC" */
        }
        .login-container h2 {
            margin-bottom: 1.5rem;
            color: #66ac92;
        }
        .form-control {
            border-radius: 20px;
        }
        .btn-primary {
            background: #66ac92;
            border: none;
            border-radius: 20px;
        }
        .btn-primary:hover {
            background: #66ac92;
        }
        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>MindTEC</h1>
        <img src="{{ asset('logo.jpeg') }}" alt="Logo" class="profile-img">
        <h2>Iniciar Sesión</h2>
        <form action="{{ url('/dashboard') }}" method="GET">
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="Ingresa tu contraseña">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
