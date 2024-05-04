# UTS BACK-END WEB DEVELOPMENT

Nama : I Komang Raditia Galang Buana
NIM  : 220040092
Kelas  : UG224

## DESKRIPSI
Project yang saya kembangkan ini merupakan komponen esensial dari penilaian Ujian Tengah Semester saya dalam mata kuliah Back-End Web Development. Melalui penerapan bahasa pemrograman PHP dan sistem manajemen basis data MySQL, project ini berhasil menerapkan konsep-konsep inti dari Back-End Web Development. Aspek-aspek ini mencakup pembuatan koneksi yang efisien dengan basis data, manajemen sesi yang efektif untuk pengguna, serta implementasi operasi-operasi CRUD—yang meliputi Pembuatan (Create), Pemanggilan (Read), Pembaruan (Update), dan Penghapusan (Delete) data—sebagai fondasi dari fungsionalitas aplikasi web.

### Project ini dirancang dengan struktur direktori yang terorganisir, terdiri dari tiga direktori utama yaitu config, public, dan src. Setiap direktori memiliki peran spesifik dalam arsitektur aplikasi:

### 1. Direktori config
- *database.php*: File ini merupakan inti dari konfigurasi basis data. Menggunakan PHP Data Objects (PDO), file ini menetapkan parameter penting seperti host, nama basis data, pengguna, dan kata sandi. Didesain untuk mengelola koneksi basis data secara aman, file ini juga dilengkapi dengan penanganan eksepsi untuk mengantisipasi dan menyelesaikan kesalahan koneksi.

### 2. Direktori public
- *index.php*: Sebagai pintu masuk aplikasi, file ini diakses pertama kali oleh pengunjung situs. Saat ini, file ini hanya menampilkan header "XYZ Sales API End Point", yang menandakan titik akses API untuk aplikasi penjualan XYZ.

### 3. Direktori src
#### 3.1. Sub-direktori Controller
- *CustomerController.php*: Bertugas mengatur operasi CRUD untuk data pelanggan. File ini menyediakan metode untuk mengakses, menambah, memperbarui, dan menghapus informasi pelanggan, bekerja sama dengan model Customers.php.
- *PurchaseController.php*: Mengelola operasi CRUD untuk transaksi pembelian. File ini memfasilitasi akses dan manipulasi data pembelian, berkoordinasi dengan model Purchases.php.
- *SalesController.php*: Menangani operasi CRUD untuk data penjualan. File ini memungkinkan pengambilan dan perubahan informasi penjualan, berinteraksi dengan model Sales.php.

Semua controller ini dirancang untuk menerima dan memproses permintaan HTTP sesuai dengan fungsi yang ditentukan.

#### 3.2. Sub-direktori Model
- *Customers.php*: Bertanggung jawab atas eksekusi query terkait data pelanggan, berdasarkan instruksi dari CustomerController.php, dan menghubungkan aplikasi dengan basis data pelanggan.
- *Purchases.php*: Melaksanakan query untuk data pembelian, menerima arahan dari PurchaseController.php, dan memastikan koneksi yang lancar dengan basis data pembelian.
- *Sales.php*: Menjalankan query yang berkaitan dengan data penjualan, sesuai dengan perintah dari SalesController.php, dan menjaga integrasi dengan basis data penjualan.

Setiap model ini mengimplementasikan serangkaian query untuk mengambil, memasukkan, memperbarui, dan menghapus data, memastikan aplikasi dapat berinteraksi dengan basis data secara efisien dan efektif.

## CONTOH PENGGUNAAN

### Mengambil semua pelanggan:
```php
$pdo = new PDO("mysql:host=localhost;dbname=db_xyz", 'uts', 'utsbackend');
$customerController = new CustomerController($pdo);
$allCustomers = $customerController->getAllCustomers();
```

### Menambah pelanggan baru:
```php
$newCustomerId = $customerController->addCustomer(...);
```

### Memperbarui informasi pelanggan:
```php
$success = $customerController->updateCustomer(...);
```

### Menghapus pelanggan:
```php
$success = $customerController->deleteCustomer($customerId);
```

