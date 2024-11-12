<!DOCTYPE html>
<?php
    include_once 'conexion.php';

    $id = '';
    $nombre = '';
    $raza = '';
    $urlImagen = '';

    if (isset($_GET['modificar']) && is_numeric($_GET['modificar'])) { 
        $id = $_GET['modificar'];

        $query = "SELECT * FROM registros WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
            $nombre = $data['nombre'];
            $raza = $data['raza'];
            $urlImagen = $data['urlImagen'];
        } else {
            die("Error: No se encontró el registro con el ID proporcionado.");
        }

        mysqli_stmt_close($stmt);
    }
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Registros</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <br> <br>
    <div class="container">
        <form method="POST" action="proceso.php">
            <input type="hidden" value="<?php echo htmlspecialchars($id); ?>" name="id">
            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input required type="text" name="nombre" class="form-control" id="nombre" value="<?php echo htmlspecialchars($nombre); ?>" style="width: 500px;">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="raza" class="col-sm-2 col-form-label">Raza</label>
                <div class="col-sm-10">
                    <input required type="text" name="raza" class="form-control" id="raza" value="<?php echo htmlspecialchars($raza); ?>" style="width: 500px;">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="urlImagen" class="col-sm-2 col-form-label">URL imagen</label>
                <div class="col-sm-10">
                    <input required type="text" name="urlImagen" class="form-control" id="urlImagen" value="<?php echo htmlspecialchars($urlImagen); ?>" style="width: 500px;">
                </div>
            </div>
            <div class="mb-3 row mt-4">
                <div class="col">
                    <?php if (isset($_GET['modificar'])) { ?>
                        <button type="submit" name="accion" value="edit" class="btn btn-primary">Guardar Cambios</button>
                    <?php } else { ?>
                        <button type="submit" name="accion" value="add" class="btn btn-primary">Agregar</button>
                    <?php } ?>
                    <a href="index.php" type="button" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>
