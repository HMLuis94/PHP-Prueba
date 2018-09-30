<?php


 function connectDB(){ //Configuracion de la base de datos
    $url = 'localhost'; //url
    $user = 'root'; //usuario
    $pass = ''; //contraseña
    $db = 'indra_prueba2'; //nombre db
   
    $con = null;
    try {
        $con = new mysqli($url, $user, $pass,$db); //conexion a la bd
        if ($con->connect_errno) {
            printf("Falló la conexión: %s\n", $con->connect_error);
            exit();
        }
    } catch(PDOException $e){
        print "Error: ". $e->getMessage()."<br/>"; //mensaje de error
        die();
    }

    return $con;
}

?>

