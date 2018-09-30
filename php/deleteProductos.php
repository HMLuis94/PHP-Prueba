<?php 
 include 'db.php';

 $codigo = $_POST['codigo'];
 $con = connectDB();

     
            $stmt = $con->prepare("delete from productos where codigo=?");
            $stmt->bind_param('s',$codigo);
            
            if($stmt->execute()){
                echo 1;
            }else{
                if ($stmt->error) {
                    printf("Errormessage: %s\n", $stmt->mysqli_stmt_error);
                 }
                 echo 0;
            }
            
    
       
       mysqli_close($con);
    /*  print_r($arr[0]->getCodigo());*/
?>