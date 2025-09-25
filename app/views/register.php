<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
    <h1>Register</h1>
    <form method="post" action="/register">
        <label>Username</label>
        <input type="text" name="username" required><br>

        <label>Email</label>
        <input type="email" name="email" required><br>

        <label>Password</label>
        <input type="password" name="password" required><br>

        <label>Role</label>
        <select name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select><br>

        <button type="submit">Register</button>
<p>have an account? 
       <a href="/login" class="btn btn-link">Login here</a>
    </p>
</div>

    </form>
</body>
</html>
