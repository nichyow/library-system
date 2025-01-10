<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrower List</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <div class="container">
        <a href="/" class="arrow-back">
            <img src="/arrow.png" alt="Back to Home">
        </a>
        <h1>Borrower List</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Book Title</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($borrowers)): ?>
                    <?php foreach ($borrowers as $borrower): ?>
                    <tr>
                        <td><?= htmlspecialchars($borrower['id']) ?></td>
                        <td><?= htmlspecialchars($borrower['name']) ?></td>
                        <td><?= htmlspecialchars($borrower['email']) ?></td>
                        <td><?= htmlspecialchars($borrower['phone_number']) ?></td>
                        <td><?= htmlspecialchars($borrower['book_title']) ?></td>
                        <td><?= htmlspecialchars($borrower['borrow_date']) ?></td>
                        <td><?= htmlspecialchars($borrower['return_date']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No borrowers found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
