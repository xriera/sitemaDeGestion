?php
    session_start();    
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
        header("Location: iniciarSesion.php");
    }
    include '../../config/conexionBD.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar datos de persona</title>    
</head>

<body>
    <?php
        $cedula = $_GET["cedula"];
        $sql = "SELECT * FROM DatosPersonales where cedula='$cedula'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
             ?>
    <form id="formulario01" method="POST" action="../controladores/modificar_usuario.php">
        <label for="cedula">Cedula (*)</label>
        <input type="text" id="cedula" name="cedula" value="" placeholder="Ingrese el número de cedula ..."
        required/> <br>
   
        <label for="nombres">Nombres (*)</label>
         <input type="text" id="nombres" name="nombres" value="" placeholder="Ingrese sus dos nombres ..." required/>
         <br>
    
         <label for="apellidos">Apelidos (*)</label>
        <input type="text" id="apellidos" name="apellidos" value="" placeholder="Ingrese sus dos apellidos ..." required/>
        <br>
    
        <label for="direccion">Dirección (*)</label>
         <input type="text" id="direccion" name="direccion" value="" placeholder="Ingrese su dirección ..." required/>
         <br>
        
         <label for="telefono">Teléfono (*)</label>
        <input type="text" id="telefono" name="telefono" value="" placeholder="Ingrese su número telefónico ..." required/>
         <br>
        <label for="fecha">Fecha Nacimiento (*)</label>
        <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="" placeholder="Ingrese su fecha de nacimiento ..." required/>
        <br>
        <label for="correo">Correo electrónico (*)</label>
        <input type="email" id="correo" name="correo" value="" placeholder="Ingrese su correo electrónico ..." required/>
        <br>
        <label for="correo">Contraseña (*)</label>
        <input type="password" id="contrasena" name="contrasena" value="" placeholder="Ingrese su contraseña ..." required/>
        <br>
                    <input type="submit" id="guardar" name="guardar" value="Guardar" />
                    <input type="button" id="regresar" name="regresar" value="Cancelar" onclick="location.href = 'home.php';" />
                </form>    

             <?php
            }
        } else {            
            echo "Ha ocurrido un error inesperado !";
        }
        $conn->close();         
    ?>                      

</body>
</html>