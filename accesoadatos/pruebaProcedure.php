<?php
include('config.php');



$peticion="call pListaEjemplares(?);";

if($stmt = $conn -> prepare($peticion)) {
  $ISBN = "paco";
  $stmt->bind_param( 's', $ISBN);
  $stmt->execute();

  $stmt ->bind_result($campo1, $campo2,$campo3,$campo4,$campo5);
  while($stmt->fetch()){
    echo $campo1,$campo2,$campo3,$campo4;
  }
$stmt->close();


}


?>
<?php
include('config.php');

  $ISBN = "75-845-3215-P";

  if( $stmt = $conn -> prepare("CALL pCantidadEjemplares (?, @p1, @p2);") ){


    $stmt -> bind_param("s",$ISBN);
    $stmt -> execute();

    $stmt = $conn -> prepare("SELECT @p1 , @p2");
    $stmt -> bind_result($p1,$p2);
    $stmt -> execute();


    while($stmt -> fetch()){
      echo $p1." ";
      echo $p2;
    }
    $stmt -> close();
?>

<?php
include('config.php');

  $ISBN = "75-845-3215-P";
  $COD = "A002";
  if( $stmt = $conn -> prepare("CALL pLibrosAutores (?, ?, @p1)") ){


    $stmt -> bind_param("ss",$ISBN,$COD);
    $stmt -> execute();

    $stmt = $conn -> prepare("SELECT @p1");
    $stmt -> bind_result($p1);
    $stmt -> execute();


    while($stmt -> fetch()){
      echo $p1;
    }
    $stmt -> close();
  }
?>


<?php
include('config.php');

  $COD = "Antonio Castro";
  if( $stmt = $conn -> prepare("Select fnumAutorLibro(?)") ){


    $stmt -> bind_param("s",$COD);
    $stmt -> bind_result($CODIGO);
    $stmt -> execute();


    while($stmt -> fetch()){
      echo $CODIGO;
    }
    $stmt -> close();
  }
?>
