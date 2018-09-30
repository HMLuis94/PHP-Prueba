<?php 
 include 'db.php';
 include 'producto.php';


 $id = $_POST['id'];
 $con = connectDB();

 $cod_producto       = NULL;
 $nombre_producto = NULL;

 $resultado = [];


            $stmt = $con->prepare("SELECT codigo,nombre FROM productos WHERE codigo Not IN (SELECT Cod_producto FROM clientes_productos where cod_cliente = ?);");
            $stmt->bind_param('i',$id);
            
if (!$stmt->execute()) {
    echo "Falló la ejecución: (" . $con->errno . ") " . $con->error;
}

if (!$stmt->bind_result($cod_producto, $nombre_producto)) {
    echo "Falló la vinculación de los parámetros de salida: (" . $stmt->errno . ") " . $stmt->error;
}

while ($stmt->fetch()) {
    array_push($resultado,  array('cod_cliente' => $id, 
                                  'cod_producto' => $cod_producto,
                                  'nombre_producto' => $nombre_producto 
                                ));

}
mysqli_close($con);

header('Content-Type: application/json');
echo json_encode($resultado);
    /*  print_r($arr[0]->getCodigo());*/
?>