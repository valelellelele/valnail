<?php
include("BD1conexion.php");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
/* ====== INSERTAR ====== */
if(isset($_POST['guardar'])){
    $IdPedido=$_POST['IdPedido'];
    $IdCliente=$_POST['IdCliente'];
    $IdEmpleado=$_POST['IdEmpleado'];
    $FechaFactura=$_POST['FechaFactura'];
    $SubTotal=$_POST['SubTotal'];
    $IVA=$_POST['IVA'];
    $Total=$_POST['Total'];
    $MetodoPago=$_POST['MetodoPago'];
    $EstadoFactura=$_POST['EstadoFactura'];

    $BD1conexion->query("INSERT INTO facturas
    (IdPedido,IdCliente,IdEmpleado,FechaFactura,SubTotal,IVA,Total,MetodoPago,EstadoFactura)
    VALUES
    ('$IdPedido','$IdCliente','$IdEmpleado','$FechaFactura','$SubTotal','$IVA','$Total','$MetodoPago','$EstadoFactura')");
}

/* ====== ELIMINAR ====== */
if(isset($_GET['eliminar'])){
    $id=$_GET['eliminar'];
    $BD1conexion->query("DELETE FROM facturas WHERE IdFactura=$id");
}

/* ====== EDITAR ====== */
if(isset($_GET['editar'])){
    $id=$_GET['editar'];
    $resultado=$BD1conexion->query("SELECT * FROM facturas WHERE IdFactura=$id");
    $rowEditar=$resultado->fetch_assoc();
}

/* ====== ACTUALIZAR ====== */
if(isset($_POST['actualizar'])){
    $id=$_POST['IdFactura'];

    $IdPedido=$_POST['IdPedido'];
    $IdCliente=$_POST['IdCliente'];
    $IdEmpleado=$_POST['IdEmpleado'];
    $FechaFactura=$_POST['FechaFactura'];
    $SubTotal=$_POST['SubTotal'];
    $IVA=$_POST['IVA'];
    $Total=$_POST['Total'];
    $MetodoPago=$_POST['MetodoPago'];
    $EstadoFactura=$_POST['EstadoFactura'];

    $BD1conexion->query("UPDATE facturas SET
    IdPedido='$IdPedido',
    IdCliente='$IdCliente',
    IdEmpleado='$IdEmpleado',
    FechaFactura='$FechaFactura',
    SubTotal='$SubTotal',
    IVA='$IVA',
    Total='$Total',
    MetodoPago='$MetodoPago',
    EstadoFactura='$EstadoFactura'
    WHERE IdFactura=$id");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Facturas</title>

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
  min-width: 900px;
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

<header>Facturas</header>

<main>

<!-- FORM -->
<form method="post">

<input type="hidden" name="IdFactura" value="<?php echo $rowEditar['IdFactura'] ?? ''; ?>">

<input type="number" name="IdPedido" placeholder="ID Pedido" value="<?php echo $rowEditar['IdPedido'] ?? ''; ?>" required>
<input type="number" name="IdCliente" placeholder="ID Cliente" value="<?php echo $rowEditar['IdCliente'] ?? ''; ?>" required>
<input type="number" name="IdEmpleado" placeholder="ID Empleado" value="<?php echo $rowEditar['IdEmpleado'] ?? ''; ?>" required>

<input type="date" name="FechaFactura" value="<?php echo $rowEditar['FechaFactura'] ?? ''; ?>" required>

<input type="number" step="0.01" name="SubTotal" placeholder="SubTotal" value="<?php echo $rowEditar['SubTotal'] ?? ''; ?>" required>
<input type="number" step="0.01" name="IVA" placeholder="IVA" value="<?php echo $rowEditar['IVA'] ?? ''; ?>" required>
<input type="number" step="0.01" name="Total" placeholder="Total" value="<?php echo $rowEditar['Total'] ?? ''; ?>" required>

<input type="text" name="MetodoPago" placeholder="Metodo de pago" value="<?php echo $rowEditar['MetodoPago'] ?? ''; ?>" required>
<input type="text" name="EstadoFactura" placeholder="Estado factura" value="<?php echo $rowEditar['EstadoFactura'] ?? ''; ?>" required>

<?php if(isset($rowEditar)){ ?>
<input type="submit" name="actualizar" value="Actualizar">
<?php } else { ?>
<input type="submit" name="guardar" value="Guardar Factura">
<?php } ?>

</form>

<!-- TABLA -->
<div class="table-container">
<table>

<tr>
<th>ID</th>
<th>Pedido</th>
<th>Cliente</th>
<th>Empleado</th>
<th>Fecha</th>
<th>SubTotal</th>
<th>IVA</th>
<th>Total</th>
<th>Metodo</th>
<th>Estado</th>
<th>Acciones</th>
</tr>

<?php
$resultado=$BD1conexion->query("SELECT * FROM facturas");

while($row=$resultado->fetch_assoc()){
?>

<tr>
<td><?php echo $row['IdFactura']; ?></td>
<td><?php echo $row['IdPedido']; ?></td>
<td><?php echo $row['IdCliente']; ?></td>
<td><?php echo $row['IdEmpleado']; ?></td>
<td><?php echo $row['FechaFactura']; ?></td>
<td><?php echo $row['SubTotal']; ?></td>
<td><?php echo $row['IVA']; ?></td>
<td><?php echo $row['Total']; ?></td>
<td><?php echo $row['MetodoPago']; ?></td>
<td><?php echo $row['EstadoFactura']; ?></td>

<td>
<a href="?editar=<?php echo $row['IdFactura']; ?>">Editar</a>
<a href="?eliminar=<?php echo $row['IdFactura']; ?>" onclick="return confirm('¿Seguro?')">Eliminar</a>
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