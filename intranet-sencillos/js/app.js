// ===== LOGIN =====
document.getElementById("btnLogin")?.addEventListener("click", () => {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    fetch("php/login/index.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `username=${username}&password=${password}`
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            window.location.href = "orrinagusia.html";
        } else {
            alert("Usuario o contraseña incorrectos");
        }
    })
    .catch(err => console.error(err));
});


// ===== REGISTRO =====
document.getElementById("btnRegister")?.addEventListener("click", () => {
    const username = document.getElementById("newUser").value;
    const password = document.getElementById("newPass").value;

    fetch("php/insert/index.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `username=${username}&password=${password}`
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
        if (data.success) {
            window.location.href = "index.html";
        }
    })
    .catch(err => console.error(err));
});