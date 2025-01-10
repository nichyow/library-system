# **library-system - Dokumentasi Sistem**

## Deskripsi
Layanan ini adalah bagian dari sistem manajemen perpustakaan yang dirancang untuk memfasilitasi proses peminjaman buku. Layanan ini memungkinkan pengguna untuk meminjam buku dengan memvalidasi ketersediaan buku yang dikelola oleh layanan **Book Management**. Sistem ini dilengkapi dengan autentikasi berbasis token, sehingga hanya pengguna yang sah yang dapat melakukan peminjaman.
---
**Layanan Borrow Book** terintegrasi dengan **API Book Management** untuk memastikan bahwa buku yang dipinjam tersedia dan untuk memperbarui status buku setelah proses peminjaman berhasil.

---

## **Cara Mengakses Layanan**

1.** Clone Repository**

```bash
git clone https://github.com/nichyow/library-system.git
cd library-system
```
2. **Install Dependencies**
```bash
composer install
```
3. **Konfigurasikan File `.env `:**
Salin file .env.example menjadi .env.
Pastikan kredensial database sudah sesuai.
File env ada di folder atau berikut ini :
```bash
#--------------------------------------------------------------------
# ENVIRONMENT
#--------------------------------------------------------------------

CI_ENVIRONMENT = development

#--------------------------------------------------------------------
# APP
#--------------------------------------------------------------------

app_baseURL = 'http://localhost:8080/'

#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------

database.default.hostname = mysql-1e73275c-tst-01.h.aivencloud.com
database.default.database = defaultdb
database.default.username = avnadmin
database.default.password = AVNS__A_pxyQwbTPWRVRmbcF
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 21959
database.default.DBSocket =
database.default.sslmode = required

#--------------------------------------------------------------------
# ENCRYPTION
#--------------------------------------------------------------------

# encryption.key =

#--------------------------------------------------------------------
# SESSION
#--------------------------------------------------------------------

# session.driver = 'CodeIgniter\Session\Handlers\FileHandler'
# session.savePath = null

#--------------------------------------------------------------------
# LOGGER
#--------------------------------------------------------------------

# logger.threshold = 4
```
5. **Jalankan Server Lokal**
```bash
php spark serve
Akses layanan di http://localhost:8080.
```
---
## **Endpoint API**
### **1. Home**
**Endpoint:** GET /
**Deskripsi**: Menampilkan halaman utama sistem.
---
### **2. Borrower Service**
**2.1 Menampilkan Daftar Peminjam**
**Endpoint:** GET /borrowers
Deskripsi: Menampilkan daftar semua peminjam dalam sistem.
Contoh Response:
```bash
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
```
---
**2.2 Menambahkan Data Peminjam**
**Endpoint:** POST /borrowers
Deskripsi: Menambahkan data peminjam baru ke dalam sistem.
Contoh Request:
```bash
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
```

Contoh Response:
```bash
{
  "status": 200,
  "message": "Borrower added successfully!"
}
```
---
**2.3 Menampilkan Form Tambah Data Peminjam**
**Endpoint:** GET /borrowers/create
Deskripsi: Menampilkan form untuk menambahkan data peminjam.
3. User Service
3.1 Register
Endpoint: POST /users/register
Deskripsi: Mendaftarkan pengguna baru ke sistem.
Contoh Request:

```bash
POST /users/register HTTP/1.1
Host: localhost:8080
Content-Type: application/json

{
  "username": "newuser",
  "password": "password123"
}
```
Contoh Response (Sukses):
```bash
{
  "status": 200,
  "message": "Registrasi berhasil. Silakan login."
}
Contoh Response (Gagal - Validasi):

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
```
---

**3.2 Login**
Endpoint: POST /users/login
Deskripsi: Login ke sistem menggunakan kredensial yang valid.
Contoh Request:
```bash
POST /users/login HTTP/1.1
Host: localhost:8080
Content-Type: application/json

{
  "username": "newuser",
  "password": "password123"
}
```
Contoh Response (Sukses):
```bash
{
  "status": 200,
  "message": "Login successful."
}
```
```bash
Contoh Response (Gagal - Kredensial Salah):

json
Copy code
{
  "status": 401,
  "error": "Username atau password salah."
}
```
---
**3.3 Logout**
Endpoint: GET /users/logout
Deskripsi: Logout dari sistem dan mengakhiri sesi pengguna.
Contoh Request:
```bash
GET /users/logout HTTP/1.1
Host: localhost:8080
```
```bash
Contoh Response:

{
  "status": 200,
  "message": "Logout successful."
}
```
---
## Struktur Database

### **Tabel Borrowers**
| Field         | Tipe Data | Deskripsi                          |
|---------------|-----------|------------------------------------|
| id            | INT       | Primary Key                       |
| name          | VARCHAR   | Nama peminjam                     |
| email         | VARCHAR   | Email peminjam                    |
| phone_number  | VARCHAR   | Nomor telepon peminjam            |
| book_title    | VARCHAR   | Judul buku yang dipinjam          |
| borrow_date   | DATE      | Tanggal peminjaman                |
| return_date   | DATE      | Tanggal pengembalian              |

### **Tabel Users**
| Field         | Tipe Data | Deskripsi                          |
|---------------|-----------|------------------------------------|
| id            | INT       | Primary Key                       |
| username      | VARCHAR   | Nama pengguna unik                |
| password      | VARCHAR   | Kata sandi terenkripsi            |

---
## **URL Project & Demo Video**
- [Link Video Demo](https://drive.google.com/file/d/1EMw55HsMPsd4ShEblD8Au1vGqzS0BfHB/view?usp=sharing)
- [Link URL Project](https://pink-fly-433748.hostingersite.com)

## **Kontributor**
- **[Matthew Nicholas Gunawan]**: Peminjaman Buku
