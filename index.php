<?php
include_once 'conexion.php';

$query = 'SELECT * FROM registros;';
$sql = mysqli_query($conn, $query);

if (!$sql) {
    die("Ocurrió un Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Registros</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <figure>
            <blockquote class="blockquote">
                <br>
                <h1>Registros</h1>
            </blockquote>
            <figcaption class="blockquote-footer">
                <cite title="Source Title">Crear-Leer-Actualizar-Eliminar</cite>
            </figcaption>
        </figure>
        <a href="Agregar.php" type="button" class="btn btn-primary mb-3">Agregar Nuevo</a>
        <div class="table-responsive text-center">
            <table class="table align-middle table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Raza</th>
                        <th>Imagen</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($result = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                            <td><?php echo $result['id']; ?></td>
                            <td><?php echo $result['nombre']; ?></td>
                            <td><?php echo $result['raza']; ?></td>
                            <td>
                                <img src="<?php echo !empty($result['urlImagen']) ? $result['urlImagen'] : 'https://i.postimg.cc/qB3Q5prD/monitor-1350918-1280.png'; ?>" alt="Imagen de <?php echo $result['nombre']; ?>" style="width: 190px; height: auto;">
                            </td>
                            <td>
                                <a href="Agregar.php?modificar=<?php echo $result['id']; ?>" type="button" class="btn btn-success btn-sm">Modificar</a>
                                <a href="proceso.php?eliminar=<?php echo $result['id']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro que querés eliminar este registro?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>