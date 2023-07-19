## About Application

Application Safety Management

## User Example

**ADMIN**
username : 1
password : admin

**USER**
username : 222
password : 123

## Tools & Library 

- Laravel 9.45.
- PHP 8.0|8.0^

## HOW TO INSTALL 

- **GIT CLONE REPO -- git clone https://github.com/rizkanfirmansyah/safety-management**
    Tempat source code
- **INSTALL DEPENDENCIES -- composer install && update / composer install --force**
    Library & Third Party pendukung aplikasi
- **INSTALL DEPENDENCIES -- composer dump-autoload**
    Library & Third Party pendukung aplikasi
- **MAKE ENVIRONMENT APPS -- .env.example to .env**
    Lingkungan aplikasi yang dibutuhkan, perubahan seperti DATABASE, CONNECTION, atau additional rules
- **GENERATE CODE ENVIRONTMENT -- php artisan key:generate**
    Unique Key yang dibutuhkan environtment
- **MIGRASI DATABASE -- php artisan migrate**
    Table & FIeld yang dibutuhkan aplikasi untuk memenuhi syarat pertukaran data
- **STORAGE LINK -- php artisan storage:link**
    Untuk menghubungkan data file dengan data yang telah di Upload
- **(optional)RESTORE DATABASE -- restoren manual. db in _DATA/db**
    Restore yang table sudah terisikan data-data pendukung

## STRUCTURE FOLDERS

- **app**: Folder ini berisi kode aplikasi inti, termasuk model, kontroler, dan logika bisnis lainnya.
    - **Controllers**: Folder app/Http/Controllers berisi file-file kontroler. Kontroler bertanggung jawab untuk menerima permintaan HTTP dari pengguna dan mengatur logika bisnis, memanipulasi data, serta merespons dengan tampilan atau data yang sesuai. Kontroler biasanya berisi metode-metode yang sesuai dengan tindakan (action) yang dilakukan pada aplikasi.
    - **Models**: Folder app/Models (atau app/ jika versi Laravel sebelum 8.x) berisi file-file model. Model mewakili entitas atau objek dalam aplikasi dan digunakan untuk berinteraksi dengan database. Model Laravel umumnya terkait dengan tabel dalam basis data, dan mereka menyediakan metode-metode yang memudahkan operasi seperti pembuatan, pembacaan, pembaruan, dan penghapusan data.
- **config**: Folder ini berisi file konfigurasi aplikasi seperti pengaturan database, pengaturan cache, dan pengaturan lainnya.
- **database**: Folder ini berisi file-file terkait database seperti migrasi, seeders, dan factory.
    - **Migrations**: Folder database/migrations berisi file-file migrasi. Migrasi adalah cara untuk mengelola perubahan skema basis data dengan kode. File migrasi Laravel berisi instruksi untuk membuat, mengubah, atau menghapus tabel dan kolom pada basis data. Migrasi memungkinkan pengembang untuk menjaga konsistensi struktur basis data saat melakukan pembaruan pada kode aplikasi.
- **public**: Folder ini berisi file yang dapat diakses secara publik oleh web server seperti file CSS, JavaScript, dan file gambar.
- **resources**: Folder ini berisi sumber daya aplikasi seperti template view, file bahasa, dan file aset seperti gambar, file SCSS, dan file JavaScript yang akan dikompilasi.
    - **Views**: Folder resources/views berisi file-file tampilan (view) aplikasi. Tampilan adalah bagian dari aplikasi yang menampilkan informasi kepada pengguna melalui HTML, dan mungkin juga menggunakan logika template dan sintaksis yang disediakan oleh Laravel seperti Blade templating engine. File-file tampilan ini biasanya berisi markup HTML yang diisi dengan data dari kontroler sebelum ditampilkan ke pengguna.
- **routes**: Folder ini berisi file-file rute (routes) yang menentukan bagaimana aplikasi menangani permintaan HTTP.
    - **routes/web.php**: File routes/web.php berisi definisi rute untuk permintaan HTTP yang ditujukan ke aplikasi web. Di dalam file ini, Anda dapat menentukan rute-rute yang melayani permintaan GET, POST, PUT, DELETE, dan lainnya. Rute-rute ini mengarahkan permintaan ke metode-metode pada kontroler yang sesuai.
- **storage**: Folder ini berisi file-file yang dihasilkan oleh aplikasi seperti file log, file sesi, file cache, dan file lain yang dihasilkan saat aplikasi berjalan.
- **tests**: Folder ini berisi file-file tes untuk menguji aplikasi.

