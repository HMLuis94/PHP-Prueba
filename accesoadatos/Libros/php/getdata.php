
	<table class="table table-bordered table-hover">
	<thead>
	  <tr>
	    <th width="50%">Nombre del Libro</th>
	    <th>ISBN</th>
			<th>Fecha Introducion</th>
		<th>Editar</th>

	  </tr>
	</thead>
	<tbody>
	<tr>
<?php
include "../../config.php";





$res = $conn->query("select * from libros order by codLibro desc");

while ($row = $res->fetch_assoc()) {
?>

	    <td><?php echo $row['nombreLibro']; ?></td>
	    <td><?php echo $row['ISBN']; ?></td>
			<td><?php echo $row['fechaIntro']; ?></td>
	    <td style="color:black">
	    <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['codLibro']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
	    <a class="btn btn-danger btn-sm"  onclick="deletedata('<?php echo $row['codLibro'] ?>')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['codLibro']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['codLibro']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"  style="width:700px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel<?php echo $row['codLibro']; ?>">Editar Datos</h4>
      </div>
      <div class="modal-body">

<form>


<table>


 <div class="form-group">
  <label style="margin:7px" for="CA">Nombre Libro: </label>
  <input class="form-control" type="text" id="NL<?php echo $row['codLibro']; ?>" value="<?php echo $row['nombreLibro']; ?>" required>
  </div>
	<div class="form-group">
		 <label style="margin:7px" for="NA">ISBN: </label>
		 <input class="form-control" type="text" id="ISBN<?php echo $row['codLibro']; ?>" value="<?php echo $row['ISBN']; ?>" required>
	 </div>
	 <div class="form-group">
			<label style="margin:7px" for="NA">Fecha de Introducción: </label>
		<input class="form-control" type="date" id="FI<?php echo $row['codLibro']; ?>" value="<?php echo $row['fechaIntro']; ?>" required>
		</div>
  </tr>

  </table>
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="updatedata('<?php echo $row['codLibro']; ?>')" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

	    </td>
	  </tr>
<?php
}
?>
	</tbody>
      </table>
