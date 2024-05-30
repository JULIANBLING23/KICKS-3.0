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
    <!----------POLITICAS----------->
    <section class="policies">
        <div class="text-policies">
            <h1>Términos & políticas</h1>
            <h3>Políticas de privacidad</h3>
            <p>En KICKS, valoramos y respetamos tu privacidad. Toda la información personal que recopilamos se utiliza
                para procesar tus pedidos, mejorar tu experiencia de compra y comunicarnos contigo de manera efectiva.
                No compartiremos tus datos personales con terceros sin tu consentimiento explícito, y tomamos medidas de
                seguridad para proteger tu información contra accesos no autorizados.</p>
            <h3>Terminos y condiciondes de venta</h3>
            <p>Al realizar una compra en KICKS, aceptas nuestros términos y condiciones. Los precios de los productos
                están sujetos a cambios sin previo aviso, y los impuestos aplicables se añadirán al total de la compra.
                Aceptamos diferentes métodos de pago, y nos reservamos el derecho de rechazar pedidos o cancelar
                transacciones si detectamos información incorrecta o fraudulenta.</p>
            <h3>Política de devoluciones y cambios</h3>
            <p>Queremos que estés satisfecho con tu compra en KICKS. Si por alguna razón necesitas devolver o cambiar un
                producto, contáctanos dentro de 5 días desde la recepción del pedido. Los productos
                deben estar en su estado original y con etiquetas intactas para ser elegibles para devolución o cambio.
                Te proporcionaremos instrucciones detalladas sobre cómo proceder y resolveremos cualquier problema de
                manera rápida y eficiente.</p>
            <h3>Política de envío y entrega</h3>
            <p>Ofrecemos diferentes opciones de envío para adaptarnos a tus necesidades. Los tiempos de entrega
                estimados son [plazo de tiempo] días hábiles, aunque pueden variar según la ubicación y disponibilidad
                de productos. Nos esforzamos por garantizar la entrega puntual de tu pedido, y te mantendremos informado
                sobre el estado del envío. En caso de problemas con la entrega, contáctanos para resolverlo lo antes
                posible.</p>
            <h3>Política de garantía</h3>
            <p>Todos nuestros productos están respaldados por una garantía de calidad. Si experimentas algún problema
                con un producto dentro del período de garantía, contáctanos para recibir asistencia. La garantía cubre
                defectos de fabricación y mal funcionamiento, y trabajaremos para solucionar cualquier problema de
                manera oportuna y satisfactoria para ti.</p>
            <h3>Política de seguridad y protección de datos</h3>
            <p>En KICKS, tomamos en serio la seguridad de tus datos. Utilizamos medidas de seguridad avanzadas para
                proteger la información personal y financiera que nos proporcionas durante el proceso de compra. Nuestro
                sitio web utiliza tecnologías seguras para transacciones en línea, y mantenemos altos estándares de
                seguridad para garantizar la confidencialidad y protección de tus datos.</p>
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