<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <header class="header">
        <div class="logo">
            <h1>Library Management System</h1>
        </div>
        <div class="auth-buttons">
            <?php if (session()->get('isLoggedIn')): ?>
                <a href="/users/logout" class="btn-logout">Logout</a>
            <?php else: ?>
                <a href="/users/login" class="btn-login">Login</a>
                <a href="/users/register" class="btn-register">Register</a>
            <?php endif; ?>
        </div>
    </header>

    <main class="main">
        <div class="features">
            <?php if (session()->get('isLoggedIn')): ?>
                <a href="/borrowers" class="feature-box">
                    <h2>Manage Borrowers</h2>
                    <p>Keep track of all borrowers and their history.</p>
                </a>
                <a href="/borrowers/create" class="feature-box">
                    <h2>Borrow Books</h2>
                    <p>Quickly borrow and return books with our seamless system.</p>
                </a>
            <?php else: ?>
                <a href="/users/login" class="feature-box">
                    <h2>Manage Borrowers</h2>
                    <p>Keep track of all borrowers and their history.</p>
                </a>
                <a href="/users/login" class="feature-box">
                    <h2>Borrow Books</h2>
                    <p>Quickly borrow and return books with our seamless system.</p>
                </a>
            <?php endif; ?>
        </div>
    </main>

    <footer class="footer">
        <p>&copy; 2025 Library Management System. All rights reserved.</p>
    </footer>
</body>
</html>
