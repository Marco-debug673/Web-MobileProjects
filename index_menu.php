<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Main</title>
    <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    <div class="navbar">
        <div>
            <a href="">Inicio</a>
            <a href="index_registermoney.php">Registro Daños</a>
            <a href="index_historymoney.php">Ver Daños</a>
            <a href="index_finance.php">Registro Materiales</a>            
            <a href="index_historypayment.php">Ver Materiales</a>
            <!--<a href="index_registerpayment.php">Generar Reportes</a>-->
        </div>
        <div class="settings">
            <span class="settings-icon">&#9881;</span>
            <div class="settings-menu">
                <a href="index_main.php" id="logout-link">Cerrar sesión</a>
            </div>
        </div>
    </div>
    <!--<div class="content">
        <div class="carousel">
            <div class="slide">
                <img src="imagenes/picture 1.jpg" alt="Image 1">
            </div>
            <div class="slide">
                <img src="imagenes/picture 2.jpg" alt="Image 2">
            </div>
            <div class="slide">
                <img src="imagenes/picture 3.png" alt="Image 3">
            </div>
            <div class="slide">
                <img src="imagenes/picture 4.jpg" alt="Image 4">
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </div>-->
    <script>
        let slideIndex = 0;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides(n) {
    let slides = document.getElementsByClassName("slide");
    if (n >= slides.length) { slideIndex = 0 }
    if (n < 0) { slideIndex = slides.length - 1 }
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex].style.display = "block";
}

function autoShowSlides() {
    plusSlides(1);
    setTimeout(autoShowSlides, 2000);
}

autoShowSlides();
    </script>

    <script>
        window.onload = function() {
    var isGuest = localStorage.getItem('isGuest');
    if (isGuest === 'true') {
        alert('Hola, Invitado');
        localStorage.removeItem('isGuest');
    }
};

document.getElementById('logout-link').addEventListener('click', function(event) {
    event.preventDefault();
    if (confirm("¿Desea cerrar sesión?")) {
        alert('Adios, Invitado');
        window.location.href = "index_main.php";
    }
});
    </script>
</body>
</html>