<?php 
 include 'db.php';

 $cod_cliente = $_POST['cod_cliente'];
 $cod_producto = $_POST['cod_producto'];
 $con = connectDB();

            $stmt = $con->prepare("delete from clientes_productos where cod_cliente = ? and cod_producto = ?");
            $stmt->bind_param('ii',$cod_cliente,
                                    $cod_producto
                                    );
            
            if($stmt->execute()){
                echo 1;
            }else{
                echo 0;
            }
            
        
       
       mysqli_close($con);
?>