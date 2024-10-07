document.addEventListener('DOMContentLoaded', function () {
    var carousel = document.querySelector('#carouselExampleIndicators');
    var loginForm = document.querySelector('.login-container');

    // Escuchar el evento que indica que una transición del carrusel ha terminado
    carousel.addEventListener('slid.bs.carousel', function () {
        // Agrega clase para animar el formulario
        loginForm.classList.add('login-animate');
        
        // Temporizador para eliminar la clase y permitir que la animación se ejecute de nuevo
        setTimeout(function () {
            loginForm.classList.remove('login-animate');
        }, 500); // Coincide con la duración de la transición CSS
    });
});
