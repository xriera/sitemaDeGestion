
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modificar datos usuario</title>    
</head>

<body>
    <?php
        $cedula = $_POST["usu_cedula"];
        $sql = "SELECT * FROM usuario where usu_cedula='$cedula'";
        
        include '';
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            
            while($row = $result->fetch_assoc()) {
             
                
    ?>
    <form id="formulario01" method="POST" action="../controladores/modificar_usuario.php">
        <label for="cedula">Cedula (*)</label>
        <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" disabled placeholder="Ingrese el número de cedula ..."
        required/> <br>
   
        <label for="nombres">Nombres (*)</label>
         <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" placeholder="Ingrese sus dos nombres ..."/>
         <br>
    
         <label for="apellidos">Apelidos (*)</label>
        <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" placeholder="Ingrese sus dos apellidos ..."/>
        <br>
    
        <label for="direccion">Dirección (*)</label>
         <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" placeholder="Ingrese sus dos apellidos ..."/>
         <br>
        
         <label for="telefono">Teléfono (*)</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" placeholder="Ingrese su número telefónico ..."/>
         <br>
        <label for="fecha">Fecha Nacimiento (*)</label>
        <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fechaNacimiento"]; ?>" placeholder="Ingrese su número telefónico ..." required/>
        <br>
        <label for="correo">Correo electrónico (*)</label>
        <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" placeholder="Ingrese su correo electrónico ..." required/>
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