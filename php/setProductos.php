<?php 
 include 'db.php';
 include 'producto.php';


 $productos = $_POST['products'];
 $con = connectDB();
 $arr= array();

     $productos_array = json_decode($productos, true);
        foreach ($productos_array as $id => $producto) {
            
            $arr[$id]= new Producto($producto['codigo'], $producto['nombre'], $producto['descripcion']);
        }

        foreach($arr as $id => $producto){
            $codigo =  $producto->getCodigo();
            $nombre =  $producto->getNombre();
            $descripcion = $producto->getDescripcion();
            $stmt = $con->prepare("insert into productos values(?,?,?)");
            $stmt->bind_param('sss',$codigo,
                                    $nombre,
                                    $descripcion);
            
            if($stmt->execute()){
                echo 1;
            }else{
                echo 0;
            }
            
        }
       
       mysqli_close($con);
    /*  print_r($arr[0]->getCodigo());*/
?>