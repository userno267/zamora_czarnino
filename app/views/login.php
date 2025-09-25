<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h1>Login</h1>
    <form method="post" action="/login">
        <label>Email</label>
        <input type="email" name="email" required><br>

        <label>Password</label>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
            <div class="text-center mt-3">
    <p>Don't have an account? 
       <a href="/register" class="btn btn-link">Register here</a>
    </p>
</div>
</body>
</html>
