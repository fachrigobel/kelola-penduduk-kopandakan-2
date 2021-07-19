<?php
session_start();
require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Data Penduduk</title>
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
                    <div class="humberger-icon">
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
    </header>
    <main>
        <div class="container" style="margin-top: 100px;">
            <h2 style="padding: 15px 0 30px 0" class="font-weight-light">Cek NIK Khusus Warga <span style="font-weight: bold;"> Kopandakan 2</span></h2>
        </div>
        <div class="container d-flex">
            <form action="" method="GET">
                <div class="mb-3 d-inline-flex flex-column">
                    <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK/KTP):</label>
                    <input type="tel" class="form-control" id="nik" name="nik" required placeholder="Masukkan NIK..." style="height: 50px;" minlength="16" maxlength="16" autocomplete="off">
                </div>
                <br>
                <button type="submit" class="btn btn-primary" name="submit">Cari NIK</button>
            </form>
        </div>

        <!-- Memunculkan Hasil Jika Ditemukan -->
        <?php
        if (isset($_GET['submit'])) {
            $nik = htmlspecialchars($_GET['nik']);
            $penduduk = query("SELECT * FROM penduduk WHERE nik = '$nik' AND status = 1");
            if (empty($penduduk)) {
                echo "
                <script>alert('Data Tidak Ditemukan atau Belum Terdaftar');</script>
                ";
            } else {
                foreach ($penduduk as $p) {
                    $jenisKelamin = $p['jenis_kelamin'] == "L" ? "Laki-Laki" : "Perempuan";
        ?>
                    <div class="container d-grid" style="margin-top: 30px;">
                        <p>Nomor Induk Kependudukan</p>
                        <p><?= $p['nik'] ?></p>
                        <p>Nama Lengkap</p>
                        <p><?= $p['nama'] ?></p>
                        <p>Tempat Lahir</p>
                        <p><?= $p['tempat_lahir'] ?></p>
                        <p>Tanggal Lahir</p>
                        <p><?= $p['tanggal_lahir'] ?></p>
                        <p>Jenis Kelamin</p>
                        <p><?= $jenisKelamin ?></p>
                        <p>Agama</p>
                        <p><?= $p['agama'] ?></p>
                        <p>Status Perkawinan</p>
                        <p><?= $p['status_perkawinan'] ?></p>
                        <p>Pekerjaan</p>
                        <p><?= $p['pekerjaan'] ?></p>
                    </div>
        <?php
                }
            }
        }
        ?>
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
                <p><img src="res/img/facebook_icon-icons.com_59205.png">Fachri gobel</p>
                <p><img src="res/img/linkedin_icon-icons.com_65929.png">Fachri Gobel</p>
                <p><img src="res/img/1491580635-yumminkysocialmedia26_83102.png">Kapistaa</p>
                <p><img src="res/img/Github_icon-icons.com_49946.png">Kapistaa</p>
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