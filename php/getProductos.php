<?php
  include 'db.php';
  include 'producto.php';

  $arr= array();
  $con = connectDB();
  $i=0;

  $sql = $con->query("select * from productos order by codigo asc");

      
   while ($row = $sql->fetch_assoc()) {    

        $producto  = new Producto($row['codigo'], $row['nombre'], $row['descripcion']);

        $arr[$i] = array('codigo'=> $producto->getCodigo(), 
                        'nombre'=> $producto->getNombre(),
                        'descripcion'=>$producto->getDescripcion()
                        );

        $i++;
        
   }

   mysqli_close($con);

  header('Content-Type: application/json');
  echo json_encode($arr);
         
?>