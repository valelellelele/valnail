<?php
include("BD1conexion.php");

/* ====== INSERTAR ====== */
if(isset($_POST['guardar'])){
    $Nombre=$_POST['Nombre'];
    $Telefono=$_POST['Telefono'];
    $Direccion=$_POST['Direccion'];
    $Ciudad=$_POST['Ciudad'];
    $Estado=$_POST['Estado'];
    $Pais=$_POST['Pais'];

    $query="INSERT INTO clientes(Nombre,Telefono,Direccion,Ciudad,Estado,Pais)
    VALUES('$Nombre','$Telefono','$Direccion','$Ciudad','$Estado','$Pais')";
    $BD1conexion->query($query);
}

/* ====== ELIMINAR ====== */
if(isset($_GET['eliminar'])){
    $id=$_GET['eliminar'];
    $query="DELETE FROM clientes WHERE IdCliente=$id";
    $BD1conexion->query($query);
}

/* ====== EDITAR ====== */
if(isset($_GET['editar'])){
    $id=$_GET['editar'];
    $query="SELECT * FROM clientes WHERE IdCliente=$id";
    $resultado=$BD1conexion->query($query);
    $rowEditar=$resultado->fetch_assoc();
}

/* ====== ACTUALIZAR ====== */
if(isset($_POST['actualizar'])){
    $id=$_POST['IdCliente'];

    $Nombre=$_POST['Nombre'];
    $Telefono=$_POST['Telefono'];
    $Direccion=$_POST['Direccion'];
    $Ciudad=$_POST['Ciudad'];
    $Estado=$_POST['Estado'];
    $Pais=$_POST['Pais'];

    $query="UPDATE clientes SET
    Nombre='$Nombre',
    Telefono='$Telefono',
    Direccion='$Direccion',
    Ciudad='$Ciudad',
    Estado='$Estado',
    Pais='$Pais'
    WHERE IdCliente=$id";

    $BD1conexion->query($query);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Clientes</title>

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
  font-weight: bold;
  font-size: 20px;
  z-index: 1000;
}

/* CONTENIDO */
main {
  margin-top: 110px;
  text-align: center;
  padding: 10px;
}

/* FORMULARIO */
form {
  background: white;
  padding: 20px;
  border-radius: 15px;
  display: inline-block;
  width: 90%;
  max-width: 400px;
  margin-bottom: 20px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}

input {
  width: 90%;
  margin: 5px 0;
  padding: 10px;
  border-radius: 10px;
  border: 1px solid #ccc;
}

input[type="submit"] {
  background: #b8c9de;
  font-weight: bold;
  cursor: pointer;
}

input[type="submit"]:hover {
  background: #9aaac3;
}

/* CONTENEDOR TABLA */
.table-container {
  width: 100%;
  overflow-x: auto;
}

/* TABLA */
table {
  width: 100%;
  min-width: 700px;
  margin: auto;
  border-collapse: collapse;
  background: white;
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

th {
  background: #b8c9de;
  padding: 10px;
}

td {
  padding: 10px;
  border-bottom: 1px solid #ddd;
  text-align: center;
}

tr:hover {
  background: #f1f1f1;
}

/* BOTONES */
a {
  text-decoration: none;
  padding: 5px 10px;
  border-radius: 10px;
  font-weight: bold;
  display: inline-block;
  margin: 2px;
}

a[href*="editar"] {
  background: #b8c9de;
  color: black;
}

a[href*="eliminar"] {
  background: #e6a8a8;
  color: black;
}

/* FOOTER */
.subtitulo {
  position: fixed;
  bottom: 10px;
  right: 20px;
  font-size: 14px;
}

/* 📱 RESPONSIVE */
@media (max-width:600px){

  header{
    font-size:16px;
    padding:10px;
  }

  form{
    padding:15px;
  }

  input{
    width:100%;
  }

  .subtitulo{
    font-size:12px;
    right:10px;
  }
}
</style>
</head>

<body>

<header>Clientes</header>

<main>

<!-- FORM -->
<form method="post">

<input type="hidden" name="IdCliente" value="<?php echo $rowEditar['IdCliente'] ?? ''; ?>">

<input type="text" name="Nombre" placeholder="Nombre" value="<?php echo $rowEditar['Nombre'] ?? ''; ?>" required>

<input type="text" name="Telefono" placeholder="Telefono" value="<?php echo $rowEditar['Telefono'] ?? ''; ?>">

<input type="text" name="Direccion" placeholder="Direccion" value="<?php echo $rowEditar['Direccion'] ?? ''; ?>">

<input type="text" name="Ciudad" placeholder="Ciudad" value="<?php echo $rowEditar['Ciudad'] ?? ''; ?>">

<input type="text" name="Estado" placeholder="Estado" value="<?php echo $rowEditar['Estado'] ?? ''; ?>">

<input type="text" name="Pais" placeholder="Pais" value="<?php echo $rowEditar['Pais'] ?? ''; ?>">

<?php if(isset($rowEditar)){ ?>
<input type="submit" name="actualizar" value="Actualizar">
<?php } else { ?>
<input type="submit" name="guardar" value="Guardar Cliente">
<?php } ?>

</form>

<!-- TABLA -->
<div class="table-container">
<table>

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Telefono</th>
<th>Direccion</th>
<th>Ciudad</th>
<th>Estado</th>
<th>Pais</th>
<th>Acciones</th>
</tr>

<?php
$query="SELECT * FROM clientes";
$resultado=$BD1conexion->query($query);

while($row=$resultado->fetch_assoc()){
?>

<tr>
<td><?php echo $row['IdCliente']; ?></td>
<td><?php echo $row['Nombre']; ?></td>
<td><?php echo $row['Telefono']; ?></td>
<td><?php echo $row['Direccion']; ?></td>
<td><?php echo $row['Ciudad']; ?></td>
<td><?php echo $row['Estado']; ?></td>
<td><?php echo $row['Pais']; ?></td>

<td>
<a href="?editar=<?php echo $row['IdCliente']; ?>">Editar</a>
<a href="?eliminar=<?php echo $row['IdCliente']; ?>" onclick="return confirm('¿Seguro?')">Eliminar</a>
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