<?php
session_start();
require_once 'functions.php';

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

$nik = htmlspecialchars($_GET['nik']);
$penduduk = query("SELECT * FROM penduduk WHERE NIK = $nik");


if (isset($_POST['submit'])) {
    if (!$_POST['submit'] == 1) {
        echo "
    <script>
    document.location.href  = 'kelolaDataPenduduk.php';
    </script>
    ";
    } else {
        $_POST['input-nik'] = $nik;
        echo update($_POST);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ajukan Data Penduduk</title>
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
            <h2 style="padding: 15px 0 30px 0" class="font-weight-light">Ajukan Data Penduduk <span>Kopandakan 2</span></h2>
        </div>

        <?php
        foreach ($penduduk as $p) {
        ?>

            <div class="container d-flex">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="input-nik" class="form-label">Nomor Induk Kependudukan (NIK/KTP):</label>
                        <input type="number" class="form-control" id="input-nik" name="input-nik" min=0 required placeholder="Masukkan NIK" value="<?= $p['nik'] ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="input-nama" class="form-label">Nama Lengkap:</label>
                        <input type="text" class="form-control" id="input-nama" name="input-nama" required placeholder="Masukkan Nama Lengkap" value="<?= $p['nama'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="input-tempat-lahir" class="form-label">Tempat Lahir:</label>
                        <input type="text" class="form-control" id="input-tempat-lahir" name="input-tempat-lahir" required placeholder="Masukkan Tempat Lahir" value="<?= $p['tempat_lahir'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="input-tanggal-lahir" class="form-label">Tanggal Lahir:</label>
                        <input type="date" class="form-control" id="input-tanggal-lahir" name="input-tanggal-lahir" required value="<?= $p['tanggal_lahir'] ?>">
                    </div>
                    <div class="mb-3 d-flex">
                        <label class=" form-label inline" style="padding-right: 30px;">Jenis Kelamin:</label>
                        <div class="form-check" style="padding: 0 20px;">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="input-jenis-kelamin" style="width: 1rem; height: 1rem;" value="L" required checked>
                                Laki-Laki
                            </label>
                        </div>
                        <div class="form-check" style="padding: 0 20px;">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="input-jenis-kelamin" style="width: 1rem; height: 1rem;" value="P">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="input-agama" class="form-label">Agama:</label>
                        <input type="text" class="form-control" id="input-agama" name="input-agama" required placeholder="Masukkan Agama" value="<?= $p['agama'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="input-status-perkawinan" class="form-label">Status Perkawinan:</label>
                        <select class="form-select" aria-label="Default select example" id="input-status-perkawinan" name="input-status-perkawinan" style="height: 50px;" required>
                            <option value="Belum Kawin" selected>Belum Kawin</option>
                            <option value="Kawin">Kawin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="input-pekerjaan" class="form-label">Pekerjaan:</label>
                        <input type="text" class="form-control" id="input-pekerjaan" name="input-pekerjaan" required placeholder="Masukkan Pekerjaan" value="<?= $p['pekerjaan'] ?>">
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit" value=1>Simpan</button>
                    <button type="submit" class="btn btn-primary" name="submit" value=0>Batal</button>
                </form>
            </div>

        <?php
        }
        ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="res/script/script.js"></script>
</body>

</html>