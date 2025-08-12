<?php
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
    exit;
}

$objeto = json_decode($response);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Error al decodificar JSON: " . json_last_error_msg();
    var_dump($response);
    exit;
}

if (!is_array($objeto) && !is_object($objeto)) {
    echo "La API no devolvió un formato válido.";
    exit;
}
?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Nuevo cliente</button>
<table class="table table-striped table-hover" id="tblcliente">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>TELEFONO</th>
            <th>CORREO</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($objeto as $reg): ?>
        <tr>
            <td><?= htmlspecialchars($reg->id) ?></td>
            <td><?= htmlspecialchars($reg->nombres . " " . $reg->apellidos) ?></td>
            <td><?= htmlspecialchars($reg->telefono) ?></td>
            <td><?= htmlspecialchars($reg->correo) ?></td>
            
			<td><button type="button" class="btn btn-danger" onclick="Eliminar(<?=$reg->id ?>);" >Eliminar</button></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>TELEFONO</th>
            <th>CORREO</th>
            <th>ACCIONES</th>
        </tr>
    </tfoot>
</table>

<script>
$(document).ready(function() {
    $('#tblcliente').DataTable();
});
</script>

<script>
function Eliminar(idcliente) {
  if (confirm("¿Está seguro que quieres eliminar el registro " + idcliente + "?")) {

    var dato = { id: idcliente };
    var datojson = JSON.stringify(dato);

    $.ajax({
      type: "DELETE",
      url: 'http://localhost/APIeventos/clientes/delete_clientes.php',
      data: datojson,
      contentType: "application/json; charset=utf-8", // Se indica que se envía JSON
      dataType: "json", // Se espera JSON de respuesta
      success: function(response) {
        Swal.fire({
          title: "Eliminado",
          text: response.mensaje + " Código: " + response.codigo,
          icon: "success"
        }).then(() => {
          location.reload(); // Recargar después del cierre del alert
        });
      },
      error: function(xhr, status, error) {
        Swal.fire({
          title: "Error",
          text: "No se pudo eliminar el registro. " + error,
          icon: "error"
        });
      }
    });

  }
}
</script>

<?php
include('add.php');