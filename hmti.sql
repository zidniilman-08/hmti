-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2018 at 03:39 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmti`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id_ket` int(10) NOT NULL,
  `judul_ket` varchar(300) NOT NULL,
  `isi_ket` text NOT NULL,
  `foto_ket` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id_ket`, `judul_ket`, `isi_ket`, `foto_ket`) VALUES
(1, 'Bokura No Seishun', '<h2><strong><input alt=\"\" src=\"/BokuraSei/assets/editor/kcfinder/upload/files/%5BFizhu%5D%20Yahari%20Ore%20no%20Seishun%20Love%20Comedy%20wa%20Machigatteiru%20(10).jpg\" style=\"float:left; height:94px; width:150px\" type=\"image\" /><u><span style=\"color:#0000cd\"><span style=\"background-color:#e6e6fa\">&nbsp;Bokura No Seishun</span></span></u></strong></h2>\r\n\r\n<p><span style=\"font-family:Georgia,serif\">&nbsp; &nbsp;<u>Sekolah Teknik Tinggi Nusa Putra</u></span></p>\r\n', 'favicon.png');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `devisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(10) NOT NULL,
  `judul_artikel` varchar(250) NOT NULL,
  `kategori_artikel` varchar(250) NOT NULL,
  `foto_artikel` varchar(255) NOT NULL,
  `isi_artikel` mediumtext NOT NULL,
  `slug` varchar(256) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `views_count` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul_artikel`, `kategori_artikel`, `foto_artikel`, `isi_artikel`, `slug`, `active`, `views_count`, `created_at`, `updated_at`) VALUES
(95, 'Mudah Membuat Splash Screen dengan Android Studio', 'Tutorial', 'assets/image_post/1519232377_jpg', '<div class=\"step-contents tab-content\">\r\n<div class=\"active result_scroll step tab-pane\" id=\"step1\">\r\n<div id=\"main_content_post\">\r\n<p>Splash screen adalah istilah yang diberikan pada layar pembuka setiap kali kita menjalankan sebuah aplikasi Android. Contoh splash screen adalah saat kita membuka aplikasi Youtube. Perhatikan gambar di bawah:</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.bignerdranch.com/assets/img/blog/2015/08/youtube_splash.gif\" /> <em>Sumber gambar: <a href=\"https://www.bignerdranch.com\" target=\"_blank\">https://www.bignerdranch.com</a></em></p>\r\n\r\n<p>Sekarang kita akan belajar bagaimana membuat <em>splash screen</em> seperti itu.</p>\r\n\r\n<p>Pertama, kita buat dulu project baru dan beri nama <strong>Splash Screen Codepolitan</strong> dan pilih <strong>Basic Activity</strong> sebagai template awal.</p>\r\n\r\n<p>Selanjutnya, buat file baru bernama <strong>splash_bg.xml</strong> di folder <em>/res/drawable</em> dan isikan dengan kode berikut:</p>\r\n\r\n<pre>\r\n<code>&lt;?xml version=&quot;1.0&quot; encoding=&quot;utf-8&quot;?&gt;\r\n&lt;layer-list xmlns:android=&quot;<a class=\"vglnk\" href=\"http://schemas.android.com/apk/res/android\" rel=\"nofollow\">http://schemas.android.com/apk/res/android</a>&quot;&gt;\r\n\r\n    &lt;item android:drawable=&quot;@color/colorPrimary&quot;/&gt;\r\n\r\n    &lt;item android:gravity=&quot;center&quot; android:width=&quot;100dp&quot; android:height=&quot;100dp&quot;&gt;\r\n        &lt;bitmap\r\n            android:gravity=&quot;fill_horizontal|fill_vertical&quot;\r\n            android:src=&quot;@drawable/logo&quot;/&gt;\r\n    &lt;/item&gt;\r\n\r\n&lt;/layer-list&gt;\r\n</code></pre>\r\n\r\n<p>Kode di atas mengatur warna latar splash screen dibagian <code>&lt;item android:drawable=&quot;@color/colorPrimary&quot;/&gt;</code>. Di bawahnya kita menambah komponen logo dengan mengatur tinggi, lebar, dan sumber gambarnya. Untuk file logo silahkan ambil logo Codepolitan <a href=\"https://files.startupranking.com/startup/thumb/24471_74eecacf22614aefb17dfd382b55f7744cdb3e2e_codepolitan_m.png\" target=\"_blank\">disini</a> dan simpan di folder <em>/res/drawable</em>.</p>\r\n\r\n<p>Berikutnya, kita akan mengatur <em>style</em> khusus untuk splash screen. Buka file <em>res/values/styles.xml</em> dan tambahkan kode berikut di bawah komponen <code>&lt;style/&gt;</code> yang lain:</p>\r\n\r\n<pre>\r\n<code>&lt;style name=&quot;SplashTheme&quot; parent=&quot;Theme.AppCompat.Light.NoActionBar&quot;&gt;\r\n		&lt;item name=&quot;android:windowBackground&quot;&gt;@drawable/splash_bg&lt;/item&gt;\r\n&lt;/style&gt;\r\n</code></pre>\r\n\r\n<p>Setelah selesai mengatur style, sekarang kita buat file java baru dan beri nama <strong>SplashActivity</strong>. File Java ini akan kita jadikan sebagai splash screen. Karena hanya berfungsi sebagai <em>splash screen</em>, maka kita tidak perlu memberikan layout untuknya (tidak ada <code>setContentView</code>):</p>\r\n\r\n<pre>\r\n<code>public class SplashActivity extends AppCompatActivity {\r\n\r\n    @Override\r\n    protected void onCreate(Bundle savedInstanceState) {\r\n        super.onCreate(savedInstanceState);\r\n\r\n        // langsung pindah ke MainActivity atau activity lain \r\n        // begitu memasuki splash screen ini\r\n		Intent intent = new Intent(this, MainActivity.class);\r\n        startActivity(intent);\r\n        finish();\r\n    }\r\n}\r\n</code></pre>\r\n\r\n<p>Karena sudah menambah satu Activity baru secara manual, maka kita perlu menambahkan Activity ini ke AndroidManifest.xml sendiri. Kita juga perlu mengatur agar SplashActivity dipanggil sebagai activity pertama saat memanggil.</p>\r\n\r\n<pre>\r\n<code>&lt;?xml version=&quot;1.0&quot; encoding=&quot;utf-8&quot;?&gt;\r\n&lt;manifest xmlns:android=&quot;<a class=\"vglnk\" href=\"http://schemas.android.com/apk/res/android\" rel=\"nofollow\">http://schemas.android.com/apk/res/android</a>&quot;\r\n    package=&quot;com.lobothijau.splashscreencodepolitan&quot;&gt;\r\n\r\n    &lt;application\r\n        android:allowBackup=&quot;true&quot;\r\n        android:icon=&quot;@mipmap/ic_launcher&quot;\r\n        android:label=&quot;@string/app_name&quot;\r\n        android:roundIcon=&quot;@mipmap/ic_launcher_round&quot;\r\n        android:supportsRtl=&quot;true&quot;\r\n        android:theme=&quot;@style/AppTheme&quot;&gt;\r\n        &lt;activity\r\n            android:name=&quot;.MainActivity&quot;\r\n            android:label=&quot;@string/app_name&quot;\r\n            android:theme=&quot;@style/AppTheme.NoActionBar&quot;&gt;\r\n            &lt;!-- Hapus Intent filter MainActivity --&gt; \r\n        &lt;/activity&gt;\r\n\r\n        &lt;activity android:name=&quot;.SplashActivity&quot; android:theme=&quot;@style/SplashTheme&quot;&gt;\r\n            &lt;intent-filter&gt;\r\n                &lt;action android:name=&quot;android.intent.action.MAIN&quot; /&gt;\r\n                &lt;category android:name=&quot;android.intent.category.LAUNCHER&quot; /&gt;\r\n            &lt;/intent-filter&gt;\r\n        &lt;/activity&gt;\r\n        \r\n    &lt;/application&gt;\r\n\r\n&lt;/manifest&gt;\r\n</code></pre>\r\n\r\n<p>Sekarang, coba jalankan.</p>\r\n\r\n<p><img alt=\"\" src=\"https://media.giphy.com/media/A7Zeid02FJwvtgoc2Q/giphy.gif\" /></p>\r\n\r\n<p><em>Source code: <a href=\"https://github.com/lobothijau/splash_screen\" target=\"_blank\">https://github.com/lobothijau/splash_screen</a></em> <em>Referensi: <a href=\"https://medium.freecodecamp.org/how-to-make-a-splash-screen-on-android-correctly-64ab74482a33\" target=\"_blank\">https://medium.freecodecamp.org/how-to-make-a-splash-screen-on-android-correctly-64ab74482a33</a></em></p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"content-tag\" style=\"margin-top:20px\">\r\n<ul>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n</div>\r\n', 'mudah-membuat-splash-screen-dengan-android-studio', 1, 1, '2018-02-21 09:59:45', '2018-02-21 10:03:04'),
(96, 'LaraStream, Komunitas Live Streaming Developer Laravel', 'News', 'assets/image_post/1519315532_png', '<p>Setiap orang memiliki cara yang berbeda-beda dalam belajar. Ada yang lebih suka membaca, ada yang lebih suka mendengarkan, ada pula yang lebih suka melihat secara langsung/menonton. Bagi developer Laravel yang lebih suka cara belajar dengan melihat secara langsung, ada satu komunitas Laravel baru bernama&nbsp;<strong>LaraStream</strong>&nbsp;yang dapat memenuhi hal tersebut.</p>\r\n\r\n<p><a href=\"https://www.codepolitan.com/mengintegrasikan-ckeditor-di-laravel-5a1d04ac1f749\" target=\"_blank\">Mengintegrasikan CKeditor di Laravel</a></p>\r\n\r\n<p>LaraStream merupakan layanan live streaming yang dibuat oleh Jordan Dalton dimana kita bisa melakukan live coding atau menonton live coding orang lain. Ya, semacam live streaming gaming youtube atau twitch, tapi ini khusus Laravel.</p>\r\n\r\n<p><img alt=\"\" src=\"https://static.cdn-cdpl.com/source/998b78e349061b4971c0a2b0e8d6be41/Screenshot_from_2018-02-20_10-33-27.png\" /></p>\r\n\r\n<p>Menurut Jordan ada satu hal yang kurang dari framework Laravel meskipun telah berkembang menjadi begitu besar. Hal yang kurang tersebut adalah interaksi langsung/<em>live interaction</em>. Ini lah alasan utama Jordna membuat LaraStream yang dia luncurkan beberapa minggu yang lalu. Saat ini sudah ada lebih dari 177 user dengan total&nbsp;<em>stream</em>&nbsp;diatas 60 jam.</p>\r\n\r\n<p><img alt=\"\" src=\"https://static.cdn-cdpl.com/source/998b78e349061b4971c0a2b0e8d6be41/Screenshot_from_2018-02-20_10-39-42.png\" /></p>\r\n\r\n<p>Tertarik untuk mengikuti komunitas LaraStream? Kunjungi situsnya di&nbsp;<a href=\"https://larastream.com/explore\" target=\"_blank\">larastream.com</a>.</p>\r\n\r\n<p><em>Sumber:&nbsp;<a href=\"https://laravel-news.com/larastream-laravel-live-stream-community\" target=\"_blank\">laravel-news</a></em></p>\r\n', 'larastream-komunitas-live-streaming-developer-laravel', 1, 0, '2018-02-22 09:05:34', '2018-02-22 09:07:32'),
(97, 'Mengapa Developer Menyukai Node.js?', 'Info', 'assets/image_post/1519315851_png', '<p>Beberapa bulan yang lalu,&nbsp;<a href=\"https://blog.risingstack.com/why-developers-love-node-js-2018-survey/\" target=\"_blank\">RisingStack</a>&nbsp;mengadakan survei untuk mencari tahu untuk apa Node.js dipakai dan mengapa developer masih memakainya. Tujuan lain dari survei ini ialah untuk mengetahui masalah apa yang paling sering dihadapi developer saat memakai Node, topik yang cukup jarang dibahas. Mereka juga menanyakan dimana tempat men-deploy aplikasi Node, apa teknologi front-end pilihan mereka, juga database apa yang dipakai sebagai tandem Node. Berikut ini daftar pertanyaan yang diajukan:</p>\r\n\r\n<ol>\r\n	<li><a href=\"https://blog.risingstack.com/why-developers-love-node-js-2018-survey/#Q1\" target=\"_blank\">What do you like most about developing with Node.js?</a></li>\r\n	<li><a href=\"https://blog.risingstack.com/why-developers-love-node-js-2018-survey/#Q2\" target=\"_blank\">What are you using Node.js for?</a></li>\r\n	<li><a href=\"https://blog.risingstack.com/why-developers-love-node-js-2018-survey/#Q3\" target=\"_blank\">What difficulties do you face with your production environment?</a></li>\r\n	<li><a href=\"https://blog.risingstack.com/why-developers-love-node-js-2018-survey/#Q4\" target=\"_blank\">What&#39;s the hardest thing for you to get right with Node.js at the moment?</a></li>\r\n	<li><a href=\"https://blog.risingstack.com/why-developers-love-node-js-2018-survey/#Q5\" target=\"_blank\">What Node.js topics are criminally underexplained in your opinion?</a></li>\r\n	<li><a href=\"https://blog.risingstack.com/why-developers-love-node-js-2018-survey/#Q6\" target=\"_blank\">Where do you deploy your Node.js applications?</a></li>\r\n	<li><a href=\"https://blog.risingstack.com/why-developers-love-node-js-2018-survey/#Q7\" target=\"_blank\">Which front-end technology do you plan to use in 2018?</a></li>\r\n	<li><a href=\"https://blog.risingstack.com/why-developers-love-node-js-2018-survey/#Q8\" target=\"_blank\">Which kind of databases do you plan to use in 2018?</a></li>\r\n	<li><a href=\"https://blog.risingstack.com/why-developers-love-node-js-2018-survey/#Q9\" target=\"_blank\">Which flavor of JavaScript do you use?</a></li>\r\n</ol>\r\n\r\n<p>Hasilnya, ada 539 developer yang membagikan pengalaman mereka melalui survei ini.</p>\r\n\r\n<h2>Yang Paling Disukai Dari Node.js</h2>\r\n\r\n<p>Berikut ini beberapa jawaban yang diberikan oleh developer atas pertanyaan apa yang paling disukai saat mengembangkan aplikasi dengan Node.js?</p>\r\n\r\n<ul>\r\n	<li>Node.js memiliki performa yang sangat baik sehingga membuat saya menjadi sangat produktif.</li>\r\n	<li>Ringan untuk melakukan development dilingkungan&nbsp;<em>enterprise</em>, ditambah 400.000 lebih paket npm yang sudah tersedia.</li>\r\n	<li>Front-end, back-end, dan tester menggunakan bahasa yang sama.</li>\r\n	<li>Bisa melakukan pengembangan dengan produktif baik di backend maupun di frontend tanpa harus pusing karena sintaks yang berbeda. Semua menggunakan JavaScript dan cepat untuk membuat prototipe.</li>\r\n	<li>Bahasa yang sama di klien dan server; JavaScript kondusif untuk melakukan&nbsp;<em>functional programming</em>; TypeScript bisa bekerja dengan baik bersama node; memiliki i/o&nbsp;<em>non blocking</em>.</li>\r\n	<li>Menyenangkan, membawa angin segar dibandingkan php.</li>\r\n	<li>Mudah sekali menulis kode di Node.js. Kita bahkan bisa membacanya seperti bahasa manusia.</li>\r\n</ul>\r\n\r\n<h2>API, Backend/Server dan Aplikasi Web</h2>\r\n\r\n<p>Saat menanyakan developer apa yang mereka buat dengan Node, jawabannya bisa memberikan gambaran yang cukup jelas.</p>\r\n\r\n<p><img alt=\"\" src=\"https://blog.risingstack.com/content/images/2018/02/what-are-you-using-node-js-for.jpg\" /></p>\r\n\r\n<p>Jawaban yang diberikan sebetulnya cukup beragam, tapi sebagian besar menulis bahwa mereka membuat REST API atau&nbsp;<em>backend service</em>&nbsp;dengan Node.js. Selain itu, aplikasi web, microservices dan website juga cukup sering di sebut.</p>\r\n\r\n<p><strong>Kasus lain yang juga disebut:</strong></p>\r\n\r\n<ul>\r\n	<li>Membuat aplikasi CLI dan build tools,</li>\r\n	<li>Menulis aplikasi mobile &amp; backends aplikasi tersebut,</li>\r\n	<li>Membangun sistem manajemen,</li>\r\n	<li>Scripting &amp; Automation,</li>\r\n	<li>Rendering React Apps,</li>\r\n	<li>Internet of Things,</li>\r\n	<li>Remote Systems Monitoring,</li>\r\n	<li>Writing Middlewares,</li>\r\n	<li>Authentication,</li>\r\n	<li>Creating Workers</li>\r\n</ul>\r\n\r\n<h2>Kebanyakan Developer Node.js Mengalami Masalah Performa dan Keamanan di Production</h2>\r\n\r\n<p>RisingStack menanyakan kesulitan yang dialami di lingkungan production. Kali ini ada beberapa kategori yang bisa dipilih.</p>\r\n\r\n<p>Dari jawaban yang diberikan, kesulitan yang banyak dipilih adalah&nbsp;<em>performance monitoring</em>,&nbsp;<em>security</em>, dan&nbsp;<em>improving performance</em>.&nbsp;<em>Deployment</em>,&nbsp;<em>scaling</em>&nbsp;dan&nbsp;<em>maintenance</em>&nbsp;juga banyak dipilih. Sepertinya&nbsp;<em>downtimes &amp; networking</em>&nbsp;tidak menyulitkan.</p>\r\n\r\n<p><img alt=\"\" src=\"https://blog.risingstack.com/content/images/2018/02/what-difficulties-do-you-face-with-node-js.jpg\" /></p>\r\n\r\n<h2>Asynchronous Programming dan Security, Hal yang Paling Sulit Dilakukan</h2>\r\n\r\n<p>RisingStack juga menanyakan apa yang yang paling sulit dilakukan dengan benar di Node.js saat ini?</p>\r\n\r\n<p><img alt=\"\" src=\"https://blog.risingstack.com/content/images/2018/02/whats-hard-to-get-right-with-node.jpg\" /></p>\r\n\r\n<ul>\r\n	<li><strong>Asynchronous</strong>: Asynchronous Programming &amp; Behaviour, Async/Await, Async Patterns, Async Hooks.</li>\r\n	<li><strong>Clean Coding:</strong>&nbsp;Code Quality, Code Maintenance / Organization / Management</li>\r\n	<li><strong>Performance</strong>&nbsp;yang dimaksud adalah&nbsp;<em>performance monitoring and improving</em>.</li>\r\n	<li><strong>Module</strong>: mencari modul yang cocok, menjaga dependensi tetap&nbsp;<em>up-to-date</em>, package security &amp; sedikitnya pustaka yang dimaintain dan tidak buggy.</li>\r\n	<li><strong>Testing:</strong>&nbsp;termasuk&nbsp;<em>unit testing</em>&nbsp;&amp;&nbsp;<em>end-to-end testing</em>.</li>\r\n	<li><strong>Monitoring</strong>: masalah-masalah yang menyangkut&nbsp;<em>performance monitoring, tracing &amp; logging</em>.</li>\r\n	<li><strong>Structuring</strong>: umumnya terdapat jawaban seputar&nbsp;<em>planning &amp; structuring complex, scalable architectures</em>.</li>\r\n	<li><strong>Processes:</strong>&nbsp;<em>multithreading, parallel-processing, multiprocessing &amp; handling child processes</em>.</li>\r\n	<li><strong>Promises:</strong>&nbsp;<em>promise patterns, promise driven development, proper use of promises.</em></li>\r\n	<li><strong>Dependency:</strong>&nbsp;umumnya tentang&nbsp;<em>upgrading</em>, mengurangi jumlah dependensi dan mengelolanya.</li>\r\n</ul>\r\n\r\n<h2>Keamanan, Topik yang Paling Underexplained</h2>\r\n\r\n<p><em>Underexplained</em>&nbsp;disini maksudnya adalah topik-topik yang jarang dibahas padahal memiliki kepentingan yang krusial.</p>\r\n\r\n<p><img alt=\"\" src=\"https://blog.risingstack.com/content/images/2018/02/what-node-js-topics-are-criminally-underexplained.jpg\" /></p>\r\n\r\n<h2>AWS Menjadi Juara di Node.js</h2>\r\n\r\n<p>Mayoritas developer menjawab AWS sebagai sistem pilihan mereka untuk men-deploy aplikasi Node.js. Mengungguli hampir dua kali lipat dari posisi kedua, Heroku.</p>\r\n\r\n<p><img alt=\"\" src=\"https://blog.risingstack.com/content/images/2018/02/where-deploy-node-js.jpg\" /></p>\r\n\r\n<h2>React Menjadi Teknologi Frontend Pilihan</h2>\r\n\r\n<p>Sepertinya React memenangkan pertempuran front-end framework dikalangan developer Node. Sama seperti AWS, React mengungguli posisi kedua (Angular) dengan cukup telak.</p>\r\n\r\n<p><img alt=\"\" src=\"https://blog.risingstack.com/content/images/2018/02/which-front-end-in-2018-1.jpg\" /></p>\r\n\r\n<h2>MongoDB Menjadi Database Pilihan</h2>\r\n\r\n<p>Untuk database, MongoDB menjadi pilihan utama. Disini, MongoDB pun mengguli lawan-lawannya dengan cukup telak. Sementara itu, untuk posisi dua sampai empat hanya memiliki perbedaan 5% yang diperebutkan antara Redis, PostgreSQL, dan MySQL.</p>\r\n\r\n<p><img alt=\"\" src=\"https://blog.risingstack.com/content/images/2018/02/which-database-to-use-in-2018.jpg\" /></p>\r\n\r\n<h2>ES Next Paling Banyak Dipakai</h2>\r\n\r\n<p>Diantara beberapa varian JavaScript, ES Next (ES2015+) menjadi nomor satu diikuti oleh ES5, TypeScript, Flow, baru ES6.</p>\r\n\r\n<p><img alt=\"\" src=\"https://blog.risingstack.com/content/images/2018/02/which-flavor-javascript.jpg\" /></p>\r\n\r\n<p><em>Sumber:&nbsp;<a href=\"https://blog.risingstack.com/why-developers-love-node-js-2018-survey/\" target=\"_blank\">RisingStack</a></em></p>\r\n\r\n<p><em>Sumber gambar:&nbsp;<a href=\"https://readwrite.com/2016/04/15/how-node-js-model-open-source-community-pl1/\" target=\"_blank\">ReadWrite</a></em></p>\r\n\r\n<ul>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n', 'mengapa-developer-menyukai-nodejs', 1, 1, '2018-02-22 09:10:52', '2018-02-22 09:20:10'),
(98, 'Nenek 82 Tahun Ini Buktikan Semua Bisa Jadi Programmer', 'News', 'assets/uploads/artikel/2018/2/5a8eeca97d412.jpg', '<p>Programmer memang identik dengan generasi muda masa kini. Tapi, seorang nenek bernama Masako Wakamiya dari Jepang ini membuktikan bahwa semua bisa jadi seorang programmer tanpa memandang umur.</p>\r\n\r\n<p>Nenek yang pensiun sebagai pegawai bank ini pada awalnya meminta beberapa developer untuk membuat kan game bagi para manula, namun tidak ada yang tertarik. Karena tidak ada yang mau memenuhi keinginannya, maka nNnek Wakamiya memutuskan untuk membuat sendiri game tersebut, sebuah keputusan yang terlihat kurang cocok untuk seorang nenek berusia lebih dari 80 tahun ini.</p>\r\n\r\n<p>Aplikasi yang dibuat oleh Nenek Wakamiya bernama,&nbsp;<a href=\"https://itunes.apple.com/jp/app/hinadan/id1199778491\" target=\"_blank\">Hinadan</a>, game iOS tentang festival tradisional Jepang, Hinamatsuri. Aplikasi ini, menurut sang Nenek dikembangkan selama kurang lebih setengah tahun.</p>\r\n\r\n<p><img alt=\"\" src=\"http://i2.cdn.turner.com/money/dam/assets/170302171229-hindan-app-ios-81-year-old-masako-wakamiya--780x439.jpg\" /></p>\r\n\r\n<p><em>Sumber gambar:&nbsp;<a href=\"http://cnn.com/\" rel=\"nofollow\">cnn.com</a></em></p>\r\n\r\n<h2>Awal Mengenal Komputer</h2>\r\n\r\n<p>Sang Nenek sudah mengenal komputer sejak tahun 1990-an, tak lama setelah pensiun dari pekerjaannya. Pada saat ia pertama mengenal komputer ia sudah berusia 60 tahunan. Pada saat itu sistem komputer belum semudah sekarang, ia perlu waktu berbulan-bulan untuk menyiapkan sistem komputernya. Ia pertama-tama mempelajari tentang sistem Microsoft sebelum menggunakan Mac dan iPhone.</p>\r\n\r\n<h2>Belajar Pemrograman Lewat Skype dan Facebook Messenger</h2>\r\n\r\n<p>Berdasarkan pengakuan Nenek Wakamiya, ia belajar pemrograman dengan seorang &quot;anak muda&quot; yang tinggal di Sendai, di Barat Daya Tokyo. Dari anak muda ini, Nenek Wakamiya belajar tentang bahasa pemrograman Swift melalui&nbsp;<strong>Skype</strong>&nbsp;dan&nbsp;<strong>Facebook Messenger</strong>. Sang Nenek betul-betul mengajarkan kita bahwa untuk belajar itu tidak ada batasan. Bahkan Facebook yang paling banyak menyedot waktu kita pun bisa menjadi sarana belajar yang terbukti bisa berhasil.</p>\r\n\r\n<p><a href=\"https://www.codepolitan.com/logika-tidak-cukup-untuk-belajar-pemrograman-58a37dc45dc32\" target=\"_blank\">Logika Tidak Cukup Untuk Belajar Pemrograman</a></p>\r\n\r\n<h2>Motivasi Belajar</h2>\r\n\r\n<p>Motivasi utama Nenek Wakamiya dalam belajar pemrograman dan membuat aplikasi pertamanya ialah karena ia tidak dapat menemukan aplikasi untuk manula seperti dirinya. Ia mengatakan, mayoritas aplikasi di banyak smartphone hanya tersedia dengan menargetkan kawula muda. Sedangkan, aplikasi yang ditujukan dan bisa dinikmati oleh manula hampir tidak ada.</p>\r\n\r\n<p><a href=\"https://www.codepolitan.com/tips-tetap-termotivasi-saat-belajar-pemrograman-5a7a746257d8e\" target=\"_blank\">Tips Tetap Termotivasi Saat Belajar Pemrograman</a></p>\r\n\r\n<p>Dari sana, Nenek Wakamiya memutuskan untuk berkontribusi dengan membuat aplikasi yang bisa dinikmati manula-manula seperti dirinya. Ia juga berharap agar manula bisa mendapat kesenangan dengan memakai komputer.</p>\r\n\r\n<h2>Menjadi Pembicara PBB</h2>\r\n\r\n<p>Karena pencapaiannya, semangat, dan kegigihannya ini, Nenek Wakamiya diundang diberbagai acara. Ia pernah menghadiri&nbsp;<a href=\"http://fortune.com/2017/06/03/wwdc-women/\" target=\"_blank\">WWDC 2017</a>&nbsp;(konferensi programmer-programmer Apple) dan TEDx Talk di Tokyo.</p>\r\n\r\n<p><iframe allowfullscreen=\"\" frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/gUjXiYtOC7Y\" width=\"560\"></iframe></p>\r\n\r\n<p>Belum lama ini, Ia juga diundang untuk memberikan pidato di Kantor Perserikatan Bangsa-bangsa (PBB) di New York membahas tentang teknologi digital bagi manula. Di sana, Ia mendemonstrasikan game yang ia buat sekaligus mengajak peserta konferensi untuk lebih mendorong manula aktif sebagai bagian dari komunitas (digital).</p>\r\n\r\n<p><img alt=\"\" src=\"https://www3.nhk.or.jp/nhkworld/upld/thumbnails/en/news/20180203_11_448572_L.jpg\" /></p>\r\n\r\n<p><em>Sumber gambar: nhk.or.jp</em></p>\r\n\r\n<p><a href=\"https://www.codepolitan.com/manfaat-berkomunitas-profesi-programmer\" target=\"_blank\">Manfaat Berkomunitas untuk Profesi Programmer</a></p>\r\n\r\n<h2>Penutup</h2>\r\n\r\n<p>Dari sini kita bisa melihat bahwa tidak ada kata terlambat untuk belajar. Berusia lanjut bukan menjadi halangan untuk belajar hal baru. Apalagi bagi kita yang memiliki usia jauh lebih muda dibandingkan dengan beliau harus bisa memiliki semangat yang lebih tinggi. Dengan tubuh yang masih sehat, kuat, segar, juga dengan kemampuan otak yang masih fresh, kita memiliki kans yang sebetulnya lebih tinggi untuk bisa menjadi seorang programmer.</p>\r\n\r\n<p>Jika menyerah, kehilangan motivasi, dan akhirnya berhenti di tengah jalan, malu lah kita dengan Nenek Wakamiya. Meskipun sudah berusia lanjut ia masih tetap termotivasi untuk belajar. Motivasnya jelas, ia ingin agar ada aplikasi yang bisa memanjakan para manula seperti dirinya sendiri. Karena jika bukan dia yang mulai bergerak melakukannya, siapa yang ingin membuat aplikasi untuk para manula?</p>\r\n\r\n<p>Oleh karena itu sahabat-sahabatku, tetaplah semangat dalam belajar pemrograman. Semua bisa kok jadi programmer, yang penting adalah motivasi yang kuat dan tentu saja dengan semangat pantang menyerah.</p>\r\n\r\n<p>Sumber:&nbsp;<a href=\"http://money.cnn.com/2017/03/02/technology/81-year-old-woman-publishes-iphone-app-japan/index.html\" target=\"_blank\">cnn.com</a>,&nbsp;<a href=\"http://blog.wonderlabs.io/belajar-dari-masako-wakamiya\" target=\"_blank\">wonderlabs</a>,&nbsp;<a href=\"https://www3.nhk.or.jp/nhkworld/en/news/20180203_11/\" target=\"_blank\">nhk</a></p>\r\n', 'nenek-82-tahun-ini-buktikan-semua-bisa-jadi-programmer', 1, 0, '2018-02-22 09:15:37', '2018-02-22 09:18:33'),
(99, 'Google Buang 700.000 Aplikasi Jahat dari Play Store Tahun 2017', 'News', 'assets/uploads/artikel/2018/2/5a8eed1e77fb9.jpg', '<p>Lebih dari 700.000 aplikasi Android yang melanggar peraturan Google Play tahun 2017 telah dibuang oleh Google. Angka yang cukup besar ini lebih banyak&nbsp;<strong>70%</strong>&nbsp;dari tahun sebelumnya. Langkah ini dilakukan Google untuk menjaga user dari memasang aplikasi yang membahayakan perangkat yang memasangnya.</p>\r\n\r\n<p>Hampir 99% aplikasi dengan konten kekerasan dapat diidentifikasi secara otomatis dan ditolak sebelum user memasangnya. Google membuat pendeteksi yang mampu mengetahui aplikasi yang memiliki konten tidak pantas, berisi malware, atau mencoba menipu user dengan kemiripannya melalui teknik&nbsp;<em>machine learning</em>.</p>\r\n\r\n<p><iframe allowfullscreen=\"\" frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/FMSwhXjEIao\" width=\"560\"></iframe></p>\r\n\r\n<p>Aplikasi yang mencoba menipu penggunanya dengan menggunakan&nbsp;<em>unicode character</em>&nbsp;atau meniru ikon aplikasi lain terdiri dari 250.000-an aplikasi, sepertiga dari aplikasi yang dibuang. Jenis aplikasi lain yang dibuang masuk ke kategori kontent tidak pantas seperti pornografi, kekerasan ekstrim, penyebar kebencian, dan aktivitas ilegal. Kategori aplikasi terakhir yang dihapus dari Google Play adalah&nbsp;<em>Potentially Harmful Application</em>&nbsp;(PHA), salah satu jenis malware yang bisa mengirim pesan penipuan, berfungsi sebagai trojan atau melakukan phising informasi pribadi. Berdasarkan keterangan Google, pemasangan PHA berhasil di kurangi sebesar 50% dari tahun 2016. Keberhasilan ini berkat program Google Play Protect yang dimulai tahun 2017.</p>\r\n\r\n<p>Google Play Protect adalah layanan keamanan untuk Android yang dipasang disetiap perangkat dengan Google Play. Selain menjaga user dari aplikasi tidak aman, Play Protect juga membantu menjaga user dari situs yang berbahaya melalui fitur&nbsp;<strong>Safe Browsing</strong>&nbsp;Google Chrome.</p>\r\n\r\n<p><em>Sumber:&nbsp;<a href=\"http://www.i-programmer.info/news/80-java/11537-google-play-removed-700000-bad-apps-last-year.html\" target=\"_blank\">i-programmer</a>,&nbsp;<a href=\"https://www.android.com/play-protect/\" target=\"_blank\">play-protect</a></em></p>\r\n', 'google-buang-700000-aplikasi-jahat-dari-play-store-tahun-2017', 1, 1, '2018-02-22 09:17:34', '2018-02-22 09:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `artikel_tag`
--

CREATE TABLE `artikel_tag` (
  `id` int(10) NOT NULL,
  `artikel_id` int(10) NOT NULL,
  `tag_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel_tag`
--

INSERT INTO `artikel_tag` (`id`, `artikel_id`, `tag_id`) VALUES
(82, 95, 137),
(83, 96, 138),
(84, 97, 139),
(85, 98, 140),
(86, 99, 141);

-- --------------------------------------------------------

--
-- Table structure for table `artikel_user`
--

CREATE TABLE `artikel_user` (
  `id` int(10) NOT NULL,
  `artikel_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel_user`
--

INSERT INTO `artikel_user` (`id`, `artikel_id`, `user_id`) VALUES
(24, 95, 81),
(25, 96, 81),
(26, 97, 81),
(27, 98, 93),
(28, 99, 93);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `artikel_id` int(11) NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment_user`
--

CREATE TABLE `comment_user` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `comment_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `artikel_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `artikel_id`, `created_at`, `updated_at`) VALUES
(5, 81, 94, '2017-10-12 18:12:09', '2017-10-12 18:12:09'),
(6, 81, 89, '2017-10-12 18:24:28', '2017-10-12 18:24:28'),
(9, 81, 85, '2017-10-12 18:50:30', '2017-10-12 18:50:30'),
(16, 81, 90, '2017-10-13 07:51:30', '2017-10-13 07:51:30'),
(17, 81, 92, '2017-10-13 07:54:27', '2017-10-13 07:54:27'),
(23, 93, 33, '2017-10-13 08:11:01', '2017-10-13 08:11:01'),
(24, 93, 54, '2017-10-13 08:12:20', '2017-10-13 08:12:20'),
(25, 93, 12, '2017-10-13 14:41:23', '2017-10-13 14:41:23'),
(26, 93, 11, '2017-10-14 14:57:45', '2017-10-14 14:57:45'),
(27, 93, 94, '2017-10-18 03:25:36', '2017-10-18 03:25:36'),
(28, 93, 93, '2017-10-18 04:07:21', '2017-10-18 04:07:21'),
(29, 93, 89, '2017-10-27 00:01:06', '2017-10-27 00:01:06'),
(30, 93, 85, '2017-11-11 00:02:30', '2017-11-11 00:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `follows_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul_forum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `judul_forum`, `slug`, `deskripsi`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Laravel Indonesia', 'laravel-indonesia', 'Is anyone using @shipu package Shipu/themevel alongside Laravel Mix? Would anyone mind giving me a few code pointers?\r\n\r\nThanks', NULL, '2017-10-22 03:39:38', '2017-10-22 03:39:38'),
(2, 'Anime indonesia Competitive', 'anime-indonesia-competitive', 'Welcome to the Competitive Discussion forum! We encourage you to use this forum to provide feedback and/or discuss your experiences while playing Overwatch competitively.', NULL, '2017-10-22 05:10:31', '2017-10-22 05:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `forums_post`
--

CREATE TABLE `forums_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `forums_id` int(10) UNSIGNED NOT NULL,
  `isi_post` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forums_post`
--

INSERT INTO `forums_post` (`id`, `forums_id`, `isi_post`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 1, '<p style=\"box-sizing: border-box; line-height: 1.7; margin: 10px 0px 20px; font-size: 14.5px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">o create a migration, use the&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\">make<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">:</span>migration</code>&nbsp;<a style=\"box-sizing: border-box; color: #f4645f; background-color: transparent;\" href=\"https://laravel.com/docs/5.5/artisan\">Artisan command</a>:</p>\r\n<pre class=\" language-php\" style=\"box-sizing: border-box; overflow: auto; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; margin-top: 10px; margin-bottom: 20px; background: rgba(238, 238, 238, 0.35); border-radius: 3px; padding: 10px; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\"><code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; vertical-align: middle;\">php artisan make<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">:</span>migration create_users_table</code></pre>\r\n<p style=\"box-sizing: border-box; line-height: 1.7; margin: 10px 0px 20px; font-size: 14.5px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">The new migration will be placed in your&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\">database<span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">/</span>migrations</code>&nbsp;directory. Each migration file name contains a timestamp which allows Laravel to determine the order of the migrations.</p>\r\n<p style=\"box-sizing: border-box; line-height: 1.7; margin: 10px 0px 20px; font-size: 14.5px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">The&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\"><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">--</span>table</code>&nbsp;and&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\"><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">--</span>create</code>&nbsp;options may also be used to indicate the name of the table and whether the migration will be creating a new table. These options simply pre-fill the generated migration stub file with the specified table:</p>\r\n<pre class=\" language-php\" style=\"box-sizing: border-box; overflow: auto; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; margin-top: 10px; margin-bottom: 20px; background: rgba(238, 238, 238, 0.35); border-radius: 3px; padding: 10px; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\"><code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; vertical-align: middle;\">php artisan make<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">:</span>migration create_users_table <span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">--</span>create<span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">=</span>users\r\n\r\nphp artisan make<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">:</span>migration add_votes_to_users_table <span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">--</span>table<span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">=</span>users</code></pre>\r\n<p style=\"box-sizing: border-box; line-height: 1.7; margin: 10px 0px 20px; font-size: 14.5px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">If you would like to specify a custom output path for the generated migration, you may use the&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\"><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">--</span>path</code>&nbsp;option when executing the&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\">make<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">:</span>migration</code>&nbsp;command. The given path should be relative to your application\'s base path.</p>', NULL, '2017-10-23 10:02:54', '2017-10-23 10:02:54'),
(3, 1, '<h2 style=\"box-sizing: border-box; -webkit-font-smoothing: antialiased; font-size: 30px; font-weight: 400; margin-top: 55px; margin-bottom: 15px; position: relative; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\"><a style=\"box-sizing: border-box; color: #525252; text-decoration-line: none; background-color: transparent;\" href=\"https://laravel.com/docs/5.5/migrations#migration-structure\">Migration Structure</a></h2>\r\n<p style=\"box-sizing: border-box; line-height: 1.7; margin: 10px 0px 20px; font-size: 14.5px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">A migration class contains two methods:&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\">up</code>&nbsp;and&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\">down</code>. The&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\">up</code>&nbsp;method is used to add new tables, columns, or indexes to your database, while the&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\">down</code>&nbsp;method should simply reverse the operations performed by the&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\">up</code>&nbsp;method.</p>\r\n<p style=\"box-sizing: border-box; line-height: 1.7; margin: 10px 0px 20px; font-size: 14.5px; color: #525252; font-family: \'Source Sans Pro\', sans-serif;\">Within both of these methods you may use the Laravel schema builder to expressively create and modify tables. To learn about all of the methods available on the&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\">Schema</code>&nbsp;builder,&nbsp;<a style=\"box-sizing: border-box; color: #f4645f; background-color: transparent;\" href=\"https://laravel.com/docs/5.5/migrations#creating-tables\">check out its documentation</a>. For example, this migration example creates a&nbsp;<code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; color: #f4645f; border-radius: 3px; background: #f0f2f1; padding: 1px 5px; white-space: pre; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\">flights</code>&nbsp;table:</p>\r\n<pre class=\" language-php\" style=\"box-sizing: border-box; overflow: auto; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; font-size: 11px; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; margin-top: 10px; margin-bottom: 20px; background: rgba(238, 238, 238, 0.35); border-radius: 3px; padding: 10px; box-shadow: rgba(0, 0, 0, 0.125) 0px 1px 1px; vertical-align: middle;\"><code class=\" language-php\" style=\"box-sizing: border-box; font-family: \'Operator Mono\', \'Fira Code\', Consolas, Monaco, \'Andale Mono\', monospace; word-spacing: normal; word-break: normal; direction: ltr; text-shadow: #ffffff 0px 1px; line-height: 2; tab-size: 4; hyphens: none; vertical-align: middle;\"><span class=\"token delimiter\" style=\"box-sizing: border-box;\">&lt;?php</span>\r\n\r\n<span class=\"token keyword\" style=\"box-sizing: border-box; color: #0077aa;\">use</span> <span class=\"token package\" style=\"box-sizing: border-box;\">Illuminate<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">\\</span>Support<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">\\</span>Facades<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">\\</span>Schema</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span>\r\n<span class=\"token keyword\" style=\"box-sizing: border-box; color: #0077aa;\">use</span> <span class=\"token package\" style=\"box-sizing: border-box;\">Illuminate<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">\\</span>Database<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">\\</span>Schema<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">\\</span>Blueprint</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span>\r\n<span class=\"token keyword\" style=\"box-sizing: border-box; color: #0077aa;\">use</span> <span class=\"token package\" style=\"box-sizing: border-box;\">Illuminate<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">\\</span>Database<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">\\</span>Migrations<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">\\</span>Migration</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span>\r\n\r\n<span class=\"token keyword\" style=\"box-sizing: border-box; color: #0077aa;\">class</span> <span class=\"token class-name\" style=\"box-sizing: border-box;\">CreateFlightsTable</span> <span class=\"token keyword\" style=\"box-sizing: border-box; color: #0077aa;\">extends</span> <span class=\"token class-name\" style=\"box-sizing: border-box;\">Migration</span>\r\n<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">{</span>\r\n    <span class=\"token comment\" style=\"box-sizing: border-box; color: #999999;\" spellcheck=\"true\">/**\r\n     * Run the migrations.\r\n     *\r\n     * @return void\r\n     */</span>\r\n    <span class=\"token keyword\" style=\"box-sizing: border-box; color: #0077aa;\">public</span> <span class=\"token keyword\" style=\"box-sizing: border-box; color: #0077aa;\">function</span> <span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">up<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span>\r\n    <span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">{</span>\r\n        <span class=\"token scope\" style=\"box-sizing: border-box; color: #da564a;\">Schema<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">::</span></span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">create<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token string\" style=\"box-sizing: border-box; color: #2e7d32;\">\'flights\'</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">,</span> <span class=\"token keyword\" style=\"box-sizing: border-box; color: #0077aa;\">function</span> <span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span>Blueprint <span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$table</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span> <span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">{</span>\r\n            <span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$table</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">increments<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token string\" style=\"box-sizing: border-box; color: #2e7d32;\">\'id\'</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span>\r\n            <span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$table</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">string<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token string\" style=\"box-sizing: border-box; color: #2e7d32;\">\'name\'</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span>\r\n            <span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$table</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">string<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token string\" style=\"box-sizing: border-box; color: #2e7d32;\">\'airline\'</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span>\r\n            <span class=\"token variable\" style=\"box-sizing: border-box; color: #4ea1df;\">$table</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">-</span><span class=\"token operator\" style=\"box-sizing: border-box; color: #555555;\">&gt;</span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">timestamps<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span>\r\n        <span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">}</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span>\r\n    <span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">}</span>\r\n\r\n    <span class=\"token comment\" style=\"box-sizing: border-box; color: #999999;\" spellcheck=\"true\">/**\r\n     * Reverse the migrations.\r\n     *\r\n     * @return void\r\n     */</span>\r\n    <span class=\"token keyword\" style=\"box-sizing: border-box; color: #0077aa;\">public</span> <span class=\"token keyword\" style=\"box-sizing: border-box; color: #0077aa;\">function</span> <span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">down<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span>\r\n    <span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">{</span>\r\n        <span class=\"token scope\" style=\"box-sizing: border-box; color: #da564a;\">Schema<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">::</span></span><span class=\"token function\" style=\"box-sizing: border-box; color: #555555;\">drop<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">(</span></span><span class=\"token string\" style=\"box-sizing: border-box; color: #2e7d32;\">\'flights\'</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">)</span><span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">;</span>\r\n    <span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">}</span>\r\n<span class=\"token punctuation\" style=\"box-sizing: border-box; color: #999999;\">}</span></code></pre>', NULL, '2017-10-23 10:11:00', '2017-10-23 10:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `forums_post_user`
--

CREATE TABLE `forums_post_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `forums_post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forums_post_user`
--

INSERT INTO `forums_post_user` (`id`, `user_id`, `forums_post_id`, `created_at`, `updated_at`) VALUES
(1, 93, 2, NULL, NULL),
(2, 81, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forums_subcribe`
--

CREATE TABLE `forums_subcribe` (
  `id` int(10) UNSIGNED NOT NULL,
  `forums_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subscribed` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forums_subcribe`
--

INSERT INTO `forums_subcribe` (`id`, `forums_id`, `user_id`, `subscribed`, `created_at`, `updated_at`) VALUES
(1, 1, 93, 0, '2017-10-22 03:39:38', '2017-10-22 03:39:38'),
(2, 2, 81, 0, '2017-10-22 05:10:31', '2017-10-22 05:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topik`
--

CREATE TABLE `forum_topik` (
  `id` int(10) UNSIGNED NOT NULL,
  `kategori_topik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(10) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `slug` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `slug`, `created_at`, `updated_at`) VALUES
(116, 'Anime', '', '2016-12-29 08:28:37', '2016-12-29 08:28:37'),
(127, 'Application', '', '2017-01-02 07:07:46', '2017-01-02 07:07:46'),
(129, 'Android', '', '2017-02-02 01:37:39', '2017-02-02 01:37:39'),
(130, 'Game', '', '2017-02-05 07:54:10', '2017-02-05 07:54:10'),
(131, 'Web Programming', '', '2017-02-08 05:12:14', '2017-02-08 05:12:14'),
(132, 'News', '', '2017-03-14 03:37:44', '2017-03-14 03:37:44'),
(133, 'Movie', '', '2017-03-14 03:38:03', '2017-03-14 03:38:03'),
(134, 'Otaku', '', '2017-03-14 03:38:08', '2017-03-14 03:38:08'),
(136, 'Info', '', '2018-02-21 09:54:32', '2018-02-21 09:54:32'),
(137, 'Tutorial', '', '2018-02-21 09:56:56', '2018-02-21 09:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_08_10_085021_create_artikel_table', 1),
('2016_09_14_181117_create_posts_table', 1),
('2017_03_05_132051_create_visitor_table', 3),
('2017_03_05_132226_create_comments_table', 4),
('2017_03_05_133055_create_counters_table', 5),
('2017_03_05_133810_create_counter_table', 6),
('2017_03_05_134535_create_visitors_table', 7),
('2017_10_12_133450_create_followers_table', 8),
('2017_10_12_183358_create_favorites_table', 9),
('2017_10_14_224259_create_tasks_table', 10),
('2017_10_18_161943_create_forums_post_table', 11),
('2017_10_18_162133_create_forums_subcribe_table', 11),
('2017_10_22_095008_create_userforum_table', 12),
('2017_10_22_103016_create_forums_table', 13),
('2017_10_23_164844_create_forum_post_user_table', 14),
('2017_10_30_151119_create_anggota_table', 15),
('2017_10_23_175033_create_forums_topik_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('e9ea926f-06e9-44fc-a26f-b27e0ff37c99', 'App\\Notifications\\NotificationUser', 81, 'App\\models\\User', '{\"artikel\":\"Cara membuat applikasi web dengan vue js\",\"user\":{\"id\":81,\"username\":\"Shounen\",\"email\":\"zidniilman8@gmail.com\",\"hak_akses\":\"admin\",\"image\":\"assets\\/uploads\\/user\\/img\\/1500619626_jpg\",\"skin\":\"skin-red-light\",\"menu\":\"fixed\",\"created_at\":\"2017-04-02 10:14:02\",\"updated_at\":\"2017-08-11 10:39:44\"}}', '2017-08-19 10:46:50', '2017-08-18 05:10:20', '2017-08-19 10:46:50'),
('9094537f-52ea-4bcf-a809-bdaf7b495dae', 'App\\Notifications\\NotificationUser', 81, 'App\\models\\User', '{\"artikel\":\"Membuat karakter anime dengan kertas\",\"user\":{\"id\":81,\"username\":\"Shounen\",\"email\":\"zidniilman8@gmail.com\",\"hak_akses\":\"admin\",\"image\":\"assets\\/uploads\\/user\\/img\\/1500619626_jpg\",\"skin\":\"skin-red-light\",\"menu\":\"fixed\",\"created_at\":\"2017-04-02 10:14:02\",\"updated_at\":\"2017-08-11 10:39:44\"}}', '2017-08-19 10:46:50', '2017-08-19 10:34:18', '2017-08-19 10:46:50'),
('14fc051b-9f70-43ae-b3b6-0848d47f0cef', 'App\\Notifications\\NotificationUser', 81, 'App\\models\\User', '{\"artikel\":\"Test membuat artikel yang sangat bagus\",\"user\":{\"id\":81,\"username\":\"Shounen\",\"email\":\"zidniilman8@gmail.com\",\"hak_akses\":\"admin\",\"image\":\"assets\\/uploads\\/user\\/img\\/1500619626_jpg\",\"skin\":\"skin-red-light\",\"menu\":\"fixed\",\"created_at\":\"2017-04-02 10:14:02\",\"updated_at\":\"2017-08-11 10:39:44\"}}', '2017-08-19 10:56:37', '2017-08-19 10:56:29', '2017-08-19 10:56:37'),
('51cae933-e8ae-4449-851c-b6e142d34318', 'App\\Notifications\\NotificationUser', 81, 'App\\models\\User', '{\"artikel\":\"Cara membuat action vigur menggunak kertas\",\"user\":{\"id\":81,\"username\":\"Shounen\",\"email\":\"zidniilman8@gmail.com\",\"hak_akses\":\"admin\",\"image\":\"assets\\/uploads\\/user\\/img\\/1500619626_jpg\",\"skin\":\"skin-red-light\",\"menu\":\"fixed\",\"created_at\":\"2017-04-02 10:14:02\",\"updated_at\":\"2017-08-11 10:39:44\"}}', '2017-08-19 10:59:55', '2017-08-19 10:59:38', '2017-08-19 10:59:55'),
('4a13aacd-632b-4c16-948a-6ceb3cf1b39a', 'App\\Notifications\\NotificationUser', 81, 'App\\models\\User', '{\"artikel\":\"Cara membuat template website untuk pemula\",\"user\":{\"id\":81,\"username\":\"Shounen\",\"email\":\"zidniilman8@gmail.com\",\"hak_akses\":\"admin\",\"image\":\"assets\\/uploads\\/user\\/img\\/1500619626_jpg\",\"skin\":\"skin-red-light\",\"menu\":\"fixed\",\"created_at\":\"2017-04-02 10:14:02\",\"updated_at\":\"2017-08-11 10:39:44\"}}', '2017-08-20 05:27:22', '2017-08-19 11:05:16', '2017-08-20 05:27:22'),
('882675fb-a408-4333-a5ee-ff2c04edaca1', 'App\\Notifications\\NotificationUser', 90, 'App\\models\\User', '{\"artikel\":\"Cara membuat artikel yang menghibur bagi masayarakat\",\"user\":{\"id\":90,\"username\":\"zilman10\",\"email\":\"zidniilman10@gmail.com\",\"hak_akses\":\"admin\",\"image\":\"assets\\/uploads\\/user\\/img\\/1503169549_jpg\",\"skin\":\"skin-green\",\"menu\":\"fixed sidebar-collapse\",\"created_at\":\"2017-08-19 18:29:19\",\"updated_at\":\"2017-08-19 19:05:50\"}}', '2017-08-19 12:13:34', '2017-08-19 12:12:39', '2017-08-19 12:13:34'),
('fd08dfb8-1f62-484e-836b-e21909769736', 'App\\Notifications\\NotificationUser', 81, 'App\\models\\User', '{\"artikel\":\"okokoko\",\"user\":{\"id\":81,\"username\":\"Shounen\",\"email\":\"zidniilman8@gmail.com\",\"hak_akses\":\"admin\",\"image\":\"assets\\/uploads\\/user\\/img\\/1504349317_png\",\"cover\":\"\",\"skin\":\"skin-red-light\",\"menu\":\"fixed\",\"slug\":\"\",\"created_at\":\"2017-04-02 10:14:02\",\"updated_at\":\"2017-09-02 10:48:40\"}}', '2017-09-04 08:58:56', '2017-09-04 08:57:12', '2017-09-04 08:58:56'),
('2ab854f4-49b5-49cc-bc09-7c92fb7375a9', 'App\\Notifications\\NotificationUser', 81, 'App\\models\\User', '{\"artikel\":\"Shounenanda membuat artikelabcds\",\"user\":{\"id\":81,\"username\":\"Shounen\",\"email\":\"zidniilman8@gmail.com\",\"hak_akses\":\"admin\",\"image\":\"assets\\/uploads\\/user\\/img\\/1504349317_png\",\"cover\":\"\",\"skin\":\"skin-red-light\",\"menu\":\"fixed\",\"slug\":\"\",\"created_at\":\"2017-04-02 10:14:02\",\"updated_at\":\"2017-09-02 10:48:40\"}}', '2017-09-09 02:56:55', '2017-09-09 02:52:52', '2017-09-09 02:56:55'),
('a34b4eae-90f2-45a8-93c3-9f8371ec9f68', 'App\\Notifications\\NotificationUser', 81, 'App\\models\\User', '{\"artikel\":\"Shounen anda membuat artikel zidnsas\",\"user\":{\"id\":81,\"username\":\"Shounen\",\"email\":\"zidniilman8@gmail.com\",\"hak_akses\":\"admin\",\"image\":\"assets\\/uploads\\/user\\/img\\/1504349317_png\",\"cover\":\"\",\"skin\":\"skin-red-light\",\"menu\":\"fixed\",\"slug\":\"\",\"created_at\":\"2017-04-02 10:14:02\",\"updated_at\":\"2017-09-02 10:48:40\"}}', '2017-09-09 02:56:55', '2017-09-09 02:56:36', '2017-09-09 02:56:55'),
('238c66d8-7ee8-4459-977f-ee8311f3e18b', 'App\\Notifications\\NotifUser', 93, 'App\\models\\User', '{\"artikel\":\"zidniilman07 membuat artikel dsfsdfdsf\",\"user\":{}}', '2017-09-10 03:13:25', '2017-09-09 03:15:25', '2017-09-10 03:13:25'),
('0915785e-4e94-450e-a7c7-4441c4693a8a', 'App\\Notifications\\NotifUser', 93, 'App\\models\\User', '{\"artikel\":\"zidniilman07 membuat artikel dgffhgfh\",\"user\":{}}', '2017-09-10 03:13:25', '2017-09-09 03:17:46', '2017-09-10 03:13:25'),
('56ad4d06-1717-44bb-ab8d-453cf665925f', 'App\\Notifications\\NotifUser', 93, 'App\\models\\User', '{\"artikel\":\"zidniilman07 membuat artikel yhuyththtyh\",\"user\":{\"id\":93,\"username\":\"zidniilman07\",\"email\":\"zidniilman7@gmail.com\",\"hak_akses\":\"user\",\"image\":\"assets\\/uploads\\/user\\/1504384735.png\",\"cover\":\"assets\\/uploads\\/user\\/cover\\/1504713488.png\",\"skin\":\"skin-blue\",\"menu\":\"fixed\",\"slug\":\"zidniilman07\",\"created_at\":\"2017-08-22 12:13:01\",\"updated_at\":\"2017-09-06 15:58:08\"}}', '2017-09-10 03:13:25', '2017-09-09 03:19:19', '2017-09-10 03:13:25'),
('493e6dec-754f-4585-9d96-37090310b5ed', 'App\\Notifications\\NotifUser', 93, 'App\\models\\User', '{\"artikel\":\"zidniilman07 membuat artikel sadasdas\",\"user\":{\"id\":93,\"username\":\"zidniilman07\",\"email\":\"zidniilman7@gmail.com\",\"hak_akses\":\"user\",\"image\":\"assets\\/uploads\\/user\\/1504384735.png\",\"cover\":\"assets\\/uploads\\/user\\/cover\\/1504713488.png\",\"skin\":\"skin-blue\",\"menu\":\"fixed\",\"slug\":\"zidniilman07\",\"created_at\":\"2017-08-22 12:13:01\",\"updated_at\":\"2017-09-06 15:58:08\"}}', '2017-09-10 03:13:25', '2017-09-09 03:20:27', '2017-09-10 03:13:25'),
('90413e64-37d6-48ba-b43e-0fd92a644d3f', 'App\\Notifications\\NotifUser', 93, 'App\\models\\User', '{\"artikel\":\"zidniilman07 membuat artikel yhtyhtyh\",\"user\":[{\"id\":81,\"username\":\"Shounen\",\"email\":\"zidniilman8@gmail.com\",\"hak_akses\":\"admin\",\"image\":\"assets\\/uploads\\/user\\/img\\/1504349317_png\",\"cover\":\"\",\"skin\":\"skin-red-light\",\"menu\":\"fixed\",\"slug\":\"\",\"created_at\":\"2017-04-02 10:14:02\",\"updated_at\":\"2017-09-02 10:48:40\"}]}', '2017-09-10 03:13:25', '2017-09-09 03:36:51', '2017-09-10 03:13:25'),
('76ed20ee-a8aa-4148-b613-dcdb817bf8ae', 'App\\Notifications\\NotifUser', 93, 'App\\models\\User', '{\"artikel\":\"zidniilman07 membuat artikel sadasdas\",\"user\":{\"id\":81,\"username\":\"Shounen\",\"email\":\"zidniilman8@gmail.com\",\"hak_akses\":\"admin\",\"image\":\"assets\\/uploads\\/user\\/img\\/1504349317_png\",\"cover\":\"\",\"skin\":\"skin-red-light\",\"menu\":\"fixed\",\"slug\":\"\",\"created_at\":\"2017-04-02 10:14:02\",\"updated_at\":\"2017-09-02 10:48:40\"}}', '2017-09-10 03:13:25', '2017-09-09 03:41:59', '2017-09-10 03:13:25'),
('ff964a9d-aba2-4fde-a591-2c400fb4186d', 'App\\Notifications\\NotifUser', 93, 'App\\models\\User', '{\"artikel\":\"zidniilman07 membuat artikel dfdsfdsf\",\"user\":{\"id\":81,\"username\":\"Shounen\",\"email\":\"zidniilman8@gmail.com\",\"hak_akses\":\"admin\",\"image\":\"assets\\/uploads\\/user\\/img\\/1504349317_png\",\"cover\":\"\",\"skin\":\"skin-red-light\",\"menu\":\"fixed\",\"slug\":\"\",\"created_at\":\"2017-04-02 10:14:02\",\"updated_at\":\"2017-09-02 10:48:40\"}}', '2017-09-10 03:13:25', '2017-09-09 03:43:40', '2017-09-10 03:13:25'),
('5d3332b3-3406-4d1e-8115-98eae705942c', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat arikel dsfdsf\",\"action\":\"http:\\/\\/localhost\\/blog\\/dsfdsf\"}', '2017-09-09 04:21:02', '2017-09-09 03:55:19', '2017-09-09 04:21:02'),
('a16a6012-ad58-47ac-b5d3-bc98f5019231', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat artikel Rokudenashi Majutsu Koushi to Akashic Records\",\"action\":\"http:\\/\\/localhost\\/blog\\/rokudenashi-majutsu-koushi-to-akashic-records\"}', '2017-09-09 05:28:34', '2017-09-09 05:26:18', '2017-09-09 05:28:34'),
('cc0a59ce-b25f-4a69-ba3a-e4c17b0090f4', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat artikel Rokudenashi Majutsu Koushi to Akashic Records\",\"action\":\"http:\\/\\/localhost\\/blog\\/rokudenashi-majutsu-koushi-to-akashic-records\"}', '2017-11-10 21:48:46', '2017-09-09 05:31:40', '2017-11-10 21:48:46'),
('208ce5b7-8ca5-4a51-9c46-b273ffb1ae15', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat artikel Koe No Katachi\",\"action\":\"http:\\/\\/localhost\\/blog\\/koe-no-katachi\"}', '2017-11-10 21:48:46', '2017-09-09 06:14:01', '2017-11-10 21:48:46'),
('6223af9a-918c-411a-a04e-cb852f90a608', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat artikel Tsurezure Children\",\"action\":\"http:\\/\\/localhost\\/blog\\/tsurezure-children\"}', '2017-11-10 21:48:46', '2017-11-10 21:36:19', '2017-11-10 21:48:46'),
('2b5ee9c1-189d-48fe-9862-f23fbc0d395d', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"Shounen mempublikasikan artikel anda Tsurezure Children\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1504349317_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1510374975_png\",\"action\":\"http:\\/\\/localhost\\/blog\\/tsurezure-children\"}', '2017-11-10 22:42:50', '2017-11-10 21:48:39', '2017-11-10 22:42:50'),
('0fe9bd6e-31e8-46d8-9d31-499fa67f0ff5', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat artikel Anime : Gamers!\",\"action\":\"http:\\/\\/localhost\\/blog\\/anime-gamers\"}', '2017-11-11 05:49:36', '2017-11-10 22:56:03', '2017-11-11 05:49:36'),
('3b3d2229-9fe5-4b0f-9b88-d9ed1e09a8d4', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"Shounen mempublikasikan artikel anda Anime : Gamers!\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1504349317_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1510379761_jpg\",\"action\":\"http:\\/\\/localhost\\/blog\\/anime-gamers\"}', '2017-11-10 23:08:28', '2017-11-10 22:59:06', '2017-11-10 23:08:28'),
('a0d0afa9-5f10-4d08-96f7-c5b02e72d3b0', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat artikel Anime Gamers!\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1504963342_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1510403350_png\",\"action\":\"http:\\/\\/localhost\\/blog\\/anime-gamers\"}', '2017-11-11 05:49:36', '2017-11-11 05:29:16', '2017-11-11 05:49:36'),
('1a954396-1630-46f5-9b79-81bb5e885fed', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"Shounen mempublikasikan artikel anda Anime Gamers!\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1504349317_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1510403350_png\",\"action\":\"http:\\/\\/localhost\\/blog\\/anime-gamers\"}', '2017-09-13 14:14:47', '2017-11-11 05:45:00', '2017-09-13 14:14:47'),
('c1510af6-37be-40bf-9677-619966662666', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat artikel Anime Gamers!\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1504963342_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1505221628_jpg\",\"action\":\"http:\\/\\/localhost\\/blog\\/anime-gamers\"}', '2017-09-13 14:33:01', '2017-09-12 06:07:17', '2017-09-13 14:33:01'),
('b4113725-2e53-4938-a020-e57883463459', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"Shounen mempublikasikan artikel anda Anime Gamers!\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1504349317_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1505221628_jpg\",\"action\":\"http:\\/\\/localhost\\/blog\\/anime-gamers\"}', '2017-09-13 14:14:48', '2017-09-12 06:08:39', '2017-09-13 14:14:48'),
('be4cbb65-f6e7-43ba-b6d4-29c494c67a79', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat artikel Anime:  Princess Principal\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1504963342_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1505337511_jpg\",\"action\":\"http:\\/\\/localhost\\/blog\\/anime-princess-principal\"}', '2017-09-13 14:33:01', '2017-09-13 14:18:35', '2017-09-13 14:33:01'),
('aa1e25aa-63e4-49ac-8b39-0fc7fd72f120', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"Shounen mempublikasikan artikel anda Anime:  Princess Principal\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1504349317_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1505337511_jpg\",\"action\":\"http:\\/\\/localhost\\/blog\\/anime-princess-principal\"}', '2017-09-13 14:30:54', '2017-09-13 14:19:57', '2017-09-13 14:30:54'),
('0c5e131a-edfa-458b-b912-d6e9b63f358b', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat artikel Bokura Wa Minna Kawaisou\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1504963342_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1505386121_jpg\",\"action\":\"http:\\/\\/localhost\\/blog\\/bokura-wa-minna-kawaisou\"}', '2017-09-20 02:13:37', '2017-09-14 03:48:46', '2017-09-20 02:13:37'),
('8d4bf16f-1395-4085-9a82-0937009e196d', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"Shounen mempublikasikan artikel anda Bokura Wa Minna Kawaisou\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1504349317_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1505386121_jpg\",\"action\":\"http:\\/\\/localhost\\/blog\\/bokura-wa-minna-kawaisou\"}', '2017-09-22 20:10:08', '2017-09-14 03:50:14', '2017-09-22 20:10:08'),
('38ff8a7a-3e9b-4974-921f-c1e87557367f', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat artikel Bokura Wa Minna Kawaisou\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1505389599_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1505468785_jpg\",\"action\":\"http:\\/\\/localhost\\/blog\\/bokura-wa-minna-kawaisou\"}', '2017-09-20 02:13:36', '2017-09-15 02:46:29', '2017-09-20 02:13:36'),
('c78b74ee-eac7-4264-9ed0-595b814232d3', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"Shounen mempublikasikan artikel anda Anime:  Princess Principal\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1504349317_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1505337511_jpg\",\"action\":\"http:\\/\\/localhost\\/blog\\/artikels\\/anime-princess-principal\"}', '2017-09-22 20:10:08', '2017-09-15 02:49:09', '2017-09-22 20:10:08'),
('abb786fd-474d-4bb4-9648-0797ae9fe7e9', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"Shounen mempublikasikan artikel anda Bokura Wa Minna Kawaisou\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1504349317_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1505468785_jpg\",\"action\":\"http:\\/\\/localhost\\/blog\\/artikels\\/bokura-wa-minna-kawaisou\"}', '2017-09-22 20:10:08', '2017-09-15 02:49:27', '2017-09-22 20:10:08'),
('714b3a51-dd5a-4e4b-8c07-2fa2e0964e51', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"Shounen mempublikasikan artikel anda Anime Gamers!\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1504349317_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1505221628_jpg\",\"action\":\"http:\\/\\/localhost\\/blog\\/artikels\\/anime-gamers\"}', '2017-09-22 20:10:07', '2017-09-15 02:50:45', '2017-09-22 20:10:07'),
('84ced529-a694-4764-a446-1a3ed29c0dc9', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat artikel Ore No Imouto Ga Konnani Kawai Wake Ga Nai!\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1505389599_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1507019497_png\",\"action\":\"http:\\/\\/localhost\\/blog\\/ore-no-imouto-ga-konnani-kawai-wake-ga-nai\"}', '2017-10-12 07:43:48', '2017-10-03 01:31:45', '2017-10-12 07:43:48'),
('01711b3a-240e-4a5b-a037-b12588226dba', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Ore No Imouto Ga Konnani Kawai Wake Ga Nai!\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1507019497_png\",\"action\":\"http:\\/\\/localhost\\/blog\\/artikels\\/ore-no-imouto-ga-konnani-kawai-wake-ga-nai\"}', '2017-10-11 14:54:16', '2017-10-03 02:09:32', '2017-10-11 14:54:16'),
('c5fa49c5-26d1-4207-a624-111b4f36c9e2', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat artikel Membuat web dengan freamwork laravel\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1505389599_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1507553541_png\",\"action\":\"http:\\/\\/localhost\\/blog\\/membuat-web-dengan-freamwork-laravel\"}', '2017-10-12 07:43:48', '2017-10-09 12:52:26', '2017-10-12 07:43:48'),
('7a2922ee-9f4b-43a8-be2a-f04e94ba82d0', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Membuat web dengan freamwork laravel\",\"foto_admin\":\"http:\\/\\/localhost\\/blog\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost\\/blog\\/assets\\/image_post\\/1507553541_png\",\"action\":\"http:\\/\\/localhost\\/blog\\/artikels\\/membuat-web-dengan-freamwork-laravel\"}', '2017-10-11 14:54:16', '2017-10-09 12:53:07', '2017-10-11 14:54:16'),
('aaa31b37-d7fb-44e1-b1be-41326665feec', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Membuat web dengan freamwork laravel\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/image_post\\/1507553541_png\",\"action\":\"membuat-web-dengan-freamwork-laravel\"}', '2017-10-11 14:54:16', '2017-10-11 14:15:03', '2017-10-11 14:54:16'),
('21d23eae-7679-4668-994b-658f1ad40cf9', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Membuat web dengan freamwork laravel\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/image_post\\/1507553541_png\",\"action\":\"membuat-web-dengan-freamwork-laravel\"}', '2017-10-11 14:54:15', '2017-10-11 14:36:33', '2017-10-11 14:54:15'),
('42c16307-67a2-440d-bd83-40dbc5643c7e', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Membuat web dengan freamwork laravel\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/image_post\\/1507553541_png\",\"action\":\"membuat-web-dengan-freamwork-laravel\"}', '2017-10-12 09:49:18', '2017-10-11 17:41:33', '2017-10-12 09:49:18'),
('6efbe06e-94e5-48ac-9340-9fb1a7e90da2', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Ore No Imouto Ga Konnani Kawai Wake Ga Nai!\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/image_post\\/1507019497_png\",\"action\":\"ore-no-imouto-ga-konnani-kawai-wake-ga-nai\"}', '2017-10-12 09:49:18', '2017-10-11 17:42:05', '2017-10-12 09:49:18'),
('a5e42b01-8793-4b71-be7f-bd90d87a0863', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Anime Gamers!\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/image_post\\/1505221628_jpg\",\"action\":\"anime-gamers\"}', '2017-10-12 09:49:18', '2017-10-11 17:42:58', '2017-10-12 09:49:18'),
('4afab962-a92a-4911-8fef-f962157c86bd', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Rokudenashi Majutsu Koushi to Akashic Records\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/image_post\\/1504960298_jpg\",\"action\":\"rokudenashi-majutsu-koushi-to-akashic-records\"}', '2017-10-12 09:49:18', '2017-10-11 17:43:31', '2017-10-12 09:49:18'),
('aa1cd017-3faf-4077-bcc8-8b3732b724a8', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Bokura Wa Minna Kawaisou\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/image_post\\/1505468785_jpg\",\"action\":\"bokura-wa-minna-kawaisou\"}', '2017-10-12 09:49:18', '2017-10-12 08:49:04', '2017-10-12 09:49:18'),
('0db665a9-8dc7-4811-936e-558734c1e106', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Ore No Imouto Ga Konnani Kawai Wake Ga Nai!\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/image_post\\/1507019497_png\",\"action\":\"ore-no-imouto-ga-konnani-kawai-wake-ga-nai\"}', '2017-10-12 09:49:18', '2017-10-12 08:49:21', '2017-10-12 09:49:18'),
('aeace028-93c5-4c38-9358-b84383c31cfd', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Ore No Osana najimi to kanojo to\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/1498928482_png\",\"action\":\"ore-no-osana-najimi-to-kanojo-to\"}', '2017-10-12 09:49:18', '2017-10-12 08:58:40', '2017-10-12 09:49:18'),
('f3b244a2-8a5a-49fc-9711-f35feba6605c', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Koe No Katachi\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/image_post\\/1504962838_jpg\",\"action\":\"koe-no-katachi\"}', '2017-10-12 09:49:18', '2017-10-12 09:16:53', '2017-10-12 09:49:18'),
('d0294592-3b7d-4267-a8a1-bcfd441b8481', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Membuat web dengan freamwork laravel\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/image_post\\/1507553541_png\",\"action\":\"membuat-web-dengan-freamwork-laravel\"}', '2017-10-12 09:49:18', '2017-10-12 09:23:36', '2017-10-12 09:49:18'),
('295b083a-fe9b-4e8d-a556-c285a050af60', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Ore No Imouto Ga Konnani Kawai Wake Ga Nai!\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/image_post\\/1507019497_png\",\"action\":\"ore-no-imouto-ga-konnani-kawai-wake-ga-nai\"}', '2017-10-12 09:49:18', '2017-10-12 09:24:44', '2017-10-12 09:49:18'),
('bb3d49fb-18a5-4e6a-a89d-29834fdda025', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Membuat web dengan freamwork laravel\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/image_post\\/1507553541_png\",\"action\":\"membuat-web-dengan-freamwork-laravel\"}', '2017-10-12 09:49:17', '2017-10-12 09:42:17', '2017-10-12 09:49:17'),
('90bb3502-3cee-467a-8ad7-ddaeca8e8d76', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Membuat web dengan freamwork laravel\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/image_post\\/1507553541_png\",\"action\":\"membuat-web-dengan-freamwork-laravel\"}', '2017-10-12 09:49:17', '2017-10-12 09:45:06', '2017-10-12 09:49:17'),
('a9d902e8-26a8-4d04-8ac6-626f51c61e82', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Bokura Wa Minna Kawaisou\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/image_post\\/1505468785_jpg\",\"action\":\"bokura-wa-minna-kawaisou\"}', '2017-10-12 09:49:17', '2017-10-12 09:45:39', '2017-10-12 09:49:17'),
('f6b71600-75d2-4af4-9428-3b9db696fec7', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Ore No Osana najimi to kanojo to\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/1498928482_png\",\"action\":\"ore-no-osana-najimi-to-kanojo-to\"}', '2017-10-12 09:49:17', '2017-10-12 09:47:15', '2017-10-12 09:49:17'),
('96566134-e973-4ee5-a069-ac51c966ef8c', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Ore No Osana najimi to kanojo to\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/1498928482_png\",\"action\":\"ore-no-osana-najimi-to-kanojo-to\"}', '2017-10-12 11:22:44', '2017-10-12 11:12:44', '2017-10-12 11:22:44'),
('588e5036-6ba5-48e0-b314-1ef3aaa6e751', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat artikel Anime Terbaik tahun 2017\",\"foto_admin\":\"http:\\/\\/himpunan.dev\\/assets\\/uploads\\/user\\/img\\/1505389599_png\",\"foto_artikel\":\"http:\\/\\/himpunan.dev\\/assets\\/image_post\\/1508247079_png\",\"action\":\"http:\\/\\/himpunan.dev\\/anime-terbaik-tahun-2017\"}', '2017-10-18 04:20:10', '2017-10-17 06:31:22', '2017-10-18 04:20:10'),
('2fae76be-ec24-43ff-b231-742586cd3614', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat artikel Anime Ferstifal 2017\",\"foto_admin\":\"http:\\/\\/himpunan.dev\\/assets\\/uploads\\/user\\/img\\/1505389599_png\",\"foto_artikel\":\"http:\\/\\/himpunan.dev\\/C:\\\\laragon\\\\www\\\\himpunan\\\\public\\\\assets\\/uploads\\/2017\\/10\\/59e627cd79442.png\",\"action\":\"http:\\/\\/himpunan.dev\\/anime-ferstifal-2017\"}', '2017-10-18 04:20:10', '2017-10-17 08:54:58', '2017-10-18 04:20:10'),
('9fc0db75-f4de-45f5-8ee7-b78e67bcfc9e', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Anime Ferstifal 2017\",\"foto_admin\":\"http:\\/\\/himpunan.dev\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/himpunan.dev\\/C:\\\\laragon\\\\www\\\\himpunan\\\\public\\\\assets\\/uploads\\/2017\\/10\\/59e627cd79442.png\",\"action\":\"anime-ferstifal-2017\"}', '2017-10-18 01:05:48', '2017-10-17 08:56:17', '2017-10-18 01:05:48'),
('c38ee6f1-ba9d-4ebb-b663-2704e9774e0b', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat artikel Anime Festifal 2017\",\"foto_admin\":\"http:\\/\\/himpunan.dev\\/assets\\/uploads\\/user\\/img\\/1505389599_png\",\"foto_artikel\":\"http:\\/\\/himpunan.dev\\/assets\\/uploads\\/2017\\/10\\/59e6295a185c1.png\",\"action\":\"http:\\/\\/himpunan.dev\\/anime-festifal-2017\"}', '2017-10-18 04:20:09', '2017-10-17 09:01:31', '2017-10-18 04:20:09'),
('ea09e46f-8def-457c-ac28-48941d854f62', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Anime Festifal 2017\",\"foto_admin\":\"http:\\/\\/himpunan.dev\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/himpunan.dev\\/assets\\/uploads\\/2017\\/10\\/59e6295a185c1.png\",\"action\":\"anime-festifal-2017\"}', '2017-10-18 01:05:48', '2017-10-17 09:02:54', '2017-10-18 01:05:48'),
('6d998adc-cf33-4563-a7aa-76e9a08c5e5b', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Membuat web dengan freamwork laravel\",\"foto_admin\":\"http:\\/\\/blog.dev\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/blog.dev\\/assets\\/image_post\\/1507553541_png\",\"action\":\"membuat-web-dengan-freamwork-laravel\"}', '2017-10-19 06:18:33', '2017-10-19 06:16:00', '2017-10-19 06:18:33'),
('0ae83363-7575-48cb-97b6-5e2b14c88851', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Membuat web dengan freamwork laravel\",\"foto_admin\":\"http:\\/\\/blog.dev\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/blog.dev\\/assets\\/image_post\\/1507553541_png\",\"action\":\"membuat-web-dengan-freamwork-laravel\"}', '2017-10-19 06:18:33', '2017-10-19 06:18:00', '2017-10-19 06:18:33'),
('eee188f4-b736-49ad-88f6-d3e6e31c04cb', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Membuat web dengan freamwork laravel\",\"foto_admin\":\"http:\\/\\/blog.dev\\/assets\\/uploads\\/user\\/img\\/1506157231_png\",\"foto_artikel\":\"http:\\/\\/blog.dev\\/assets\\/image_post\\/1507553541_png\",\"action\":\"membuat-web-dengan-freamwork-laravel\"}', NULL, '2017-10-19 06:19:09', '2017-10-19 06:19:09'),
('bceead16-c9d3-46a9-a5fa-340454b65556', 'App\\Notifications\\PublishPost', 81, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Mudah Membuat Splash Screen dengan Android Studio\",\"foto_admin\":\"http:\\/\\/hmti.dev\\/assets\\/uploads\\/user\\/shounen\\/1519231200_png\",\"foto_artikel\":\"http:\\/\\/hmti.dev\\/assets\\/image_post\\/1519232377_jpg\",\"action\":\"mudah-membuat-splash-screen-dengan-android-studio\"}', '2018-02-22 17:14:09', '2018-02-21 10:00:25', '2018-02-22 17:14:09'),
('1347da6f-d8da-408c-ab3e-88204664638b', 'App\\Notifications\\PublishPost', 81, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda LaraStream, Komunitas Live Streaming Developer Laravel\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/shounen\\/1519231200_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/image_post\\/1519315532_png\",\"action\":\"larastream-komunitas-live-streaming-developer-laravel\"}', '2018-02-22 17:14:09', '2018-02-22 09:07:33', '2018-02-22 17:14:09'),
('bff257d7-5e57-4ec6-bac1-24d323ab9bae', 'App\\Notifications\\PublishPost', 81, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Mengapa Developer Menyukai Node.js?\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/shounen\\/1519231200_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/image_post\\/1519315851_png\",\"action\":\"mengapa-developer-menyukai-nodejs\"}', '2018-02-22 17:14:09', '2018-02-22 09:11:27', '2018-02-22 17:14:09'),
('46fb6b8c-cac5-4691-9372-777ffedd0c7c', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat artikel Nenek 82 Tahun Ini Buktikan Semua Bisa Jadi Programmer\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/images\\/user\\/zidniilman07\\/1519230741.png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/artikel\\/2018\\/2\\/5a8eeca97d412.jpg\",\"action\":\"http:\\/\\/localhost:8000\\/nenek-82-tahun-ini-buktikan-semua-bisa-jadi-programmer\"}', '2018-02-22 17:14:09', '2018-02-22 09:15:37', '2018-02-22 17:14:09'),
('f3c22058-daa8-4928-963b-bc08c730d880', 'App\\Notifications\\NotifUser', 81, 'App\\models\\User', '{\"message\":\"zidniilman07 membuat artikel Google Buang 700.000 Aplikasi Jahat dari Play Store Tahun 2017\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/images\\/user\\/zidniilman07\\/1519230741.png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/artikel\\/2018\\/2\\/5a8eed1e77fb9.jpg\",\"action\":\"http:\\/\\/localhost:8000\\/google-buang-700000-aplikasi-jahat-dari-play-store-tahun-2017\"}', '2018-02-22 17:14:09', '2018-02-22 09:17:35', '2018-02-22 17:14:09'),
('fc3536bf-2271-4bc1-b49a-3eaaa05e2acb', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Google Buang 700.000 Aplikasi Jahat dari Play Store Tahun 2017\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/shounen\\/1519231200_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/artikel\\/2018\\/2\\/5a8eed1e77fb9.jpg\",\"action\":\"google-buang-700000-aplikasi-jahat-dari-play-store-tahun-2017\"}', NULL, '2018-02-22 09:18:29', '2018-02-22 09:18:29'),
('874b8b6f-c00e-42a1-a762-6462868d5719', 'App\\Notifications\\PublishPost', 93, 'App\\models\\User', '{\"message\":\"shounen mempublikasikan artikel anda Nenek 82 Tahun Ini Buktikan Semua Bisa Jadi Programmer\",\"foto_admin\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/user\\/shounen\\/1519231200_png\",\"foto_artikel\":\"http:\\/\\/localhost:8000\\/assets\\/uploads\\/artikel\\/2018\\/2\\/5a8eeca97d412.jpg\",\"action\":\"nenek-82-tahun-ini-buktikan-semua-bisa-jadi-programmer\"}', NULL, '2018-02-22 09:18:33', '2018-02-22 09:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(1) NOT NULL DEFAULT '0',
  `loading` varchar(300) NOT NULL,
  `menu` varchar(300) NOT NULL,
  `theme` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `loading`, `menu`, `theme`) VALUES
(1, '{{ asset(\'assets/css/themes/blue/pace-theme-loading-bar.css\') }}', 'fixed', 'skin-blue-light');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `nama_lengkap` varchar(60) NOT NULL,
  `pendidikan` varchar(60) NOT NULL,
  `motto` text NOT NULL,
  `tentang` text NOT NULL,
  `img_cover` varchar(250) NOT NULL,
  `google` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `nama_lengkap`, `pendidikan`, `motto`, `tentang`, `img_cover`, `google`, `facebook`, `twitter`) VALUES
(1, 81, 'Muhamad Zidni Ilman', 'STT Nusa Putra', 'Man Jadda Wa Jada', 'saya adalah seorang mahasiswa di sukabumi', '', 'https://plus.google.com/+zidniilmanZilman', 'https://www.facebook.com/zidniilmankfc', 'https://twitter.com/m_zidniilman'),
(4, 91, 'Muhamad Zidni Ilman', '', '', '', '', '', '', ''),
(5, 93, 'M Zidni Ilman', '', '', '', '', '', '', ''),
(8, 117, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) NOT NULL,
  `tags` varchar(25) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tags`, `slug`, `created_at`, `updated_at`) VALUES
(61, 'Anime', 'anime', '2017-10-03 08:10:52', '2017-04-01 05:59:10'),
(68, 'demi-chan wa kataritai', 'demi-chan-wa-kataritai', '2017-10-03 08:10:52', '2017-04-01 05:59:11'),
(74, 'masamune', 'masamune', '2017-10-03 08:10:52', '2017-04-07 10:10:05'),
(75, 'haruhi no yutsu', 'haruhi-no-yutsu', '2017-10-03 08:10:52', '2017-04-07 10:12:44'),
(76, 'guilty crown', 'guilty-crown', '2017-10-03 08:10:52', '2017-04-07 10:13:24'),
(77, 'shakugan no shana', 'shakugan-no-shana', '2017-10-03 08:10:52', '2017-04-07 10:14:41'),
(78, 'oregairu', 'oregairu', '2017-10-03 08:10:52', '2017-04-07 10:15:25'),
(79, 'Re: Zero', 're:-Zero', '2017-10-03 08:10:52', '2017-04-07 10:15:59'),
(80, ',Rem', 'rem', '2017-10-03 08:10:52', '2017-04-07 10:15:59'),
(81, 'urara', 'urara', '2017-10-03 08:10:52', '2017-04-07 10:16:56'),
(82, 'chunibyou', 'chunibyou', '2017-10-03 08:10:52', '2017-04-07 10:17:39'),
(91, 'game', 'game', '2017-10-03 08:10:53', '2017-07-04 12:34:46'),
(92, 'pc', 'pc', '2017-10-03 08:10:53', '2017-07-04 12:34:46'),
(99, 'vue js', 'vue-js', '2017-10-03 08:10:53', '2017-08-18 05:10:16'),
(121, 'koe no katachi', 'koe-no-katachi', '2017-10-03 08:10:53', '2017-09-09 08:01:46'),
(122, 'rokudenashi', 'rokudenashi', '2017-10-03 08:10:53', '2017-09-09 08:02:08'),
(123, 'haganai', 'haganai', '2017-10-03 08:10:53', '2017-09-09 08:10:52'),
(124, 'zutto mae kara', 'zutto-mae-kara', '2017-10-03 08:10:53', '2017-09-09 08:11:19'),
(125, 'gamers', 'gamers', '2017-10-03 08:10:53', '2017-09-12 06:07:11'),
(126, 'bokura wa', '', '2017-09-14 03:48:43', '2017-09-14 03:48:43'),
(134, 'ore-imou', '', '2017-10-03 01:31:38', '2017-10-03 01:31:38'),
(135, 'laravel', 'laravel', '2017-10-09 12:52:23', '2017-10-09 12:52:23'),
(136, 'festifal', 'festifal', '2017-10-17 08:54:56', '2017-10-17 08:54:56'),
(137, 'Android,Android Studio', '', '2018-02-21 09:59:46', '2018-02-21 09:59:46'),
(138, 'php,laravel,streaming,liv', '', '2018-02-22 09:05:34', '2018-02-22 09:05:34'),
(139, 'nodejs,javascript,mongodb', '', '2018-02-22 09:10:53', '2018-02-22 09:10:53'),
(140, 'programmer', 'programmer', '2018-02-22 09:15:37', '2018-02-22 09:15:37'),
(141, 'Android, google-play, pla', 'android-google-play-play-store', '2018-02-22 09:17:34', '2018-02-22 09:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hak_akses` varchar(50) NOT NULL DEFAULT 'user',
  `image` varchar(200) NOT NULL DEFAULT 'assets/img/avatar/avatar.png',
  `cover` varchar(200) NOT NULL DEFAULT 'assets/img/cover/cover.jpg',
  `skin` varchar(85) NOT NULL,
  `menu` text NOT NULL,
  `slug` varchar(30) NOT NULL,
  `verified` tinyint(2) NOT NULL DEFAULT '0',
  `email_token` varchar(300) NOT NULL,
  `remember_token` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `hak_akses`, `image`, `cover`, `skin`, `menu`, `slug`, `verified`, `email_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(81, 'shounen', 'zidniilman8@gmail.com', '$2y$10$xfYNTn1noHitWL/tlK3FnetsMdyeOj5D1dqvXLdnyrDtEUEDU/d6S', 'admin', 'assets/uploads/user/shounen/1519231200_png', 'http://localhost/blog/assets/img/cover/cover.jpg', 'skin-red-light', 'fixed', 'shounen', 1, 'emlkbmlpbG1hbjhAZ21haWwuY29t', 'b44ZQwRIxYAfZjOfESFiCdnMDiOUkSYj11IVn7BZ3gRsKSOm47kJFc9IWq4t', '2017-09-23 01:46:43', '2018-02-21 09:40:01'),
(93, 'zidniilman07', 'zidniilman7@gmail.com', '$2y$10$0ilypaSTOSAhmG651v2r7.uIMF1dCMj2hQ3LgA5780GtZ1uW5QBjK', 'user', 'assets/uploads/images/user/zidniilman07/1519230741.png', 'assets/uploads/images/user/zidniilman07/1519317093_cover.png', 'skin-blue', 'fixed', 'zidniilman07', 1, '', '9kfo6HKE2cLE8L3ptWb9mHeG0kJt54LgwXahPFcXp66gYQtajwqR3bK5iaXY', '2017-08-22 05:13:01', '2018-02-22 09:31:33'),
(123, 'zidni725', 'zidniilman725@gmail.com', '$2y$10$jYOdd4MA00wC7BWzf1gZv.4YWY52tjsUGcvHGZX9D6CpOybWyOjm2', 'user', 'assets/img/avatar/avatar.png', 'assets/img/cover/cover.jpg', '', '', 'zidni725', 0, 'emlkbmlpbG1hbjcyNUBnbWFpbC5jb20=', '', '2018-02-22 18:09:19', '2018-02-22 18:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `userforum`
--

CREATE TABLE `userforum` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `forums_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userforum`
--

INSERT INTO `userforum` (`id`, `user_id`, `forums_id`, `created_at`, `updated_at`) VALUES
(1, 93, 1, NULL, NULL),
(2, 81, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_image`
--

CREATE TABLE `user_image` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `original_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_image`
--

INSERT INTO `user_image` (`id`, `user_id`, `original_name`, `file_name`, `created_at`, `updated_at`) VALUES
(23, 81, '', 'assets/uploads/user/1499787370_jpg', '2017-07-11 08:36:10', '2017-07-11 08:36:10'),
(30, 90, '', 'assets/uploads/user/1503169549_jpg', '2017-08-19 19:05:50', '2017-08-19 12:05:50'),
(31, 90, '', 'assets/uploads/user/1503222822_jpg', '2017-08-20 02:53:45', '2017-08-20 02:53:45'),
(32, 90, '', 'assets/uploads/user/1503223529_jpg', '2017-08-20 03:05:29', '2017-08-20 03:05:29'),
(33, 90, '', 'assets/uploads/user/1503326763_jpg', '2017-08-21 07:46:05', '2017-08-21 07:46:05'),
(34, 90, '', 'assets/uploads/user/1503327139_jpg', '2017-08-21 07:52:20', '2017-08-21 07:52:20'),
(35, 93, '', 'assets/uploads/user/1503744320_jpg', '2017-08-26 03:45:22', '2017-08-26 03:45:22'),
(36, 93, '', 'assets/uploads/user/1503745011_jpg', '2017-08-26 03:56:51', '2017-08-26 03:56:51'),
(37, 93, '', 'assets/uploads/user/1503745025_jpg', '2017-08-26 03:57:05', '2017-08-26 03:57:05'),
(38, 93, '', 'assets/uploads/user/1503745036_jpg', '2017-08-26 03:57:16', '2017-08-26 03:57:16'),
(39, 93, '', 'assets/uploads/user/1503745122_jpg', '2017-08-26 03:58:43', '2017-08-26 03:58:43'),
(40, 93, '', 'assets/uploads/user/1503745149_jpg', '2017-08-26 03:59:09', '2017-08-26 03:59:09'),
(41, 93, '', 'assets/uploads/user/1503745157_jpg', '2017-08-26 03:59:17', '2017-08-26 03:59:17'),
(42, 93, '', 'assets/uploads/user/1503745425_jpg', '2017-08-26 04:03:45', '2017-08-26 04:03:45'),
(43, 93, '', 'assets/uploads/user/1503745551_jpg', '2017-08-26 04:05:51', '2017-08-26 04:05:51'),
(44, 93, '', 'assets/uploads/user/1503748786_jpg', '2017-08-26 04:59:47', '2017-08-26 04:59:47'),
(45, 93, '', 'assets/uploads/user/1503748863_jpg', '2017-08-26 05:01:03', '2017-08-26 05:01:03'),
(46, 93, '', 'assets/uploads/user/1503749023_jpg', '2017-08-26 05:03:43', '2017-08-26 05:03:43'),
(47, 93, '', 'assets/uploads/user/1503749201_jpg', '2017-08-26 05:06:41', '2017-08-26 05:06:41'),
(48, 93, '', 'assets/uploads/user/1503749438_png', '2017-08-26 05:10:39', '2017-08-26 05:10:39'),
(49, 93, '', 'assets/uploads/user/1503749894_jpg', '2017-08-26 05:18:14', '2017-08-26 05:18:14'),
(50, 93, '', 'assets/uploads/user/1503749978_jpg', '2017-08-26 05:19:38', '2017-08-26 05:19:38'),
(51, 93, '', 'assets/uploads/user/1503751075_jpg', '2017-08-26 05:37:55', '2017-08-26 05:37:55'),
(52, 93, '', 'assets/uploads/user/1503770174_jpg', '2017-08-26 10:56:17', '2017-08-26 10:56:17'),
(53, 93, '', 'assets/uploads/user/1503770651_jpg', '2017-08-26 11:04:11', '2017-08-26 11:04:11'),
(54, 93, '', 'assets/uploads/user/1503771357_jpg', '2017-08-26 11:15:57', '2017-08-26 11:15:57'),
(55, 93, '', 'assets/uploads/user/1503771752_jpg', '2017-08-26 11:22:32', '2017-08-26 11:22:32'),
(56, 93, '', 'assets/uploads/user/1503771911_png', '2017-08-26 11:25:11', '2017-08-26 11:25:11'),
(57, 93, '', 'assets/uploads/user/1503772061_jpg', '2017-08-26 11:27:41', '2017-08-26 11:27:41'),
(58, 93, '', 'assets/uploads/user/1503772428_jpg', '2017-08-26 11:33:49', '2017-08-26 11:33:49'),
(59, 93, '', 'assets/uploads/user/1503772815_jpg', '2017-08-26 11:40:15', '2017-08-26 11:40:15'),
(60, 93, '', 'assets/uploads/user/1503774421_jpg', '2017-08-26 12:07:01', '2017-08-26 12:07:01'),
(61, 93, '', 'assets/uploads/user/1503774509_png', '2017-08-26 12:08:29', '2017-08-26 12:08:29'),
(62, 93, '', 'assets/uploads/user/1503774603_jpg', '2017-08-26 12:10:04', '2017-08-26 12:10:04'),
(63, 93, '', 'assets/uploads/user/1503774710_jpg', '2017-08-26 12:11:50', '2017-08-26 12:11:50'),
(64, 93, '', 'assets/uploads/user/1503775300_jpg', '2017-08-26 12:21:41', '2017-08-26 12:21:41'),
(65, 93, '', 'assets/uploads/user/1503775944_jpg', '2017-08-26 12:32:24', '2017-08-26 12:32:24'),
(66, 93, '', 'assets/uploads/user/1503776019_jpg', '2017-08-26 12:33:39', '2017-08-26 12:33:39'),
(67, 93, '', 'assets/uploads/user/1503776227_jpg', '2017-08-26 12:37:08', '2017-08-26 12:37:08'),
(68, 81, '', 'assets/uploads/user/1504349317_png', '2017-09-02 03:48:40', '2017-09-02 03:48:40'),
(69, 81, '', 'assets/uploads/user/shounen/1519231081_jpg', '2018-02-21 09:38:01', '2018-02-21 09:38:01'),
(70, 81, '', 'assets/uploads/user/shounen/1519231200_png', '2018-02-21 09:40:01', '2018-02-21 09:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `visit_date` date NOT NULL,
  `visit_time` time NOT NULL,
  `ip_address` varbinary(16) NOT NULL,
  `hits` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `date`, `visit_date`, `visit_time`, `ip_address`, `hits`, `created_at`, `updated_at`) VALUES
(49, '2017-04-05', '2017-04-05', '19:24:25', 0x3a3a31, 4, '2017-04-05 11:53:52', '2017-04-05 12:24:25'),
(50, '2017-04-07', '2017-04-07', '23:15:01', 0x3a3a31, 4, '2017-04-07 16:13:15', '2017-04-07 16:15:01'),
(51, '2017-04-08', '2017-04-08', '23:57:44', 0x3a3a31, 4, '2017-04-07 18:31:18', '2017-04-08 16:57:44'),
(52, '2017-04-09', '2017-04-09', '23:57:36', 0x3a3a31, 96, '2017-04-08 17:21:36', '2017-04-09 16:57:36'),
(53, '2017-04-10', '2017-04-10', '00:02:38', 0x3a3a31, 7, '2017-04-09 17:00:32', '2017-04-09 17:02:38'),
(54, '2017-04-14', '2017-04-14', '23:05:07', 0x3a3a31, 238, '2017-04-14 07:20:19', '2017-04-14 16:05:07'),
(55, '2017-04-15', '2017-04-15', '23:33:54', 0x3a3a31, 5, '2017-04-15 10:03:30', '2017-04-15 16:33:54'),
(56, '2017-04-16', '2017-04-16', '23:57:45', 0x3a3a31, 12, '2017-04-16 15:05:29', '2017-04-16 16:57:45'),
(57, '2017-04-17', '2017-04-17', '00:33:31', 0x3a3a31, 4, '2017-04-16 17:02:01', '2017-04-16 17:33:31'),
(58, '2017-04-22', '2017-04-22', '14:04:53', 0x3a3a31, 6, '2017-04-22 06:41:37', '2017-04-22 07:04:53'),
(59, '2017-04-24', '2017-04-24', '21:03:05', 0x3a3a31, 1, '2017-04-24 14:03:05', '2017-04-24 14:03:05'),
(60, '2017-04-28', '2017-04-28', '16:33:29', 0x3a3a31, 1, '2017-04-28 09:33:29', '2017-04-28 09:33:29'),
(61, '2017-04-29', '2017-04-29', '21:13:43', 0x3a3a31, 1, '2017-04-29 14:13:43', '2017-04-29 14:13:43'),
(62, '2017-04-30', '2017-04-30', '19:46:06', 0x3a3a31, 5, '2017-04-30 12:20:18', '2017-04-30 12:46:06'),
(63, '2017-05-01', '2017-05-01', '23:15:27', 0x3a3a31, 5, '2017-05-01 15:20:21', '2017-05-01 16:15:27'),
(64, '2017-05-02', '2017-05-02', '23:58:34', 0x3a3a31, 109, '2017-05-02 12:16:17', '2017-05-02 16:58:34'),
(65, '2017-05-03', '2017-05-03', '23:40:43', 0x3a3a31, 42, '2017-05-02 17:01:08', '2017-05-03 16:40:43'),
(66, '2017-05-04', '2017-05-04', '00:24:00', 0x3a3a31, 12, '2017-05-03 17:14:20', '2017-05-03 17:24:00'),
(67, '2017-05-07', '2017-05-07', '20:38:52', 0x3a3a31, 361, '2017-05-07 09:02:41', '2017-05-07 13:38:52'),
(68, '2017-05-08', '2017-05-08', '19:43:10', 0x3a3a31, 119, '2017-05-08 10:55:33', '2017-05-08 12:43:10'),
(69, '2017-05-09', '2017-05-09', '18:44:42', 0x3a3a31, 4, '2017-05-09 04:44:46', '2017-05-09 11:44:42'),
(70, '2017-05-10', '2017-05-10', '17:34:10', 0x3a3a31, 112, '2017-05-10 09:39:34', '2017-05-10 10:34:10'),
(71, '2017-05-12', '2017-05-12', '22:59:38', 0x3a3a31, 2, '2017-05-12 15:52:52', '2017-05-12 15:59:38'),
(72, '2017-05-13', '2017-05-14', '00:00:00', 0x3a3a31, 84, '2017-05-12 17:17:45', '2017-05-13 17:00:00'),
(73, '2017-05-14', '2017-05-14', '00:49:16', 0x3a3a31, 99, '2017-05-13 17:00:27', '2017-05-13 17:49:16'),
(74, '2017-05-16', '2017-05-16', '23:59:49', 0x3a3a31, 190, '2017-05-16 12:58:44', '2017-05-16 16:59:49'),
(75, '2017-05-17', '2017-05-17', '23:59:00', 0x3a3a31, 190, '2017-05-16 17:13:36', '2017-05-17 16:59:00'),
(76, '2017-05-18', '2017-05-18', '01:18:03', 0x3a3a31, 11, '2017-05-17 17:02:25', '2017-05-17 18:18:03'),
(77, '2017-05-19', '2017-05-19', '19:27:29', 0x3a3a31, 238, '2017-05-18 17:25:49', '2017-05-19 12:27:29'),
(78, '2017-05-20', '2017-05-20', '23:59:37', 0x3a3a31, 50, '2017-05-20 16:14:22', '2017-05-20 16:59:37'),
(79, '2017-05-21', '2017-05-21', '23:58:42', 0x3a3a31, 189, '2017-05-20 17:00:13', '2017-05-21 16:58:42'),
(80, '2017-05-22', '2017-05-22', '23:01:46', 0x3a3a31, 273, '2017-05-21 17:17:00', '2017-05-22 16:01:46'),
(81, '2017-05-23', '2017-05-23', '22:52:06', 0x3a3a31, 151, '2017-05-23 11:04:07', '2017-05-23 15:52:06'),
(82, '2017-05-27', '2017-05-27', '23:39:55', 0x3a3a31, 7, '2017-05-26 18:33:19', '2017-05-27 16:39:55'),
(83, '2017-05-28', '2017-05-28', '23:52:38', 0x3a3a31, 180, '2017-05-27 17:00:03', '2017-05-28 16:52:38'),
(84, '2017-05-29', '2017-05-29', '22:39:39', 0x3a3a31, 182, '2017-05-28 17:10:16', '2017-05-29 15:39:39'),
(85, '2017-06-01', '2017-06-01', '22:49:03', 0x3a3a31, 37, '2017-06-01 15:04:39', '2017-06-01 15:49:03'),
(86, '2017-06-02', '2017-06-02', '23:58:04', 0x3a3a31, 171, '2017-06-02 14:45:42', '2017-06-02 16:58:04'),
(87, '2017-06-03', '2017-06-03', '00:08:12', 0x3a3a31, 8, '2017-06-02 17:03:09', '2017-06-02 17:08:12'),
(88, '2017-06-07', '2017-06-07', '03:05:01', 0x3a3a31, 138, '2017-06-06 17:40:40', '2017-06-06 20:05:01'),
(89, '2017-06-08', '2017-06-08', '09:30:21', 0x3a3a31, 331, '2017-06-07 21:26:49', '2017-06-08 02:30:21'),
(90, '2017-06-09', '2017-06-09', '06:15:14', 0x3a3a31, 3, '2017-06-08 23:06:18', '2017-06-08 23:15:14'),
(91, '2017-06-10', '2017-06-10', '07:50:14', 0x3a3a31, 235, '2017-06-09 21:26:24', '2017-06-10 00:50:14'),
(92, '2017-06-15', '2017-06-15', '23:45:40', 0x3a3a31, 98, '2017-06-15 15:02:50', '2017-06-15 16:45:40'),
(93, '2017-06-16', '2017-06-16', '17:17:21', 0x3a3a31, 132, '2017-06-16 08:44:16', '2017-06-16 10:17:21'),
(94, '2017-06-17', '2017-06-17', '23:41:41', 0x3a3a31, 11, '2017-06-17 15:57:13', '2017-06-17 16:41:41'),
(95, '2017-06-18', '2017-06-18', '15:35:29', 0x3a3a31, 329, '2017-06-18 03:23:58', '2017-06-18 08:35:29'),
(96, '2017-06-19', '2017-06-19', '17:17:31', 0x3a3a31, 11, '2017-06-19 09:59:44', '2017-06-19 10:17:31'),
(97, '2017-06-21', '2017-06-21', '23:06:41', 0x3a3a31, 1, '2017-06-21 16:06:41', '2017-06-21 16:06:41'),
(98, '2017-06-26', '2017-06-26', '20:23:47', 0x3a3a31, 9, '2017-06-26 13:02:03', '2017-06-26 13:23:47'),
(99, '2017-06-28', '2017-06-28', '23:28:11', 0x3a3a31, 163, '2017-06-28 13:16:21', '2017-06-28 16:28:11'),
(100, '2017-06-30', '2017-06-30', '13:09:28', 0x3a3a31, 3, '2017-06-30 06:07:56', '2017-06-30 06:09:28'),
(101, '2017-07-01', '2017-07-01', '23:58:40', 0x3a3a31, 33, '2017-07-01 16:35:05', '2017-07-01 16:58:40'),
(102, '2017-07-02', '2017-07-02', '20:26:55', 0x3a3a31, 294, '2017-07-01 17:00:20', '2017-07-02 13:26:55'),
(103, '2017-07-03', '2017-07-03', '01:41:25', 0x3a3a31, 17, '2017-07-02 17:50:08', '2017-07-02 18:41:25'),
(104, '2017-07-05', '2017-07-05', '23:59:55', 0x3a3a31, 250, '2017-07-04 17:43:56', '2017-07-05 16:59:55'),
(105, '2017-07-06', '2017-07-06', '23:51:38', 0x3a3a31, 80, '2017-07-05 17:00:04', '2017-07-06 16:51:38'),
(106, '2017-07-09', '2017-07-09', '01:28:57', 0x3a3a31, 1, '2017-07-08 18:28:57', '2017-07-08 18:28:57'),
(107, '2017-07-13', '2017-07-13', '00:06:27', 0x3a3a31, 2, '2017-07-12 17:04:27', '2017-07-12 17:06:27'),
(108, '2017-07-17', '2017-07-17', '17:21:55', 0x3a3a31, 496, '2017-07-16 18:10:22', '2017-07-17 10:21:55'),
(109, '2017-07-18', '2017-07-18', '04:40:01', 0x3a3a31, 19, '2017-07-17 21:39:39', '2017-07-17 21:40:01'),
(110, '2017-07-21', '2017-07-21', '13:55:21', 0x3a3a31, 8, '2017-07-21 06:45:51', '2017-07-21 06:55:21'),
(111, '2017-07-21', '2017-07-21', '13:45:51', 0x3a3a31, 1, '2017-07-21 06:45:51', '2017-07-21 06:45:51'),
(112, '2017-08-05', '2017-08-05', '11:23:12', 0x3a3a31, 2, '2017-08-05 04:23:07', '2017-08-05 04:23:12'),
(113, '2017-08-05', '2017-08-05', '11:23:07', 0x3a3a31, 1, '2017-08-05 04:23:07', '2017-08-05 04:23:07'),
(114, '2017-08-05', '2017-08-05', '19:12:07', 0x3139322e3136382e312e36, 1, '2017-08-05 12:12:07', '2017-08-05 12:12:07'),
(115, '2017-08-09', '2017-08-09', '12:39:05', 0x3a3a31, 13, '2017-08-09 05:14:12', '2017-08-09 05:39:05'),
(116, '2017-08-09', '2017-08-09', '12:14:12', 0x3a3a31, 1, '2017-08-09 05:14:12', '2017-08-09 05:14:12'),
(117, '2017-08-11', '2017-08-11', '17:00:31', 0x3a3a31, 26, '2017-08-11 09:22:53', '2017-08-11 10:00:31'),
(118, '2017-08-11', '2017-08-11', '16:22:54', 0x3a3a31, 1, '2017-08-11 09:22:53', '2017-08-11 09:22:54'),
(119, '2017-08-11', '2017-08-11', '16:22:54', 0x3a3a31, 1, '2017-08-11 09:22:53', '2017-08-11 09:22:54'),
(120, '2017-08-11', '2017-08-11', '16:22:54', 0x3a3a31, 1, '2017-08-11 09:22:53', '2017-08-11 09:22:54'),
(121, '2017-08-11', '2017-08-11', '16:22:54', 0x3a3a31, 1, '2017-08-11 09:22:53', '2017-08-11 09:22:54'),
(122, '2017-08-11', '2017-08-11', '16:22:54', 0x3a3a31, 1, '2017-08-11 09:22:53', '2017-08-11 09:22:54'),
(123, '2017-08-16', '2017-08-16', '17:03:50', 0x3a3a31, 24, '2017-08-16 07:48:11', '2017-08-16 10:03:50'),
(124, '2017-08-17', '2017-08-17', '23:49:03', 0x3a3a31, 2, '2017-08-17 16:26:14', '2017-08-17 16:49:03'),
(125, '2017-08-18', '2017-08-18', '20:15:16', 0x3a3a31, 101, '2017-08-18 09:54:09', '2017-08-18 13:15:16'),
(126, '2017-08-18', '2017-08-18', '19:46:29', 0x3139322e3136382e312e33, 1, '2017-08-18 12:46:29', '2017-08-18 12:46:29'),
(127, '2017-08-19', '2017-08-19', '23:54:48', 0x3a3a31, 32, '2017-08-19 15:21:41', '2017-08-19 16:54:48'),
(128, '2017-08-20', '2017-08-20', '23:43:41', 0x3a3a31, 5075, '2017-08-19 17:06:13', '2017-08-20 16:43:41'),
(129, '2017-08-21', '2017-08-21', '22:42:02', 0x3a3a31, 465, '2017-08-21 14:44:17', '2017-08-21 15:42:02'),
(130, '2017-08-22', '2017-08-22', '19:14:43', 0x3a3a31, 83, '2017-08-21 17:11:35', '2017-08-22 12:14:43'),
(131, '2017-08-27', '2017-08-27', '02:20:19', 0x3a3a31, 1, '2017-08-26 19:20:19', '2017-08-26 19:20:19'),
(132, '2017-09-02', '2017-09-02', '17:49:31', 0x3a3a31, 65, '2017-09-02 10:48:26', '2017-09-02 10:49:31'),
(133, '2017-09-04', '2017-09-04', '23:04:48', 0x3a3a31, 583, '2017-09-04 15:51:54', '2017-09-04 16:04:48'),
(134, '2017-10-05', '2017-10-05', '23:59:59', 0x3a3a31, 375, '2017-10-05 16:48:43', '2017-10-05 16:59:59'),
(135, '2017-10-06', '2017-10-06', '00:09:42', 0x3a3a31, 310, '2017-10-05 17:00:01', '2017-10-05 17:09:42'),
(136, '2017-09-05', '2017-09-05', '10:36:12', 0x3a3a31, 365, '2017-09-05 03:08:26', '2017-09-05 03:36:12'),
(137, '2017-09-06', '2017-09-06', '23:25:08', 0x3a3a31, 6, '2017-09-06 15:17:42', '2017-09-06 16:25:08'),
(138, '2017-09-07', '2017-09-07', '19:33:25', 0x3a3a31, 34, '2017-09-06 17:07:52', '2017-09-07 12:33:25'),
(139, '2017-09-08', '2017-09-08', '20:26:40', 0x3a3a31, 30, '2017-09-08 13:25:04', '2017-09-08 13:26:40'),
(140, '2017-09-08', '2017-09-08', '20:25:04', 0x3a3a31, 1, '2017-09-08 13:25:04', '2017-09-08 13:25:04'),
(141, '2017-09-08', '2017-09-08', '20:25:04', 0x3a3a31, 1, '2017-09-08 13:25:04', '2017-09-08 13:25:04'),
(142, '2017-09-08', '2017-09-08', '20:25:04', 0x3a3a31, 1, '2017-09-08 13:25:04', '2017-09-08 13:25:04'),
(143, '2017-09-09', '2017-09-09', '22:34:23', 0x3a3a31, 7939, '2017-09-09 09:51:19', '2017-09-09 15:34:23'),
(144, '2017-09-10', '2017-09-10', '17:24:57', 0x3a3a31, 960, '2017-09-09 17:32:54', '2017-09-10 10:24:57'),
(145, '2017-11-11', '2017-11-11', '19:55:08', 0x3a3a31, 4062, '2017-11-11 04:05:02', '2017-11-11 12:55:09'),
(146, '2017-09-12', '2017-09-12', '20:10:36', 0x3a3a31, 1189, '2017-09-12 12:55:10', '2017-09-12 13:10:36'),
(147, '2017-09-13', '2017-09-13', '13:14:31', 0x3a3a31, 584, '2017-09-13 06:07:41', '2017-09-13 06:14:31'),
(148, '2017-09-14', '2017-09-14', '23:41:15', 0x3a3a31, 6029, '2017-09-13 20:32:24', '2017-09-14 16:41:15'),
(149, '2017-09-15', '2017-09-15', '17:01:07', 0x3a3a31, 387, '2017-09-14 17:38:52', '2017-09-15 10:01:07'),
(150, '2017-09-16', '2017-09-16', '12:40:13', 0x3a3a31, 374, '2017-09-16 01:04:13', '2017-09-16 05:40:13'),
(151, '2017-09-18', '2017-09-18', '18:46:28', 0x3a3a31, 331, '2017-09-18 09:15:04', '2017-09-18 11:46:28'),
(152, '2017-09-19', '2017-09-19', '11:24:57', 0x3a3a31, 10, '2017-09-19 04:19:24', '2017-09-19 04:24:57'),
(153, '2017-09-20', '2017-09-20', '16:22:08', 0x3a3a31, 548, '2017-09-20 03:16:45', '2017-09-20 09:22:08'),
(154, '2017-09-20', '2017-09-20', '13:08:47', 0x3139322e3136382e312e34, 16, '2017-09-20 05:54:41', '2017-09-20 06:08:47'),
(155, '2017-09-21', '2017-09-21', '14:01:19', 0x3a3a31, 13, '2017-09-21 03:56:00', '2017-09-21 07:01:19'),
(156, '2017-09-21', '2017-09-21', '14:05:16', 0x3139322e3136382e312e35, 2, '2017-09-21 07:03:21', '2017-09-21 07:05:16'),
(157, '2017-09-22', '2017-09-22', '20:15:31', 0x3a3a31, 65, '2017-09-22 10:03:45', '2017-09-22 13:15:31'),
(158, '2017-09-22', '2017-09-22', '20:10:50', 0x3139322e3136382e312e35, 9, '2017-09-22 12:40:09', '2017-09-22 13:10:50'),
(159, '2017-09-23', '2017-09-23', '23:14:24', 0x3a3a31, 170, '2017-09-23 00:11:05', '2017-09-23 16:14:24'),
(160, '2017-09-23', '2017-09-23', '09:49:47', 0x3139322e3136382e312e35, 40, '2017-09-23 00:16:28', '2017-09-23 02:49:47'),
(161, '2017-09-24', '2017-09-24', '19:41:01', 0x3a3a31, 140, '2017-09-24 01:42:16', '2017-09-24 12:41:01'),
(162, '2017-09-24', '2017-09-24', '10:27:02', 0x3139322e3136382e312e33, 9, '2017-09-24 03:13:56', '2017-09-24 03:27:02'),
(163, '2017-09-25', '2017-09-25', '18:43:27', 0x3a3a31, 142, '2017-09-25 08:27:58', '2017-09-25 11:43:27'),
(164, '2017-09-25', '2017-09-25', '17:59:30', 0x3139322e3136382e312e35, 1, '2017-09-25 10:59:30', '2017-09-25 10:59:30'),
(165, '2017-09-26', '2017-09-26', '23:47:19', 0x3a3a31, 61, '2017-09-26 03:24:57', '2017-09-26 16:47:19'),
(166, '2017-09-26', '2017-09-26', '12:27:48', 0x3139322e3136382e312e3134, 7, '2017-09-26 04:15:19', '2017-09-26 05:27:48'),
(167, '2017-09-27', '2017-09-27', '18:40:59', 0x3a3a31, 7, '2017-09-27 07:47:35', '2017-09-27 11:40:59'),
(168, '2017-09-27', '2017-09-27', '15:53:13', 0x3139322e3136382e312e37, 24, '2017-09-27 08:27:20', '2017-09-27 08:53:13'),
(169, '2017-09-29', '2017-09-29', '18:52:37', 0x3a3a31, 5, '2017-09-29 11:31:00', '2017-09-29 11:52:37'),
(170, '2017-09-30', '2017-09-30', '14:31:29', 0x3a3a31, 4, '2017-09-30 07:24:45', '2017-09-30 07:31:29'),
(171, '2017-10-02', '2017-10-02', '22:41:56', 0x3a3a31, 23, '2017-10-02 15:06:00', '2017-10-02 15:41:56'),
(172, '2017-10-03', '2017-10-03', '20:58:51', 0x3a3a31, 220, '2017-10-03 07:13:09', '2017-10-03 13:58:52'),
(173, '2017-10-04', '2017-10-04', '23:12:41', 0x3a3a31, 101, '2017-10-04 09:15:42', '2017-10-04 16:12:41'),
(174, '2017-10-07', '2017-10-07', '23:19:12', 0x3a3a31, 67, '2017-10-07 08:55:29', '2017-10-07 16:19:12'),
(175, '2017-10-08', '2017-10-08', '18:53:46', 0x3a3a31, 22, '2017-10-08 10:47:45', '2017-10-08 11:53:46'),
(176, '2017-10-09', '2017-10-09', '20:38:53', 0x3a3a31, 66, '2017-10-09 12:15:59', '2017-10-09 13:38:53'),
(177, '2017-10-10', '2017-10-10', '11:54:07', 0x3132372e302e302e31, 11, '2017-10-09 18:53:55', '2017-10-10 04:54:07'),
(178, '2017-10-10', '2017-10-10', '12:26:31', 0x3a3a31, 30, '2017-10-10 04:57:42', '2017-10-10 05:26:31'),
(179, '2017-10-11', '2017-10-11', '23:21:00', 0x3132372e302e302e31, 17, '2017-10-10 17:54:20', '2017-10-11 16:21:00'),
(180, '2017-10-11', '2017-10-11', '01:29:27', 0x3a3a31, 3, '2017-10-10 18:28:53', '2017-10-10 18:29:27'),
(181, '2017-10-12', '2017-10-12', '20:02:40', 0x3132372e302e302e31, 54, '2017-10-11 17:41:20', '2017-10-12 13:02:40'),
(182, '2017-10-13', '2017-10-13', '23:50:40', 0x3132372e302e302e31, 97, '2017-10-12 18:11:52', '2017-10-13 16:50:40'),
(183, '2017-10-14', '2017-10-14', '21:28:15', 0x3139322e3136382e312e37, 27, '2017-10-14 14:12:06', '2017-10-14 14:28:15'),
(184, '2017-10-14', '2017-10-14', '23:59:42', 0x3132372e302e302e31, 145, '2017-10-14 15:02:25', '2017-10-14 16:59:42'),
(185, '2017-10-15', '2017-10-15', '22:05:48', 0x3132372e302e302e31, 282, '2017-10-14 17:01:06', '2017-10-15 15:05:48'),
(186, '2017-10-16', '2017-10-16', '02:54:35', 0x3132372e302e302e31, 4, '2017-10-15 19:52:04', '2017-10-15 19:54:35'),
(187, '2017-10-17', '2017-10-17', '23:10:55', 0x3132372e302e302e31, 106, '2017-10-17 09:52:12', '2017-10-17 16:10:55'),
(188, '2017-10-18', '2017-10-18', '23:43:59', 0x3132372e302e302e31, 182, '2017-10-18 07:01:16', '2017-10-18 16:43:59'),
(189, '2017-10-19', '2017-10-19', '20:31:14', 0x3132372e302e302e31, 17, '2017-10-19 13:15:42', '2017-10-19 13:31:14'),
(190, '2017-10-21', '2017-10-21', '23:45:43', 0x3132372e302e302e31, 2, '2017-10-21 16:45:02', '2017-10-21 16:45:43'),
(191, '2017-10-22', '2017-10-22', '22:23:07', 0x3132372e302e302e31, 24, '2017-10-21 17:05:10', '2017-10-22 15:23:07'),
(192, '2017-10-23', '2017-10-23', '23:44:39', 0x3132372e302e302e31, 13, '2017-10-22 17:33:20', '2017-10-23 16:44:39'),
(193, '2017-10-23', '2017-10-23', '00:33:20', 0x3132372e302e302e31, 1, '2017-10-22 17:33:20', '2017-10-22 17:33:20'),
(194, '2017-10-24', '2017-10-24', '16:49:05', 0x3132372e302e302e31, 66, '2017-10-23 17:10:23', '2017-10-24 09:49:05'),
(195, '2017-10-26', '2017-10-26', '22:35:17', 0x3132372e302e302e31, 3, '2017-10-26 15:34:57', '2017-10-26 15:35:17'),
(196, '2017-10-27', '2017-10-27', '14:03:14', 0x3132372e302e302e31, 6, '2017-10-27 06:57:52', '2017-10-27 07:03:14'),
(197, '2017-10-28', '2017-10-28', '21:06:28', 0x3132372e302e302e31, 12, '2017-10-28 14:03:05', '2017-10-28 14:06:28'),
(198, '2017-10-30', '2017-10-30', '23:30:23', 0x3132372e302e302e31, 40, '2017-10-30 15:04:12', '2017-10-30 16:30:23'),
(199, '2017-10-31', '2017-10-31', '00:33:35', 0x3139322e3136382e312e38, 9, '2017-10-30 17:18:27', '2017-10-30 17:33:35'),
(200, '2017-10-31', '2017-10-31', '22:57:35', 0x3132372e302e302e31, 3, '2017-10-31 15:56:18', '2017-10-31 15:57:35'),
(201, '2017-11-02', '2017-11-02', '22:25:55', 0x3139322e3136382e312e38, 15, '2017-11-02 15:24:04', '2017-11-02 15:25:55'),
(202, '2017-11-02', '2017-11-02', '22:24:04', 0x3139322e3136382e312e38, 1, '2017-11-02 15:24:04', '2017-11-02 15:24:04'),
(203, '2017-11-11', '2017-11-11', '14:12:43', 0x3132372e302e302e31, 8, '2017-11-11 06:55:30', '2017-11-11 07:12:43'),
(204, '2017-11-12', '2017-11-12', '01:38:26', 0x3132372e302e302e31, 5, '2017-11-11 18:34:19', '2017-11-11 18:38:26'),
(205, '2017-11-13', '2017-11-13', '09:30:38', 0x3132372e302e302e31, 4, '2017-11-13 02:25:54', '2017-11-13 02:30:38'),
(206, '2017-11-28', '2017-11-28', '20:18:37', 0x3132372e302e302e31, 8, '2017-11-28 13:05:49', '2017-11-28 13:18:37'),
(207, '2018-02-03', '2018-02-03', '14:48:49', 0x3132372e302e302e31, 15, '2018-02-03 06:52:29', '2018-02-03 07:48:49'),
(208, '2018-02-21', '2018-02-22', '00:00:00', 0x3132372e302e302e31, 45, '2018-02-21 13:56:08', '2018-02-21 17:00:00'),
(209, '2018-02-22', '2018-02-22', '23:18:37', 0x3132372e302e302e31, 23, '2018-02-21 17:00:42', '2018-02-22 16:18:37'),
(210, '2018-02-23', '2018-02-23', '08:08:37', 0x3132372e302e302e31, 22, '2018-02-22 17:39:49', '2018-02-23 01:08:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_ket`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel_tag`
--
ALTER TABLE `artikel_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel_user`
--
ALTER TABLE `artikel_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_user`
--
ALTER TABLE `comment_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `followers_user_id_index` (`user_id`),
  ADD KEY `followers_follows_id_index` (`follows_id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums_post`
--
ALTER TABLE `forums_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums_post_user`
--
ALTER TABLE `forums_post_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums_subcribe`
--
ALTER TABLE `forums_subcribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_topik`
--
ALTER TABLE `forum_topik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userforum`
--
ALTER TABLE `userforum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_image`
--
ALTER TABLE `user_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id_ket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `artikel_tag`
--
ALTER TABLE `artikel_tag`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `artikel_user`
--
ALTER TABLE `artikel_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment_user`
--
ALTER TABLE `comment_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forums_post`
--
ALTER TABLE `forums_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forums_post_user`
--
ALTER TABLE `forums_post_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forums_subcribe`
--
ALTER TABLE `forums_subcribe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forum_topik`
--
ALTER TABLE `forum_topik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `userforum`
--
ALTER TABLE `userforum`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_image`
--
ALTER TABLE `user_image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
