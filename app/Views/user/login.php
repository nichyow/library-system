<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <div class="container">
        <h1>Login User</h1>
        <a href="/" class="arrow-back">
            <img src="/arrow.png" alt="Back to Home">
        </a>
        <?php if (session()->has('error')): ?>
            <div class="alert alert-danger">
                <?= session('error') ?>
            </div>
        <?php endif; ?>

        <!-- Form Login -->
        <form method="post" action="/users/login" class="form">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" value="<?= old('username') ?>">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">

            <button class="btn" type="submit">Login</button>
        </form>

        <div class="nav-links">
            <a href="/users/register">Don't have an account? Register here.</a>
        </div>
    </div>
</body>
</html>
