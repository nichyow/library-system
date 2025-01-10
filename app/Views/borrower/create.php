<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Borrower</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <div class="container">
        <a href="/" class="arrow-back">
            <img src="/arrow.png" alt="Back to Home">
        </a>
        <h1>Borrow Book</h1>
        <form method="post" action="/borrowers" class="form">
            <!-- Input Nama Peminjam -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="Enter your email" required>

            <!-- Input Nomor Telepon -->
            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" placeholder="Enter your phone number" required>

            <!-- Input Judul Buku -->
            <label for="book_title">Book Title:</label>
            <input type="text" id="book_title" name="book_title" placeholder="Enter the book title" required>

            <!-- Input Tanggal Peminjaman -->
            <label for="borrow_date">Borrow Date:</label>
            <input type="date" id="borrow_date" name="borrow_date" required>

            <!-- Input Tanggal Pengembalian -->
            <label for="return_date">Return Date:</label>
            <input type="date" id="return_date" name="return_date" required>

            <!-- Submit Button -->
            <button class="btn" type="submit">Borrow</button>
        </form>
    </div>
</body>
</html>
