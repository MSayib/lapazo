
## Laravel 8 Timezoning Sample Project

### Goals

Menerapkan sebuah metode atau konsep "Timezoning" secara dinamis pada client-side dan fixed pada server-side. Dengan menggunakan UNIX TIME atau EPOCH TIME sebagai standar format yang akan digunakan pada database dengan tipe data INT. Kemudian pada Client, dimanapun lokasi mengaksesnya akan menyesuaikan Local Time Zone nya masing-masing dengan menerjemahkan/convert/format data yang dikirimkan melalui server tadi, sehingga hasilnya akan berbeda pada setiap (lokasi) Client, namun akan tetap sama pada Database. Hal ini dilakukan untuk menghindari kerumitan seperti pengolahaan data date, time, datetime, timestamp, dan sejenisnya.

### Simulasi
  
  Migrate :
  

    php artisan migrate

MySQL :
SET Timezone DB ke Standard (UTC)

    SET SESSION time_zone = 'UTC'; -- Ganti 'UTC' ke 'SYSTEM' untuk kembali ke DEFAULT
**Jika timezone belum berubah coba ganti `SET SESSION` menjadi `SET GLOBAL` setelah migrate.*

  Buat dummy via Tinker:
  

    php artisan tinker
    >>> Task::factory()->create();
Query di MySQL untuk Lihat hasil:

    SELECT id, list, from_unixtime(created_at), from_unixtime(updated_at) from tasks;
Atau Buka di browser :

    php artisan serve
URL : http://localhost:8000
Valet : http://lapazo.test/

### Note

Dengan menggunakan UNIX TIME maka waktu minimumnya adalah `Thu Jan 01 1970 00:00:00` sehingga ketika ingin mengolah data dengan waktu dibawah atau lebih lawas dari waktu tersebut maka termasuk NEGATIVE.

Untuk kasus yang mungkin lebih kompleks, dapat menggunakan INT (UNIX_TIME) atau DateTimeString dari Carbon untuk melakukan querynya.

Contoh kasus :
Jika ingin menampilkan produk berdasarkan tanggal **1 Januari 2022** sampai **2 Februari 2022**, atau spesifik hingga detik bisa mengirimkan 
`'01-01-2022 00:00:00'` atau `1640970000` .

Ini memungkinkan dikarenakan pada bagian Task Model menggunakan [Mutators](https://laravel.com/docs/8.x/eloquent-mutators) dari Laravel, selengkapnya bisa membaca dokumentasi Laravel dan atau melihat project ini langsung.

*Notice: Penggunaan Mutators pada Laravel 9.x berbeda!*

This project was made only because im learning how to solve Multi-Timezone Problems with UNIX TIME.

[@ibb.ac](https://instagram.com/ibb.ac)
