<?php
  include 'db.php';
  include 'cliente.php';

  $arr= array();
  $con = connectDB();
  $i=0;

  $sql = $con->query("select * from clientes order by id asc");

             
  while ($row = $sql->fetch_assoc()) {    
    
      $producto  = new Cliente($row['id'],
                                $row['nombre'], 
                                $row['apellidos'],
                                $row['dni'],
                                $row['direccion'],
                                $row['telefono'],
                                $row['email']
                              );

                                
      $arr[$i] = array('id'=> $producto->getId(), 
                      'nombre'=> $producto->getNombre(),
                      'apellidos'=>$producto->getApellidos(),
                      'dni'=>$producto->getDni(),
                      'direccion'=>$producto->getDireccion(),
                      'telefono'=>$producto->getTelefono(),                       
                      'email'=>$producto->getEmail()
                      );

      $i++;  
    }
    
    header('Content-Type: application/json');
    echo json_encode($arr);

         
?>