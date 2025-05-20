document.getElementById("loginForm").addEventListener("submit", function (event) {
  event.preventDefault(); // Stop form from submitting the traditional way

  const username = document.getElementById("username").value.trim();
  const password = document.getElementById("password").value.trim();

  if (username && password) {
    // Allow any non-empty username/password
    alert("Login successful!");
    window.location.href = "home.html"; // Redirect to another page
  } else {
    alert("Please enter both username and password.");
  }
});

function togglePassword() {
  const passwordField = document.getElementById("password");
  passwordField.type = passwordField.type === "password" ? "text" : "password";
}
