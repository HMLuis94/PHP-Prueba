<?php
include "../../config.php";
$CA = $_POST['CA'];
$NA = $_POST['NA'];
$stmt = $conn->prepare("INSERT INTO autor VALUES (?,?)");
$stmt->bind_param('ss', $CA,$NA);

if($stmt->execute()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong> Se ha registrado el autor.
</div>
<?php
} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Hubo un error al registrar el autor.
</div>
<?php
}
?>
