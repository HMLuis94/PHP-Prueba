<?php
include "../../config.php";
if(isset($_GET['id'])){
	$id = $_GET['id'];
$stmt = $conn->prepare("delete from libros where codLibro=?");
$stmt->bind_param('s', $id);

if($stmt->execute()){
?>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Exito!</strong> Se ha eliminado el libro con exito.
</div>
<?php
} else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Error!</strong> Se ha producido un error al eliminar.
</div>
<?php
}
} else{
?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Alerta!</strong>
</div>
<?php
}
?>
