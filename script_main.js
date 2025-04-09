function validateForm(event, isGuest) {
    if (!isGuest) {
        event.preventDefault();

        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;

        if (username === "") {
            alert("Por favor, ingrese su usuario.");
            return false;
        }

        if (password === "") {
            alert("Por favor, ingrese su contraseña.");
            return false;
        }

        event.target.submit();
    }
}

function guestMode(event) {
    event.preventDefault();
    localStorage.setItem('isGuest', 'true');
    window.location.href = "/html/index_menu.html";
}