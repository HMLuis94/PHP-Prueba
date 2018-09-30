
	<table class="table table-bordered table-hover">
	<thead>
	  <tr>
	    <th>Autor</th>
			<th>Libro</th>
		<th width="20%">Editar</th>

	  </tr>
	</thead>
	<tbody>
	<tr>
<?php
include "../../config.php";
$res = $conn->query("select * from libroAutores inner join autor on autor.codAutor = libroAutores.codAutor inner join libros on libros.codLibro = libroAutores.codLibro");

while ($row = $res->fetch_assoc()) {
?>



	    <td><?php echo $row['nombreAutor']; ?></td>
			<td><?php echo $row['nombreLibro']; ?></td>
	    <td style="color:black">
	    <a class="btn btn-danger btn-sm"  onclick="deletedata('<?php echo $row['codAutor']; ?>', '<?php echo $row['codLibro']; ?>' )" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

<!-- Modal -->

	    </td>
	  </tr>
<?php
}
?>
	</tbody>
      </table>
