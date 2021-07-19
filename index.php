<!-- 
Referensi Front End:
https://dispendukcapil.kendalkab.go.id
 -->

<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="res/style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="res/style/responsive-file.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container flex-nowrap">
                <img src="res/img/85-dukcapil-kemendagri.png" width="50px">
                <a class="navbar-brand" href="index.php">Dukcapil<br>Kopandakan 2</a>
                <div class="collapse navbar-collapse d-flex justify-content-end">
                    <div class="humberger-icon" id="humberger-icon">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <ul class="navbar-nav flex-row">
                        <li class=" nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <?php if (!isset($_SESSION['login'])) { ?>
                            <li class="nav-item" style="position: relative;">
                                <div class="nav-link link-primary link-pelayanan" style="cursor: pointer;" id="link-pelayanan" onclick="dropdownLinks(this.id)">Pelayanan Publik
                                    <i class="fa fa-caret-down"></i>
                                </div>
                                <div class="dropdown-pelayanan">
                                    <a class=" nav-link link-primary" href="cariDataPenduduk.php">Cari Data Penduduk</a>
                                    <a class="nav-link link-primary" href="ajukanDataPenduduk.php">Ajukan Data Penduduk</a>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if (isset($_SESSION['login'])) { ?>
                            <li class="nav-item" style="position: relative;">
                                <div class="nav-link link-primary link-admin" style="cursor: pointer;" id="link-admin" onclick="dropdownLinks(this.id)">Administrator
                                    <i class="fa fa-caret-down"></i>
                                </div>
                                <div class="dropdown-admin" id="dropdown-admin">
                                    <a class=" nav-link link-primary" href="kelolaDataPenduduk.php">Kelola Data Penduduk</a>
                                    <a class="nav-link link-primary" href="pengajuanDataPenduduk.php">Daftar Pengajuan Data Penduduk</a>
                                    <a class="nav-link link-primary" href="kelolaDataAdministrator.php">Kelola Administrator</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Keluar</a>
                            </li>
                        <?php } ?>
                        <?php if (!isset($_SESSION['login'])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Masuk</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="jumbotron d-flex flex-column align-items-center justify-content-center">
            <h1 class="display-4">Halo, Selamat Datang di Dukcapil Kopandakan 2</h1>
            <p>Informasi Terbaru Mengenai Penduduk di Daerah Kopandakan 2 Akan Selalu Hadir Disini!</p>
            <a class="btn btn-primary" href="#" role="button" style="margin-top: 10px;">Lebih Lanjut</a>
        </div>
    </header>
    <main>
        <div class="container" style="border-top: 1px solid #ddd; margin-top: 50px">
            <h2 style="padding-top: 15px;">Kabar <span style="font-weight: bold;">Terbaru</span></h2>
            <div class="garis-bawah"></div>
            <div class="container d-grid">
                <div class="card">
                    <div class="card-body">
                        <img src="res/img/berita/9dr. tanty korompot.jpg" class="img-fluid" style="margin-bottom: 15px;">
                        <h5 class="card-title">Vaksinasi Terus Berlanjut, Dinkes Himbau Aparat Desa Kelurahan Proaktif Data Warganya</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Kesehatan / 15 Juli 2021</h6>
                        <p class="card-text">Kotamobagu—Aparat Desa Kelurahan di Kota Kotamobagu dihimbau untuk lebih proaktif lagi dalam melakukan pendataan warga masyarakatnya yang akan menjalani vaksinasi. Hal ini disampaikan Kepala Dinas Kesehatan (Dinkes) Kota Kotamobagu, dr. Tanty Korompot, M.Kes., ditemui di ruang kerjanya, Kamis (15/7).</p>
                        <a href="#" class="card-link">Info Lebih Lanjut</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <img src="res/img/berita/86DEA UMKM 26 Juni 2021.jpeg" class="img-fluid" style="margin-bottom: 15px;">
                        <h5 class="card-title">Pelatihan DEA resmi dibuka Asisten Perekonomian dan Pembangunan Kotamobagu </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Pemerintahan / 25 Juni 2021</h6>
                        <p class="card-text">Kotamobagu-- Mewakil Wali Kota Ir. Hj. Tatong Bara, Asisten Perekonomian dan Pembangunan Sekda Kota Kotamobagu, Hj. Siti Rafiqah Bora, SE, membuka secara resmi Pelatihan Digital Entrepreneurship Academy (DEA) yang digelar Balai Pengembangan Sumber Daya Manusia dan Penelitian (BPSDMP) Kominfo Manado, di Hotel Sutan Raja Kotamobagu, Jumat (25/6-2021)</p>
                        <a href=" #" class="card-link">Info Lebih Lanjut</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <img src="res/img/berita/3b382441a-fc2b-49f0-85c5-386904485c6c.jpg" class="img-fluid" style="margin-bottom: 15px;">
                        <h5 class="card-title">Wali Kota Kotamobagu Irup Upacara HUT ke 14 Kota Kotamobagu </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Pemerintahan / 24 Mei 2021</h6>
                        <p class="card-text">Kotamobagu—Wali Kota Kotamobagu, Ir. Hj, Tatong Bara, Senin bertindak sebagai Inspektur Upacara (Irup), pada Upacara dalam rangka Peringatan Hari Ulang Tahun (HUT) ke – 14 Kota Kotamobagu, yang dilaksanakan di Alun – Alun Boki Hontinimbang, Senin (24/5) pagi.</p>
                        <a href="#" class="card-link">Info Lebih Lanjut</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <img src="res/img/berita/71WhatsApp Image 2021-05-17 at 12.31.47.jpeg" class="img-fluid" style="margin-bottom: 15px;">
                        <h5 class="card-title">Wakili Wali Kota, Sekda Pimpin Apel Kerja ASN Pemkot Kotamobagu </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Pemerintahan / 17 Mei 2021</h6>
                        <p class="card-text">Kotamobagu—Sekretaris Daerah (Sekda) Kota Kotamobagu, Ir. Sande Dodo, MT, mewakili Wali Kota Kotamobagu, Ir. Hj. Tatong Bara, Senin (17/5) pagi, memimpin pelaksanaan kegiatan Apel Kerja dilingkungan Pemerintah Daerah Kota Kotamobagu, yang dilaksanakan di Halaman Kantor Wali Kota Kotamobagu.</p>
                        <a href="#" class="card-link">Info Lebih Lanjut</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <img src="res/img/berita/112e0dfe8e-94d9-4b8f-a0b1-f2b1d2a850d7.jpg" class="img-fluid" style="margin-bottom: 15px;">
                        <h5 class="card-title">Wali Kota Hadiri Rapat Paripurna Istimewa HUT ke 14 Kota Kotamobagu</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Pembangunan / 24 Mei 2021</h6>
                        <p class="card-text">Kotamobagu—Wali Kota Kotamobagu, Ir. Hj. Tatong Bara, Senin (24/5) pagi, menghadiri kegiatan Rapat Paripurna Istimewa DPRD Kota Kotamobagu, dalam rangka Peringatan Hari Ulang Tahun (HUT) ke – 14 Kota Kotamobagu.</p>
                        <a href="#" class="card-link">Info Lebih Lanjut</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <img src="res/img/berita/96WhatsApp Image 2021-05-09 at 17.47.05.jpeg" class="img-fluid" style="margin-bottom: 15px;">
                        <h5 class="card-title">Wali Kota Kotamobagu Resmikan Masjid Agung Baitul Makmur </h5>
                        <h6 class="card-subtitle mb-2 text-muted">Pembangunan / 09 Mei 2021</h6>
                        <p class="card-text">Kotamobagu—Wali Kota Kotamobagu, Ir. Hj. Tatong Bara, Minggu (9/5) pagi, meresmikan Masjid Agung Baitul Makmur (MABM) Kotamobagu.</p>
                        <a href="#" class="card-link">Info Lebih Lanjut</a>
                    </div>
                </div>
            </div>
    </main>
    <footer>
        <div class="container d-flex flex-row alamat-pengembang">
            <div class="container d-flex flex-column align-items-start">
                <h3>Alamat Pengembang</h3>
                <p>Kotamobagu - Jalan Yusuf Hasiru Lingkungan 2</p>
                <p>Telp. +62 821 8819 1052</p>
            </div>
            <div class="container d-flex flex-column social-media">
                <h3>Social Media</h3>
                <div id="links-social-media">
                    <p onclick="socialMedia('facebook.com/fachri.gobel.7')"><img src=" res/img/facebook_icon-icons.com_59205.png">Fachri gobel</p><br>
                    <p onclick="socialMedia('linkedin.com/in/fachri-gobel-60b46a20b')"><img src="res/img/linkedin_icon-icons.com_65929.png">Fachri Gobel</p><br>
                    <p onclick="socialMedia('instagram.com/kapistaa')"><img src="res/img/1491580635-yumminkysocialmedia26_83102.png">Kapistaa</p><br>
                    <p onclick="socialMedia('github.com/kapistaa')"><img src="res/img/Github_icon-icons.com_49946.png">Kapistaa</p>
                </div>
            </div>
        </div>
        <div class="container d-flex copyright">
            <p>&copy 2021 - FachriGobel</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="res/script/script.js"></script>
</body>

</html>