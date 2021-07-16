-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 16, 2021 at 08:42 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Dalam Jawa', 0),
(2, 'Luar Jawa', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'dinda@gmail.com', 'dinda123', 'Dinda Ayu', '081123345678', 'Jalan Kelinci No.23 Jakarta'),
(2, 'amalia@gmail.com', 'amalia123', 'Amalia Diah', '085123321123', 'Jalan Liku Liku No. 30 Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(5) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`) VALUES
(1, 1, 2, '2021-07-15', 79000, 'Luar Jawa', 20000, 'Jalan Kelinci No.23 Jakarta 10250'),
(2, 2, 1, '2021-07-15', 210000, 'Dalam Jawa', 0, 'Jalan Liku Liku No. 30 Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(30) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 3, 1, 'Arah Musim', 59000, 500, 500, 59000),
(2, 2, 4, 2, 'Komet Minor', 105000, 500, 1000, 210000);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` int(30) NOT NULL,
  `isi_pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama`, `email`, `telepon`, `isi_pesan`) VALUES
(1, 'Dinda', 'dinda@gmail.com', 2147483647, 'Halo admin mohon segera kirim orderan saya ya..');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `deskripsi` text NOT NULL,
  `deskripsi2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kategori`, `nama`, `harga`, `berat`, `foto`, `deskripsi`, `deskripsi2`) VALUES
(1, 'Buku', 'Museum of Broken Heart', 78000, 120, 'museum_of_broken_heart.jpg', 'Foto box, tiket parkir, history chat, hadiah ulang tahun, tiket bioskop, foto-foto selfie, voice note, lagu-lagu yang selalu diputar di mobil, wangi parfum, bekas kecupan, gelung cincin di jari manis, orang tua yang sudah telanjur mengenal akrab, temaram lampu jalanan kota menjelang pukul enam, warung-warung tenda, McD, waktu temu, teman-temanmu yang menyenangkan, screenshot percakapan tentang segala rencana-rencana kita yang ternyata tak menjadi nyata; dan … kamu, adalah kumpulan dari kenangan-kenangan bahagia yang pada akhirnya tak lagi bermakna. Selayaknya jelaga, perlahan terkikis sebelum hilang selamanya. Terkumpul dalam sebuah ruang benda-benda usang. Sebuah museum tentang cerita patah hati. Tentang banyaknya kepercayaan yang dibawa pergi. ', ''),
(2, 'Buku', 'Garis Waktu', 85000, 500, 'garis_waktu.jpg', 'Pada sebuah garis waktu yang merangkak maju, akan ada saatnya kau bertemu dengan satu orang yang mengubah hidupmu untuk selamanya.Pada sebuah garis waktu yang merangkak maju, akan ada saatnya kau terluka dan kehilangan pegangan.Pada sebuah garis waktu yang merangkak maju, akan ada saatnya kau ingin melompat mundur pada titik-titik kenangan tertentu.Maka, ikhlaskan saja kalau begitu.Karena sesungguhnya, yang lebih menyakitkan dari melepaskan sesuatu adalah berpegangan pada sesuatu yang menyakitimu secara perlahan.', ''),
(3, 'Buku', 'Arah Musim', 59000, 500, 'arah_musim.jpg', 'Tindakan-tindakan kecil kita di masa lalu telah mengubah banyak di kehidupan kita saat ini. Mungkin kita tidak pernah menyadarinya. Mungkin kita telah melupakannya. Meski kemudian kita kebingungan karena tidak mampu memahami rentetan kejadian sebab dan akibat itu.\r\nKita sering gagal memahami bahwa apa yang terjadi dalam hidup kita adalah hal-hal terbaik yang bisa kita dapatkan. Kita sering salah memahami maksud-maksud tersembunyi yang Dia hadirkan dalam semua rentetan kejadian hidup yang amat berharga. Dia ingin mengajarkan kita sesuatu. Sesuatu yang sering kita tolak kehadirannya. Sesuatu yang barangkali menjadi doa-doa kita selama ini.\r\nTapi, kita tidak cukup sabar untuk melewati perjalanan ini, melewati musim-musim yang silih berganti.', ''),
(4, 'Buku', 'Komet Minor', 105000, 500, 'komet_minor.jpg', 'Pertarungan melawan Si Tanpa Mahkota akan berakhir di sini. Siapapun yang menang, semua berakhir di sini, di klan Komet Minor, tempat aliansi Para Pemburu pernah dibentuk, dan pusaka hebat pernah diciptakan.\r\n\r\nDalam saga terakhir melawan Si Tanpa Mahkota, aku, Seli dan Ali menemukan teman seperjalanan yang hebat, yang bersama-sama melewati berbagai rintangan. Memahami banyak hal, berlatih teknik baru, dan bertarung bersama-sama. Inilah kisah kami. Tentang persahabatan sejati. Tentang pengorbanan. Tentang ambisi. Tentang memaafkan.\r\n\r\nNamaku Raib, dan aku bisa menghilang.', ''),
(5, 'Buku', 'Ikhlas Paling Serius', 65000, 200, 'ikhlas-paling-serius.jpg', 'Semua orang pasti pernah merasakan semua tingkat bahagia dan sedih di dalam perjalanan hidupnya. Memasang senyum, meski diam-diam meneteskan air mata; menyimpan luka. Mencoba bertahan dengan keyakinan waktu yang akan menyembuhkan. Namun, kekuatan penyembuh itu sebenarnya ada di dalam diri sendiri, di dalam hati yang terluka. Kunci pembukanya adalah rasa ikhlas untuk melepaskan; menerima luka, dan berbaik hati kepada diri sendiri bahwa kita juga berhak untuk kembali berbahagia. ', ''),
(6, 'Penulis', 'Wira Setianagara', 0, 0, 'wira nagara.jpg', 'Wira Setianagara lahir di Batang, 21 November 1992, adalah seorang pelawak tunggal berkebangsaan Indonesia. Wira adalah salah satu kontestan Stand Up Comedy Indonesia Kompas TV musim ke-5 (SUCI 5) tahun 2015, di mana ia lolos melalui audisi di Yogyakarta, dan menjadi satu dari 16 finalis yang berhasil lolos ke putaran final SUCI 5. Wira bersama dengan Rizky Ubaidillah atau Ubay menjadi dua kontestan asal Purwokerto yang tampil pertama kali di SUCI, khususnya di SUCI 5. Wira dan Ubay mewakili kota Purwokerto di kompetisi tersebut. ', 'Get Up Stand Up (2016),\r\nMaju Kena Mundur Kena Returns (2016),\r\nPancaran Sinar Petromaks: Gaya Mahasiswa (2019).'),
(7, 'Penulis', 'Fiersa Besari', 0, 0, 'fiersabesari.jpg', ' Fiersa Besari lahir di Bandung, 3 Maret 1984, adalah penulis dan pemusik Indonesia. Sebagai penulis, Fiersa telah menghasilkan enam novel. Ia juga terlibat sebagai salah satu pendiri Komunitas Pecandu Buku.\r\n\r\nDi bidang musik, Fiersa Besari memulai kariernya justru sebagai vokalis band indie. Sebelum menjadi vokalis, sejak tahun 2009 Fiersa memang mulai rajin merekam dan menyimpan karya musiknya. Hingga puncaknya pada tahun 2012 ia memutuskan untuk menjual album buatannya. Fiersa tergolong sebagai musisi yang produktif, ia merasa lebih nyaman berkarya lewat tulisan. Tulisan membuat ia merasa lebih bebas untuk menuangkan perasaan. Berbeda dengan saat menulis lirik musik, Fiersa juga harus mempertimbangkan nada dan harmonisasi instrumen musik yang digunakan. Fiersa Besari pernah punya band yang namanya Hellfairies, yang emo sampai ke DNA. Eat Well Earl atau yang disingkat E.W.W adalah band yang sempat di bentuk Fiersa dan teman-temannya dengan lagunya \"Standing Next To You\". Di sisi lain, karena Fiersa ditinggal nikah sama temen-temennya, dia pun akhirnya mulai bikin lagu-lagu balada. Setelah proses berpikir yang cukup panjang, Fiersa Besari memutuskan untuk melawan rasa malu dan serius bersolo karier. Lagu “Melangkah Tanpamu” merupakan embrio dari karya-karyanya. Dari sana, album 11:11 tercipta, yang enam tahun kemudian menjadi buku. ', 'Garis Waktu (2016),\r\nKonspirasi Alam Semesta (2017),\r\nCatatan Juang (2017),\r\nArah Langkah (2018),\r\n11:11 (2018),\r\nTapak Jejak (2019).'),
(8, 'Penulis', 'Tere Liye', 0, 0, 'tere-liye.jpg', ' Darwis atau lebih dikenal dengan nama pena Tere Liye lahir di Lahat, 21 Mei 1979. Ia adalah seorang penulis novel Indonesia. Beberapa karyanya yang pernah diadaptasi ke layar lebar yaitu Hafalan Shalat Delisa dan Bidadari-Bidadari Surga. Meskipun dia bisa meraih keberhasilan dalam dunia literasi Indonesia, kegiatan menulis cerita sekadar menjadi hobi karena sehari-hari ia masih bekerja kantoran sebagai akuntan.\r\n\r\nTere Liye lahir dari keluarga sederhana. Orang tuanya adalah petani biasa, dan Tere Liye tumbuh dewasa di pedalaman Sumatra. Tere Liye meyelesaikan pendidikan sekolah dasar dan menengahnya di SDN 2 Kikim Timur dan SMPN 2 Kikim, Kabupaten Lahat, Provinsi Sumatra Selatan. Lalu melanjutkan sekolahnya ke SMAN 9 Bandar Lampung, Provinsi Lampung. Setelah lulus, ia meneruskan studinya ke Fakultas Ekonomi Universitas Indonesia. Kegiatannya setelah selesai kuliah banyak diisi dengan menulis buku-buku fiksi. ', 'Mimpi-Mimpi si Patah Hati (2005),\nCintaku antara Jakarta & Kuala Lumpur (2006),\nThe Gogons James & the Incredible Incident (2006),\nThe Gogons 2 : Dito & Prison of Love,\nHafalan Shalat Delisa (2007),\nMoga Bunda Disayang Allah (2007),\nDia adalah Kakakku (2018),\nSenja Bersama Rosie (2008),\nBurlian (2009),\nRembulan Tenggelam di Wajahmu (2009),\nDaun Yang Jatuh Tak Pernah Membenci Angin (2010),\nPukat (2010),\nEliana (2011),\nAyahku (BUKAN) Pembohong (2011),\nKisah Sang Penandai (2011),\nSepotong Hati Yang Baru (2012),\nNegeri Para Bedebah (2012),\nNegeri di Ujung Tanduk (2013),\nAmelia (2013),\nDikatakan Atau Tidak Dikatakan, Itu Tetap Cinta (2014),\nRindu (2014),\nBumi (2014),\nBulan (2015),\nPulang (2015),\n#AboutLove (2016),\nHujan (2016),\nKau, Aku dan Sepucuk Angpau Merah (2016),\nTentang Kamu (2016),\nMatahari (2016),\nBintang (2017),\n#AboutFriends (2017),\nPergi (2018),\nCeros dan Batozar (2018),\nKomet (2018),\nSi Anak Cahaya (2018),\nEarth (2019),\nKomet Minor (2019),\nMoon (2019),\n#AboutLife (2019),\nSungguh Kau Boleh Pergi (2019),\nSi Anak Badai (2019),\nSelena (2020),\nNebula (2020),\nSun (2020),\nSelamat Tinggal (2020),\nSi Putih (unedited version),\nPulang Pergi (unedited version),\nSi Anak Pelangi (unedited version),\nJengki,\nA Thrilling Night,\nThe Golden Apple,\nHatrab The Rabbit with The Hat,\nThe Tribe of Kite Riders.'),
(9, 'Penulis', 'Raditya Dika', 0, 0, 'raditya dika.jpg', 'Dika Angkasaputra Moerwani Nasution yang lebih dikenal dengan Raditya Dika (lahir di Jakarta, 28 Desember 1984; umur 36 tahun adalah seorang penulis, komedian, sutradara, dan aktor. Buku pertamanya berjudul Kambing Jantan masuk kategori best seller. Buku tersebut menampilkan kehidupan Dika (Raditya Dika) saat kuliah di Australia. Tulisan pria yang akrab disebut Radit ini bisa digolongkan sebagai genre baru. Kala ia merilis buku pertamanya tersebut, memang belum banyak yang masuk ke dunia tulisan komedi. Apalagi bergaya diari pribadi (personal essay).', 'Kambing Jantan: Sebuah Catatan Harian Pelajar Bodoh (2005),\r\nCinta Brontosaurus (2006),\r\nRadikus Makankakus: Bukan Binatang Biasa (2007),\r\nBabi Ngesot: Datang Tak Diundang Pulang Tak Berkutang (2008),\r\nMarmut Merah Jambu (2010),\r\nManusia Setengah Salmon (2011),\r\nKoala Kumal (2015),\r\nUbur-Ubur Lembur (2018).'),
(10, 'Penerbit', 'Mediakita', 0, 0, 'media_kita.jpg', ' Mediakita adalah sebuah penerbit buku populer untuk kalangan remaja dan menjadi bagian dari Kelompok Agromedia. Pencetusnya adalah Yayan Sopyan, A. S. Laksana, Anthonius Riyanto, dan Hikmat Kurnia. Didirikan pada 9 Juli 2005, Mediakita awalnya penerbit yang fokus menerbitkan buku-buku tutorial, novel sastra, dan politik. Namun, seiring berjalannya waktu, Mediakita semakin dinamis dan menerbitkan bacaan anak muda dengan harapan meningkatkan minat baca.', 'Pada 2005, pemimpin redaksi pertama Mediakita adalah Yayan Sopyan. Sejak 2015 sampai sekarang, pemimpin redaksi Mediakita adalah Agus Wahadyo. Pada tahun itulah Mediakita sepenuhnya menjadi penerbit buku yang menyajikan bacaan anak muda. Mediakita juga menjadi penerbit pertama yang mempopulerkan genre senandika. Buku terbitannya fokus pada novel roman, buku senandika, dan nonfiksi. Misi Mediakita adalah mengorbitkan penulis berbakat dan memajukan literasi Indonesia. Sementara visinya menjadikan menulis dan membaca sebagai budaya dan gaya hidup anak muda. '),
(11, 'Penerbit', 'Bhuana Sastra', 0, 0, 'bip.jpg', ' Bhuana Ilmu Populer (BIP) yang berdiri pada tanggal 22 September 1992 bergerak di bidang penerbitan. BIP tumbuh menjadi salah satu penerbitan besar di Indonesia yang berada di bawah Kompas Gramedia. Selain menjadi penerbit yang menerbitkan buku untuk dipublikasikan secara luas, BIP juga menjadi co-publishing bagi penulis/institusi yang membutuhkan jasa menulis atau mencetak buku. Presiden Indonesia saat ini, Bapak Joko Widodo, dan mantan presiden Indonesia, Bapak Susilo Bambang Yudhoyono, merupakan salah satu pengguna jasa co-publishing BIP.\r\n\r\nBIP lebih berfokus pada penerbitan buku anak, seperti edukomik, dongeng, picture book, dan buku aktivitas bagi balita dan anak-anak. Namun, BIP juga tidak mengesampingkan buku-buku nonfiksi yang bertema kesehatan, bisnis, kepemimpinan, motivasi, self-help, dan buku penunjang sekolah. Setiap tahun, BIP menerbitkan lebih dari 300 judul buku yang 60%-nya merupakan buku anak. BIP mempunyai imprint yang menerbitkan buku dengan kategori khusus, yaitu Bhuana Sastra untuk novvel, Genta untuk buku kristen, dan Qibla untuk buku islam.\r\n\r\nSejak tahun 2004, BIP melebarkan sayap dengan menerbitkan produk geospasial, contohnya atlas dan peta panduan perjalanan. BIP memiliki tim cartographer yang bekerja sama dengan pemerintah atau lembaga swasta untuk memetakan kota-kota besar, seperti Jakarta, Surabaya, dan Bali. Selain itu, BIP juga menyediakan peta perjalanan wisata. Setelah lebih dari 10 tahun menjalankan lini peta ini, sekarang, BIP terkenal sebagai penyedia data geospasial akurat kota besar di Indonesia. Banyaknya permintaan di bidang digital, BIP pun ikut mengembangkan peta digital. ', ' Dengan slogan “Passion for Knowledge”, BIP mendedikasikan diri untuk menerbitkan buku-buku yang membantu orang-orang untuk belajar sendiri. Karena pembaca utamanya adalah anak-anak, BIP dengan serius dan hati-hati dalam menciptakan buku anak berkualitas tinggi. BIP sangat menyadari ada sebuah pertanggungjawaban dalam mendidik generasi muda untuk mempersiapkan mereka membangun masyarakat intelektual yang lebih baik di masa depan.\r\n\r\nPerhatian BIP dalam mendidik generasi muda dengan buku-buku anak berkualitas tinggi melahirkan sebuah program amal yang disebut Books for Friend (BFF). Melalui program ini, BIP mendonasikan Rp100 dari setiap buku terjual untuk menyediakan buku-buku ke tempat baca atau perpustakaan umum kecil di daerah terpencil di Indonesia. BFF membuat BIP dapat menjangkau anak-anak yang tidak mampu membeli buku untuk dibaca. Ini merupakan usaha BIP dalam berbagi pengetahuan terhadap anak yang kurang mampu. BIP percaya setiap anak berhak untuk mendapatkan pengetahuan baik yang kaya maupun yang miskin.\r\n\r\nSebagai sebuah perusahaan yang berada di bawah naungan Kompas Gramedia, BIP mempunyai keistimewaan untuk men-display buku-buku terbitannya di 107 gerai toko buku Gramedia di seluruh Indonesia. Selain di toko buku Gramedia, buku-buku BIP juga tersedia di gerai modern lainnya. Untuk menjangkau semua kalangan, BIP menjual buku digital di Scoop dan Gramediana, yang merupakan toko buku digital terkemuka di Indonesia. Agar tidak ketinggalan tantangan di dunia digital saat ini, BIP selalu berada di garis depan dalam berinovasi dengan menggunakan teknologi digital untuk menciptakan pengalaman membaca yang unik.\r\n\r\nBIP akan terus memperluas pasar dengan membangun kerja sama internasional, salah satunya dengan selalu mengunjungi pameran buku internasional, seperti Frankfurt Book Fair, Bologna Children Books Fair, Seoul Book Fair, London Book Fair, Beijing Book Fair, dan Bucheon International Comic Festival. Beberapa copyright buku anak BIP telah terjual ke Vietnam, Malaysia, dan India. Buku-buku tersebut adalah buku lokal yang ditulis oleh penulis buku anak Indonesia. Kerja sama ini memperkuat identitas BIP sebagai penerbit buku anak terkemuka di Indonesia. '),
(12, 'Penerbit', 'Gramedia Pustaka Utama', 0, 0, 'gramedia.png', ' Didirikan tahun 1974, Gramedia Pustaka Utama merupakan bagian dari Kompas Gramedia, jaringan media terbesar di Indonesia. Fokus terbitannya kepada 12 bidang utama: Fiksi Dewasa, Fiksi Remaja, Fiksi Anak, Sastra - Literatur, Bisnis Ekonomi, Social Science, Pengembangan Diri, Kamus & Referensi, Boga, serta Busana & Kecantikan.\r\n\r\nSelama lebih dari 40 tahun penerbit Gramedia Pustaka Utama telah menjadi rumah bagi banyak penulis dan buku-buku terbaik di Indonesia. Beberapa nama penulis seperti Ahmad Tohari, Eka Kurniawan, Ahmad Fuadi, Marga T., Alberthiene Endah, Clara Ng., Agustinus Wibowo, Hermawan Kertajaya, Franz Magnis-Suseno, serta penulis internasional seperti Enid Blyton, Paulo Coelho, J.K. Rowling, Agatha Christie, J.R.R. Tolkien, Malcolm Gladwell, Dale Carnegie mempercayakan karyanya untuk selalu diterbitkan melalui Gramedia Pustaka Utama', ' Saat ini, dengan lebih dari 30 ribu judul buku yang telah diterbitkan serta jalinan kerjasama dengan lebih dari 200 penerbit asing terkemuka dari AS, Belanda, Jerman, Belgia, Brasil, Denmark, Hong Kong, India, Inggris, Italia, Jepang, Jerman, Kanada, Malaysia, dan Swis, Gramedia Pustaka Utama telah berhasil mengukuhkan posisinya sebagai salah satu penerbit buku terbaik di Indonesia.\r\n\r\nDi masa depan Gramedia Pustaka Utama berkomitmen untuk tetap berusaha menjadi agen pembaruan bagi bangsa: memilih dan memproduksi buku-buku yang berkualitas, yang memperluas wawasan, memberikan pencerahan, dan merangsang kreativitas berpikir, dengan dukungan teknologi. ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
