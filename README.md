Berikut adalah dokumentasi lengkap dengan perbaikan yang sesuai dengan kode yang Anda kirimkan.

library-sistem - Dokumentasi Sistem
Deskripsi
Layanan ini adalah bagian dari sistem manajemen perpustakaan yang dirancang untuk memfasilitasi proses peminjaman buku. Layanan ini memungkinkan pengguna untuk meminjam buku dengan memvalidasi ketersediaan buku yang dikelola oleh layanan Book Management. Sistem ini dilengkapi dengan autentikasi berbasis token, memungkinkan hanya pengguna yang sah untuk melakukan peminjaman.

Layanan Borrow Book ini terintegrasi dengan API Book Management untuk memastikan bahwa buku yang dipinjam tersedia dan memperbarui status buku setelah proses peminjaman berhasil.

Cara Mengakses Layanan
Clone Repository:

git clone https://github.com/nichyow/library-system.git
cd library-system
Install Dependencies:

composer install
Konfigurasikan File .env: Salin file .env.example menjadi .env dan pastikan kredensial database sudah sesuai.

Jalankan Server Lokal:

php spark serve
Akses layanan di http://localhost:8080.

Endpoint API
1. Home
Endpoint: GET /
Deskripsi: Menampilkan halaman utama sistem.

2. Borrower Service
2.1 Menampilkan Daftar Peminjam
Endpoint: GET /borrowers
Deskripsi: Menampilkan daftar semua peminjam dalam sistem.

Response:

json
Copy code
{
  "status": 200,
  "borrowers": [
    {
      "id": 1,
      "name": "nico",
      "email": "nico@gmail.com",
      "phone_number": "123456789",
      "book_title": "TST",
      "borrow_date": "2025-01-01",
      "return_date": "2025-01-15"
    }
  ]
}
2.2 Menambahkan Data Peminjam
Endpoint: POST /borrowers
Deskripsi: Menambahkan data peminjam baru ke dalam sistem.

Request:

http
Copy code
POST /borrowers HTTP/1.1
Host: localhost:8080
Content-Type: application/json

{
  "name": "nico",
  "email": "nico@gmail.com",
  "phone_number": "1234567890",
  "book_title": "TST",
  "borrow_date": "2025-01-01",
  "return_date": "2025-01-15"
}
Response:

json
Copy code
{
  "status": 200,
  "message": "Borrower added successfully!"
}
2.3 Menampilkan Form Tambah Data Peminjam
Endpoint: GET /borrowers/create
Deskripsi: Menampilkan form untuk menambahkan data peminjam.

3. User Service
3.1 Register
Endpoint: POST /users/register
Deskripsi: Mendaftarkan pengguna baru ke sistem.

Request:

http
Copy code
POST /users/register HTTP/1.1
Host: localhost:8080
Content-Type: application/json

{
  "username": "newuser",
  "password": "password123"
}
Response (Sukses):

json
Copy code
{
  "status": 200,
  "message": "Registrasi berhasil. Silakan login."
}
Response (Gagal - Validasi):

json
Copy code
{
  "status": 400,
  "error": "Validation failed",
  "messages": {
    "username": "Username sudah digunakan, coba yang lain.",
    "password": "Password harus mengandung minimal 1 angka dan 1 simbol."
  }
}
3.2 Login
Endpoint: POST /users/login
Deskripsi: Login ke sistem menggunakan kredensial yang valid.

Request:

http
Copy code
POST /users/login HTTP/1.1
Host: localhost:8080
Content-Type: application/json

{
  "username": "newuser",
  "password": "password123"
}
Response (Sukses):

json
Copy code
{
  "status": 200,
  "message": "Login successful."
}
Response (Gagal - Kredensial Salah):

json
Copy code
{
  "status": 401,
  "error": "Username atau password salah."
}
3.3 Logout
Endpoint: GET /users/logout
Deskripsi: Logout dari sistem dan mengakhiri sesi pengguna.

Request:

http
Copy code
GET /users/logout HTTP/1.1
Host: localhost:8080
Response:

json
Copy code
{
  "status": 200,
  "message": "Logout successful."
}
Struktur Database
Tabel Borrowers
Field	Tipe Data	Deskripsi
id	INT	Primary Key
name	VARCHAR	Nama peminjam
email	VARCHAR	Email peminjam
phone_number	VARCHAR	Nomor telepon peminjam
book_title	VARCHAR	Judul buku yang dipinjam
borrow_date	DATE	Tanggal peminjaman
return_date	DATE	Tanggal pengembalian
Tabel Users
Field	Tipe Data	Deskripsi
id	INT	Primary Key
username	VARCHAR	Nama pengguna unik
password	VARCHAR	Kata sandi terenkripsi
Kontributor
[Nama Anda]: Pengembang Borrower & User Service