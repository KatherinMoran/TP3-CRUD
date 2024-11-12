<?php
   /* $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'db_registros';*/
    $host = 'mysql-katherin.alwaysdata.net';
    $user = 'katherin';
    $pass = 'Kate@123';
    $db = 'katherin_registros'; 
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $conn = mysqli_connect($host, $user, $pass, $db);
        //echo "Conexion exitosa";
    } catch (mysqli_sql_exception $e) {
        die("Error en la conexión: " . $e->getMessage());
    }
?>

