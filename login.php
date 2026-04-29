<?php
session_start();

$admin_usuario = "admin";
$admin_contrasena = "3670";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    if ($usuario === $admin_usuario && $contrasena === $admin_contrasena) {

        $_SESSION["usuario"] = $usuario;
        header("Location: menua.html");
        exit;

    } else {

        $_SESSION["usuario"] = $usuario;
        header("Location: paginaus.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<style>
body{
    margin:0;
    font-family: serif;
    background:#e6e6e6;
    display:flex;
    flex-direction:column;
    min-height:100vh;
    justify-content:center;
    align-items:center;
}

/* CAJA */
.box {
    width:90%;
    max-width:350px;
    padding:25px;
    background:white;
    border-radius:10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.15);
    text-align:center;
}

/* TITULOS */
h3 {
    margin:10px 0;
    font-weight:bold;
}

/* INPUTS */
input, button {
    width:100%;
    padding:12px;
    margin-top:12px;
    border:1px solid #ccc;
    border-radius:6px;
    font-size:16px;
}

/* BOTON */
button {
    background:#b8c9de;
    border:none;
    cursor:pointer;
    font-weight:bold;
    transition:0.3s;
}

button:hover {
    background:#9aaac3;
}

/* FOOTER */
.subtitulo {
    position:fixed;
    bottom:10px;
    right:20px;
    font-size:14px;
    font-style:italic;
}

/* 📱 RESPONSIVE */
@media (max-width:600px){

    .box{
        padding:20px;
    }

    .subtitulo{
        font-size:12px;
        right:10px;
    }
}
</style>

</head>
<body>

<div class="box">
    <h3>Iniciar sesión</h3>

    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <button type="submit">Entrar</button>
    </form>
</div>

<div class="subtitulo">
    ©️ 2026 ValNail - Vazquez Felix Ximena Valentina
</div>

</body>
</html>