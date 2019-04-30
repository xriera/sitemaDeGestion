<!DOCTYPE html>
<html>
<head>
    <title>Modificar datos de persona </title>
</head>
<body>
<?php
    session_start();    
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
        header("Location: iniciarSesion.php");
    }

    //incluir conexión a la base de datos
    include '../../config/conexionBD.php';
    $cedula = isset($_POST["cedula"]) ? strtoupper(trim($_POST["cedula"])) : null;
    $nombres = strtoupper(trim($_POST["nombres"]));
    $apellidos = strtoupper(trim($_POST["apellidos"]));
    $telefono = strtoupper(trim($_POST["telefono"]));
    $genero = strtoupper(trim($_POST["genero"]));
    $correo = strtoupper(trim($_POST["correo"]));
    $contrasena = $_POST["contrasena"];

    $sql = "UPDATE DatosPersonales " .
           "SET nombres = '$nombres', " .
           "apellidos = '$apellidos', " .
           "telefono = '$telefono', " .
           "genero = '$genero', ". 
           "correo = '$correo', ".
           "contrasena = '$contrasena' ".
           "WHERE cedula = '$cedula'";

    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado los datos personales correctamemte!!!<br>";     
    } else {        
        echo "Error: " . $sql . "<br>" . $conn->errno . "<br>";        
    }
    echo "<a href='home.php'>Regresar</a>";

    $conn->close();
    
?>
</body>
</html>