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
            $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
            $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null; 
            $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null; 
            $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null; 
            $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
            $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
            $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null; 
            $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;

    $sql = "UPDATE DatosPersonales " .
           "SET usu_nombres = '$nombres', " .
           "usu_apellidos = '$apellidos', " .
           "usu_direccion = '$direccion', " .
           "usu_telefono = '$telefono', ". 
           "usu_correo = '$correo', ".
           "usu_fecha_nacimiento = '$fechaNacimiento' ".
           "usu_password = '$contrasena' ".
           "WHERE cedula = '$cedula'";

    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado los datos personales correctamemte!!!<br>";     
    } else {        
        echo "Error: " . $sql . "<br>" . $conn->errno . "<br>";        
    }
    echo "<a href='../vista/crear_usuario.html'>Regresar</a>";

    $conn->close();
    
?>
</body>
</html>