const showLoginBtn = document.querySelector(".login-btn");
const hideLoginBtn = document.querySelector(".account-form .close-btn");
const accountForm = document.querySelector(".account-form");
const loginSignupLink = document.querySelectorAll(".form-box .bottom-link a");

//enviar formulario de login
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const emailInput = document.getElementById('emailInput');
    const emailDisplay = document.getElementById('emailDisplay');
    const email = emailInput.value;
    emailDisplay.textContent = `Bienvenido ${email}`;
    document.body.classList.remove("show-login");
});

//mostrar login
showLoginBtn.addEventListener("click",() =>{
    document.body.classList.toggle("show-login");
});

//cerrar login
hideLoginBtn.addEventListener("click",() => showLoginBtn.click());

//cambiar entre login y signup
loginSignupLink.forEach(link => {
    link.addEventListener("click", (e)=>{
        e.preventDefault();
        accountForm.classList[link.id === "signup-link" ? 'add' : 'remove']("show-signup");
    });
});
