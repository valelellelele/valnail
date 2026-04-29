<?php
// CONEXIÓN
$BD1conexion = new mysqli("localhost","root","","valnail");

// MENSAJE
$mensaje = "";

// PROCESAR FORMULARIO
if(isset($_POST['movimiento'])){

    $id = $_POST['idproducto'];
    $cantidad = $_POST['cantidad'];
    $tipo = $_POST['tipo'];

    if($id != "" && $cantidad > 0){

        if($tipo == "entrada"){

            $sql = "UPDATE productos 
                    SET UnidadesEnExistencia = UnidadesEnExistencia + $cantidad 
                    WHERE idproducto = $id";

            $BD1conexion->query($sql);
            $mensaje = "Entrada registrada correctamente";

        }else if($tipo == "salida"){

            $verificar = "SELECT UnidadesEnExistencia FROM productos WHERE idproducto = $id";
            $res = $BD1conexion->query($verificar);
            $fila = $res->fetch_assoc();

            if($fila && $fila['UnidadesEnExistencia'] >= $cantidad){

                $sql = "UPDATE productos 
                        SET UnidadesEnExistencia = UnidadesEnExistencia - $cantidad 
                        WHERE idproducto = $id";

                $BD1conexion->query($sql);
                $mensaje = "Salida registrada correctamente";

            }else{
                $mensaje = " No hay suficiente stock";
            }
        }

    }else{
        $mensaje = " Llena todos los campos correctamente";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Control de almacén</title>

<style>

/* GENERAL */
body{
    margin:0;
    font-family: serif;
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
    width:60px;
}

/* MENU */
.menu{
    display:flex;
    gap:20px;
}

.menu a{
    text-decoration:none;
    background:white;
    padding:8px 15px;
    border-radius:20px;
    color:black;
    font-weight:bold;
}

.menu a:hover{
    background:#ddd;
}

/* CONTENIDO */
.contenedor{
    width:90%;
    margin:auto;
    text-align:center;
    flex:1;
}

/* TARJETA */
.card{
    background:white;
    margin:40px auto;
    padding:25px;
    width:350px;
    border-radius:15px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
}

input, select{
    width:90%;
    padding:10px;
    margin:10px;
    border-radius:8px;
    border:1px solid #ccc;
}

button{
    padding:10px 20px;
    border:none;
    border-radius:10px;
    background:#b8c9de;
    color:black;
    font-weight:bold;
    cursor:pointer;
}

button:hover{
    background:#647e9e;
}

.mensaje{
    margin-top:15px;
    font-weight:bold;
}

/* FOOTER */
.footer{
    background:#b8c9de;
    padding:15px;
    text-align:center;
    margin-top:auto;
}

/* RESPONSIVE */
@media (max-width:480px){

    .menu{
        flex-direction:column;
        gap:10px;
        margin-top:10px;
    }

    .menu a{
        width:100%;
    }

    .card{
        width:90%;
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
        <a href="carrito.php">Carrito</a>
    </nav>
</div>

<!-- CONTENIDO -->
<div class="contenedor">

<div class="card">
    <h2>Almacén</h2>

    <form method="POST">

        <input type="number" name="idproducto" placeholder="ID del producto" required>

        <input type="number" name="cantidad" placeholder="Cantidad" required>

        <select name="tipo" required>
            <option value="">Selecciona movimiento</option>
            <option value="entrada">Entrada</option>
            <option value="salida">Salida</option>
        </select>

        <button type="submit" name="movimiento">Guardar</button>

        <br><br>

        <button type="button" onclick="window.location.href='tablaProductos.php'">
            Ver productos
        </button>

    </form>

    <div class="mensaje">
        <?php echo $mensaje; ?>
    </div>

</div>

</div>

<!-- FOOTER -->
<footer class="footer">
    <p>
        Correo: valnail@email.com |
        Instagram: @valnail |
        Facebook: Valnail
    </p>
    <p>
        ©️ <?php echo date("Y"); ?> Valnail
    </p>
</footer>

</body>
</html>