<?php
include 'conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"])) {
        $action = $_POST["action"];
        
        if ($action === "create") {
            $nombre = $_POST["nombre"];
            $correo = $_POST["correo"];
            $contrasena = $_POST["contrasena"];
            $tarea = $_POST["tarea"];
        
            if (crearUsuario($nombre, $contrasena, $correo, $tarea)) {
                echo "Usuario agregado con éxito.";
            } else {
                echo "Error al agregar el usuario.";
            }
        }
    }
}

function crearUsuario($nombre, $contrasena, $correo, $tarea)
{
    global $conn;
    $sql = "INSERT INTO usuarios (nombre, contrasena, correo, tarea) VALUES ('$nombre', '$contrasena', '$correo', '$tarea')";
    return $conn->query($sql);
}

function leerUsuarios()
{
    global $conn;
    $sql = "SELECT * FROM usuarios";
    return $conn->query($sql);
}

function actualizarUsuario($id, $nombre, $correo, $contrasena, $tarea)
{
    global $conn;
    $sql = "UPDATE usuarios SET nombre='$nombre', correo='$correo', contrasena='$contrasena', tarea='$tarea' WHERE id=$id";
    return $conn->query($sql);
}

function eliminarUsuario($id)
{
    global $conn;
    $sql = "DELETE FROM usuarios WHERE id=$id";
    return $conn->query($sql);
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    if ($action === 'update') {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $tarea = $_POST['tarea'];

        if (actualizarUsuario($id, $nombre, $correo, $contrasena, $tarea)) {
            echo "Usuario actualizado con éxito.";
        } else {
            echo "Error al actualizar el usuario.";
        }
    } elseif ($action === 'delete') {
        $id = $_POST['id'];

        if (eliminarUsuario($id)) {
            echo "Usuario eliminado con éxito.";
        } else {
            echo "Error al eliminar el usuario.";
        }
    }
}
?>
