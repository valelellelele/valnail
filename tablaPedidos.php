<?php
include("BD1conexion.php");

/* ====== INSERTAR ====== */
if(isset($_POST['guardar'])){
    $IdCliente=$_POST['IdCliente'];
    $IdEmpleado=$_POST['IdEmpleado'];
    $FechaPedido=$_POST['FechaPedido'];
    $FechaEntrega=$_POST['FechaEntrega'];
    $FechaEnvio=$_POST['FechaEnvio'];
    $CiudadDestinatario=$_POST['CiudadDestinatario'];
    $EstadoDestinatario=$_POST['EstadoDestinatario'];
    $PaisDestinatario=$_POST['PaisDestinatario'];

    $BD1conexion->query("INSERT INTO pedidos (IdCliente,IdEmpleado,FechaPedido,FechaEntrega,FechaEnvio,CiudadDestinatario,EstadoDestinatario,PaisDestinatario)
    VALUES
    ('$IdCliente','$IdEmpleado','$FechaPedido','$FechaEntrega','$FechaEnvio','$CiudadDestinatario','$EstadoDestinatario','$PaisDestinatario')");
}

/* ====== ELIMINAR ====== */
if(isset($_GET['eliminar'])){
    $id=$_GET['eliminar'];
    $BD1conexion->query("DELETE FROM pedidos WHERE IdPedido=$id");
}

/* ====== EDITAR ====== */
if(isset($_GET['editar'])){
    $id=$_GET['editar'];
    $resultado=$BD1conexion->query("SELECT * FROM pedidos WHERE IdPedido=$id");
    $rowEditar=$resultado->fetch_assoc();
}

/* ====== ACTUALIZAR ====== */
if(isset($_POST['actualizar'])){
    $id=$_POST['IdPedido'];

    $IdCliente=$_POST['IdCliente'];
    $IdEmpleado=$_POST['IdEmpleado'];
    $FechaPedido=$_POST['FechaPedido'];
    $FechaEntrega=$_POST['FechaEntrega'];
    $FechaEnvio=$_POST['FechaEnvio'];
    $CiudadDestinatario=$_POST['CiudadDestinatario'];
    $EstadoDestinatario=$_POST['EstadoDestinatario'];
    $PaisDestinatario=$_POST['PaisDestinatario'];

    $BD1conexion->query("UPDATE pedidos SET
    IdCliente='$IdCliente',
    IdEmpleado='$IdEmpleado',
    FechaPedido='$FechaPedido',
    FechaEntrega='$FechaEntrega',
    FechaEnvio='$FechaEnvio',
    CiudadDestinatario='$CiudadDestinatario',
    EstadoDestinatario='$EstadoDestinatario',
    PaisDestinatario='$PaisDestinatario'
    WHERE IdPedido=$id");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pedidos</title>

<style>
body {
  margin: 0;
  font-family: serif;
  background: #e6e6e6;
}

/* HEADER */
header {
  position: fixed;
  top: 0;
  width: 100%;
  background: #b8c9de;
  padding: 15px;
  text-align: center;
  font-size: 20px;
  z-index: 1000;
}

/* CONTENIDO */
main {
  margin-top: 110px;
  text-align: center;
  padding: 10px;
}

/* FORM */
form {
  background: white;
  padding: 20px;
  border-radius: 15px;
  width: 90%;
  max-width: 400px;
  margin: auto;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}

input {
  width: 100%;
  margin: 5px 0;
  padding: 10px;
  border-radius: 10px;
  border: 1px solid #ccc;
}

input[type="submit"] {
  background: #b8c9de;
  cursor: pointer;
}

/* TABLA RESPONSIVA */
.table-container {
  width: 100%;
  overflow-x: auto;
  margin-top: 20px;
}

table {
  width: 100%;
  min-width: 1000px;
  border-collapse: collapse;
  background: white;
  border-radius: 15px;
  overflow: hidden;
}

th, td {
  padding: 10px;
  border-bottom: 1px solid #ddd;
  text-align: center;
}

th {
  background: #b8c9de;
}

/* BOTONES */
a {
  padding: 5px 10px;
  border-radius: 10px;
  text-decoration: none;
}

a[href*="editar"] {
  background: #b8c9de;
}

a[href*="eliminar"] {
  background: #e6a8a8;
}

/* FOOTER */
.subtitulo {
  position: fixed;
  bottom: 10px;
  right: 20px;
  font-size: 12px;
}

/* 📱 RESPONSIVE */
@media (max-width:600px){
  header{font-size:16px;}
}
</style>

</head>

<body>

<header>Pedidos</header>

<main>

<form method="post">

<input type="hidden" name="IdPedido" value="<?php echo $rowEditar['IdPedido'] ?? ''; ?>">

<input type="number" name="IdCliente" placeholder="ID Cliente" value="<?php echo $rowEditar['IdCliente'] ?? ''; ?>" required>
<input type="number" name="IdEmpleado" placeholder="ID Empleado" value="<?php echo $rowEditar['IdEmpleado'] ?? ''; ?>" required>

<input type="date" name="FechaPedido" value="<?php echo $rowEditar['FechaPedido'] ?? ''; ?>">
<input type="date" name="FechaEntrega" value="<?php echo $rowEditar['FechaEntrega'] ?? ''; ?>">
<input type="date" name="FechaEnvio" value="<?php echo $rowEditar['FechaEnvio'] ?? ''; ?>">

<input type="text" name="CiudadDestinatario" placeholder="Ciudad" value="<?php echo $rowEditar['CiudadDestinatario'] ?? ''; ?>">
<input type="text" name="EstadoDestinatario" placeholder="Estado" value="<?php echo $rowEditar['EstadoDestinatario'] ?? ''; ?>">
<input type="text" name="PaisDestinatario" placeholder="Pais" value="<?php echo $rowEditar['PaisDestinatario'] ?? ''; ?>">

<?php if(isset($rowEditar)){ ?>
<input type="submit" name="actualizar" value="Actualizar">
<?php } else { ?>
<input type="submit" name="guardar" value="Guardar Pedido">
<?php } ?>

</form>

<div class="table-container">
<table>

<tr>
<th>ID</th>
<th>Cliente</th>
<th>Empleado</th>
<th>Pedido</th>
<th>Entrega</th>
<th>Envio</th>
<th>Ciudad</th>
<th>Estado</th>
<th>Pais</th>
<th>Acciones</th>
</tr>

<?php
$resultado=$BD1conexion->query("SELECT * FROM pedidos");

while($row=$resultado->fetch_assoc()){
?>

<tr>
<td><?php echo $row['IdPedido']; ?></td>
<td><?php echo $row['IdCliente']; ?></td>
<td><?php echo $row['IdEmpleado']; ?></td>
<td><?php echo $row['FechaPedido']; ?></td>
<td><?php echo $row['FechaEntrega']; ?></td>
<td><?php echo $row['FechaEnvio']; ?></td>
<td><?php echo $row['CiudadDestinatario']; ?></td>
<td><?php echo $row['EstadoDestinatario']; ?></td>
<td><?php echo $row['PaisDestinatario']; ?></td>

<td>
<a href="?editar=<?php echo $row['IdPedido']; ?>">Editar</a>
<a href="?eliminar=<?php echo $row['IdPedido']; ?>" onclick="return confirm('¿Seguro?')">Eliminar</a>
</td>
</tr>

<?php } ?>

</table>
</div>

</main>

<div class="subtitulo">
©️ <?php echo date("Y"); ?> ValNail - Vazquez Felix Ximena Valentina
</div>

</body>
</html>