window.onload = function() {
    var usuario = localStorage.getItem('username');
    if (usuario) {
        alert('Hola, ' + usuario);
    }
};

document.getElementById('logout-link').addEventListener('click', function(event) {
    event.preventDefault();
    var usuario = localStorage.getItem('usuario');

    if (usuario && confirm("¿Desea cerrar sesión?")) {
        alert('Adiós, ' + usuario);
        window.location.href = "/index_main.php";
    }
});