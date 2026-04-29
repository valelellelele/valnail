<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nosotros</title>

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

/* SUBMENU */
.submenu{
    display:flex;
    justify-content:center;
    gap:10px;
    flex-wrap:wrap;
    margin-bottom:20px;
}

.submenu a{
    background:#b8c9de;
    padding:8px 15px;
    border-radius:20px;
    text-decoration:none;
    color:black;
    font-weight:bold;
}

/* SECCIONES */
.seccion{
    width:90%;
    max-width:700px;
    margin:20px auto;
    background:white;
    padding:20px;
    border-radius:15px;
}

.footer{
    background:#b8c9de;
    padding:15px;
    text-align:center;
    margin-top:20px;
}

html{ scroll-behavior:smooth; }
/* ===== RESPONSIVE ===== */

/* TABLET */
@media (max-width: 768px){

.barra{
    flex-direction:column;
    text-align:center;
    gap:10px;
}

.menu{
    flex-wrap:wrap;
    justify-content:center;
}

.menu a{
    font-size:14px;
    padding:6px 12px;
}

.iconos{
    margin-top:10px;
}

.titulo{
    font-size:30px;
}

.contenedor, .seccion{
    width:95%;
    padding:15px;
}
}

/* CELULAR */
@media (max-width: 480px){

.menu{
    flex-direction:column;
    gap:8px;
    width:100%;
}

.menu a{
    width:100%;
    text-align:center;
}

.iconos img{
    width:30px;
}

.titulo{
    font-size:24px;
}

input, textarea{
    font-size:14px;
}

.boton{
    width:100%;
}

.submenu{
    flex-direction:column;
    align-items:center;
}

.submenu a{
    width:90%;
    text-align:center;
}
}

</style>

</head>

<body>

<div class="barra">
    <img src="logo.png" class="logo">
    <nav class="menu">
    <a href="paginaus.php">Inicio</a>
        <a href="tienda.php">Tienda</a>
        <a href="carrito.php">Carrito</a>
        <a href="encuesta.php">Encuesta</a>
</div>

<h1 class="titulo">Nosotros</h1>

<div class="submenu">
     <a href="#quienes">Quiénes somos</a>
    <a href="#objetivo">Objetivo</a>
    <a href="#historia">Historia</a>
    <a href="#mision">Misión</a>
    <a href="#vision">Visión</a>
    <a href="#ubi">Ubicación </a>
</div>

<div id="quienes" class="seccion">
<h2>Quiénes somos</h2>
<p>Somos un equipo apasionado por la belleza, el diseño y la creatividad, comprometido en ofrecer experiencias únicas en el cuidado de uñas. Nos caracteriza la dedicación, la atención al detalle y el interés por entender las necesidades de cada cliente para brindar soluciones personalizadas. En Valnail, creemos que cada persona es única, por lo que trabajamos para resaltar su estilo y personalidad a través de cada diseño. Nos esforzamos por mantener un ambiente profesional, amigable y confiable, donde nuestros clientes puedan sentirse cómodos y seguros. Más que un servicio, buscamos crear una conexión con quienes nos eligen, convirtiéndonos en parte de su rutina de cuidado y estilo personal.
</p>
</div>

<div id="objetivo" class="seccion">
<h2>Objetivo</h2>
<p>Nuestro objetivo principal es ofrecer productos y servicios de alta calidad enfocados en el cuidado, diseño y embellecimiento de uñas, adaptándonos a las necesidades y gustos de cada cliente. Buscamos no solo cumplir expectativas, sino superarlas, brindando una experiencia integral que combine atención personalizada, innovación y confianza. Nos enfocamos en crear un espacio donde cada persona pueda expresar su estilo y personalidad a través de detalles únicos, utilizando técnicas modernas y productos cuidadosamente seleccionados. Además, aspiramos a construir una relación cercana con nuestros clientes, basada en la satisfacción, la confianza y la mejora continua.</p>
</div>

<div id="historia" class="seccion">
<h2>Historia</h2>
<p>Valnail nace como un proyecto impulsado por la pasión por la belleza, la creatividad y el deseo de ofrecer algo diferente dentro del mundo del cuidado estético. Desde sus inicios, se planteó como una propuesta que fuera más allá de lo convencional, integrando diseño, estilo y calidad en cada servicio. Con el paso del tiempo, el proyecto ha evolucionado gracias al aprendizaje constante, la adaptación a nuevas tendencias y la incorporación de herramientas innovadoras. Cada etapa ha representado un crecimiento significativo, fortaleciendo la identidad de la marca y su compromiso con la excelencia. Hoy en día, Valnail continúa desarrollándose con la misma visión inicial: ofrecer experiencias únicas que destaquen por su calidad y atención al detalle.</p>
</div>

<div id="mision" class="seccion">
<h2>Misión</h2>
<p>Nuestra misión es brindar servicios y productos que resalten la belleza natural de cada persona, ofreciendo una atención cálida, profesional y personalizada. Nos comprometemos a trabajar con altos estándares de calidad, utilizando técnicas actualizadas y materiales confiables que garanticen resultados duraderos y satisfactorios. Buscamos generar confianza en cada cliente, creando un ambiente donde se sientan valorados y escuchados. Asimismo, promovemos la innovación constante y el aprendizaje continuo para mantenernos a la vanguardia en el mundo del diseño y cuidado de uñas, asegurando así una experiencia completa y de alto nivel.</p>
</div>

<div id="vision" class="seccion">
<h2>Visión</h2>
<p>Nuestra visión es consolidarnos como una marca reconocida en el ámbito del cuidado estético, destacando por la calidad de nuestros servicios, la innovación en nuestros diseños y la satisfacción de nuestros clientes. Aspiramos a crecer de manera constante, ampliando nuestras propuestas y adaptándonos a las nuevas tendencias del mercado. Queremos ser un referente en estilo, creatividad y profesionalismo, logrando que cada persona que confíe en nosotros identifique a Valnail como sinónimo de excelencia. A largo plazo, buscamos expandir nuestro alcance y seguir evolucionando sin perder nuestra esencia ni nuestro compromiso con la calidad.</p>
</div>

<div id="ubi" class="seccion">
    <h2>Dirección</h2>
    <p>Plaza Puerto Paraíso, México</p>

    <a href="https://maps.app.goo.gl/Kh43QdJe538Gt6ze6" target="_blank">
        <img src="dir.png" 
             alt="Ubicación en mapa" 
             style="width:600px; margin-top:100px; cursor:pointer;">
    </a>
</div>

<footer class="footer">
<p>Correo: valnail@email.com | Instagram: @valnail | Facebook: Valnail</p>
<p>© <?php echo date("Y"); ?> Valnail</p>
</footer>


</body>
</html>