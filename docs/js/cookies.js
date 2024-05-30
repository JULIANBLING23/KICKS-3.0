const botonAceptarCookies = document.getElementById('btn-aceptar-cookies');
const botonRechazarCookies = document.getElementById('btn-rechazar-cookies');
const avisoCookies = document.getElementById('aviso-cookies');
const fondoAvisoCookies = document.getElementById('fondo-aviso-cookies');
const cookie = true;
dataLayer = [];

//Condicional para mostrar o no el aviso de cookies
if(!localStorage.getItem('accepted-cookies')){
	avisoCookies.classList.add('activo');
	fondoAvisoCookies.classList.add('activo');
} else {
	dataLayer.push({'event': 'accepted-cookies'});
}

//Funcionamiento del boton aceptar cookies
botonAceptarCookies.addEventListener('click', () => {
	//Remueve el estado activo del aviso de cookies mediante su clase css
	avisoCookies.classList.remove('activo');
	fondoAvisoCookies.classList.remove('activo');

	//Almacena el estado true en el localstorage del navegador en caso de aceptar las cookies para no tener que mostrarlo otra vez
	localStorage.setItem('accepted-cookies', true);

	//guarda el evento activador dentro de la lista para enviarlo a la API google tag manager y ejecutar el codigo de allá
	dataLayer.push({'event': 'accepted-cookies'});
});

botonRechazarCookies.addEventListener('click', () => {
	//Remueve el estado activo del aviso de cookies mediante su clase css
	avisoCookies.classList.remove('activo');
	fondoAvisoCookies.classList.remove('activo');
});