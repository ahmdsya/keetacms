<?php

namespace Modules\Backend\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Backend\Entities\Artikel;

class ArtikelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Artikel::create([

                'judul' => 'Microsoft Batalkan Konferensi Build 2020 karena Virus Korona',
                'slug' => 'microsoft-batalkan-konferensi-build-2020-karena-virus-korona',
                'isi' => '<p>Wabah virus korona yang terus meluas terus memengaruhi event teknologi. Kali ini giliran konferensi Build 2020&nbsp;<a href="https://www.inews.id/tag/microsoft" rel="dofollow">Microsoft</a>&nbsp;yang harus dibatalkan.</p>

<p>Microsoft Build 2020 dijadwalkan berlangsung pada 19-20 Mei di Seattle. Laporan menunjukkan Microsoft telah membatalkan konferensi pengembang langsung untuk acara tersebut.</p>

<p>Pada saat publikasi, perusahaan belum memperbarui halaman web Build 2020 dengan informasi baru mengenai pembatalan. Dalam sebuah pernyataan yang terlihat di berbagai publikasi, Microsoft mengatakan mereka mengutamakan keselamatan komunitas.</p>

<p>Microsoft juga telah menyediakan halaman web kepada komunitas untuk informasi mengenai cara mendapatkan pengembalian uang untuk semua acara yang dibatalkan atau ditunda karena virus korona.</p>

<p>&quot;Keamanan komunitas kami adalah prioritas utama. Mengingat rekomendasi keselamatan kesehatan untuk Washington State, kami akan memberikan acara Microsoft Build tahunan kami untuk pengembang sebagai acara digital,&quot; kata juru bicara Microsoft sebagaimana dikutip dari&nbsp;<em>Digital Trends,</em>&nbsp;Jumat (13/3/2020).</p>

<p>Langkah yang diambil Microsoft diharapkan dapat menyatukan ekosistem pengembang dalam format virtual baru untuk belajar, terhubung, dan kode bersama.</p>

<p>Di Build, Microsoft biasanya berbagi pengumuman dan informasi khusus pengembang dibanding produk baru. Tahun lalu, perusahaan software meluncurkan browser Edge baru berdasarkan Chromium.</p>

<p>Tidak ada informasi khusus mengenai pengumuman Build tahun ini. Tapi, Microsoft memiliki banyak hal untuk didiskusikan dengan peluncuran Windows 10X mendatang dan perangkat dual-screen-nya akhir tahun ini.</p>',
                'judul_seo' => 'Microsoft Batalkan Konferensi Build 2020 karena Virus Korona',
                'deskripsi' => 'Di Build, Microsoft biasanya berbagi pengumuman dan informasi khusus pengembang dibanding produk baru. Tahun lalu, perusahaan software meluncurkan browser Edge baru berdasarkan Chromium.',
                'keyword' => 'microsoft, korona',
                'status' => 'Aktif',
                'kategori' => 1,
                'gambar' => '/files/Microsoft.jpg',
                'author' => '1',
                'hits' => 0,
                'show_comment' => '1',
        ]);

        Artikel::create([
            'judul' => 'KAI Larang Penumpang dengan Suhu Badan 38 Derajat Celcius Naik Kereta',
                'slug' => 'kai-larang-penumpang-dengan-suhu-badan-38-derajat-celcius-naik-kereta',
                'isi' => '<p>PT Kereta Api Indonesia (Persero) atau&nbsp;<a href="https://www.inews.id/tag/kai" rel="dofollow">KAI</a>&nbsp;melarang penumpang dengan suhu badan 38 derajat celcius naik kereta api. Perseroan menempatkan petugas khusus saat mengecek boarding pass.</p>

<p>&quot;Mereka bertugas untuk mengecek suhu tubuh dari tiap calon penumpang kereta api (KA) pada saat proses boarding atau pengecekan tiket dan kartu identitas,&quot; kata Kepala Humas PT KAI Daop 1 Jakarta Eva Chairunisa melalui keterangan tertulis, Sabtu (14/3/2020).</p>

<p>Eva menjelaskan, penempatan petugas khusus tersebut merupakan respons PT KAI dalam mengantisipasi&nbsp;<a href="https://www.inews.id/tag/virus-korona" rel="dofollow">virus korona</a>. Apalagi, WHO sudah mengategorikan virus korona sebagai pandemik.</p>

<p>&quot;Jika pada saat pengecekan suhu badan ditemukan panas suhu badan calon penumpang mencapai 38 derajat celcius ke atas, dan atas rekomendasi petugas kesehatan, maka calon penumpang dilarang untuk melakukan perjalanan KA,&quot; kata Eva .</p>

<p>Dia menegaskan penumpang yang dilarang naik kereta api akan menerima kembali pembayaran secara penuh (refund). Kebijakan ini juga berlaku untuk para pendamping penumpang tersebut untuk maksimal 4 orang dalam satu kode pemesanan.</p>

<p>&quot;Jika berbeda kode booking, maka biaya tiket yang dikembalikan maksimal hanya untuk 2 orang sebagai pendamping,&quot; ucapnya.</p>

<p>Khusus di Daop 1 Jakarta, kata Eva, pemeriksaan suhu tubuh calon penumpang KA Jarak Jauh berada di area pintu cek boarding pass Stasiun Gambir dan Stasiun Senen.</p>

<p>PT KAI juga menyediakan hand sanitizer di area meja boarding pass serta menyiagakan petugas kebersihan baik di stasiun maupun selama perjalanan.</p>

<p>&quot;Tim medis yang bertugas di pos kesehatan stasiun juga telah siap membantu proses rujukan ke sejumlah rumah sakit jika dibutuhkan,&quot; kata dia.</p>

<p>Eva mengimbau penumpang untuk menggunakan masker jika sedang sakit. Penumpang KA juga diminta untuk selalu menjaga kebersihan tiap area stasiun.</p>

<p>Selain itu, PT KAI, juga turut memperhatikan kebersihan di sarana dan prasarana stasiun. Di antaranya penyemprotan disinfektan menggunakan biosanitizer ke kursi, pagar, perangkat fasilitas penumpang, hingga tiap sudut stasiun.</p>

<p>&quot;KAI melakukan pencucian interior dan eksterior kereta secara rutin setiap sebelum perjalanan dengan menggunakan bahan kimia untuk sterilisasi. Bantal yang disediakan di kereta pun selalu dalam kondisi baru tercuci bersih setiap pergantian penumpang,&quot; kata Eva.</p>',
                'judul_seo' => 'KAI Larang Penumpang dengan Suhu Badan 38 Derajat Celcius Naik Kereta',
                'deskripsi' => 'PT Kereta Api Indonesia (Persero) atau KAI melarang penumpang dengan suhu badan 38 derajat celcius naik kereta api. Perseroan menempatkan petugas khusus saat mengecek boarding pass.',
                'keyword' => 'corona, virus corona, kereta api indonesia',
                'status' => 'Aktif',
                'kategori' => 1,
                'gambar' => '/files/kereta_sin.jpg',
                'author' => '1',
                'hits' => 0,
                'show_comment' => '1',
        ]);
        Artikel::create([
            'judul' => 'Imbas Virus Korona, Mitsubishi Batalkan Peluncuran Xpander Cross di Filipina',
                'slug' => 'imbas-virus-korona-mitsubishi-batalkan-peluncuran-xpander-cross-di-filipina',
                'isi' => '<p>Setelah resmi mengaspal di Indonesia, Mitsubishi&nbsp;<a href="https://www.inews.id/tag/xpander-cross" rel="dofollow">Xpander Cross</a>&nbsp;kabarnya akan diluncurkan di Filipina. Lantaran meluasnya wabah virus korona, peluncuran tersebut dibatalkan.</p>

<p>Dikutip dari&nbsp;<em>Autoindustriya</em>, Sabtu (14/3/2020), rencananya, mobil berkapasitas 7 penumpang itu akan diluncurkan secara resmi pada Jumat 13 Maret 2020, di sebuah pusat perbelanjaan.</p>

<p>Department of Health (DOH) Filipina baru saja mengeluarkan status darurat kesehatan di wilayah tersebut. Selain acara grand launching Xpander Cross, beberapa acara besar juga dikabarkan mengalami pembatalan.</p>

<p>Di Filipina, Xpander Cross disebut menggantikan MPV Xpander varian GLS Sport dan menjadi pesaing Honda BRV. Desainnya juga tak terlalu berbeda dengan versi Indonesia, jangkung dan lebih besar dengan ground clearance mencapai 225 milimeter.</p>

<p>Sedangkan performanya dibekali dengan mesin berkode 4A91 berkapasitas 1.5L 4-silinder MIVEC yang sanggup menghasilkan tenaga sebesar 103 hp dan torsi 141 Nm. Mesin tersebut dikawinkan dengan transmisi otomatis 4-percepatan.</p>

<p>Mesin 4A91 ini merupakan peningkatan dari seri 4A9 yang ada, di mana terdapat peningkatan efisiensi bahan bakar dan kehalusan suara mesin.</p>

<p>Jika di Indonesia Mitsubishi Xpander Cross dihargai Rp270 jutaan, di pasar Filipina, SUV ini dibanderol dengan harga Rp363 jutaan.</p>',
                'judul_seo' => 'Imbas Virus Korona, Mitsubishi Batalkan Peluncuran Xpander Cross di Filipina',
                'deskripsi' => 'Department of Health (DOH) Filipina baru saja mengeluarkan status darurat kesehatan di wilayah tersebut. Selain acara grand launching Xpander Cross, beberapa acara besar juga dikabarkan mengalami pembatalan.',
                'keyword' => 'corona, virus corona, xpander',
                'status' => 'Aktif',
                'kategori' => 1,
                'gambar' => '/files/xpander2.jpg',
                'author' => '1',
                'hits' => 0,
                'show_comment' => '1',
        ]);
    }
}
