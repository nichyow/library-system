<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <div class="container">
        <a href="/" class="arrow-back">
            <img src="/arrow.png" alt="Back to Home">
        </a>
        <h1>Register User</h1>
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <form method="post" action="/users/register" class="form">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" >

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">

            <button class="btn" type="submit">Register</button>
        </form>

        <div class="nav-links">
            <a href="/users/login">Already have an account? Login here.</a>
        </div>
    </div>
</body>
</html>
