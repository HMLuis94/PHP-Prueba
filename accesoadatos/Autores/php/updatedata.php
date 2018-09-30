<?php
include "../../config.php";
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$CA = $_POST['CA'];
	$NA = $_POST['NA'];

$stmt = $conn->prepare("update autor set codAutor=?,nombreAutor=? where codAutor=?");
$stmt->bind_param('sss', $CA,$NA,$id);
if($stmt->execute()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong> Se han actualizado los datos.
</div>
<?php
} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Se ha producido un error.
</div>
<?php
}
} else{
?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Alerta!</strong>Revise los datos
</div>
<?php
}
?>
