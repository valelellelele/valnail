<?php
include("BD1conexion.php");

/* ====== INSERTAR ====== */
if(isset($_POST['guardar'])){
    $NombreProducto=$_POST['NombreProducto'];
    $IdProveedor=$_POST['IdProveedor'];
    $CantidadPorUnidad=$_POST['CantidadPorUnidad'];
    $PrecioUnidad=$_POST['PrecioUnidad'];
    $UnidadesEnExistencia=$_POST['UnidadesEnExistencia'];
    $UnidadesEnPedido=$_POST['UnidadesEnPedido'];

    $BD1conexion->query("INSERT INTO productos
    (NombreProducto,IdProveedor,CantidadPorUnidad,PrecioUnidad,UnidadesEnExistencia,UnidadesEnPedido)
    VALUES
    ('$NombreProducto','$IdProveedor','$CantidadPorUnidad','$PrecioUnidad','$UnidadesEnExistencia','$UnidadesEnPedido')");
}

/* ====== ELIMINAR ====== */
if(isset($_GET['eliminar'])){
    $id=$_GET['eliminar'];
    $BD1conexion->query("DELETE FROM productos WHERE IdProducto=$id");
}

/* ====== EDITAR ====== */
if(isset($_GET['editar'])){
    $id=$_GET['editar'];
    $resultado=$BD1conexion->query("SELECT * FROM productos WHERE IdProducto=$id");
    $rowEditar=$resultado->fetch_assoc();
}

/* ====== ACTUALIZAR ====== */
if(isset($_POST['actualizar'])){
    $id=$_POST['IdProducto'];

    $NombreProducto=$_POST['NombreProducto'];
    $IdProveedor=$_POST['IdProveedor'];
    $CantidadPorUnidad=$_POST['CantidadPorUnidad'];
    $PrecioUnidad=$_POST['PrecioUnidad'];
    $UnidadesEnExistencia=$_POST['UnidadesEnExistencia'];
    $UnidadesEnPedido=$_POST['UnidadesEnPedido'];

    $BD1conexion->query("UPDATE productos SET
    NombreProducto='$NombreProducto',
    IdProveedor='$IdProveedor',
    CantidadPorUnidad='$CantidadPorUnidad',
    PrecioUnidad='$PrecioUnidad',
    UnidadesEnExistencia='$UnidadesEnExistencia',
    UnidadesEnPedido='$UnidadesEnPedido'
    WHERE IdProducto=$id");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Productos</title>

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

/* BOTÓN EXTRA */
.btn-almacen{
  display: block;
  margin-top: 10px;
  padding: 10px;
  background: #b8c9de;
  color: black;
  text-decoration: none;
  border-radius: 10px;
  font-weight: bold;
}

.btn-almacen:hover{
  background:#647e9e;
}

/* TABLA */
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
</style>

</head>

<body>

<header>Productos</header>

<main>

<form method="post">

<input type="hidden" name="IdProducto" value="<?php echo $rowEditar['IdProducto'] ?? ''; ?>">

<input type="text" name="NombreProducto" placeholder="Nombre Producto" value="<?php echo $rowEditar['NombreProducto'] ?? ''; ?>" required>

<input type="number" name="IdProveedor" placeholder="ID Proveedor" value="<?php echo $rowEditar['IdProveedor'] ?? ''; ?>" required>

<input type="text" name="CantidadPorUnidad" placeholder="Cantidad por unidad" value="<?php echo $rowEditar['CantidadPorUnidad'] ?? ''; ?>">

<input type="number" step="0.01" name="PrecioUnidad" placeholder="Precio por unidad" value="<?php echo $rowEditar['PrecioUnidad'] ?? ''; ?>" required>

<input type="number" name="UnidadesEnExistencia" placeholder="Stock" value="<?php echo $rowEditar['UnidadesEnExistencia'] ?? ''; ?>">

<input type="number" name="UnidadesEnPedido" placeholder="En pedido" value="<?php echo $rowEditar['UnidadesEnPedido'] ?? ''; ?>">

<?php if(isset($rowEditar)){ ?>
<input type="submit" name="actualizar" value="Actualizar">
<?php } else { ?>
<input type="submit" name="guardar" value="Guardar Producto">
<?php } ?>

<!-- 🔽 BOTÓN NUEVO -->
<a href="almacen.php" class="btn-almacen">Ir a Almacén</a>

</form>

<div class="table-container">
<table>

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Proveedor</th>
<th>Cantidad</th>
<th>Precio</th>
<th>Stock</th>
<th>Pedido</th>
<th>Acciones</th>
</tr>

<?php
$resultado=$BD1conexion->query("SELECT * FROM productos");

while($row=$resultado->fetch_assoc()){
?>

<tr>
<td><?php echo $row['IdProducto']; ?></td>
<td><?php echo $row['NombreProducto']; ?></td>
<td><?php echo $row['IdProveedor']; ?></td>
<td><?php echo $row['CantidadPorUnidad']; ?></td>
<td>$<?php echo $row['PrecioUnidad']; ?></td>
<td><?php echo $row['UnidadesEnExistencia']; ?></td>
<td><?php echo $row['UnidadesEnPedido']; ?></td>

<td>
<a href="?editar=<?php echo $row['IdProducto']; ?>">Editar</a>
<a href="?eliminar=<?php echo $row['IdProducto']; ?>" onclick="return confirm('¿Seguro?')">Eliminar</a>
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