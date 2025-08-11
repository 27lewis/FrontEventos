<?php
/*
include(cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css);
include(cdn.datatables.net/2.3.2/js/dataTables.min.js);
*/
$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "http://localhost/APIeventos/clientes/get_clientes.php",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
	echo "cURL Error #:" . $err;
	exit(1);
} 
	$objeto = json_decode($response);
?>
	<table  class="table table-striped">
	<thead>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>TELEFONO</th>
		<th>CORREO</th>
		<th>ACCIONES</th>
		
	</thead>
	<tbody>
	<?php
	foreach($objeto as $reg){
	?>
	<tr>
		<td> <?= $reg->id ?></td>
		<td> <?= $reg->apellidos." ". $reg->nombres ?></td>
		<td> <?= $reg->telefono ?></td>
		<td> <?= $reg->correo ?></td>
		<td><button type="button" class="btn btn-danger">ELIMINAR</button><td>
		<button type="button" class="btn btn-info">EDITAR</button>
	</tr>
	<?php
	}
	?>
	</tbody>
	<tfoot>
		<th>ID</th>
		<th>NOMBRE</th>
		<th>TELEFONO</th>
		<th>CORREO</th>
		<th>ACCIONES</th>
	</tfoot>

	</table>