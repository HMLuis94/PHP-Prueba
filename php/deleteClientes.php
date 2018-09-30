<?php 
 include 'db.php';

 $id = $_POST['id'];
 $con = connectDB();

     
            $stmt = $con->prepare("delete from clientes where id=?");
            $stmt->bind_param('s',$id);
            
            if($stmt->execute()){
                echo 1;
            }else{
                 echo 0;
            }
            
    
       
       mysqli_close($con);
?>