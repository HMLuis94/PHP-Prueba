<?php
include "../../config.php";
$NM = $_POST['NM'];

if($_POST['NM']==""){
  echo "No se permiten valores vacios";
}else{

$stmt = $conn->prepare("INSERT INTO monedas VALUES ('',?)");
$stmt->bind_param('s', $NM);

if($stmt->execute()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong> Se ha registrado la moneda.
</div>
<?php
} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Hubo un error al registrar la moneda.
</div>
<?php
}}
?>
