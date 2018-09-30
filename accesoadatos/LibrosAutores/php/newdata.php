<?php
include "../../config.php";
$NA = $_POST['NA'];
$NL = $_POST['NL'];

  if( $stmt = $conn -> prepare("CALL pLibrosAutores (?, ?, @p1)") ){


    $stmt -> bind_param("ss",$NA,$NL);
    $stmt -> execute();

    $stmt = $conn -> prepare("SELECT @p1");
    $stmt -> bind_result($p1);
    $stmt -> execute();


    while($stmt -> fetch()){
      if ($p1==0){
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Exito!</strong> Se ha registrado el autor para ese libro.
        </div>
        <?php
      }else {
        ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Error!</strong> Hubo un error el autor para ese libro. CodError: <?php $p1 ?>
        </div>
        <?php
      };
    }
    $stmt -> close();
  }
?>
