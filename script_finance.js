const consejos = [
    "Establece un presupuesto y síguelo de cerca",
    "Ahorra una cantidad fija cada mes, incluso si es poco",
    "Reduce gastos innecesarios, como comer fuera o suscripciones",
    "Compara precios antes de realizar compras importantes",
    "Aprovecha descuentos y ofertas",
    "Busca alternativas más económicas para tus hobbies y entretenimiento",
    "Cocina en casa en lugar de comer fuera",
    "Utiliza el transporte público o camina cuando sea posible",
    "Negocia tus facturas y servicios",
    "Busca oportunidades para generar ingresos adicionales",
    "Invierte tu dinero en instrumentos seguros y rentables",
    "Planifica tus gastos a largo plazo, como la jubilación",
    "Asesórate con un profesional de finanzas si lo necesitas",
];

const boton = document.getElementById("boton");
const consejosElement = document.getElementById("consejos");

function generarConsejoAleatorio() {
    const indiceAleatorio = Math.floor(Math.random() * consejos.length);
    const consejoAleatorio = consejos[indiceAleatorio];
    consejosElement.textContent = consejoAleatorio;
}

boton.addEventListener("click", generarConsejoAleatorio);

generarConsejoAleatorio();

function mostrarTodosLosConsejos() {
    consejosElement.innerHTML = "";

    for (const consejo of consejos) {
        const parrafo = document.createElement("p");
        parrafo.textContent = consejo;
        consejosElement.appendChild(parrafo);
    }
}

const botonTodos = document.createElement("button");
botonTodos.textContent = "Mostrar todos los consejos";
botonTodos.addEventListener("click", mostrarTodosLosConsejos);

consejosElement.parentNode.insertBefore(botonTodos, boton);