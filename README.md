<a name="readme-top"></a>

<!-- PROJECT LOGO -->
<br />
<div align="center">
    <img src="public/logo.svg" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">IOGM</h3>

  <p align="center">
    Backend
  </p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#feature">Feature</a></li>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->

## About The Project

Isi dari project ini adalah core backend dari aplikasi IOGM. Bertujuan untuk menampilkan source code yang telah saya buat sebagai bahan pertimbangan. 
 
Berikut ini beberapa bagian dari website aplikasi IOGM : 

IOGM - User adalah aplikasi yang berguna untuk mengelola akun yang akan digunakan di seluruh bagian dari aplikasi Shop dan Code.

IOGM - Shop adalah aplikasi penjualan sederhana. Menjual landing page yang dibangun menggunakan HTML, CSS, Javascript. Jadi ketika sudah berhasil transaksi, maka member yang sudah bayar bisa mendownload zip yang berisi file tersebut.

IOGM - Code adalah aplikasi pembelajaran online tentang programming. Pemberi materi akan menerima pendapatan setelah penerima materi resmi membeli materi tersebut. Dan penerima materi akan mendapatkan sertifikat jika sudah menyelesaikan pembelajaran. (Saat ini masih mengembangkan fitur payout)

Ketika project ini dijalankan di local anda, ada beberapa bagian dari aplikasi tidak berfungsi, berikut diantaranya :
  - IOGM - Shop : 
    - view dari landing page dan file zip yang berisi landing page untuk di download. Karena saya tidak ingin mengupload isi dari apa yang dijual aplikasi ini.  

Untuk lebih jelasnya silahkan buka .gitignore

### Feature
1. IOGM - User :
    - Autentikasi : 
      - Frontend = Google (hanya mengambil email kemudian tetap di proses login menggunakan jwt)
      - Backend = Jwt
    
    - Member :
      - Mengelola informasi seperti username , name, foto
      - Menerima email yang berisi kode untuk memvalidasi email
      - Jika sudah terisi email maka bisa memilih pendaftaran/keperluan login untuk shop atau code

1. IOGM - Shop :
    - Guest :
      - Melakukan search website berdasarkan nama category, type, dan pagination
      - Melihat details dari website
      
    - Member :
      - User bisa mencoba/melihat view tampilan seluruh landing page, dengan syarat sudah terdaftar sebagai member.
      - Menambahkan landing page ke dalam daftar favorite dan keranjang.
      - Melakukan, melihat, dan mendownload transaksi.
      - Mengunduh file .zip jika sudah membayar.
      - Metode pembayaran menggunakan Tripay.

2. IOGM - Code :
    - Guest : 
      - Melihat dan search course

    - Member :
      - General :
        - Forum diskusi : 
          - Berfungsi untuk melakukan tanya jawab antara instructor dan student
          - Filter berdasarkan course
      - Instructor :
        - Personalize :
          - Memperoleh informasi course yang telah direview/diikuti oleh student
          - Monitoring transaksi, pendapatan, dan lainnya
          - Menjawab berbagai pertanyaan dari student
        - Studies :
          - Monitoring/mengelola/menambahkan/mengupdate materi yang diberikan
      - Student :
        - Memilih course yang diinginkan
        - Menyimpan course favorite
        - Melakukan Transaksi
        - Mengakses course yang diikuti
        - Melihat progress course yang dipilih
        - Menanyakan materi kepada instructor
        - Mendapatkan sertifikat jika sudah menyelesaikan course

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Built With

<table style="border-collapse: collapse;">
    <tr>
        <td style="border: none;">
            <div style="display: flex; align-items:center; gap: 15px;">
                <img src="https://laravel.com/img/logomark.min.svg" height=35>
                <img src="https://laravel.com/img/logotype.min.svg" height=35>
            </div>
        </td>
        <td style="border: none;">
            <img src="https://cdn-images-1.medium.com/v2/resize:fit:1200/1*XkmnsJ6Joa6EDFVGUw0tfA.png"
                height=35>
        </td>
    </tr>
    <tr>
        <td style="border: none;">
            <img src="https://midtrans.com/assets/img/logo.svg?v=1704870456" alt="Midtrans Logo" height=35>
        </td>
        <td style="border: none;">
            <img src="https://tripay.co.id/new-template/images/logo-dark.png" alt="Midtrans Logo" height=35>
        </td>
    </tr>
    <tr>
        <td style="border: none;">
            <img src="https://www.vectorlogo.zone/logos/postgresql/postgresql-ar21.png" height=35>
        </td>
        <td style="border: none;">
            <img src="https://www.vectorlogo.zone/logos/mysql/mysql-ar21.png" height=35>
        </td>
    </tr>
</table>

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->

## Getting Started

_Berikut ini adalah cara untuk memulai pengetesan._

1. Clone
   ```sh
   git clone https://github.com/iogm-git/iogm-backend.git
   ```
2. Update composer
   ```sh
   composer update
   ```
3. Copy .env.example and setting env
    ---
        APP_URL=http://localhost:8000
        FRONTEND_URL_USER=http://localhost:5173 # menyesuaikan cors
        FRONTEND_URL_SHOP=http://localhost:3000 # menyesuaikan cors
        FRONTEND_URL_CODE=http://localhost:9000 # menyesuaikan cors

        DB_CONNECTION=mysql
        DB_HOST=your_db_host
        DB_PORT=your_db_port
        DB_DATABASE=your_db
        DB_USERNAME=your_db_username
        DB_PASSWORD=your_db_password

        DB_CONNECTION_SECOND=pgsql
        DB_HOST_SECOND=127.0.0.1
        DB_PORT_SECOND=5432
        DB_DATABASE_SECOND=backend
        DB_USERNAME_SECOND=postgres
        DB_PASSWORD_SECOND=

        MAIL_MAILER=mysql
        MAIL_HOST=smtp.gmail.com
        MAIL_PORT=587
        MAIL_USERNAME=your_email
        MAIL_PASSWORD=your_app_password_in_email
        MAIL_ENCRYPTION=tls
        MAIL_FROM_ADDRESS=your_email
        MAIL_FROM_NAME="${APP_NAME}"

        TRIPAY_API_KEY=
        TRIPAY_PRIVATE_KEY=
        TRIPAY_MERCHANT_CODE=

        MIDTRANS_CLIENT_KEY=
        MIDTRANS_SERVER_KEY=
        MIDTRANS_IS_PRODUCTION=false
        MIDTRANS_IS_SANITIZED=true
        MIDTRANS_IS_3DS=true
    ---
4. Generate Key
   ```sh
   php artisan key:generate
   ```
5. Generate Jwt Key
   ```sh
   php artisan jwt:secret
   ```
   dan ketik 'yes' jika muncul pertanyaan

6. Jalankan migrate and seed
   ```sh
   php artisan migrate:fresh --seed
   ```
7. Testing
   ```sh
   php artisan test
   ```
<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- USAGE EXAMPLES -->

## Usage

Silahkan bisa test di postman, dengan menyesuaikai url pada folder `routes`.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTACT -->

## Contact

Ilham Rahmat Akbar - ilhamrhmtkbr@gmail.com

<p align="right">(<a href="#readme-top">back to top</a>)</p>

