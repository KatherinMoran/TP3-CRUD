<?php
include_once 'conexion.php';

if (isset($_POST['accion'])) {
    if ($_POST['accion'] == "add") {
        $stmt = $conn->prepare("INSERT INTO registros (nombre, raza, urlImagen) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nombre, $raza, $urlImagen);

        $nombre = $_POST['nombre'];
        $raza = $_POST['raza'];
        $urlImagen = $_POST['urlImagen'];

        if ($stmt->execute()) {
            header("location: index.php");
        } else {
            echo "Error al insertar registro: " . $stmt->error;
        }

        $stmt->close();
    } else if ($_POST['accion'] == "edit") {
        $stmt = $conn->prepare("UPDATE registros SET nombre = ?, raza = ?, urlImagen = ? WHERE id = ?");
        $stmt->bind_param("sssi", $nombre, $raza, $urlImagen, $id);

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $raza = $_POST['raza'];
        $urlImagen = $_POST['urlImagen'];

        if ($stmt->execute()) {
            header("location: index.php");
        } else {
            echo "Error al actualizar registro: " . $stmt->error;
        }

        $stmt->close();
    }
}

if (isset($_GET['eliminar'])) {
    $stmt = $conn->prepare("DELETE FROM registros WHERE id = ?");
    $stmt->bind_param("i", $id);

    $id = $_GET['eliminar'];

    if ($stmt->execute()) {
        header("location: index.php");
    } else {
        echo "Error al eliminar registro: " . $stmt->error;
    }

    $stmt->close();
}

?>
