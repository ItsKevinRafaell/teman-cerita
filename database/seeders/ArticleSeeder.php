<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Hidup Sehat', 'description' => 'Panduan untuk hidup sehat dan bahagia.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Tips & Trip', 'description' => 'Tips dan trik untuk gaya hidup yang lebih baik.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Diet Kesehatan', 'description' => 'Informasi tentang diet sehat dan nutrisi.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kesehatan Mental', 'description' => 'Artikel tentang kesehatan mental dan kesejahteraan emosional.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Olahraga & Kebugaran', 'description' => 'Tips olahraga dan kebugaran untuk tubuh yang bugar.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Penyakit Umum', 'description' => 'Informasi tentang penyakit umum dan penanganannya.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lingkungan', 'description' => 'Artikel tentang kesehatan lingkungan dan keberlanjutan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('article_categories')->insert($categories);

        $articles = [
            [
                'title' => 'Manfaat Olahraga Teratur untuk Kesehatan dan Kebugaran',
                'content' => '<p>Olahraga adalah bagian penting dari gaya hidup sehat dan bugar. Melakukan aktivitas fisik secara teratur tidak hanya membantu menjaga berat badan yang sehat, tetapi juga memberikan berbagai manfaat bagi kesehatan fisik dan mental.</p><p><strong>1. Meningkatkan Kesehatan Jantung</strong></p><p>Berolahraga secara teratur dapat memperkuat jantung dan meningkatkan sirkulasi darah. Aktivitas seperti berlari, bersepeda, dan berenang membantu menurunkan risiko penyakit jantung dengan meningkatkan efisiensi jantung dan mengurangi tekanan darah.</p><p><strong>2. Menguatkan Otot dan Tulang</strong></p><p>Olahraga seperti angkat beban, yoga, dan pilates membantu memperkuat otot dan tulang. Latihan beban juga dapat membantu mencegah osteoporosis dan masalah tulang lainnya, terutama pada usia lanjut.</p><p><strong>3. Meningkatkan Kesehatan Mental</strong></p><p>Selain manfaat fisik, olahraga juga memiliki dampak positif pada kesehatan mental. Aktivitas fisik memicu pelepasan endorfin, yang dikenal sebagai hormon kebahagiaan, yang dapat mengurangi stres, kecemasan, dan depresi.</p><p><strong>4. Meningkatkan Kualitas Tidur</strong></p><p>Melakukan olahraga secara teratur dapat membantu Anda tidur lebih nyenyak. Aktivitas fisik membantu mengatur pola tidur dan meningkatkan kualitas tidur, yang penting untuk kesehatan secara keseluruhan.</p><p><strong>5. Meningkatkan Energi dan Produktivitas</strong></p><p>Olahraga dapat meningkatkan tingkat energi dan produktivitas. Dengan meningkatkan aliran darah ke seluruh tubuh, termasuk otak, Anda merasa lebih segar dan bersemangat sepanjang hari.</p><p><strong>Tips untuk Memulai Program Olahraga:</strong></p><ul><li><strong>Tetapkan Tujuan</strong>: Tentukan tujuan yang realistis dan spesifik, seperti berlari sejauh 5 km dalam waktu tertentu.</li><li><strong>Pilih Aktivitas yang Anda Nikmati</strong>: Temukan jenis olahraga yang Anda sukai agar tetap termotivasi, seperti berenang, hiking, atau menari.</li><li><strong>Mulai Perlahan</strong>: Jika Anda baru memulai, mulailah dengan intensitas rendah dan tingkatkan secara bertahap.</li><li><strong>Jadwalkan Waktu</strong>: Tentukan waktu khusus dalam sehari untuk berolahraga agar menjadi kebiasaan yang konsisten.</li></ul><p>Dengan memasukkan olahraga ke dalam rutinitas harian Anda, Anda dapat merasakan manfaat kesehatan dan kebugaran yang luar biasa. Ingat, kunci utama adalah konsistensi dan menemukan aktivitas yang Anda nikmati. Jadi, mulailah bergerak hari ini untuk hidup yang lebih sehat dan bugar!</p>',
                'author_id' => 1,
                'thumbnail' => 'article-thumbnails/Gr24afU6TqwPkUlsYMVT2jCq1WcMjj-metaMDdkYzA1NDc2Mjg0MDI5YjJiZTMzZWQ1NTg3N2FlNDkuanBn-.jpg',
                'category_id' => 5,
                'is_choosen' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Mengapa Lingkungan Bersih Penting untuk Kesehatan Kita',
                'content' => '<p>Kesehatan lingkungan merupakan aspek krusial dalam menciptakan kondisi hidup yang sehat dan berkelanjutan. Lingkungan yang bersih dan aman tidak hanya mendukung kesejahteraan manusia tetapi juga melindungi berbagai bentuk kehidupan di Bumi. Berikut adalah beberapa alasan mengapa menjaga kesehatan lingkungan sangat penting bagi kesehatan kita.</p><p><strong>1. Mengurangi Risiko Penyakit</strong></p><p>Lingkungan yang tercemar, seperti udara yang kotor dan air yang terkontaminasi, dapat meningkatkan risiko berbagai penyakit. Polusi udara, misalnya, telah dikaitkan dengan penyakit pernapasan seperti asma dan bronkitis, serta gangguan kardiovaskular. Dengan menjaga lingkungan tetap bersih, kita dapat mengurangi paparan terhadap zat berbahaya dan melindungi kesehatan kita.</p><p><strong>2. Menyediakan Sumber Daya yang Sehat</strong></p><p>Sumber daya alam seperti air bersih, tanah subur, dan udara segar adalah dasar bagi kehidupan sehat. Polusi dan kerusakan lingkungan dapat mengancam ketersediaan sumber daya ini. Dengan menjaga kebersihan dan keberlanjutan lingkungan, kita memastikan bahwa generasi mendatang juga akan memiliki akses ke sumber daya yang sama.</p><p><strong>3. Meningkatkan Kualitas Hidup</strong></p><p>Lingkungan yang bersih dan hijau memiliki dampak positif pada kualitas hidup. Ruang terbuka hijau, taman, dan area alami tidak hanya menyediakan tempat untuk rekreasi tetapi juga memiliki manfaat psikologis, seperti mengurangi stres dan meningkatkan kesejahteraan mental. Kualitas udara yang baik dan akses ke lingkungan alami berkontribusi pada kesehatan fisik dan mental yang lebih baik.</p><p><strong>4. Menjaga Ekosistem dan Keanekaragaman Hayati</strong></p><p>Kesehatan lingkungan berhubungan erat dengan keberlangsungan ekosistem dan keanekaragaman hayati. Ekosistem yang sehat menyediakan berbagai layanan ekosistem, seperti pemurnian air dan pengendalian hama alami. Dengan melindungi lingkungan, kita juga melindungi spesies flora dan fauna yang berkontribusi pada keseimbangan ekosistem dan manfaatnya bagi manusia.</p><p><strong>5. Mengurangi Dampak Perubahan Iklim</strong></p><p>Kesehatan lingkungan juga berhubungan dengan perubahan iklim global. Aktivitas manusia yang merusak lingkungan, seperti deforestasi dan emisi gas rumah kaca, dapat memperburuk perubahan iklim, yang berdampak pada cuaca ekstrem dan bencana alam. Dengan mengadopsi praktik ramah lingkungan dan mengurangi jejak karbon, kita dapat membantu mengurangi dampak perubahan iklim.</p><p><strong>Langkah-Langkah untuk Menjaga Kesehatan Lingkungan:</strong></p><ul><li><strong>Kurangi, Gunakan Kembali, dan Daur Ulang</strong>: Kurangi limbah dengan meminimalkan penggunaan barang sekali pakai, menggunakan kembali barang-barang yang masih berguna, dan mendaur ulang bahan yang dapat diproses kembali.</li><li><strong>Hemat Energi dan Air</strong>: Matikan perangkat listrik yang tidak digunakan dan perbaiki kebocoran air untuk menghemat energi dan air.</li><li><strong>Tanam Pohon dan Ciptakan Ruang Hijau</strong>: Tanam pohon dan ciptakan ruang hijau di sekitar Anda untuk membantu menyerap polusi dan meningkatkan kualitas udara.</li><li><strong>Pilih Produk Ramah Lingkungan</strong>: Pilih produk yang ramah lingkungan dan berkelanjutan untuk mengurangi dampak negatif terhadap lingkungan.</li></ul><p>Dengan melakukan tindakan sederhana dan berkelanjutan, kita semua dapat berkontribusi pada kesehatan lingkungan dan, pada gilirannya, pada kesehatan kita sendiri. Lingkungan yang bersih dan sehat adalah aset berharga yang harus kita jaga demi kesejahteraan kita dan generasi mendatang.</p>',
                'author_id' => 1,
                'thumbnail' => 'article-thumbnails/Rpi17nMHbPtA7mwElpu8iT49LKnFYn-metaZWY3OWU2NTlmM2QwNzZkYzY3NWJjNDc1NjNmMTk0YzMuanBn-.jpg',
                'category_id' => 7,
                'is_choosen' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Langkah-langkah untuk Kesejahteraan Optimal',
                'content' => '<p>Hidup sehat adalah kunci untuk mencapai kesejahteraan fisik, mental, dan emosional. Dengan menerapkan prinsip-prinsip hidup sehat, Anda tidak hanya meningkatkan kualitas hidup Anda tetapi juga memperpanjang umur dan mencegah berbagai penyakit. Berikut adalah panduan sederhana untuk membantu Anda memulai perjalanan menuju gaya hidup yang lebih sehat.</p><p><strong>1. Makan Makanan Seimbang</strong></p><p>Diet seimbang adalah fondasi utama dari hidup sehat. Konsumsi berbagai jenis makanan yang mengandung semua nutrisi penting, termasuk:</p><ul><li><strong>Buah dan Sayuran</strong>: Kaya akan vitamin, mineral, dan serat.</li><li><strong>Protein</strong>: Termasuk daging tanpa lemak, ikan, telur, dan sumber protein nabati seperti kacang-kacangan.</li><li><strong>Karbohidrat Kompleks</strong>: Seperti gandum utuh, nasi merah, dan kentang.</li><li><strong>Lemak Sehat</strong>: Diperoleh dari sumber seperti alpukat, kacang-kacangan, dan minyak zaitun.</li></ul><p>Hindari konsumsi berlebihan gula, garam, dan makanan olahan yang tinggi lemak jenuh.</p><p><strong>2. Rutin Berolahraga</strong></p><p>Aktivitas fisik teratur sangat penting untuk kesehatan tubuh dan pikiran. Olahraga membantu meningkatkan kebugaran kardiovaskular, kekuatan otot, dan fleksibilitas. Beberapa jenis olahraga yang bermanfaat meliputi:</p><ul><li><strong>Cardio</strong>: Berlari, bersepeda, atau berenang untuk meningkatkan kesehatan jantung.</li><li><strong>Latihan Kekuatan</strong>: Menggunakan beban atau resistance bands untuk membangun otot.</li><li><strong>Fleksibilitas</strong>: Yoga atau peregangan untuk meningkatkan rentang gerak dan mencegah cedera.</li></ul><p>Cobalah untuk berolahraga setidaknya 150 menit per minggu dengan intensitas sedang atau 75 menit dengan intensitas tinggi.</p><p><strong>3. Cukup Tidur</strong></p><p>Tidur yang cukup dan berkualitas adalah bagian penting dari gaya hidup sehat. Kurang tidur dapat mempengaruhi kesehatan fisik dan mental, termasuk sistem kekebalan tubuh dan kemampuan kognitif. Usahakan untuk tidur antara 7 hingga 9 jam setiap malam dan pertahankan rutinitas tidur yang konsisten.</p><p><strong>4. Manajemen Stres</strong></p><p>Stres kronis dapat berdampak negatif pada kesehatan Anda. Temukan cara untuk mengelola dan mengurangi stres dalam kehidupan sehari-hari, seperti:</p><ul><li><strong>Meditasi dan Teknik Relaksasi</strong>: Seperti pernapasan dalam dan mindfulness.</li><li><strong>Hobi dan Aktivitas Menyenangkan</strong>: Luangkan waktu untuk kegiatan yang Anda nikmati.</li><li><strong>Jaringan Sosial</strong>: Berbicara dengan teman dan keluarga atau bergabung dengan komunitas.</li></ul><p><strong>5. Hidrasi yang Cukup</strong></p><p>Minum cukup air sangat penting untuk menjaga fungsi tubuh yang optimal. Air membantu proses metabolisme, menjaga suhu tubuh, dan mengeluarkan racun. Usahakan untuk minum setidaknya 8 gelas air setiap hari, dan lebih banyak jika Anda berolahraga atau berada di lingkungan panas.</p><p><strong>6. Pemeriksaan Kesehatan Rutin</strong></p><p>Lakukan pemeriksaan kesehatan secara berkala untuk mendeteksi dan menangani masalah kesehatan sebelum menjadi lebih serius. Pemeriksaan rutin dapat mencakup:</p><ul><li><strong>Tes Darah</strong>: Untuk memantau kadar kolesterol, gula darah, dan fungsi organ.</li><li><strong>Pemeriksaan Tekanan Darah</strong>: Untuk memastikan tekanan darah tetap dalam rentang normal.</li><li><strong>Pemeriksaan Gigi dan Mata</strong>: Untuk menjaga kesehatan mulut dan penglihatan.</li></ul><p><strong>7. Hindari Kebiasaan Buruk</strong></p><p>Berhenti dari kebiasaan buruk seperti merokok dan konsumsi alkohol berlebihan. Kedua kebiasaan ini dapat meningkatkan risiko berbagai penyakit dan mempengaruhi kesehatan secara keseluruhan.</p><h3><strong>Kesimpulan</strong></h3><p>Hidup sehat adalah kombinasi dari kebiasaan baik yang mendukung kesehatan fisik, mental, dan emosional. Dengan menerapkan prinsip-prinsip ini dalam kehidupan sehari-hari, Anda dapat mencapai kesejahteraan optimal dan meningkatkan kualitas hidup. Mulailah dengan langkah-langkah kecil dan konsisten, dan ingatlah bahwa perubahan gaya hidup positif dapat membawa manfaat jangka panjang bagi kesehatan Anda.</p>',
                'author_id' => 1,
                'thumbnail' => 'article-thumbnails/tMoUQdcdc8FYcBil8FR6OKT3RDol7Q-metaNDcxMzY4NGE5MGM5NmQwY2RmYjcyMjIwMzZhYjMzMjYuanBn-.jpg',
                'category_id' => 1,
                'is_choosen' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Panduan untuk Menjaga Berat Badan dan Kesehatan',
                'content' => '<p>Diet sehat adalah kunci untuk menjaga berat badan ideal dan mendukung kesehatan secara keseluruhan. Dengan memilih pola makan yang tepat, Anda tidak hanya dapat mencapai tujuan berat badan Anda tetapi juga meningkatkan kualitas hidup Anda. Berikut adalah panduan sederhana tentang diet sehat yang dapat Anda terapkan dalam kehidupan sehari-hari.</p><p><strong>1. Pilih Makanan Bergizi</strong></p><p>Diet yang sehat dimulai dengan memilih makanan yang kaya akan nutrisi. Fokus pada:</p><ul><li><strong>Buah dan Sayuran</strong>: Konsumsi berbagai warna untuk mendapatkan beragam vitamin, mineral, dan serat.</li><li><strong>Protein Berkualitas</strong>: Sumber protein seperti daging tanpa lemak, ikan, telur, dan produk nabati seperti kacang-kacangan dan tofu.</li><li><strong>Karbohidrat Kompleks</strong>: Pilih biji-bijian utuh seperti beras merah, oatmeal, dan quinoa untuk energi yang berkelanjutan.</li><li><strong>Lemak Sehat</strong>: Konsumsi lemak dari sumber seperti alpukat, kacang-kacangan, dan minyak zaitun.</li></ul><p><strong>2. Kendalikan Porsi Makan</strong></p><p>Mengontrol porsi makan adalah cara efektif untuk mengelola berat badan dan mencegah makan berlebihan. Beberapa tips untuk mengontrol porsi makan:</p><ul><li><strong>Gunakan Piring Kecil</strong>: Menggunakan piring kecil dapat membantu Anda makan lebih sedikit tanpa merasa kekurangan.</li><li><strong>Makan Perlahan</strong>: Luangkan waktu untuk menikmati makanan dan perhatikan rasa kenyang sebelum menambah porsi.</li><li><strong>Hindari Makan Sambil Menonton TV</strong>: Fokus pada makanan Anda dan hindari makan di depan layar yang dapat membuat Anda tidak sadar berapa banyak yang Anda makan.</li></ul><p><strong>3. Jaga Keseimbangan Kalori</strong></p><p>Menjaga keseimbangan kalori antara kalori yang masuk dan kalori yang dibakar adalah kunci untuk menjaga berat badan. Untuk menurunkan berat badan, Anda perlu mengonsumsi lebih sedikit kalori daripada yang Anda bakar. Sebaliknya, untuk menaikkan berat badan, Anda perlu mengonsumsi lebih banyak kalori.</p><p><strong>4. Hindari Makanan Olahan dan Gula Berlebih</strong></p><p>Makanan olahan dan makanan tinggi gula sering kali mengandung kalori kosong dan sedikit nutrisi. Batasi konsumsi makanan seperti:</p><ul><li><strong>Minuman Manis</strong>: Soda, jus buah kemasan, dan minuman energi.</li><li><strong>Makanan Olahan</strong>: Keripik, kue kering, dan makanan cepat saji.</li><li><strong>Gula Tambahan</strong>: Hindari makanan dengan kandungan gula tambahan yang tinggi, seperti permen dan sereal manis.</li></ul><p><strong>5. Perhatikan Asupan Cairan</strong></p><p>Minum cukup air adalah bagian penting dari diet sehat. Air membantu proses metabolisme, mengontrol nafsu makan, dan menjaga keseimbangan cairan tubuh. Usahakan untuk minum setidaknya 8 gelas air sehari dan lebih banyak jika Anda aktif secara fisik.</p><p><strong>6. Rencanakan Menu Anda</strong></p><p>Merencanakan menu makanan Anda dapat membantu Anda membuat pilihan yang lebih sehat dan mencegah keputusan makanan impulsif. Beberapa cara untuk merencanakan menu:</p><ul><li><strong>Buat Daftar Belanja</strong>: Rencanakan makanan dan buat daftar belanja berdasarkan menu yang telah Anda buat.</li><li><strong>Siapkan Makanan di Rumah</strong>: Memasak makanan di rumah memberi Anda kontrol lebih besar atas bahan-bahan yang digunakan dan ukuran porsi.</li></ul><p><strong>7. Dapatkan Dukungan</strong></p><p>Dukungan dari keluarga, teman, atau seorang ahli gizi dapat sangat membantu dalam mencapai tujuan diet Anda. Diskusikan rencana diet Anda dengan orang-orang terdekat atau carilah bimbingan dari seorang profesional untuk mendapatkan saran yang sesuai dengan kebutuhan Anda.</p><h3><strong>Kesimpulan</strong></h3><p>Diet sehat adalah kombinasi dari pemilihan makanan yang bergizi, pengendalian porsi makan, dan menjaga keseimbangan kalori. Dengan menerapkan prinsip-prinsip ini dalam pola makan sehari-hari, Anda dapat mencapai tujuan berat badan Anda dan meningkatkan kesehatan secara keseluruhan. Ingatlah bahwa perubahan kecil dan konsisten dapat membawa hasil yang signifikan dalam jangka panjang.</p>',
                'author_id' => 1,
                'thumbnail' => 'article-thumbnails/Op5yY1qRO1MCrt1RTaqsj9DILpXJPD-metaZjdjODc2OGRmMDNkMDgwZmZkMjY4MjhiZDM2YjcwZGYuanBn-.jpg',
                'category_id' => 3,
                'is_choosen' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Mengatasi Tantangan Pertumbuhan Anak yang Terhambat',
                'content' => '<p>Stunting, atau gangguan pertumbuhan akibat kekurangan gizi, merupakan masalah kesehatan global yang mempengaruhi perkembangan fisik dan kognitif anak-anak. Kondisi ini sering kali disebabkan oleh kekurangan nutrisi selama periode awal kehidupan dan dapat memiliki dampak jangka panjang yang serius. Berikut adalah pemahaman mendalam tentang stunting dan langkah-langkah yang dapat diambil untuk mengatasinya.</p><p><strong>1. Apa Itu Stunting?</strong></p><p>Stunting adalah kondisi di mana anak mengalami pertumbuhan yang terhambat dibandingkan dengan standar pertumbuhan yang sesuai untuk usia mereka. Anak-anak yang mengalami stunting biasanya lebih pendek dari rata-rata untuk usia mereka dan mungkin menghadapi tantangan dalam perkembangan fisik dan mental. Stunting sering kali terjadi pada tahun-tahun awal kehidupan, khususnya sebelum usia lima tahun.</p><p><strong>2. Penyebab Stunting</strong></p><p>Beberapa faktor utama yang dapat menyebabkan stunting meliputi:</p><ul><li><strong>Kekurangan Nutrisi</strong>: Asupan gizi yang tidak memadai, termasuk kekurangan protein, vitamin, dan mineral, dapat menghambat pertumbuhan anak.</li><li><strong>Infeksi dan Penyakit</strong>: Infeksi berulang, seperti diare dan infeksi saluran pernapasan, dapat mempengaruhi penyerapan nutrisi dan menyebabkan penurunan berat badan.</li><li><strong>Kurangnya Akses ke Makanan Sehat</strong>: Keterbatasan akses ke makanan bergizi yang diperlukan untuk pertumbuhan optimal dapat memperburuk masalah stunting.</li><li><strong>Kondisi Sosial dan Ekonomi</strong>: Faktor seperti kemiskinan, kurangnya pendidikan tentang gizi, dan kondisi lingkungan yang tidak memadai juga dapat berkontribusi terhadap stunting.</li></ul><p><strong>3. Dampak Stunting</strong></p><p>Stunting tidak hanya mempengaruhi pertumbuhan fisik anak, tetapi juga dapat berdampak pada:</p><ul><li><strong>Kesehatan Kognitif</strong>: Anak-anak yang mengalami stunting mungkin mengalami keterlambatan perkembangan kognitif, termasuk kemampuan belajar dan konsentrasi.</li><li><strong>Prestasi Akademik</strong>: Stunting dapat mempengaruhi kemampuan akademik anak dan mengurangi peluang mereka untuk mencapai potensi penuh mereka di sekolah.</li><li><strong>Risiko Kesehatan Jangka Panjang</strong>: Anak-anak yang mengalami stunting memiliki risiko lebih tinggi untuk menghadapi masalah kesehatan seperti obesitas dan penyakit jantung di masa dewasa.</li></ul><p><strong>4. Langkah-langkah untuk Mencegah dan Mengatasi Stunting</strong></p><p>Untuk mengatasi stunting, langkah-langkah berikut dapat diambil:</p><ul><li><strong>Peningkatan Asupan Gizi</strong>: Pastikan anak mendapatkan diet yang seimbang dengan asupan protein, vitamin, dan mineral yang cukup. Konsumsi makanan bergizi seperti buah-buahan, sayuran, produk susu, dan sumber protein hewani dan nabati.</li><li><strong>Perbaikan Sanitasi dan Kesehatan</strong>: Tingkatkan akses ke sanitasi yang baik dan layanan kesehatan untuk mencegah infeksi dan penyakit yang dapat mempengaruhi pertumbuhan anak.</li><li><strong>Edukasi tentang Gizi</strong>: Berikan pendidikan kepada orang tua tentang pentingnya gizi dan cara memberikan makanan bergizi yang sesuai untuk anak-anak.</li><li><strong>Program Nutrisi dan Suplemen</strong>: Dukungan dari program pemerintah atau organisasi non-pemerintah yang menyediakan suplemen gizi dan makanan tambahan dapat membantu anak-anak yang berisiko.</li><li><strong>Pemantauan Pertumbuhan</strong>: Lakukan pemantauan rutin terhadap pertumbuhan dan perkembangan anak untuk mendeteksi masalah sejak dini dan mengambil tindakan yang diperlukan.</li></ul><p><strong>5. Peran Keluarga dan Masyarakat</strong></p><p>Keluarga dan masyarakat memainkan peran penting dalam mengatasi stunting. Keterlibatan aktif dalam menyediakan lingkungan yang mendukung kesehatan, pendidikan tentang nutrisi, dan akses ke layanan kesehatan sangat penting. Dukungan komunitas dapat membantu memastikan bahwa setiap anak memiliki kesempatan untuk tumbuh dan berkembang dengan optimal.</p><h3><strong>Kesimpulan</strong></h3><p>Stunting adalah masalah kesehatan yang dapat memiliki dampak jangka panjang pada pertumbuhan fisik dan kognitif anak-anak. Dengan memahami penyebabnya dan menerapkan langkah-langkah pencegahan dan pengobatan yang tepat, kita dapat membantu mengatasi stunting dan mendukung kesehatan serta kesejahteraan anak-anak. Investasi dalam nutrisi dan kesehatan anak-anak adalah investasi dalam masa depan mereka dan masyarakat secara keseluruhan.</p>',
                'author_id' => 1,
                'thumbnail' => 'article-thumbnails/f06LXbl6GGzGyzldMbsqPJuqM9ilZd-metaMTEzYjFmNzMzMWI2MjNkZDU4ZDNjZGY0ZjI0N2YzOTEuanBn-.jpg',
                'category_id' => 7,
                'is_choosen' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($articles as $article) {
            Article::create([
                'title' => $article['title'],
                'slug' => Str::slug($article['title']),
                'content' => $article['content'],
                'thumbnail' => $article['thumbnail'],
                'author_id' => $article['author_id'],
                'category_id' => $article['category_id'],
                // 'slug' diatur otomatis oleh model
            ]);
        }
    }
}
