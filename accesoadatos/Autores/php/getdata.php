
	<table class="table table-bordered table-hover">
	<thead>
	  <tr>
	    <th width="20%">Codigo de Autor</th>
	    <th>Nombre Autor</th>
		<th>Editar</th>

	  </tr>
	</thead>
	<tbody>
	<tr>
<?php
include "../../config.php";
$res = $conn->query("select * from autor order by nombreAutor asc");

while ($row = $res->fetch_assoc()) {
?>



	    <td><?php echo $row['codAutor']; ?></td>
	    <td><?php echo $row['nombreAutor']; ?></td>
	    <td style="color:black">
	    <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal<?php echo $row['codAutor']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
	    <a class="btn btn-danger btn-sm"  onclick="deletedata('<?php echo $row['codAutor']; ?>')" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

<!-- Modal -->
<div class="modal fade" id="myModal<?php echo $row['codAutor']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $row['codAutor']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"  style="width:700px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel<?php echo $row['codAutor']; ?>">Editar Datos</h4>
      </div>
      <div class="modal-body">

<form>


<table>


 <div class="form-group">
    <td><label style="margin:7px" for="CA">Codigo Autor: </label></td>
    <td><input class="form-control" type="text" id="CA<?php echo $row['codAutor']; ?>" value="<?php echo $row['codAutor']; ?>"></td>
  </div>
	<div class="form-group">
		 <td><label style="margin:7px" for="NA">Nombre Autor: </label></td>
		 <td><input class="form-control" type="text" id="NA<?php echo $row['codAutor']; ?>" value="<?php echo $row['nombreAutor']; ?>"></td>
	 </div>
  </tr>

  </table>
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="updatedata('<?php echo $row['codAutor']; ?>')" class="btn btn-primary">Guardar Cambios</button>
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
