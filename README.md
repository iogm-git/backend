<a name="readme-top"></a>

[![LinkedIn][linkedin-badge]][linkedin-url]

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
 
Berikut ini beberapa bagian dari website : 

IOGM - Blog adalah website profile saya. Hanya menampilkan informasi yang ingin saya bagikan pada saat pertama kali belajar membuat website.

IOGM - Shop adalah aplikasi penjualan sederhana. Menjual landing page yang dibangun menggunakan HTML, CSS, Javascript. Jadi ketika sudah berhasil transaksi, maka member yang sudah bayar bisa mendownload zip yang berisi file tersebut.

IOGM - Blog adalah aplikasi pembelajaran online tentang programming. Pemberi materi akan menerima pendapatan setelah penerima materi resmi membeli materi tersebut. Dan penerima materi akan mendapatkan sertifikat jika sudah menyelesaikan pembelajaran.

Ketika project ini dijalankan, ada beberapa bagian dari aplikasi tidak berfungsi, berikut diantaranya :
  - IOGM - Shop : 
    - view dari landing page dan file zip yang berisi landing page untuk di download. Karena saya tidak ingin mengupload isi dari apa yang dijual aplikasi ini.
  - IOGM - Code : 
    - seeder courses, sections, dan lessons yang berisi materi pembelajaran.  

Untuk lebih jelasnya silahkan buka .gitignore

### Feature
    IOGM :
    
    - Autentikasi : 
      - Frontend = Google (mengambil email kemudian tetap di proses login menggunakan jwt)
      - Backend = Jwt
    
    - Member :
      - Memilih pendaftaran/keperluan login untuk shop atau code

1. IOGM - Shop :
    - Mengelola informasi mengengai profile diri seperti username,name, foto, validasi email menggunakan otp, transaksi.
    - User bisa mencoba/melihat view tampilan seluruh landing page, dengan syarat sudah terdaftar sebagai member.
    - Menambahkan landing page ke dalam daftar favorite dan keranjang.
    - Melakukan transaksi, jika sudah memvalidasi email.
    - Menerima email untuk validasi kode otp.
    - Mendownload history transaksi format pdf.
    - Mencari, memfilter website berdasarkan kategori, type, dan nama.
    - Metode pembayaran menggunakan Tripay.

2. IOGM - Code (dalam pengembangan) :
    - General :
      - Forum diskusi : 
        - Bisa diakses jika sudah terdaftar sebagai member seperti instructor dan student
        - Berfungsi untuk melakukan tanya jawab antara instructor dan student
        - Filter berdasarkan course
    - Instructor :
      - Personalize :
        - Memperoleh informasi course yang telah direview/diikuti oleh student
        - Monitoring transaksi, pendapatan, dan lainnya
        - Menjawab berbagai pertanyaan dari student
      - Studies :
        - Monitoring/mengelola/menambahkan materi yang diberikan
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

[![Laravel][laravel-badge]][laravel-url]
[![Mysql][mysql-badge]][mysql-url]
[![Pgsql][pgsql-badge]][pgsql-url]
[![JWT][jwt-badge]][jwt-url]
[![Dompdf][dompdf-badge]][dompdf-url]

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

Silahkan bisa test di postman, dengan menyesuaikai url pada folder `routes`

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTACT -->

## Contact

Ilham Rahmat Akbar - ilhamrhmtkbr@gmail.com

<p align="right">(<a href="#readme-top">back to top</a>)</p>

[laravel-badge]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[laravel-url]: https://laravel.com
[mysql-badge]: https://img.shields.io/badge/-MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white
[mysql-url]: https://www.mysql.com/
[pgsql-badge]: https://img.shields.io/badge/PostgreSQL-336791?style=for-the-badge&logo=postgresql&logoColor=white
[pgsql-url]: https://www.postgresql.org/
[jwt-badge]: https://img.shields.io/badge/-JWT-000000?style=for-the-badge&logo=JSON%20Web%20Tokens&logoColor=white
[jwt-url]: https://jwt-auth.readthedocs.io/en/develop/laravel-installation/
[dompdf-badge]: https://img.shields.io/badge/laravel--dompdf-blue?style=for-the-badge&logo=laravel&logoColor=white
[dompdf-url]: https://github.com/barryvdh/laravel-dompdf
[linkedin-badge]: https://img.shields.io/badge/LinkedIn-Connect-blue
[linkedin-url]: https://id.linkedin.com/in/ilhamrhmtkbr
