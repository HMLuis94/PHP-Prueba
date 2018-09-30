<?php 
 include 'db.php';

 $id = $_POST['id'];
 $nombre = $_POST['nombre'];
 $apellidos = $_POST['apellidos'];
 $dni = $_POST['dni'];
 $direccion = $_POST['direccion'];
 $telefono = $_POST['telefono'];
 $email = $_POST['email'];

 $con = connectDB();

     
          $stmt = $con->prepare("update clientes set nombre=?,apellidos=?,dni=?,direccion=?,telefono=?,email=? where id=?");
            $stmt->bind_param('ssssssi', $nombre,$apellidos,$dni,$direccion,$telefono,$email,$id);

            
            if($stmt->execute()){
                
                echo 1;
            }else{
                echo 0;
            }
            
    
       
       mysqli_close($con);
?>