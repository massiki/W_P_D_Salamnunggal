## Profile Desa Salamnunggal

Website **profil desa** dan **panel admin** untuk mengelola informasi desa (berita, galeri, potensi, UMKM, struktur pemerintahan, dan lain-lain). Project ini dibangun menggunakan **Laravel 12** dengan asset bundler **Vite** dan styling **Tailwind CSS**.

### Ringkasan

- **Jenis aplikasi**: Website publik + Dashboard Admin
- **Backend**: Laravel 12 (PHP 8.2)
- **Frontend**: Blade + Vite + Tailwind CSS
- **Database default**: SQLite (bisa diganti MySQL)
- **Upload media**: disimpan ke folder `public/assets/upload/...`

### Fitur

- **Halaman Publik**
  - **Beranda**: sambutan, highlight struktur (top 5), berita terbaru, UMKM terbaru, potensi terbaru, statistik penduduk, quick cards
  - **Tentang Desa**
    - Histori (daftar kepala desa/periode)
    - Profil desa
    - Struktur pemerintahan (daftar perangkat/struktur + gambar struktur)
  - **Berita**
    - Listing berita + pencarian
    - Detail berita by slug + auto increment views
  - **Galeri**: listing galeri + pagination
  - **Informasi**
    - Potensi desa
    - Produk UMKM
  - **Kontak Kami**
    - Informasi kontak (alamat/email/telepon, dll)
    - Form saran/masukan (tersimpan ke database)

- **Panel Admin (butuh login)**
  - **Dashboard**: ringkasan jumlah data (struktur, potensi, UMKM, berita) dan statistik penduduk
  - **Manajemen konten** (CRUD sesuai modul)
    - Sambutan
    - Visi & Misi
    - Gambar struktur
    - Struktur pemerintahan
    - Histori kepala desa
    - UMKM
    - Potensi desa
    - Galeri
    - Berita (dengan slug otomatis & upload gambar)
    - Assets gambar (logo / banner / struktur / galeri)
    - Sosial media footer
    - Info kontak footer
    - Data penduduk (jumlah penduduk/RT/RW/dusun)
    - Kontak masuk (daftar saran dari warga)
    - Kartu/shortcut di beranda
    - User (update user tertentu)

### Teknologi yang digunakan

- **PHP**: ^8.2
- **Framework**: Laravel ^12
- **Build tools**: Vite ^6 + `laravel-vite-plugin`
- **Styling**: Tailwind CSS ^4 (`@tailwindcss/vite`)
- **HTTP Client**: Axios
- **Dev tooling**: `concurrently` (opsional untuk menjalankan server+queue+vite bareng)
- **Database**: SQLite (default), bisa MySQL (opsional)
- **Queue & Session**: menggunakan **database driver** (default dari `.env.example`)

### Struktur modul (database)

Beberapa tabel inti yang digunakan:

- **`news`**: berita (gambar, judul, slug, deskripsi, views, user_id)
- **`images`**: assets gambar (kategori: `logo|struktur|banner|galeri`)
- **`umkm`**: informasi UMKM (pemilik, jenis, harga, alamat, sosial, WA)
- **`potensi`**: potensi desa (gambar, judul, deskripsi)
- **`structures`**: struktur perangkat (nama, jabatan, sosial)
- **`histories`**: histori kepemimpinan (nama, periode)
- **`sambutan`**: sambutan kepala desa
- **`visi_misi`**: visi dan misi
- **`penduduk`**: statistik penduduk/RT/RW/dusun
- **`contacts`**: pesan/saran dari halaman kontak
- **`sosmed`** & **`info_kontak`**: konten footer
- **`cards`**: kartu/shortcut di beranda

### Prasyarat

- **PHP 8.2+**
- **Composer**
- **Node.js + npm**
- (Opsional) **Laragon** (Windows) atau stack PHP lain

### Instalasi & Menjalankan Project (Development)

#### 1) Install dependency

```bash
composer install
npm install
```

#### 2) Setup environment

Copy file env:

```bash
copy .env.example .env
```

Generate app key:

```bash
php artisan key:generate
```

#### 3) Database (default: SQLite)

Di `.env` defaultnya:

- `DB_CONNECTION=sqlite`
- `SESSION_DRIVER=database`
- `QUEUE_CONNECTION=database`
- `CACHE_STORE=database`

Buat file SQLite jika belum ada:

```bash
type nul > database\database.sqlite
```

Lalu migrate + seed:

```bash
php artisan migrate --seed
```

#### 4) Jalankan aplikasi

Opsi A (pisah):

```bash
php artisan serve
npm run dev
```

Opsi B (sekali jalan, server+queue+vite):

```bash
composer run dev
```

### Akun Admin (default dari seeder)

Seeder menyediakan akun admin default:

- **Email**: `admin@gmail.com`
- **Password**: `password`
- **Login URL**: `/login`

> Jika kamu tidak menjalankan `--seed`, akun default ini tidak akan dibuat.

### Routing utama

- **Publik**
  - `/` (beranda)
  - `/tentang/histori`, `/tentang/profile`, `/tentang/struktur-pemerintahan`
  - `/kontak-kami` (GET/POST)
  - `/galeri`
  - `/informasi/potensi`, `/informasi/produk-umkm`
  - `/berita` dan `/berita/{slug}`
- **Admin**
  - `/admin/dashboard`
  - Modul CRUD berada di prefix `/admin/...`

### Catatan Upload File

Beberapa modul menyimpan file upload langsung ke:

- `public/assets/upload/berita`
- `public/assets/upload/gambar`

Pastikan folder tersebut writable oleh web server.

### Build untuk Production

```bash
npm run build
```

Lalu pastikan environment production sesuai kebutuhan (APP_ENV, APP_DEBUG, APP_URL, dan konfigurasi DB).

### Lisensi

Project ini mengikuti lisensi bawaan Laravel (MIT), kecuali jika kamu menggantinya sesuai kebutuhan organisasi.
