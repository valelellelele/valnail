<?php
include("BD1conexion.php");

/* ====== INSERTAR ====== */
if(isset($_POST['guardar'])){

    $Nombre=$_POST['Nombre'];
    $Apellidos=$_POST['Apellidos'];
    $Cargo=$_POST['Cargo'];
    $FechaNacimiento=$_POST['FechaNacimiento'];
    $FechaContratacion=$_POST['FechaContratacion'];
    $Direccion=$_POST['Direccion'];
    $Ciudad=$_POST['Ciudad'];
    $Estado=$_POST['Estado'];
    $Pais=$_POST['Pais'];

    $fotoRuta = "";
    if($_FILES['Foto']['name']!=""){
        $fotoNombre = time()."_".$_FILES['Foto']['name'];
        $fotoRuta = "imagenes/".$fotoNombre;
        move_uploaded_file($_FILES['Foto']['tmp_name'], $fotoRuta);
    }

    $query="INSERT INTO empleados
    (Nombre,Apellidos,Cargo,FechaNacimiento,FechaContratacion,Direccion,Ciudad,Estado,Pais,Foto)
    VALUES
    ('$Nombre','$Apellidos','$Cargo','$FechaNacimiento','$FechaContratacion','$Direccion','$Ciudad','$Estado','$Pais','$fotoRuta')";

    $BD1conexion->query($query);
}

/* ====== ELIMINAR ====== */
if(isset($_GET['eliminar'])){
    $id=$_GET['eliminar'];
    $BD1conexion->query("DELETE FROM empleados WHERE IdEmpleado=$id");
}

/* ====== EDITAR ====== */
if(isset($_GET['editar'])){
    $id=$_GET['editar'];
    $resultado=$BD1conexion->query("SELECT * FROM empleados WHERE IdEmpleado=$id");
    $rowEditar=$resultado->fetch_assoc();
}

/* ====== ACTUALIZAR ====== */
if(isset($_POST['actualizar'])){
    $id=$_POST['IdEmpleado'];

    $Nombre=$_POST['Nombre'];
    $Apellidos=$_POST['Apellidos'];
    $Cargo=$_POST['Cargo'];
    $FechaNacimiento=$_POST['FechaNacimiento'];
    $FechaContratacion=$_POST['FechaContratacion'];
    $Direccion=$_POST['Direccion'];
    $Ciudad=$_POST['Ciudad'];
    $Estado=$_POST['Estado'];
    $Pais=$_POST['Pais'];

    if($_FILES['Foto']['name']!=""){
        $fotoNombre = time()."_".$_FILES['Foto']['name'];
        $fotoRuta = "imagenes/".$fotoNombre;
        move_uploaded_file($_FILES['Foto']['tmp_name'], $fotoRuta);

        $query="UPDATE empleados SET
        Nombre='$Nombre', Apellidos='$Apellidos', Cargo='$Cargo',
        FechaNacimiento='$FechaNacimiento', FechaContratacion='$FechaContratacion',
        Direccion='$Direccion', Ciudad='$Ciudad', Estado='$Estado', Pais='$Pais',
        Foto='$fotoRuta'
        WHERE IdEmpleado=$id";
    }else{
        $query="UPDATE empleados SET
        Nombre='$Nombre', Apellidos='$Apellidos', Cargo='$Cargo',
        FechaNacimiento='$FechaNacimiento', FechaContratacion='$FechaContratacion',
        Direccion='$Direccion', Ciudad='$Ciudad', Estado='$Estado', Pais='$Pais'
        WHERE IdEmpleado=$id";
    }

    $BD1conexion->query($query);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Empleados</title>

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

/* IMAGEN */
img {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  object-fit: cover;
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

<header>Empleados</header>

<main>

<form method="post" enctype="multipart/form-data">

<input type="hidden" name="IdEmpleado" value="<?php echo $rowEditar['IdEmpleado'] ?? ''; ?>">

<input type="text" name="Nombre" placeholder="Nombre" value="<?php echo $rowEditar['Nombre'] ?? ''; ?>" required>
<input type="text" name="Apellidos" placeholder="Apellidos" value="<?php echo $rowEditar['Apellidos'] ?? ''; ?>" required>
<input type="text" name="Cargo" placeholder="Cargo" value="<?php echo $rowEditar['Cargo'] ?? ''; ?>" required>

<input type="date" name="FechaNacimiento" value="<?php echo $rowEditar['FechaNacimiento'] ?? ''; ?>" required>
<input type="date" name="FechaContratacion" value="<?php echo $rowEditar['FechaContratacion'] ?? ''; ?>" required>


<input type="text" name="Ciudad" placeholder="Ciudad" value="<?php echo $rowEditar['Ciudad'] ?? ''; ?>">
<input type="text" name="Estado" placeholder="Estado" value="<?php echo $rowEditar['Estado'] ?? ''; ?>">
<input type="text" name="Pais" placeholder="Pais" value="<?php echo $rowEditar['Pais'] ?? ''; ?>">

<input type="file" name="Foto">

<?php if(isset($rowEditar)){ ?>
<input type="submit" name="actualizar" value="Actualizar">
<?php } else { ?>
<input type="submit" name="guardar" value="Guardar">
<?php } ?>

</form>

<div class="table-container">
<table>

<tr>
<th>ID</th>
<th>Foto</th>
<th>Nombre</th>
<th>Apellidos</th>
<th>Cargo</th>
<th>Fecha Nac.</th>
<th>Fecha Cont.</th>
<th>Ciudad</th>
<th>Pais</th>
<th>Acciones</th>
</tr>

<?php
$resultado=$BD1conexion->query("SELECT * FROM empleados");

while($row=$resultado->fetch_assoc()){
?>

<tr>
<td><?php echo $row['IdEmpleado']; ?></td>

<td>
<?php if($row['Foto']!=""){ ?>
<img src="<?php echo $row['Foto']; ?>">
<?php } ?>
</td>

<td><?php echo $row['Nombre']; ?></td>
<td><?php echo $row['Apellidos']; ?></td>
<td><?php echo $row['Cargo']; ?></td>
<td><?php echo $row['FechaNacimiento']; ?></td>
<td><?php echo $row['FechaContratacion']; ?></td>
<td><?php echo $row['Ciudad']; ?></td>
<td><?php echo $row['Pais']; ?></td>

<td>
<a href="?editar=<?php echo $row['IdEmpleado']; ?>">Editar</a>
<a href="?eliminar=<?php echo $row['IdEmpleado']; ?>" onclick="return confirm('¿Seguro?')">Eliminar</a>
</td>
</tr>

<?php } ?>

</table>
</div>

</main>

<div class="subtitulo">
©️ <?php echo date("Y"); ?> ValNail
</div>

</body>
</html>