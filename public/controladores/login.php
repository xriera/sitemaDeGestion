<?php
    session_start();
    
    include '../../config/conexionBD.php';
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    
    $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password = MD5('$contrasena')";
    
    $result = $conn->query($sql); 
    
    if ($result->num_rows > 0) {
    $_SESSION['isLogged'] = TRUE;
    header("Location: ../../admin/vista/usuario/index.php"); 
    } else {
    header("Location: ../vista/login.html");
    }
    
    $conn->close(); 
?>

<!DOCTYPE html> <html>
    <head>
    <meta charset="UTF-8"> <title>Gestión de usuarios</title>
    </head> 
    
    <body>
        <table style="width:100%"> <tr>
            <th>Cedula</th> <th>Nombres</th> <th>Apellidos</th> <th>Dirección</th> <th>Telefono</th> <th>Correo</th>
            <th>Fecha Nacimiento</th> </tr>
                <?php
                include '../../../config/conexionBD.php'; 
                $sql = "SELECT * FROM usuario"; 
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo " <td>" . $row["usu_cedula"] . "</td>"; 
                    echo " <td>" . $row['usu_nombres'] ."</td>";
                    echo " <td>" . $row['usu_apellidos'] . "</td>";
                    echo "<td>" . $row['usu_direccion'] . "</td>";
                    echo "<td>" . $row['usu_telefono']. "</td>";
                    echo " <td>" . $row['usu_correo'] . "</td>";
                    echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>"; echo "</tr>";
                }
                
                }else{
                    echo "<tr>";
                    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>"; 
                    echo "</tr>";
                }
                
            $conn->close(); ?>
        </table>
    </body> 
</html>