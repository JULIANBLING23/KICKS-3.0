<?php
require 'config/config.php';
require 'config/database.php';
include 'config/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>KICKS HUB</title>
    <!--CSS-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!--Fuentes de letra-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Iconos-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <!-------BARRA DE ANUNCIO------->
    <div class="announcement-bar" role="region" aria-label="Announcement">
        <div class="page-width">
            <p class="announcement-bar__message center h5">
            <p id="emailDisplay">We offer WORLDWIDE shipping!</p>
            </p>
        </div>
    </div>
    <!--------CEBECERA-------->
    <header>
        <a href="#" class="logo"><img src="images/logo.png" alt="Logo tienda"></a>
        <nav class="navmenu">
            <a href="index.php">Inicio</a>
            <a href="offers.php">Ofertas</a>
            <a href="policies.php">Políticas</a>
            <a href="contact.php">Contactenos</a>
        </nav>
        <div class="nav-icon">
            <i class='login-btn bx bx-user' id="user-icon"></i>
            <a href="checkout.php">
                <i class='bx bx-cart' id="cart-icon">
                    <span id="num_cart" class="cart-num"><?php echo $num_cart ?></span>
                </i>
            </a>
        </div>
    </header>
    <!--------LOGIN FORM-------->
    <div class="blur-bg-overlay"></div>
    <div class="account-form">
        <i class='close-btn bx bx-x'></i>
        <div class="form-box login">
            <div class="form-details">
                <h2>Bienvenido de vuelta</h2>
                <p>Por favor iniciar sesión</p>
            </div>
            <div class="form-content">
                <h2>LOGIN</h2>
                <form id="loginForm" action="#">
                    <div class="input-field">
                        <input type="text" id="emailInput" placeholder="Correo electrónico">
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="Contraseña" required>
                    </div>
                    <a href="#" class="forgot-pass">¿Olvidaste la contraseña?</a>
                    <button type="submit">Iniciar Sesión</button>
                </form>
                <div class="bottom-link">
                    ¿No tienes cuenta aún?
                    <a href="#" id="signup-link">Registrarse</a>
                </div>
            </div>
        </div>
        <div class="form-box signup">
            <div class="form-details">
                <h2>Crea una cuenta</h2>
                <p>Para ser parte de nuestra comunidad, por favor ingrese sus datos</p>
            </div>
            <div class="form-content">
                <h2>REGISTRARSE</h2>
                <form action="#">
                    <div class="input-field">
                        <input type="text" placeholder="Correo electrónico">
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="Contraseña" required>
                    </div>
                    <div class="input-field">
                        <input type="password" placeholder="Confirmar contraseña" required>
                    </div>
                    <div class="policy-text">
                        <input type="checkbox" id="policy">
                        <label for="policy">
                            Estoy de acuerdo con los
                            <a href="#">terminos y condiciones</a>
                        </label>
                    </div>
                    <button type="submit">Registrarse</button>
                </form>
                <div class="bottom-link">
                    ¿Ya tienes una cuenta?
                    <a href="#" id="login-link">Inicia sesión</a>
                </div>
            </div>
        </div>
    </div>
    <!----------CONTACTO----------->
    <section class="contact-message">
        <div class="contact-form">
            <form action="#">
                <h1>Contáctenos</h1>
                <div class="flex-container">
                    <div class="flex-row">
                        <input class="text-box" type="text" placeholder="Nombre" required>
                        <input class="text-box" type="email" placeholder="Correo" required>
                    </div>
                    <div class="flex-row">
                        <input class="text-box" type="text" placeholder="Número telefónico" required>
                    </div>
                    <div class="flex-row">
                        <textarea class="text-box" rows="5" placeholder="Comentarios" required></textarea>
                    </div>
                    <div class="flex-row">
                        <input type="submit" class="send-btn">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--------REDES SOCIALES-------->
    <section class="contact">
        <div class="contact-info">
            <h4>Quick links</h4>
        </div>
        <div class="contact-info">
            <nav class="navmenu">
                <a href="index.php">Inicio</a>
                <a href="offers.php">Ofertas</a>
                <a href="policies.php">Políticas</a>
                <a href="contact.php">Contactenos</a>
            </nav>
        </div>
        <div class="contact-info">
            <div class="social-info">
                <div class="input-email">
                    <h4>Suscribe to Email:</h4>
                    <input type="email" placeholder="Email">
                </div>
                <div class="social-icon">
                    <a href="#"></a><i class='bx bxl-facebook-circle'></i>
                    <a href="#"></a><i class='bx bxl-twitter'></i>
                    <a href="#"></a><i class='bx bxl-instagram'></i>
                    <a href="#"></a><i class='bx bxl-youtube'></i>
                </div>
            </div>
        </div>
    </section>

    <!--TEXTO FINAL-->
    <div class="end-text">
        <p>Copyright © @2024 Todos los derechos reservados</p>
    </div>
    <script src="js/script.js"></script>
    <script src="js/cart.js"></script>
</body>