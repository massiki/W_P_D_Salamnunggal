<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Card;
use App\Models\History;
use App\Models\Image;
use App\Models\InfoKontak;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\News;
use App\Models\Penduduk;
use App\Models\Potensi;
use App\Models\Sambutan;
use App\Models\Sosmed;
use App\Models\Structure;
use App\Models\Umkm;
use App\Models\VisiMisi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'gambar' => 'https://upload.wikimedia.org/wikipedia/commons/7/7e/Circle-icons-profile.svg'
        ]);

        // News::factory(5)->create();
        $news = [
            [
                'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSl72XmBYaGA5u53TPPxLcipK93Cmp2-l7f4w&s',
                'judul' => 'RAPAT KOORDINASI KEPALA DESA SE-KECAMATAN CIBEBER DIGELAR DI AULA DESA SALAMNUNGGAL',
                'slug' => 'RAPAT-KOORDINASI-KEPALA-DESA-SE-KECAMATAN-CIBEBER-DIGELAR-DI-AULA-DESA-SALAMNUNGGAL',
                'deskripsi' => 'Cibeber, 6 Februari 2025 – Rapat Koordinasi (Rakor) Kepala Desa se-Kecamatan Cibeber berlangsung di Aula Desa Salamnunggal pada Kamis (6/2). Kegiatan ini bertujuan untuk memperkuat sinergi antar pemerintah desa dalam menjalankan berbagai program pemerintahan dan menjaga stabilitas keamanan di wilayah Kecamatan Cibeber. <br> <br> Rakor ini dipimpin oleh Camat Cibeber, Indra Sunggara, dan dihadiri oleh para kepala desa, unsur Forum Koordinasi Pimpinan Kecamatan (Forkopincam), Organisasi Perangkat Daerah (OPD), serta berbagai instansi terkait. Kehadiran para pemangku kepentingan ini diharapkan dapat memperkuat koordinasi dan kolaborasi dalam mendukung pembangunan, pelayanan kepada masyarakat, serta peningkatan keamanan di lingkungan desa. <br> <br> Dalam rapat ini, berbagai isu strategis dibahas, termasuk evaluasi program desa, peningkatan koordinasi antar pemerintah desa, serta penyelarasan kebijakan dengan pemerintah daerah. Selain itu, dibahas pula berbagai kendala yang dihadapi masing-masing desa dalam pelaksanaan program kerja, terutama terkait dengan keamanan dan ketertiban masyarakat. <br> <br> Aspek keamanan menjadi salah satu fokus utama dalam rapat ini, mengingat pentingnya menciptakan lingkungan yang kondusif bagi masyarakat. Para kepala desa bersama unsur Forkopincam membahas langkah-langkah strategis untuk meningkatkan keamanan, termasuk peningkatan peran Satuan Perlindungan Masyarakat (Satlinmas) dan optimalisasi kerja sama dengan aparat keamanan setempat. <br> <br> Selain menjadi forum koordinasi, rapat ini juga dimanfaatkan sebagai ajang berbagi pengalaman dan solusi dalam mengatasi berbagai tantangan yang dihadapi desa. Dengan adanya komitmen bersama, diharapkan Kecamatan Cibeber dapat terus berkembang dan memberikan pelayanan serta rasa aman yang lebih baik bagi masyarakatnya. <br> <br>',
                'views' => 0,
                'user_id' => 1,
            ],
            [
                'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSl72XmBYaGA5u53TPPxLcipK93Cmp2-l7f4w&s',
                'judul' => 'Monitoring dan Evaluasi TP PKK DESA SALAMNUNGGAL mengenai 10 program kerja PKK',
                'slug' => 'Monitoring-dan-Evaluasi-TP-PKK-DESA-SALAMNUNGGAL-mengenai-10-program-kerja-PKK',
                'deskripsi' => 'Salamnunggal, 8 Februari 2025 – Tim Penggerak Pemberdayaan dan Kesejahteraan Keluarga (TP PKK) Desa Salamnunggal mengadakan kegiatan monitoring dan evaluasi yang berlangsung di Aula Salamnunggal (Monev) terhadap pelaksanaan 10 Program Pokok PKK. Kegiatan ini bertujuan untuk menilai efektivitas program yang telah berjalan serta merumuskan langkah strategis untuk peningkatan kesejahteraan masyarakat. <br> <br> Evaluasi dan monitoring 10 Program Pokok PKK ini dilakukan oleh tim evaluasi dan monitoring dari PKK Kecamatan yang didampingi oleh Ibu Camat dan Bapak Camat. Kegiatan ini hanya dihadiri oleh kader PKK dan memastikan bahwa setiap program berjalan dengan baik serta memberikan manfaat nyata bagi masyarakat. Monitoring juga menjadi momen refleksi untuk melihat apa saja yang perlu diperbaiki dan dikembangkan lebih lanjut serta mempersiapkan langkah-langkah strategis untuk PKK ke depannya. <br> <br> Beberapa program unggulan yang dievaluasi dalam kegiatan ini meliputi: <br> <br> Bidang Kemasyarakatan – Program yang bertujuan untuk meningkatkan partisipasi masyarakat dalam berbagai kegiatan sosial dan gotong royong. <br> <br> Bidang Pendidikan – Program literasi dan pelatihan keterampilan bagi ibu-ibu rumah tangga untuk meningkatkan kapasitas mereka. <br> <br> Bidang Ekonomi Keluarga – Pelatihan usaha mikro, kecil, dan menengah (UMKM) bagi warga untuk meningkatkan taraf hidup keluarga. <br> <br> Bidang Kesehatan – Kampanye pola hidup sehat, posyandu, serta pencegahan stunting bagi anak-anak. <br> <br> Dalam sesi diskusi dan evaluasi, para kader PKK serta tim dari PKK Kecamatan turut memberikan masukan dan laporan terkait kendala yang dihadapi selama pelaksanaan program. <br> <br> Sebagai tindak lanjut, TP PKK Desa Salamnunggal berencana untuk memperkuat koordinasi dengan pemerintah desa serta berbagai pemangku kepentingan guna meningkatkan efektivitas program. Selain itu, peningkatan kapasitas kader PKK melalui pelatihan dan bimbingan teknis juga akan menjadi fokus utama dalam upaya pengembangan program ke depan. <br> <br> Kegiatan monitoring dan evaluasi ini diharapkan dapat memperkuat peran PKK dalam mewujudkan keluarga yang sejahtera dan mandiri di Desa Salamnunggal. Dengan sinergi dan komitmen yang kuat, program-program PKK akan terus berkembang dan memberikan dampak positif bagi masyarakat. <br> <br>',
                'views' => 0,
                'user_id' => 1,
            ],
            [
                'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSl72XmBYaGA5u53TPPxLcipK93Cmp2-l7f4w&s',
                'judul' => 'RAPAT PERENCANAAN APBDes DAN PERUBAHAN PERATURAN BUMDes DIGELAR DI DESA CIPETIR',
                'slug' => 'RAPAT-PERENCANAAN-APBDes-DAN-PERUBAHAN-PERATURAN-BUMDes-DIGELAR-DI-DESA-CIPETIR',
                'deskripsi' => 'Cibeber, 10 Februari 2025 – Pemerintah desa di Kecamatan Cibeber menggelar rapat perencanaan Anggaran Pendapatan dan Belanja Desa (APBDes) serta perubahan peraturan Badan Usaha Milik Desa (BUMDes) di Desa Cipetir. Rapat ini bertujuan untuk memastikan pengelolaan keuangan desa lebih transparan dan akuntabel serta memperkuat peran BUMDes dalam mendukung ekonomi desa. <br> <br> Rapat ini dihadiri oleh Camat Cibeber, Indra Sunggara, Sekretaris Kecamatan (Sekmat), tenaga ahli, para kepala desa, perangkat desa, Badan Permusyawaratan Desa (BPD), dan perwakilan masyarakat. Kehadiran Camat Cibeber, Sekmat, dan tenaga ahli dalam rapat ini menegaskan pentingnya koordinasi antara pemerintah kecamatan, desa, dan instansi terkait dalam menyusun kebijakan yang tepat guna bagi kemajuan desa. <br> <br> Dalam pembahasan APBDes, dilakukan evaluasi terhadap penggunaan anggaran tahun sebelumnya serta penyusunan prioritas program desa untuk tahun anggaran mendatang. Beberapa sektor utama yang menjadi perhatian dalam penyusunan anggaran ini mencakup pembangunan infrastruktur, pelayanan masyarakat, serta program pemberdayaan ekonomi berbasis potensi lokal. <br> <br> Selain itu, rapat juga membahas perubahan peraturan terkait BUMDes guna meningkatkan efektivitas dan kinerja unit usaha desa. Perubahan ini meliputi aspek tata kelola, sistem keuangan, serta strategi pengembangan usaha agar BUMDes dapat lebih berkontribusi dalam meningkatkan pendapatan desa dan kesejahteraan masyarakat. <br> <br> Rapat ini ditutup dengan kesepakatan mengenai langkah-langkah strategis yang akan diambil dalam implementasi APBDes dan pengelolaan BUMDes ke depan. Dengan adanya perencanaan yang baik serta regulasi yang lebih adaptif, diharapkan pembangunan desa semakin optimal dan memberikan dampak positif bagi masyarakat. <br> <br>',
                'views' => 0,
                'user_id' => 1,
            ],
        ];

        foreach ($news as $data) {
            News::create($data);
        }

        Sambutan::create([
            'foto' => 'https://plus.unsplash.com/premium_photo-1680363254554-d1c63ad8d33d?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'sambutan' => 'Assalamualaikum Warahmatullahi Wabarakatuh, <br> <br>
              Selamat datang di website resmi Desa Salamnunggal. Saya, selaku Kepala Desa, merasa sangat bersyukur dan
              bangga atas peluncuran website ini sebagai sarana komunikasi dan informasi bagi seluruh warga desa kita.
              <br> <br>
              Website ini merupakan wujud komitmen kami untuk meningkatkan transparansi, pelayanan publik, dan partisipasi
              masyarakat dalam pembangunan desa. Melalui platform digital ini, kami berharap dapat mempermudah akses
              informasi seputar program kerja, kegiatan, dan potensi desa kepada seluruh lapisan masyarakat. <br> <br>
              Saya mengajak seluruh warga Desa Salamnunggal untuk memanfaatkan website ini dengan sebaik-baiknya. Mari
              bersama-sama kita bangun Desa Salamnunggal menjadi desa yang maju, mandiri, dan sejahtera melalui
              pemanfaatan teknologi informasi. <br> <br>
              Terima kasih atas dukungan dan partisipasi Anda semua. Semoga Allah SWT senantiasa memberikan rahmat dan
              hidayah-Nya kepada kita semua. <br> <br>
              Wassalamualaikum Warahmatullahi Wabarakatuh. <br> <br>
              Hormat saya, <br> <br>
              Kepala Desa Salamnunggal <br> <br>
              Asep Sopandi,S.IP <br> <br>'
        ]);

        VisiMisi::create([
            'gambar' => 'https://images.unsplash.com/photo-1748500351969-91142546a971?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'visi' => 'Visi merupakan pandangan masa depan yang mencerminkan harapan serta tujuan pembangunan desa dengan
            mempertimbangkan
            potensi dan kebutuhan masyarakat. Visi Desa SALAMNUNGGAL disusun secara partisipatif, melibatkan berbagai
            pihak yang
            berkepentingan seperti pemerintah desa, BPD, tokoh agama, tokoh masyarakat, dan lembaga lainnya. Proses ini
            mempertimbangkan
            pula kondisi eksternal desa, termasuk satuan kerja wilayah di kecamatan.<br>
            Visi Desa SALAMNUNGGAL adalah: <br>

            "Sauyunan, Agamis, Unggul"',
            'misi' => 'Misi merupakan langkah-langkah strategis yang ditetapkan untuk mewujudkan visi desa. Misi ini menjadi dasar
            arah kebijakan
            dan pelaksanaan program kerja pemerintah desa. Misi Desa SALAMNUNGGAL difokuskan pada pemenuhan kebutuhan
            masyarakat, peningkatan
            kualitas hidup, dan tata kelola pemerintahan yang profesional.
            Misi Desa SALAMNUNGGAL meliputi:<br>

            1. Mendorong peningkatan kualitas pendidikan. <br>
            2. Meningkatkan pola hidup sehat masyarakat. <br>
            3. Meningkatkan perekonomian masyarakat.<br>
            4. Membangun sarana dan prasarana disegala bidang.<br>
            5. Meningkatkan sumber daya manusia dalam segala bidang.<br>
            6. Mengedepankan asas musyawarah untuk mencapai mufakat.<br>
            7. Menyelenggarakan urusan pemerintah secara profesional, tertib administrasi dan tertib keuangan.<br>
            8. Meningkatakan partisipasi masyarakat dalam segala bidang pembangunan.<br>
            9. Meningkatkan tingkat keimanan dan ketaqwaan.<br>
            10. Meningkatkan kesadaran hukum dan budi pekerti mulia.<br>'
        ]);

        $images = [
            [
                'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQzKpx7NHBCrDINgymRgvGXS-3KRq-drFk0jcslHPnqQXW_uEC9TgJIPYvqfXljvgeQuM&usqp=CAU',
                'kategori' => 'logo',
            ],
            [
                'gambar' => 'https://plus.unsplash.com/premium_photo-1749666992906-f059c7d88139?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'kategori' => 'struktur',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1709457454773-f40edd5e42a4?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGRlc2F8ZW58MHx8MHx8fDA%3D',
                'kategori' => 'banner',
            ],
            [
                'gambar' => 'https://plus.unsplash.com/premium_photo-1676240734590-1a38c51cee91?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'kategori' => 'banner',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1748499429963-85c58cb2b95e?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'kategori' => 'galeri',
            ],
            [
                'gambar' => 'https://plus.unsplash.com/premium_photo-1749200412744-df6cf06f0496?q=80&w=2065&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'kategori' => 'galeri',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1748679979638-e02b2df71540?q=80&w=2064&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'kategori' => 'galeri',
            ],
        ];

        foreach ($images as $image) {
            Image::create($image);
        }

        $structures = [
            [
                'gambar' => 'https://images.unsplash.com/photo-1748723594339-46dc3e25e329?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'nama' => 'ASEP SOPANDI S.IP',
                'jabatan' => 'KEPALA DESA SALAMNUNGGAL',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1748723594339-46dc3e25e329?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'nama' => 'WILDAN HADIAN',
                'jabatan' => 'SEKRETARIS DESA',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1748723594339-46dc3e25e329?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'nama' => 'DEDE RUKMANA',
                'jabatan' => 'KEPALA URUSAN PERENCANAAN',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1748723594339-46dc3e25e329?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'nama' => 'YANTI YULIANA S.Pd',
                'jabatan' => 'KEPALA URUSAN TATA USAHA DAN UMUM',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1748723594339-46dc3e25e329?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'nama' => 'IYUS EKAWATI',
                'jabatan' => 'KEPALA URUSAN KEUANGAN',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1748723594339-46dc3e25e329?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'nama' => 'DERI RUSTANDI',
                'jabatan' => 'KEPALA SEKSI PEMERINTAHAN',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1748723594339-46dc3e25e329?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'nama' => 'LATIP S.Pd',
                'jabatan' => 'KEPALA SEKSI KESEJAHTRAAN',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1748723594339-46dc3e25e329?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'nama' => 'DEDE KUSWENDI',
                'jabatan' => 'KEPALA SEKSI PELAYANAN UMUM',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1748723594339-46dc3e25e329?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'nama' => 'MADRIS',
                'jabatan' => 'KEPALA DUSUN 1 DAYEUH KOLOT',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1748723594339-46dc3e25e329?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'nama' => 'HASAN EDI SUPYANDI',
                'jabatan' => 'KEPALA DUSUN 2 NUNGGAL',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1748723594339-46dc3e25e329?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'nama' => 'ENCEP KODIR',
                'jabatan' => 'KEPALA DUSUN 3 BOJONG',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1748723594339-46dc3e25e329?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'nama' => 'ELI SUSILAWATI',
                'jabatan' => 'STAFF',
                'whatsapp' => '085871768572',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1748723594339-46dc3e25e329?q=80&w=2080&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'nama' => 'RUSMANA',
                'jabatan' => 'DRIVER',
            ],
        ];

        foreach ($structures as $structure) {
            Structure::create($structure);
        }

        $umkm = [
            // [
            //     'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
            //     'nama_pemilik' => 'Yeni',
            //     'jenis_umkm' => 'Kue ulang tahun dan pengantin',
            //     'harga' => 0,
            //     'alamat' => 'Kp. Ciputat Rt. 01/02',
            //     'no_whatsapp' => '085723987797',
            // ],
            [
                'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
                'nama_pemilik' => 'Ujang Karna',
                'jenis_umkm' => 'Anyaman',
                'harga' => 0,
                'alamat' => 'Kp. Pasir Mara Rt. 02/06',
            ],
            [
                'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
                'nama_pemilik' => 'Ai Yeyet',
                'jenis_umkm' => 'Bakeri (kueh basah dan kering)',
                'harga' => 0,
                'alamat' => 'Kp. Ciputat Rt. 04/02',
                'instagram' => 'https://www.instagram.com/cake_aycookies/',
                'no_whatsapp' => '08170856477',
            ],
            // [
            //     'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
            //     'nama_pemilik' => 'Ujang Miptah',
            //     'jenis_umkm' => 'Keripik Lantak',
            //     'harga' => 0,
            //     'alamat' => 'Kp. Cigandasuta Rt. 02/03',
            //     'no_whatsapp' => '083898662410',
            // ],
            // [
            //     'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
            //     'nama_pemilik' => 'Yani',
            //     'jenis_umkm' => 'Anyaman',
            //     'harga' => 0,
            //     'alamat' => 'Kp. Rawa Badak Rt. 04/03',
            // ],
            // [
            //     'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
            //     'nama_pemilik' => 'Lilis Mulyati',
            //     'jenis_umkm' => 'Kue',
            //     'harga' => 0,
            //     'alamat' => 'Kp. Ciputat Rt. 01/02',
            // ],
            // [
            //     'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
            //     'nama_pemilik' => 'Dadan',
            //     'jenis_umkm' => 'Konveksi',
            //     'harga' => 0,
            //     'alamat' => 'Kp. Parakan Rt. 03/05',
            //     'no_whatsapp' => '085624200904',
            // ],
            // [
            //     'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
            //     'nama_pemilik' => 'Yana',
            //     'jenis_umkm' => 'Konveksi',
            //     'harga' => 0,
            //     'alamat' => 'Kp. Parakan Rt. 03/05',
            // ],
            // [
            //     'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
            //     'nama_pemilik' => 'Sunandang',
            //     'jenis_umkm' => 'Konveksi',
            //     'harga' => 0,
            //     'alamat' => 'Kp. Ciputat Rt. 01/02',
            // ],
            // [
            //     'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
            //     'nama_pemilik' => 'Hj. Parida Marisa',
            //     'jenis_umkm' => 'Kue Basah',
            //     'harga' => 0,
            //     'alamat' => 'Kp. Ciputat Rt. 01/02',
            //     'no_whatsapp' => '085720080037',
            // ],
            // [
            //     'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
            //     'nama_pemilik' => 'Kokom Komsriyah',
            //     'jenis_umkm' => 'Pasakan/Kikil',
            //     'harga' => 0,
            //     'alamat' => 'Kp. Pajagan Rt. 02/02',
            //     'no_whatsapp' => '085974780298',
            // ],
            // [
            //     'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
            //     'nama_pemilik' => 'Hermanita',
            //     'jenis_umkm' => 'Catring dan Aneka Snack',
            //     'harga' => 0,
            //     'alamat' => 'Kp. Parakan Rt. 03/05',
            //     'no_whatsapp' => '085860009129',
            // ],
            // [
            //     'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
            //     'nama_pemilik' => 'Endang Abdul Muiz',
            //     'jenis_umkm' => 'Mainan Anak-anak',
            //     'harga' => 0,
            //     'alamat' => 'Kp. Pasir Ranji Rt. 02/05',
            //     'no_whatsapp' => '081563256431',
            // ],
            // [
            //     'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
            //     'nama_pemilik' => 'Dedih',
            //     'jenis_umkm' => 'Bakso dan Mie Ayam',
            //     'harga' => 0,
            //     'alamat' => 'Kp. Pajagan Rt. 02/02',
            //     'no_whatsapp' => '081385509143',
            // ],
            // [
            //     'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
            //     'nama_pemilik' => 'Yani Nurlatifah',
            //     'jenis_umkm' => 'Mie Ayam Berkah',
            //     'harga' => 0,
            //     'alamat' => 'Kp. Pajagan Rt. 02/02',
            //     'no_whatsapp' => '082121029688',
            // ],
            // [
            //     'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
            //     'nama_pemilik' => 'Iis Amalia',
            //     'jenis_umkm' => 'Sale Pisang',
            //     'harga' => 0,
            //     'alamat' => 'Kp. Bojong Rt. 02/03',
            // ],
            // [
            //     'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
            //     'nama_pemilik' => 'Ai Sumianti',
            //     'jenis_umkm' => 'Manisan Padalarang',
            //     'harga' => 0,
            //     'alamat' => 'Kp. Pajagan RT. 03/02',
            //     'no_whatsapp' => '082312994125',
            // ],
            // [
            //     'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
            //     'nama_pemilik' => 'Dani',
            //     'jenis_umkm' => 'Bubur Ayam, Mie Ayam',
            //     'harga' => 0,
            //     'alamat' => 'Kp. Pajagan RT. 03/02',
            //     'no_whatsapp' => '085189501859',
            // ],
            // [
            //     'gambar' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR17kmEv_f1pezInHn9gLFileA_QNTpAx7_wg&s',
            //     'nama_pemilik' => 'Iwan Solehudin',
            //     'jenis_umkm' => 'Pakaian Jadi',
            //     'harga' => 0,
            //     'alamat' => 'Kp. Pajagan RT. 03/02',
            //     'no_whatsapp' => '083817204667',
            // ],
        ];

        foreach ($umkm as $data) {
            Umkm::create($data);
        }

        $potensi = [
            [
                'gambar' => 'https://images.unsplash.com/photo-1626015109083-fc2c8382fc8e?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'judul' => 'Pertanian Sawah',
                'deskripsi' => 'Desa Salamnunggal memiliki lahan sawah yang sangat banyak, setiah sawah mengandalkan air dari turunnya air hujan. Mayoritas warga desa bekerja sebagai petani padi',
            ],
            [
                'gambar' => 'https://kebunpintar.id/blog/wp-content/uploads/2022/03/hydroponics-vegetable-2021-09-02-14-59-39-utc-1-scaled.jpg',
                'judul' => 'Hidroponik',
                'deskripsi' => 'Desa Salamnunggal juga mengembangkan pertanian hidroponik yang letaknya di belakang desa salamnunggal.',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1622103339621-be6b40b1d4b2?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'judul' => 'Jembatan Sakura',
                'deskripsi' => 'Jembatan Sakura desa salamnunggal, jembatan ini membantu untuk jalan pintas antar desa.',
            ],
        ];

        foreach ($potensi as $data) {
            Potensi::create($data);
        }

        $sosmed = [
            [
                'icon' => '<i class="fab fa-facebook-f"></i>',
                'type' => 'url',
                'nama' => 'Facebook',
            ],
            [
                'icon' => '<i class="fab fa-twitter"></i>',
                'type' => 'url',
                'nama' => 'Twitter',
            ],
            [
                'icon' => '<i class="fab fa-instagram"></i>',
                'type' => 'url',
                'nama' => 'Instagram',
            ],
            [
                'icon' => '<i class="fab fa-youtube"></i>',
                'type' => 'url',
                'nama' => 'Youtube',
            ],
            [
                'icon' => '<i class="fab fa-whatsapp"></i>',
                'type' => 'phone',
                'nama' => 'Whatsapp',
            ],
        ];

        foreach ($sosmed as $data) {
            Sosmed::create($data);
        }

        $infoKontak = [
            [
                'icon' => '<i class="fas fa-map-marker-alt"></i>',
                'nama' => 'Address',
                'informasi' => 'Jln. Lembur Tengah KM 11 Desa Salamnunggal Cibeber - Cianjur',
            ],
            [
                'icon' => '<i class="fas fa-envelope"></i>',
                'nama' => 'Email',
                'informasi' => 'salamnunggal@gmail.com',
            ],
            [
                'icon' => '<i class="fas fa-phone"></i>',
                'nama' => 'Phone',
                'informasi' => '+44-20-7328-4499',
            ],
        ];

        foreach ($infoKontak as $data) {
            InfoKontak::create($data);
        }

        Penduduk::create([
            'jumlah_penduduk' => 6106,
            'jumlah_rt' => 23,
            'jumlah_rw' => 6,
            'jumlah_dusun' => 3,
        ]);

        $histories = [
            [
                'gambar' => 'https://images.unsplash.com/photo-1743596259979-7c0d026abdcd?q=80&w=688&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'nama' => 'E. LUKMANUL HAKIM, S.IP',
                'periode_awal' => '2001',
                'periode_akhir' => '2009',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1743596259979-7c0d026abdcd?q=80&w=688&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'nama' => 'PARID S.Pd.I, MM',
                'periode_awal' => '2009',
                'periode_akhir' => '2015',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1743596259979-7c0d026abdcd?q=80&w=688&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'nama' => 'ENDANG',
                'periode_awal' => '2016',
                'periode_akhir' => '2022',
            ],
            [
                'gambar' => 'https://images.unsplash.com/photo-1743596259979-7c0d026abdcd?q=80&w=688&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'nama' => 'ASEP SOPANDI S.IP',
                'periode_awal' => '2023',
                'periode_akhir' => 'SEKARANG',
            ],
        ];

        foreach ($histories as $data) {
            History::create($data);
        }

        $cards = [
            [
                'icon' => '<i class="fas fa-users"></i>',
                'nama' => 'Layanan Publik',
                'link' => '#',
            ],
            [
                'icon' => '<i class="fas fa-store"></i>',
                'nama' => 'UMKM & Produk Local',
                'link' => '/informasi/produk-umkm',
            ],
            [
                'icon' => '<i class="fas fa-lightbulb"></i>',
                'nama' => 'Potensi Desa',
                'link' => '/informasi/potensi',
            ],
            [
                'icon' => '<i class="fas fa-newspaper"></i>',
                'nama' => 'Berita Desa',
                'link' => "/berita",
            ],
        ];

        foreach ($cards as $data) {
            Card::create($data);
        }
    }
}
