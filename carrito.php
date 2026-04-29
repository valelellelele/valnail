<?php
session_start();

/* ====== PRODUCTOS ====== */
$productos = [
    1 => [
        "nombre" => "Mini esmalte de uñas 545 - Color Rojo subtono violeta",
        "precio" => 50,
        "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDMthDrR5wr2eZHvHpcAgeTeMPhYJuXjKZzQ&s"
        ],
        2 => [
        "nombre" => "Mini esmalte de uñas 986 - Color Gris con Brillo",
        "precio" => 50,
        "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjAo64q7JUf7McAdJi2UQf8GopbAbMQoN23A&s"
        ],
        3 => [
        "nombre" => "Mini esmalte de uñas 834 - Color Lavanda",
        "precio" => 50,
        "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNBqeeYSJjbhEthVeJJ4Vz2i-TzwlzSJDSgw&s"
        ],
        4 => [
        "nombre" => "Mini esmalte de uñas 21 - Color verde esmeralda ",
        "precio" => 50,
        "img" => "data:image/jpeg;base64,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"
        ],
        5 => [
           "nombre" => "Esmalte de uñas 01 - Color negro",
           "precio" => 65 ,
           "img" => "https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcTPJhP6n5DxvAVM6m0e4GG8OpKDHsfrR0KxGyP2nPtbtJF7fkvDbjndHAj-lUagXMf6E7LLBoZ0Tp0i4rgRnGBt9NFtjus8d30dQzOZVc_9kBlsxdCEmI4r-8NdjaU67mP6gpeSmQ&usqp=CAc"
        ],
        6 => [
           "nombre" => "Esmalte de uñas 43 - Color guinda con subtono morado calido",
           "precio" => 65,
           "img" => "https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcRC_KUBpl1FL09sVQ-2E1t33zhIqbIrFHNTS9pNVgb6vu4PM4jXu6etqplek-fdISH9WD4DyvkneXDzlCTjSd4J0_1t1Po2ptRE5EYQK5ZwHGhvE3a-cZuL-nyXzaAwonrr7zd9ug&usqp=CAc "
        ],
        7 => [
               "nombre" => "Esmlate de uñas 659 - Base rosa transparente con brillo holografico azul ",
               "precio" =>65 ,
               "img" => "https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcQEcKKi1BXbWrU4KltEo1CFsDLRrq35oFmdS04VWW9bVxeYTiGDBj5vGJySJxSyExqwG0ANIeHloRmN24QxYF3IXoPgdQSsLEwYr63nqHhz79uCgZyO3D_9XmN3Yy74rJQD29ujuLM&usqp=CAc "
        ],
        8 => [
               "nombre" => "Esmalte de uñas 232 - Color Azul cielo",
               "precio" =>65,
               "img" => "https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcRbjeRtbGfKFAhLYyl2FKapKdyZp2DMHC7K7ar9CnrvOOzw8fFJebaCv_r6UzVfHZ_zjeCLOHvLjyCAlCS994eEVyqRLWrQ_pHLcWfCfb-UUFvECo-V1ALSbFH9dd5FVy_zXjb39f0&usqp=CAc"
        ],
        9 => [
               "nombre" => "Kit de instrumentos para cuidado de uñas",
               "precio" => 350,
               "img" => " data:image/jpeg;base64,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"
        ],
        10 => [
               "nombre" => "50 piezas de Limas pulidoras de uñas",
               "precio" => 150,
               "img" => "https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcSppqeD3Fg-aYy3Obqecs166Fzq_ZI5sNz49Joq3cV36NZ6JE-z39EHqK0WtluKh2HbQ3MNDgHRnUl8NPxOr4ejMSIz3A86hzWPV75V1Ghy1RNX8tuMbgek4X4WgTE6hmFawWUVkcFU2Cc&usqp=CAc "
        ],
        11 => [
               "nombre" => "20 piezas de pinceles decorativos para uñas",
               "precio" => 200 ,
               "img" => "data:image/webp;base64,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 "
        ],
        12 => [
               "nombre" => "Pack de acetona 3 tamaños - 120ml, 350ml, 500ml",
               "precio" => 400 ,
               "img" => "data:image/jpeg;base64,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 "
        ],
   ];

/* ====== AGREGAR ====== */
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['carrito'][$id] = ($_SESSION['carrito'][$id] ?? 0) + 1;
}

/* ====== ELIMINAR ====== */
if (isset($_GET['eliminar'])) {
    unset($_SESSION['carrito'][$_GET['eliminar']]);
}

/* ====== VACIAR ====== */
if (isset($_GET['vaciar'])) {
    unset($_SESSION['carrito']);
}

/* ====== FINALIZAR ====== */
if (isset($_GET['finalizar'])) {
    unset($_SESSION['carrito']);
    echo "<script>alert('Compra realizada con éxito 🎉'); window.location='paginaus.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Carrito</title>

<style>
body{
    margin:0;
    font-family: Arial, sans-serif;
    background:#e6e6e6;
    display:flex;
    flex-direction:column;
    min-height:100vh;
}

/* BARRA */
.barra{
    display:flex;
    justify-content:space-between;
    align-items:center;
    background:#b8c9de;
    padding:10px 20px;
    flex-wrap:wrap;
}

.logo{ 
    width:50px; 
}

/* MENÚ */
.menu{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
    justify-content:center;
}

.menu a{
    text-decoration:none;
    background:white;
    padding:6px 12px;
    border-radius:20px;
    color:black;
    font-weight:bold;
    font-size:14px;
}

.menu a:hover{ background:#ddd; }

/* ICONOS */
.iconos{
    display:flex;
    align-items:center;
}

.iconos img{
    width:30px;
    margin-left:8px;
}

/* TITULO */
h1{
    text-align:center;
    font-size:28px;
    margin:15px 0;
}

/* CONTENEDOR */
.contenedor{
    width:95%;
    margin:auto;
    flex:1;
}

/* PRODUCTOS */
.producto{
    display:flex;
    align-items:center;
    background:white;
    margin:10px auto;
    padding:10px;
    width:100%;
    max-width:600px;
    border-radius:15px;
    box-shadow:0 4px 8px rgba(0,0,0,.1);
    gap:10px;
}

/* IMAGEN */
.producto img{
    width:80px;
    border-radius:10px;
}

/* TEXTO */
.producto div{
    flex:1;
}

/* BOTONES */
.boton{
    display:inline-block;
    padding:6px 12px;
    background:white;
    border-radius:20px;
    color:black;
    font-weight:bold;
    text-decoration:none;
    margin-top:5px;
    font-size:14px;
}

.boton:hover{ background:#ddd; }

/* TOTAL */
.total{
    text-align:center;
    font-size:18px;
    margin:15px;
}

/* FOOTER */
.footer{
    background:#b8c9de;
    padding:10px;
    text-align:center;
    font-size:14px;
}

/* 📱 RESPONSIVE EXTRA */
@media (max-width:600px){

    .producto{
        flex-direction:column;
        text-align:center;
    }

    .producto img{
        width:100px;
    }

    .menu{
        justify-content:center;
        width:100%;
        margin-top:10px;
    }

    .iconos{
        width:100%;
        justify-content:center;
        margin-top:10px;
    }
}
</style>
</head>

<body>

<!-- BARRA -->
<div class="barra">
    <img src="logo.png" class="logo">

    <nav class="menu">
        <a href="paginaus.php">Inicio</a>
        <a href="tienda.php">Tienda</a>
        <a href="us.php">Nosotros</a>
        <a href="encuesta.php">Encuesta</a>
        </nav>

</div>

<h1>Tu Carrito</h1>

<div class="contenedor">

<?php
$total = 0;

if (!empty($_SESSION['carrito'])) {

    foreach ($_SESSION['carrito'] as $id => $cantidad) {
        $producto = $productos[$id];
        $subtotal = $producto['precio'] * $cantidad;
        $total += $subtotal;
?>

    <div class="producto">
        <img src="<?php echo $producto['img']; ?>">
        <div>
            <h3><?php echo $producto['nombre']; ?></h3>
            <p>Precio: $<?php echo $producto['precio']; ?></p>
            <p>Cantidad: <?php echo $cantidad; ?></p>
            <p>Subtotal: $<?php echo $subtotal; ?></p>
            <a class="boton" href="carrito.php?eliminar=<?php echo $id; ?>">Eliminar</a>
        </div>
    </div>

<?php
    }

    echo "<div class='total'>Total: $$total</div>";
?>

    <center>
        <a class="boton" href="carrito.php?finalizar=true">Finalizar Compra</a>
        <a class="boton" href="carrito.php?vaciar=true">Vaciar Carrito</a>
    </center>

<?php
} else {
    echo "<p style='text-align:center;'>Tu carrito está vacío </p>";
}
?>

<br>
<center>
    <a class="boton" href="tienda.php">Seguir comprando</a>
</center>

</div>

<!-- FOOTER -->
<footer class="footer">
    <p>
        Correo: valnail@email.com |
        Instagram: @valnail |
        Facebook: Valnail
    </p>
    <p>
        © <?php echo date("Y"); ?> Valnail - Vazquez Felix Ximena Valentina
    </p>
</footer>

</body>
</html>