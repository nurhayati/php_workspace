-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 01, 2001 at 01:00 AM
-- Server version: 5.0.45
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `province01`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` varchar(15) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `gelar` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `fname`, `lname`, `province`, `city`, `address`, `phone`, `gelar`, `description`, `photo`, `username`, `password`) VALUES
('3266ab24424ea3a', 'Muhammad Fernan', 'Ahmad Alkansyah', 'Banten', 'Tangerang', 'jl.munanjat cinta', '081871282781', 'SI', 'Seorand Penulis', 'gambar.jpg', 'fernan', '9ef7d85e6a54bd15c09045c33d536213'),
('da907e1ff0fc281', 'Muhammad zacky ', 'frediansyah ', 'Banten', 'Mojokertoo', 'jl.paluaning', '0819829112121', 'SA', 'seorang penulis dan aktivis', 'images (13).jpg', 'zacky', '51ada1913f79743c0110264ff461aad6');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` varchar(15) NOT NULL,
  `id_member` varchar(15) NOT NULL,
  `id_jurnal` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_member`, `id_jurnal`) VALUES
('c461bd738d37477', 'ee5d42d03139d00', '9797d54d4ebffdd');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL auto_increment,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Computer'),
(2, 'Elektro'),
(3, 'Matemathic');

-- --------------------------------------------------------

--
-- Table structure for table `iklan`
--

CREATE TABLE `iklan` (
  `id` int(5) NOT NULL auto_increment,
  `judul` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `iklan`
--

INSERT INTO `iklan` (`id`, `judul`, `link`, `photo`) VALUES
(1, 'Kaskus', 'www.kaskus.com', 'j.jpg'),
(2, 'wikipedia', 'www.wikipedia.com', 'w.jpg'),
(3, 'google', 'www.google.com', 'a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id` varchar(15) NOT NULL,
  `category` varchar(30) NOT NULL,
  `author` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `file` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` enum('FREE','BUY') NOT NULL,
  `harga` int(15) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id`, `category`, `author`, `judul`, `isi`, `file`, `foto`, `status`, `harga`, `tanggal`) VALUES
('80a0c20124bcb46', 'Elektro', 'da907e1ff0fc281', 'Journals in Business Schools: Legitimacy, Acceptan', 'Tanggapan staf pengajar dan tanggapan petinggi kampus atas keberadaan jurnal elektronik\r\numumnya netral dan di banyak kasus mendekati negatif jika dibandingkan dengan paperbased\r\njournal. Bagaimanapun, dari hasil tersebut penulis mengindikasikan bahwa\r\npenerimaan jurnal elektronik dan paper journal cukup setara. Menurut penulis, dalam\r\nmendapatkanl legitimasi, kualitas jurnal jauh lebih penting dibandingkan dengan media jurnal\r\ntersebut.\r\nAda tiga strategi yang bisa digunakan dalam membangun legitimasi, yaitu menyesuaikan\r\ndengan keinginan pembaca, mencari pembaca yang tepat, dan memanipulasi legitimasi.\r\nMemanipulasi legitimasi maksudnya mencari lingkungan baru yang akan memberikan\r\nlegitimasinya secara otomatis.', 'Divorce.docx', 'f7f78images12.jpg', 'BUY', 80000, '01-January-2001'),
('9797d54d4ebffdd', 'Computer', '3266ab24424ea3a', 'SISTIM ONTOLOGI E-LEARNING BERBASIS SEMANTIC WEB', 'Abstract\\r\\nE-learning content being a barrier for e-learning is no longer true on today’s Internet. The current concerns are how to effectively annotate and organize the available content (both textual and non-textual) to facilitate effective sharing, reusability and customization. In this paper, we explain a component-oriented approach to organize content in an ontology. We also illustrate our 3-tier e-learning content management architecture and relevant interfaces. We use a simple yet intuitive example to successfully demonstrate the current working prototype which is capable of compiling personalized course materials. The e-learning system explained here uses the said ontology.\\r\\nKata kunci: e-learning, ontology, semantic web', 'Sambutan Direktur.docx', '17571BK005.JPG', 'BUY', 90000, '01-January-2001'),
('9333f3c3c9fa70e', 'Matemathic', '3266ab24424ea3a', 'PEMBELAJARAN GEOMETRI SMA MENGGUNAKAN GEOGEBRA', 'Abstrak\r\nSeiring dengan perkembangan IPTEK, penggunaan teknologi pada pembelajaran matematika di\r\nsekolah telah menjadi salah satu pilihan untuk menyampaikan konsep yang bersifat abstrak\r\nmenjadi lebih konkrit. Salah satu materi yang menjadi perhatian dalam pembelajaran\r\nmenggunakan teknologi adalah geometri. Objek-objek dalam pembelajaran geometri yang\r\nbersifat abstrak membuat siswa memperoleh beban kognitif yang lebih berat untuk mempelajari\r\nmateri tersebut. Agar siswa lebih mudah dalam memahami konsep-konsep pada geometri, maka\r\ndalam pembelajaran matematika perlu adanya media pembelajaran yang sesuai dengan\r\nkebutuhan siswa. Media pembelajaran merupakan sarana dalam proses pembelajaran baik bagi\r\nsiswa maupun guru. Adanya program komputer yang dikenal dengan software Geogebra menjadi\r\nsalah satu pilihan untuk membantu siswa dalam mempelajari geometri dengan lebih mudah dan\r\nmenyenangkan.', 'Silent.docx', 'ec33aBK008.JPG', 'BUY', 75000, '01-January-2001');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` varchar(15) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `fname`, `lname`, `province`, `city`, `address`, `phone`, `description`, `photo`, `username`, `password`) VALUES
('ee5d42d03139d00', 'rahma', 'Wati', 'Banten', 'aceh', 'jl.galanggan Aceh', '0819829112121', 'seorang pelajar', 'eeb9330c89dee4b_11832647_o2.jpg', 'member', 'aa08769cdcb26674c6706093503ff0a3'),
('e910b12802fc12c', 'Muhammad', 'fernan', 'Banten', 'tangerang', 'jl.makam', '0819783738', 'seorang pelajar', 'adlan_ccool.jpg', 'fernann', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(5) NOT NULL auto_increment,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `photo` varchar(50) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `judul`, `isi`, `photo`, `tanggal`) VALUES
(1, 'Beatle Of The Best Team', 'Tujuh klub putra dan enam klub putri akan berlomba untuk menjadi yang terbaik di arena Djarum Superliga Badminton 2011. Setelah sukses di gelar pada tahun 2007 lalu, superliga kembali digelar di DBL Arena Surabaya dengan hadiah yang lebih spektakuler. Rp 1,35 miliar rupiah siap untuk diperebutkan. Setiap klub juga dipastikan akan mendapat subsidi dari sponsor untuk akomodasi sebesar Rp 30.000.000/tim, serta uang tampil sebesar Rp 35.000.000/tim serta subsidi untuk pemain asing sebesar US$ 1.500.\\r\\n\\r\\nDjarum Superliga Badminton 2011 ini akan menjadi ajang pertaruhan gengsi klub-klub raksasa nasional, ditambah ajang ini pun diharapkan bisa kembali mempopulerkan bulutangkis di tanah air. Untuk menjaring anak muda berbakat, agar menjadikan bulutangkis sebagai ajang mencari prestasi dan profesi, dan kembali menjadikan Indonesia sebagai salah satu negara adidaya di bulutangkis.\\r\\n\\r\\n“Kami berharap, melalui kejuaraan ini, bulutangkis kembali menjadi olah raga yang populer, dan dalam jangka panjang, bisa kembali mengembalikan prestasi bulutangkis Indonesia,” ujar Direktur Liga Bulutangkis, Yoppy Rosimin saat jumpa pers pada Kamis (10/2) silam.\\r\\n\\r\\nPBSI pun tengah terus melakukan penggonjlokan materi untuk superliga ini. selain nasional, PBSI berharap akan adanya liga internasional di masa yang akan datang, dan menunjukkan bahwa bulutangkis bisa menjadi satu sport industry yang kuat di tanah air maupun di dunia internasional.\\r\\n\\r\\n“Untuk kedepannya, kami masih akan terus mengembangkan format liga, dan kami berharap suatu hari nanti bulutangkis akan memiliki liga internasional sendiri,” papar sekertaris Jendral PBSI, Jacob Rusdianto.\\r\\n\\r\\nAcara jumpa pers dihadiri oleh perwakilan ketujuh klub yang akan berpartisipasi. Mulai dari PB Tangkas Alfamart, PB Jaya Raya Suryanaga, PB Djarum, PB Mutiara, PB SGS Elektrik, PB Jaya Raya Jakarta, dan PB Musica.\\r\\n\\r\\nAtlet-atlet nasional pun dipastikan akan memperkuat tim masing-masing. Tak terkecuali si pemilik pukulan back hand unik, Taufik Hidayat. Ia hadir di Blackcat Jazz & Blues Club untuk mewakili klubnya PB SGS Elektrik.\\r\\n\\r\\n“Kami akan turun dengan menggunakan pemain asli klub, pemain pinjaman dari klub lain serta dari pemain asing kita sudah dipastikan akan diperkuat oleh Hendri/Triyachart Chayut dari Singapura,” papar Taufik.\\r\\n\\r\\nKlub lain pun telah siap dengan beberapa atlet andalan mereka, PB Jaya Raya dan PB Djarum tidak akan mendaulat pemain asing untuk memperkuat mereka. Mereka mengandalkan putra-putri terbaiknya untuk terjun di Surabaya pada 20 hingga 26 Februari mendatang. PB Jaya Raya di regu putra akan mengandalkan pasangan peraih medali Olimpiade Beijing, Markis Kido/Hendra Setiawan, sedangkan di putri mereka memiliki Greysia Polii/Nitya Krishinda. PB Djarum di putra akan mengandalkan atlet muda berbakat, Dionysius Hayom Rumbaka, ditambah Andre Kurniawan Tedjono, di putri mereka akan menurunkan Maria Febe Kusumastuti, Ana Rovita dan ganda Meiliana Jauhari/Shendy Puspa Irawati.\\r\\n\\r\\nSementara sang juara bertahan di nomor putri, PB Tangkas Alfamart akan kembali turun bersama dengan Yip Pui Yin dari Hongkong. Sedangkan PB Jaya Raya Suryanaga sudah siap menjemput Shinta Mulia Sari/Yao Lei untuk menjadi amunisi mereka. Sedangkan PB Musica yang hanya menurunkan tim putra, akan diperkuat oleh tunggal dari Malaysia, Hafiz Hasyim serta Wong Chong Han.\\r\\n\\r\\nAtlet nasional terbaik, serta dibumbui dengan hadirnya atlet-atlet asing, tentu saja akan menambah ketat aroma persaingan Djarum Superliga Badminton 2011. Anda akan menjadi saksi, klub mana yang berhak menyandang predikat klub terbaik di tanah air dalam pertandingan yang diadakan di DBL Arena Surabaya nanti.', 'top[1].JPG', '01-January-2001'),
(2, 'TRIBUNNEWS.COM', 'TRIBUNNEWS.COM, JAKARTA - Kejuaraan bulu tangkis Djarum Superliga Badminton 2011 di Surabaya akan dikuti beberapa pemain peringkat atas dunia.\r\n\r\nDalam kejuaraan yang berlangsung di DBL Arena, Surabaya, 20-26 Februari mendatang para pemain nasional yang ada di peringkat dunia yang sudah memastikan diri ikut antara lain Taufik Hidayat, Markis Kido/Hendra Setiawan, Simon Santoso, Sony Dwi Kuncoro.\r\n\r\nBukan hanya pemain lokal, para pemain peringkat dunia dari luar negeri juga akan ikut serta memperkuat klub peserta seperti Hafizh Hashim dan Wong Choong Hann (Malaysia), Nguyen Tien Minh (Vietnam) mau pun ganda puteri asal Singapura Yao Lei/Shinta Mulia Sari.\r\n\r\n"Meski bisa diperkuat, namun klub peserta juga dibatasi dengan hanya boleh mementaskan maksimal dua partai pemain luar dalam setiap pertandingan," kata Direktur badan Superliga, Joppy Rosimin dalam jumpa pers di Jakarta, Kamis (10/2). "Jadi bisa dua pemain tunggal atau maksimal empat pemain ganda."\r\n\r\nMenurut Sekjen PBSI, Jacob Rusdianto, diadakannya Superliga di beberapa negara seperti Indonesia, Korea Selatan dan China akan membuat kesempatan para pemain untuk mendunia lebih besar. "Kami berharap nanti akan ada kejuaraan dunia antarklub, seperti Piala Toyota di sepakbola," kata Jacob. "Di sini pemain tidak lagi terpaku untuk membela negara."\r\n\r\nDjarum Superliga Badminton 2011 di Surabaya akan diikuti 7 klub di sektor putera dan 6 klub di sektor puteri. "Format yang dipakai seperti Piala Thomas dan Uber, dengan tiga tunggal dan dua ganda. Sistem pertandingan pun dilakukan setengah kompetisi dengan dua peringkat teratas bertemu di grand final," lanjut Joppy.\r\n\r\nDi sektor putera, 7 klub yang ikut adalah Djarum Kudus, Jaya Raya Jakarta, Jaya Raya Suryanaga Surabaya, Musica Champion Kudus, Mutiara Bandung, SGS PLN Bandung, Tangkas Alfamart Jakarta. Sementara di bagian pueteri diikuti tim serupa, kecuali Musica Champion yang tidak mengirimkan wakil.\r\n\r\nMenurut Joppy kriteria pemilihan klub berdasar prestasi pada Superliga pertama 2007 lalu. "Kami memang mengundang beberapa klub luar Pulau Jawa seperti dari Kutai Kartanegara, Medan dan Makassar. Namun sampai saat terakhir mereka gagal mendapatkan pemain dari luar negeri yang kami anggap sekualitas pemain klub peserta lainnya," kata Joppy. "Daripada kekuatannya nanti njomplang, lebih baik mereka tidak ikut."\r\n\r\nDalam event ini, seluruh kekuatan pemain nasional, baik pelatnas mau pun non pelatnas memang ikut memperkuat klub mereka. Jaya Raya Jakarta mengandalkan ganda putera dunia Markis Kido/Hendra Setiawan, sementara Djarum Kudus diperkuat tunggal putera pelatnas Dionysius Hayom Rumbaka mau pun pemain andalan mereka, Andre Kurniawan Tedjono. Tangkas Alfamart Jakarta berharap pada Simon Santoso, Evert Sukamta serta pemain asal Vietnam, Nguyen Tien Minh.\r\n\r\nJuara bertahanan Jaya Raya Suryanaga Surabaya yang kini bermain di kandang berharap banyak pada tunggal putera Pelatnas, Sony Dwi Kuncoro serta tunggal puteri Lindaweni Fanetri. "Kami akan berusaha mempertahankan supremasi kami empat tahun lalu. Apalagi sekarang kami main di hadapan para pendukung kami sendiri," kata Wijanarko A dari Jaya Raya Suryanaga.\r\n\r\nNamun ancaman besar akan datang dari SGS PLN Bandung. Mereka berharap akan mendulang poin melalui nomor tunggal dengan mengandalkan Taufik Hidayat, Alamsyah Yunus dan Tommy Sugiarto. Sementara di ganda putera mereka mengontrak ganda asal Singapura Hendry Saputra/Chaiyud.\r\n\r\nTaufik sendiri menganggap adanya pemain luar akan membuat tantangan menjadi lebih keras. "Maunya SGS sih menurunkan saya, Chong Wei dan Lin Dan, tetapi kayaknya mereka belum sempat," kata Taufik.', 'bat[3].JPG', '01-January-2001'),
(3, 'Djarum Superligaa', 'Tim putra Jaya Raya Suryanaga Surabaya hanya berhasil menempati posisi kedua dalam turnamen Djarum Super Liga Badminton Indonesia 2011 di Arena DBL Surabaya, Sabtu (26/2). Di partai final, tim kebanggaan warga Kota Surabaya itu ditundukkan SGS PLN Bandung dengan skor 2-3.\r\n\r\nDengan demikian, impian untuk mengawinkan gelas beregu putra dan putri dari turnamen oleh tim Jaya Raya Suryanaga tak kesampaian. Sebelumnya, pada laga di hari Jumat (25/2) kemarin, tim beregu putri Jaya Raya Suryanaga mengandaskan Jaya Raya Jakarta dengan skor telak 3-0.\r\n\r\n"SGS sangat wajar memenangkan laga final ini karena mereka memiliki materi pemain lengkap. Tapi, saya memberikan penghargaan tinggi kepada pemain saya, karena mereka bertanding all out," kata Manajer Manajer Suryanaga, Wijanarko usai laga final.\r\n\r\nPada laga final yang disaksikan ribuan penonton itu, kedua tim bermain sangat ketat. Di partai perdana, SGS membuka kemenangan 1-0 lewat tunggal pertama Lee Chong Wee. Dia mengandaskan tunggal pertama Suryanaga Chan Yan Kit dengan dua set 22-20 dan 21-20.\r\n\r\nDi partai kedua yang mempertandingkan nomor ganda, pasangan Suryanaga Alvent Yulianto/Tri Kusharjanto mengalahkan pasangan Hendry Kurniawan/Chayut Tryachart dengan dua set: 21-13 dan 21-15. Di partai ketiga yang mempertandingkan nomor tunggal, pemain unggulan dari SGS Taufik Hidayat dengan dua set: 21-16 dan 23-21 atas Fauzi Adnan.\r\n\r\nKuat di Ganda\r\n\r\nRupanya kekuatan Suryanaga berada di nomor ganda. Buktinya, di partai keempat yang kembali mempertandingkan nomor ganda, Suryanaga mampu menyamakan kedudukan 2-2 setelah pasangan Rian Agung Saputra/Tri Kusuma Wardana mengandaskan pasangan dengan reputasi internasional kuat dari SGS Hendra Gunawan/Flandi Limpele dengan rubber set: 21-16, 17-21 dan 21-18.\r\n\r\nDi partai penentuan, SGS yang menurunkan tunggal ketiga Tomi Sugiarto mampu merebut kemenangan sehingga unggul 3-2 atas Suryanaga. Tanpa banyak membuang tenaga, Tomi menang dua set 21-3, 21- 12 atas Alrie Guna Dharma.\r\n\r\nTampil sebagai juara pertama, SGS berhak menerima hadiah uang sebesar Rp 350 juta, Suryanaga yang menempati posisi runner up memperoleh hadiah Rp 200 juta dan juara ketiga direbut Djarum Kudus memperoleh hadiah Rp 125 juta dan juara keempat Tangkas Alfamart Jakarta mendapat Rp 75 juta.\r\n\r\nTim putra Djarum menempati posisi ketiga setelah mengandaskan Tangkas dengan 3-2. Tiga kemenangankemenangan Djarum disumbangkan dua gandanya, Yohanes Rendy/Yuris Wirawan, M Ahsan/Fran Kurniawan dan tunggal ketiga Shesar Hiren. Sedang dua kemenangan Tangkas dihasilkan lewat dua tunggalnya, Nguyen Tien Mien dan Simon Santoso.\r\n\r\nYohanes Rendy/Yuris Wirawan mengandaskan Gan Teik Chai/Tan Bin Shen dengan 25-23 dan 21-17. Di ganda kedua, M Ahsan/Fran Kurniawan menundukkan Marcus Fernaldi/Wahyu Nayaka 21-19, 21-18 dan tunggal ketiga Djarum Shesar mengalahkan Ary Trisnanto 16-21, 21-13, 21-16.', 'ja[3].JPG', '01-January-2001');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(5) NOT NULL auto_increment,
  `province` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `province`) VALUES
(1, 'Banten'),
(2, 'Jawa Tengah'),
(3, 'Jawa barat'),
(4, 'jawa timur'),
(5, 'Sumatra');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` varchar(15) NOT NULL,
  `kode_transaksi` varchar(15) NOT NULL,
  `id_member` varchar(15) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `status` enum('ORDER','FREE') NOT NULL,
  `total` int(15) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_transaksi`, `id_member`, `tanggal`, `status`, `total`) VALUES
('f72d6bacff7f269', 'ORDER6BC3D4CEC5', 'ee5d42d03139d00', '01-January-2001', 'FREE', 90000),
('06e3833eee6003f', 'ORDERD80E4D43C9', 'ee5d42d03139d00', '01-January-2001', 'ORDER', 80000),
('30d72a533f9726f', 'ORDERADA332600E', 'ee5d42d03139d00', '01-January-2001', 'ORDER', 165000),
('07ff8e888960b04', 'ORDER408B5A8ABE', 'ee5d42d03139d00', '03-January-2001', 'ORDER', 75000),
('9d350e59f4b0145', 'ORDER35E6B5B95F', 'ee5d42d03139d00', '03-January-2001', 'ORDER', 80000),
('4f479497799f88d', 'ORDER83A10806D1', 'ee5d42d03139d00', '03-January-2001', 'ORDER', 90000),
('b298b6b9a042998', 'ORDER97D9079A4C', 'ee5d42d03139d00', '01-January-2001', 'ORDER', 90000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `kode_transaksi` varchar(15) NOT NULL,
  `id_member` varchar(15) NOT NULL,
  `id_jurnal` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`kode_transaksi`, `id_member`, `id_jurnal`) VALUES
('ORDER6BC3D4CEC5', 'ee5d42d03139d00', '9797d54d4ebffdd'),
('ORDERD80E4D43C9', 'ee5d42d03139d00', '80a0c20124bcb46'),
('ORDERADA332600E', 'ee5d42d03139d00', '9797d54d4ebffdd'),
('ORDERADA332600E', 'ee5d42d03139d00', '9333f3c3c9fa70e'),
('ORDER408B5A8ABE', 'ee5d42d03139d00', '9333f3c3c9fa70e'),
('ORDER35E6B5B95F', 'ee5d42d03139d00', '80a0c20124bcb46'),
('ORDER83A10806D1', 'ee5d42d03139d00', '9797d54d4ebffdd'),
('ORDER97D9079A4C', 'ee5d42d03139d00', '9797d54d4ebffdd');
