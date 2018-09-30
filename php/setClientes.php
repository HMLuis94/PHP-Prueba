<?php 
 include 'db.php';
 include 'producto.php';


 $nombre = $_POST['nombre'];
 $apellidos = $_POST['apellidos'];
 $dni = $_POST['dni'];
 $direccion = $_POST['direccion'];
 $telefono = $_POST['telefono'];
 $email = $_POST['email'];

 $con = connectDB();

            $stmt = $con->prepare("insert into clientes values('',?,?,?,?,?,?)");

            $stmt->bind_param('ssssss',
                                       $nombre,
                                       $apellidos,
                                       $dni,
                                       $direccion,
                                       $telefono,
                                       $email);
            
            if($stmt->execute()){
                echo 1;
            }else{
                echo 0;
                printf("Error: %s.\n", $stmt->error);

            }
            
        
       
       mysqli_close($con);
?>