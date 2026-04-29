<?php
include("BD1conexion.php");

/* ===== INSERTAR COMENTARIO ===== */
if(isset($_POST['enviar'])){
    $nombre = trim($_POST['nombre']);
    $comentario = trim($_POST['comentario']);

    if(!empty($nombre) && !empty($comentario)){
        $stmt = $BD1conexion->prepare("INSERT INTO comentarios(nombre, comentario) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombre, $comentario);
        $stmt->execute();
        $stmt->close();
    }
}

/* ===== INSERTAR ENCUESTA (SOLO GUARDA) ===== */
if(isset($_POST['enviar_encuesta'])){
    $calificacion = $_POST['calificacion'] ?? "";
    $gustos = isset($_POST['gustos']) ? implode(", ", $_POST['gustos']) : "";

    if(!empty($calificacion)){
        $stmt = $BD1conexion->prepare("INSERT INTO encuestas(calificacion, gustos) VALUES (?, ?)");
        $stmt->bind_param("ss", $calificacion, $gustos);
        $stmt->execute();
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Comentarios</title>

<style>
body{ margin:0; font-family:Arial; background:#e6e6e6; }

.barra{
    display:flex; justify-content:space-between; align-items:center;
    background:#b8c9de; padding:10px 20px; flex-wrap:wrap;
}
.logo{ width:60px; }

.menu{ display:flex; gap:20px; }
.menu a{
    text-decoration:none; background:white; padding:8px 15px;
    border-radius:20px; color:black; font-weight:bold;
}

.iconos img{ width:35px; margin-left:10px; }

.titulo{ text-align:center; font-size:40px; margin:20px 0; }

.contenedor{
    width:90%; max-width:600px; margin:auto;
    background:white; padding:20px; border-radius:15px;
}

input, textarea{
    width:100%; padding:10px; margin:10px 0;
    border-radius:10px; border:1px solid #ccc;
}

.boton{
    background:#b8c9de; padding:10px; border:none;
    border-radius:20px; font-weight:bold; cursor:pointer;
}

.caja{
    background:#f5f5f5;
    padding:10px;
    border-radius:10px;
    margin-top:10px;
}

.footer{
    background:#b8c9de;
    padding:15px;
    text-align:center;
    margin-top:20px;
}

/* RESPONSIVE */
@media (max-width: 768px){
.barra{ flex-direction:column; text-align:center; gap:10px; }
.menu{ flex-wrap:wrap; justify-content:center; }
.menu a{ font-size:14px; padding:6px 12px; }
.iconos{ margin-top:10px; }
.titulo{ font-size:30px; }
.contenedor{ width:95%; padding:15px; }
}

@media (max-width: 480px){
.menu{ flex-direction:column; gap:8px; width:100%; }
.menu a{ width:100%; text-align:center; }
.iconos img{ width:30px; }
.titulo{ font-size:24px; }
input, textarea{ font-size:14px; }
.boton{ width:100%; }
}
</style>
</head>

<body>

<div class="barra">
    <img src="logo.png" class="logo">
    <nav class="menu">
        <a href="paginaus.php">Inicio</a>
        <a href="tienda.php">Tienda</a>
        <a href="us.php">Nosotros</a>
        <a href="carrito.php">Carrito</a>
    </nav>
</div>

<h1 class="titulo">Comentarios</h1>

<div class="contenedor">

<!-- FORMULARIO COMENTARIOS (HASTA ABAJO) -->

<!-- MOSTRAR COMENTARIOS -->

<!-- ENCUESTA -->
<h2>Tu opinión</h2>

<form method="POST">

<p><strong>¿Cómo calificarías nuestra página?</strong></p>
<label><input type="radio" name="calificacion" value="Excelente" required> Excelente</label><br>
<label><input type="radio" name="calificacion" value="Buena"> Buena</label><br>
<label><input type="radio" name="calificacion" value="Regular"> Regular</label><br>

<br>

<p><strong>¿Qué te gusta de Valnail?</strong></p>
<label><input type="checkbox" name="gustos[]" value="Diseño"> Diseño</label><br>
<label><input type="checkbox" name="gustos[]" value="Productos"> Productos</label><br>
<label><input type="checkbox" name="gustos[]" value="Precios"> Precios</label><br>
<label><input type="checkbox" name="gustos[]" value="Atención"> Atención</label><br>

<br>


</form>
<form method="POST">
    <input type="text" name="nombre" placeholder="Tu nombre" required>
    <textarea name="comentario" placeholder="Escribe tu comentario..." required></textarea>
        <input type="submit" name="enviar" value="Enviar comentario" class="boton">
</form>
<h3>Comentarios:</h3>

<?php
$consulta = "SELECT nombre, comentario, fecha FROM comentarios ORDER BY id DESC";
$resultado = $BD1conexion->query($consulta);

if($resultado && $resultado->num_rows > 0){
    while($row = $resultado->fetch_assoc()){
?>
<div class="caja">
    <strong><?php echo htmlspecialchars($row['nombre']); ?></strong><br>
    <small><?php echo $row['fecha']; ?></small>
    <p><?php echo htmlspecialchars($row['comentario']); ?></p>
</div>
<?php }} ?>

</div>

<footer class="footer">
<p>Correo: valnail@email.com | Instagram: @valnail | Facebook: Valnail</p>
<p>©️ <?php echo date("Y"); ?> Valnail</p>
</footer>

</body>
</html>