<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <title>Usuarios</title>
</head>

<body>
    <div class="container">
    <h1>USUARIOS</h1>
       
        <form action="crud.php" method="POST" id="FormSesion">
            <div class="div-form">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="name">

                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena">

                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo">

                <label for="tarea">Tarea:</label>
                <input type="text" id="tarea" name="tarea">
                <br>

                <input class="btnSesion" id="BtnSession"  type="submit" value="Registrar">
            </div>
        </form>
        <hr>

        <table id="tablaDatos">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Contraseña</th>
                    <th>Correo Electrónico</th>
                    <th>Tarea</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'crud.php';
                $result = leerUsuarios();
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["nombre"] . "</td>";
                    echo "<td>" . $row["contrasena"] . "</td>";
                    echo "<td>" . $row["correo"] . "</td>";
                    echo "<td>" . $row["tarea"] . "</td>";
                    echo "<td><button id='btnActualizar' class='btnActualizar' data-id='" . $row["id"] . "'>Actualizar</button> ";
                    echo "<button id='btnBorrar' class='btnEliminar' data-id='" . $row["id"] . "'>Eliminar</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <hr>

        <div id="mensaje"></div>
        <script src="script.js"></script>
    </div>
</body>

</html>
