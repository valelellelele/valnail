<?php
include("BD1conexion.php");

/* ====== INSERTAR ====== */
if(isset($_POST['guardar'])){
    $NombreCompania=$_POST['NombreCompania'];
    $NombreContacto=$_POST['NombreContacto'];
    $CargoContacto=$_POST['CargoContacto'];
    $Ciudad=$_POST['Ciudad'];
    $Estado=$_POST['Estado'];
    $Pais=$_POST['Pais'];
    $Telefono=$_POST['Telefono'];

    $BD1conexion->query("INSERT INTO proveedores
    (NombreCompania,NombreContacto,CargoContacto,Ciudad,Estado,Pais,Telefono)
    VALUES
    ('$NombreCompania','$NombreContacto','$CargoContacto','$Ciudad','$Estado','$Pais','$Telefono')");
}

/* ====== ELIMINAR ====== */
if(isset($_GET['eliminar'])){
    $id=$_GET['eliminar'];
    $BD1conexion->query("DELETE FROM proveedores WHERE IdProveedor=$id");
}

/* ====== EDITAR ====== */
if(isset($_GET['editar'])){
    $id=$_GET['editar'];
    $resultado=$BD1conexion->query("SELECT * FROM proveedores WHERE IdProveedor=$id");
    $rowEditar=$resultado->fetch_assoc();
}

/* ====== ACTUALIZAR ====== */
if(isset($_POST['actualizar'])){
    $id=$_POST['IdProveedor'];

    $NombreCompania=$_POST['NombreCompania'];
    $NombreContacto=$_POST['NombreContacto'];
    $CargoContacto=$_POST['CargoContacto'];
    
    $Ciudad=$_POST['Ciudad'];
    $Estado=$_POST['Estado'];
    
    $Pais=$_POST['Pais'];
    $Telefono=$_POST['Telefono'];

    $BD1conexion->query("UPDATE proveedores SET
    NombreCompania='$NombreCompania',
    NombreContacto='$NombreContacto',
    CargoContacto='$CargoContacto',
    Ciudad='$Ciudad',
    Estado='$Estado',
    Pais='$Pais',
    Telefono='$Telefono'
    WHERE IdProveedor=$id");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Proveedores</title>

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

<header>Proveedores</header>

<main>

<form method="post">

<input type="hidden" name="IdProveedor" value="<?php echo $rowEditar['IdProveedor'] ?? ''; ?>">

<input type="text" name="NombreCompania" placeholder="Nombre Compañía" value="<?php echo $rowEditar['NombreCompania'] ?? ''; ?>" required>

<input type="text" name="NombreContacto" placeholder="Contacto" value="<?php echo $rowEditar['NombreContacto'] ?? ''; ?>">

<input type="text" name="CargoContacto" placeholder="Cargo" value="<?php echo $rowEditar['CargoContacto'] ?? ''; ?>">


<input type="text" name="Ciudad" placeholder="Ciudad" value="<?php echo $rowEditar['Ciudad'] ?? ''; ?>">

<input type="text" name="Estado" placeholder="Estado" value="<?php echo $rowEditar['Estado'] ?? ''; ?>">


<input type="text" name="Pais" placeholder="País" value="<?php echo $rowEditar['Pais'] ?? ''; ?>">

<input type="text" name="Telefono" placeholder="Teléfono" value="<?php echo $rowEditar['Telefono'] ?? ''; ?>">

<?php if(isset($rowEditar)){ ?>
<input type="submit" name="actualizar" value="Actualizar">
<?php } else { ?>
<input type="submit" name="guardar" value="Guardar Proveedor">
<?php } ?>

</form>

<div class="table-container">
<table>

<tr>
<th>ID</th>
<th>Compañía</th>
<th>Contacto</th>
<th>Cargo</th>
<th>Ciudad</th>
<th>Estado</th>
<th>País</th>
<th>Teléfono</th>
<th>Acciones</th>
</tr>

<?php
$resultado=$BD1conexion->query("SELECT * FROM proveedores");

while($row=$resultado->fetch_assoc()){
?>

<tr>
<td><?php echo $row['IdProveedor']; ?></td>
<td><?php echo $row['NombreCompania']; ?></td>
<td><?php echo $row['NombreContacto']; ?></td>
<td><?php echo $row['CargoContacto']; ?></td>
<td><?php echo $row['Ciudad']; ?></td>
<td><?php echo $row['Estado']; ?></td>
<td><?php echo $row['Pais']; ?></td>
<td><?php echo $row['Telefono']; ?></td>

<td>
<a href="?editar=<?php echo $row['IdProveedor']; ?>">Editar</a>
<a href="?eliminar=<?php echo $row['IdProveedor']; ?>" onclick="return confirm('¿Seguro?')">Eliminar</a>
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