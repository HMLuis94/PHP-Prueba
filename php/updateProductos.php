<?php 
 include 'db.php';

 $codigo = $_POST['codigo'];
 $nombre = $_POST['nombre'];
 $descripcion = $_POST['descripcion'];

 $con = connectDB();

     
          $stmt = $con->prepare("update productos set nombre=?,descripcion=? where codigo=?");
            $stmt->bind_param('sss', $nombre,$descripcion,$codigo);

            
            if($stmt->execute()){
                
                echo 1;
            }else{
                echo 0;
            }
            
    
       
       mysqli_close($con);
    /*  print_r($arr[0]->getCodigo());*/
?>