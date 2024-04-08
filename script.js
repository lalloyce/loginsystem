document.getElementById("loginForm").addEventListener("submit", function(event) {
  event.preventDefault();
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;

  fetch("login.php", {
    method: "POST",
    body: JSON.stringify({ username, password }),
    headers: {
      "Content-Type": "application/json"
    }
  })
    .then(response => response.json())
    .then(data => {
      document.getElementById("loginMessage").innerText = data.message;
      if (data.success) {
        // Redirect or perform other actions upon successful login
        window.location.href = "dashboard.html";
      }
    });
});

document.getElementById("registerForm").addEventListener("submit", function(event) {
  event.preventDefault();
  const regUsername = document.getElementById("regUsername").value;
  const regEmail = document.getElementById("regEmail").value;
  const regPassword = document.getElementById("regPassword").value;

  fetch("register.php", {
    method: "POST",
    body: JSON.stringify({ regUsername, regEmail, regPassword }),
    headers: {
      "Content-Type": "application/json"
    }
  })
    .then(response => response.json())
    .then(data => {
      document.getElementById("registerMessage").innerText = data.message;
    });
});
