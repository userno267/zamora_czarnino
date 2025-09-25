<!DOCTYPE html>
<html>
<title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">

<div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
  <h3 class="text-center mb-4">Login</h3>
  <form method="post" action="/login">
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" id="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" id="password" name="password" class="form-control" required>
      <div class="form-check mt-2">
        <input type="checkbox" class="form-check-input" id="showPass" onclick="togglePassword()">
        <label class="form-check-label" for="showPass">Show Password</label>
      </div>
    </div>

    <button type="submit" class="btn btn-primary w-100">Login</button>

    <p class="text-center mt-3">
      Don’t have an account? <a href="/register">Register</a>
    </p>
  </form>
</div>

<script>
function togglePassword() {
  const pass = document.getElementById("password");
  pass.type = pass.type === "password" ? "text" : "password";
}
</script>

</body>

</html>
