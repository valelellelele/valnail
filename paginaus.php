<?php
// Aquí puedes agregar lógica PHP si la necesitas
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Valnail</title>

<style>
body{
    margin:0;
    font-family: Arial, sans-serif;
    background:#e6e6e6;
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

/* BOTON MENU */
.btn-menu{
    display:none;
    font-size:24px;
    cursor:pointer;
}

/* MENÚ */
.menu{
    display:flex;
    gap:15px;
}

.menu a{
    text-decoration:none;
    background:white;
    padding:8px 15px;
    border-radius:20px;
    color:black;
    font-weight:bold;
}

/* CONTENIDO */
.principal{
    text-align:center;
    margin-top:100px;
    padding:20px;
}

.texto{
    letter-spacing:3px;
    font-size:16px;
}

h1{
    font-size:50px;
}

/* FOOTER */
.footer{
    background:#b8c9de;
    padding:15px;
    text-align:center;
    margin-top:50px;
}

/* 📱 MENÚ LATERAL */
.menu-lateral{
    position:fixed;
    top:0;
    left:-250px;
    width:250px;
    height:100%;
    background:#b8c9de;
    display:flex;
    flex-direction:column;
    padding:20px;
    transition:0.3s;
    z-index:1000;
}

.menu-lateral a{
    margin:10px 0;
    text-decoration:none;
    background:white;
    padding:10px;
    border-radius:10px;
    color:black;
    font-weight:bold;
}

/* OVERLAY */
.overlay{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.4);
    display:none;
    z-index:900;
}

/* ACTIVOS */
.menu-lateral.activo{
    left:0;
}

.overlay.activo{
    display:block;
}

/* 📱 RESPONSIVE */
@media (max-width:700px){

    .menu{
        display:none;
    }

    .btn-menu{
        display:block;
    }

    h1{
        font-size:30px;
    }
}
</style>

</head>
<body>

<!-- BARRA -->
<div class="barra">

    <span class="btn-menu" id="btnMenu">☰</span>

    <img src="logo.png" class="logo">

    <nav class="menu">
        <a href="paginaus.php">Inicio</a>
        <a href="tienda.php">Tienda</a>
        <a href="us.php">Nosotros</a>
        <a href="carrito.php">Carrito</a>
        <a href="encuesta.php">Encuesta</a>

    </nav>

</div>


<div class="overlay" id="overlay"></div>


<section class="principal">
    <p class="texto">
        <?php echo "PARA EL CUIDADO DE TUS UÑAS"; ?>
    </p>
    <h1><?php echo "VALNAIL"; ?></h1>
</section>

<!-- FOOTER -->
<footer class="footer">
    <p>
        Correo: <?php echo "valnail@email.com"; ?> |
        Instagram: <?php echo "@valnail"; ?> |
        Facebook: <?php echo "Valnail"; ?>
    </p>
    <p>
        ©️ <?php echo date("Y"); ?> Valnail - Vazquez Felix Ximena Valentina
    </p>
</footer>

<script>
const btn = document.getElementById("btnMenu");
const menu = document.getElementById("menuLateral");
const overlay = document.getElementById("overlay");

btn.addEventListener("click", () => {
    menu.classList.add("activo");
    overlay.classList.add("activo");
});

overlay.addEventListener("click", () => {
    menu.classList.remove("activo");
    overlay.classList.remove("activo");
});
</script>

</body>
</html>
