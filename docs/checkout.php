<?php
require 'config/config.php';
require 'config/database.php';
include 'config/functions.php';

$db = new Database();
$conn = $db->connect();
$lista_carrito = array();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

if ($productos != null) {
    $lista_carrito = array();
    // Asignar las cantidades de los productos al array de resultados
    foreach ($productos as $clave => $cantidad) {
        // Consulta SQL para obtener detalles de los productos en el carrito
        $sql = $conn->prepare("SELECT id, nombre, precio, descuento, imagen, $cantidad AS cantidad FROM Productos WHERE id=? AND activo = 1");
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
    }
    //session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>KICKS HUB</title>
    <!--CSS-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/carrito.css">
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
    <!--------PRODUCTOS DEL CARRITO-------->
    <section class="contenedor">
        <!-- Contenedor de elementos -->
        <!-- Carrito de Compras -->
        <div class="carrito" id="carrito">
            <h2>TU CARRITO</h2>

            <div class="carrito-items">
                <?php
                $total = 0;
                if ($lista_carrito == null || empty($lista_carrito)) {
                    echo '<p>Carrito vacío</p>';
                } else {
                    foreach ($lista_carrito as $producto) {
                        $_id = $producto['id'];
                        $nombre = $producto['nombre'];
                        $precio = $producto['precio'];
                        $imagen = $producto['imagen'];
                        $descuento = $producto['descuento'];

                        // Asegúrate de tener la cantidad correcta de cada producto
                        $cantidad = isset($producto['cantidad']) ? $producto['cantidad'] : 1;

                        $precio_desc = $precio - (($precio * $descuento) / 100);
                        $subtotal = $cantidad * $precio_desc;
                        $total += $subtotal;

                        $img_route = getImageRoute($imagen);
                ?>
                        <div class="carrito-item">
                            <img width="80px" src="<?php echo $img_route ?>" class="product-img" alt="">
                            <span class="carrito-item-titulo"><?php echo $nombre; ?></span>
                            <div class="carrito-item-detalles">
                                <div class="selector-cantidad">
                                    <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad; ?>" size="5" id="cantidad_<?php echo $_id; ?>" onchange="actualizarCantidad(this.value, <?php echo $_id; ?>)">
                                </div>
                                <?php if ($cantidad == 1) { ?>
                                    <span class="carrito-item-precio" id="subtotal_<?php echo $_id; ?>" name="subtotal[]">$<?php echo number_format($precio_desc, 2, '.', ','); ?></span>
                                <?php } else { ?>
                                    <span class="carrito-item-precio" id="subtotal_<?php echo $_id; ?>" name="subtotal[]">$<?php echo number_format($subtotal, 2, '.', ','); ?></span>
                                <?php } ?>
                                <span class="btn-eliminar" id="btn-elimina" onclick="deleteItem(<?php echo $_id; ?>)">
                                    <i class="fa-solid fa-trash"></i>
                                </span>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <div class="carrito-total">
                <div class="fila">
                    <strong>Tu Total</strong>
                    <span class="carrito-precio-total" id="total">$<?php echo number_format($total, 2, '.', ','); ?></span>
                </div>
                <a href="checkout.php" class="btn-pagar" onclick="buyItems()">Pagar<i class="fa-solid fa-bag-shopping"></i> </a>
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

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/cart.js"></script>
    <script src="js/script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var inputElement = document.getElementById("cantidad_<?php echo $_id; ?>");
            actualizarCantidad(inputElement.value, <?php echo $_id; ?>);
        });

        function addProducto(id, token) {
            let url = 'clases/cart.php'
            let formData = new FormData()

            formData.append('id', id)
            formData.append('token', token)
            console.log("id: " + id + " - token: " + token)

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let elemento = document.getElementById("num_cart")
                        console.log("Cantidad: " + data.numero)
                        elemento.innerHTML = data.numero
                    } else {
                        console.log("Algo salio mal: " + data.numero)
                    }
                })
        }

        function actualizarCantidad(cantidad, id) {
            let url = 'clases/update_cart.php'
            let formData = new FormData()

            formData.append('action', 'agregar')
            formData.append('id', id)
            formData.append('cantidad', cantidad)

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        let divsubtotal = document.getElementById('subtotal_' + id)
                        divsubtotal.innerHTML = data.sub

                        let total = 0.00
                        let list = document.getElementsByName('subtotal[]')
                        for (let i = 0; i < list.length; i++) {
                            total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
                        }
                        total = new Intl.NumberFormat('en-US', {
                            minimumFractionDigits: 2
                        }).format(total)

                        document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total
                    }
                })
        }

        function deleteItem(id) {

            let botonElimina = document.getElementById('btn-elimina')
            let url = 'clases/update_cart.php'
            let formData = new FormData()

            formData.append('action', 'eliminar')
            formData.append('id', id)

            fetch(url, {
                    method: 'POST',
                    body: formData,
                    mode: 'cors'
                }).then(response => response.json())
                .then(data => {
                    location.reload()
                })
        }

        function buyItems() {
            event.preventDefault(); // Evita la acción por defecto del enlace
            alert('Gracias por su compra');
            // Opcionalmente, destruye la sesión aquí si es necesario.
            // Redirige a la página de checkout después de mostrar el mensaje
            setTimeout(function() {
                window.location.href = 'index.php';
            }, 500); // Ajusta el tiempo de retraso según sea necesario
        }
    </script>
</body>

</html>