# Panduan Deployment Website (PENTING: Baca Bagian FOTO)

Karena kita baru saja melakukan update besar pada sistem penyimpanan foto (migrasi dari folder `public/img` ke `storage/app/public`), ada beberapa langkah khusus yang **WAJIB** dilakukan saat hosting agar foto tetap muncul di Admin Panel maupun Website.

## 1. Persiapan File Code
Saat mengupload file ke hosting (misal cPanel atau VPS), pastikan struktur folder Anda benar.

### Folder `storage` (SANGAT PENTING!)
Di komputer Anda sekarang, foto-foto website berada di:
`/Users/.../advertising/storage/app/public/img/`

Saat mengupload ke hosting:
1. Pastikan Anda mengupload isi folder `storage/app/public` dari komputer lokal ke folder `storage/app/public` di hosting.
2. Jangan hanya upload folder `public` saja! Karena folder `public` (public_html) sekarang hanya berisi file index.php dan assets css/js, **bukan foto aslinya**.

## 2. Setting `.env` di Hosting
Sesuaikan file `.env` di hosting Anda.

```env
APP_NAME=TriBhakti
APP_ENV=production
APP_KEY=base64:... (copy dari lokal atau generate baru)
APP_DEBUG=false
APP_URL=https://nama-domain-anda.com  <-- WAJIB SAMA PERSIS dengan domain anda (https/http)
```

**Kenapa `APP_URL` penting?**
Karena sistem menampilkan gambar menggunakan rumus: `APP_URL` + `/storage/img/foto.jpg`.
Jika `APP_URL` salah (misal masih `http://localhost`), gambar tidak akan muncul.

## 3. Membuat Symlink (Storage Link)
Ini adalah langkah yang paling sering terlewat menyebabkan foto "broken" (404 Not Found).

Di hosting, folder `public/storage` harus menjadi "shortcut" (symlink) ke `storage/app/public`.

**Cara di cPanel (Terminal):**
1. Masuk ke Terminal cPanel.
2. Masuk ke folder root project (biasanya di luar public_html atau di dalamnya tergantung struktur).
3. Jalankan perintah:
   ```bash
   php artisan storage:link
   ```

**Cara jika tidak ada Terminal (Route Khusus):**
Jika hosting tidak menyediakan akses SSH/Terminal, Anda bisa membuat Route sementara di `routes/web.php` untuk menjalankan perintah tersebut:

```php
// Tambahkan ini di routes/web.php paling bawah
Route::get('/link-storage', function () {
    Artisan::call('storage:link');
    return 'Link storage berhasil dibuat!';
});
```
Lalu buka browser: `https://nama-domain-anda.com/link-storage`. Setelah sukses, hapus route ini demi keamanan.

## 4. Database
Karena struktur database berubah (ada kolom JSON `images` dan kolom `lokasi` dihapus):
1. **Export** database lokal Anda (yang sudah dimigrasi) ke file .sql.
2. **Import** file .sql tersebut ke database hosting (PHPMyAdmin).

Jangan mencoba menjalankan migrasi ulang dari nol di hosting jika Anda ingin data foto yang sudah ada tetap jalan. Import database lokal adalah cara paling aman.

## 5. Cek Permissions
Pastikan folder berikut memiliki permission **775** atau **777** (writable):
- `storage/` (dan semua subfoldernya)
- `bootstrap/cache/`

---

## Ringkasan Checklist Foto:
- [ ] Folder `storage/app/public` sudah terupload lengkap.
- [ ] `APP_URL` di .env sudah benar (https://domain.com).
- [ ] Symlink `public/storage` sudah dibuat (via command atau route).
- [ ] Database lokal (yang berisi path JSON) sudah diimport.

Jika Anda mengikuti langkah ini, foto di Admin Panel (Filament) dan Frontend (Website) akan tampil normal dan fitur klik zoom (Lightbox) juga akan berjalan lancar.
