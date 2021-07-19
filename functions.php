<?php

function koneksi()
{
    return
        new mysqli("localhost", "root", "", "data_penduduk_kopandakan_2");
}

// SELECT DATA
function query($kueri)
{
    $conn = koneksi();

    $result = $conn->query($kueri);

    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    return $rows;
}


function tambah($data)
{
    $conn = koneksi();
    $nik = htmlspecialchars($data['input-nik']);
    $nama = htmlspecialchars($data['input-nama']);
    $tempatLahir = htmlspecialchars($data['input-tempat-lahir']);
    $tanggalLahir = htmlspecialchars($data['input-tanggal-lahir']);
    $jenisKelamin = htmlspecialchars($data['input-jenis-kelamin']);
    $agama = htmlspecialchars($data['input-agama']);
    $statusPerkawinan = htmlspecialchars($data['input-status-perkawinan']);
    $pekerjaan = htmlspecialchars($data['input-pekerjaan']);

    $kueri = "INSERT INTO penduduk VALUES (
        '$nik',
        '$nama',
        '$tempatLahir',
        '$tanggalLahir',
        '$jenisKelamin',
        '$agama',
        '$statusPerkawinan',
        '$pekerjaan',
        0
    )";

    if ($conn->query($kueri)) {
        return "<script>
            alert('Data Berhasil Diajukan!');
            document.location.href  = 'index.php';
            </script>";
    } else {
        return "Kueri Gagal: " . $kueri . "<br>" . $conn->error;
    }
}

function hapus($data)
{
    $conn = koneksi();
    $nik = $data['nik'];

    $kueri = "DELETE FROM penduduk WHERE nik = '$nik'";

    if ($conn->query($kueri)) {
        return "<script>
            alert('Data Berhasil Dihapus!');
            document.location.href  = 'kelolaDataPenduduk.php';
            </script>";
    } else {
        return "Kueri Gagal: " . $kueri . "<br>" . $conn->error;
    }
}

function update($data)
{
    $conn = koneksi();
    $nik = htmlspecialchars($data['input-nik']);
    $nama = htmlspecialchars($data['input-nama']);
    $tempatLahir = htmlspecialchars($data['input-tempat-lahir']);
    $tanggalLahir = htmlspecialchars($data['input-tanggal-lahir']);
    $jenisKelamin = htmlspecialchars($data['input-jenis-kelamin']);
    $agama = htmlspecialchars($data['input-agama']);
    $statusPerkawinan = htmlspecialchars($data['input-status-perkawinan']);
    $pekerjaan = htmlspecialchars($data['input-pekerjaan']);

    $kueri = "UPDATE penduduk SET nama = '$nama', tempat_lahir = '$tempatLahir', tanggal_lahir = '$tanggalLahir', jenis_kelamin = '$jenisKelamin', agama = '$agama', status_perkawinan = '$statusPerkawinan', pekerjaan = '$pekerjaan' WHERE nik = '$nik'";

    if ($conn->query($kueri)) {
        return "<script>
            alert('Data Berhasil Diubah!');
            document.location.href  = 'kelolaDataPenduduk.php';
            </script>";
    } else {
        return "Kueri Gagal: " . $kueri . "<br>" . $conn->error;
    }
}

function terima($data)
{
    $conn = koneksi();
    $nik = htmlspecialchars($data['nik']);
    $kueri = "UPDATE penduduk SET status = 1 WHERE NIK = $nik";

    if ($conn->query($kueri)) {
        return "<script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href  = 'kelolaDataPenduduk.php';
            </script>";
    } else {
        return "Kueri Gagal: " . $kueri . "<br>" . $conn->error;
    }
}

function login($data)
{
    $conn = koneksi();

    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $result = $conn->query("SELECT * FROM user WHERE username = '$username'");
    $result = $result->fetch_assoc();


    if ($result !== null) {
        if (password_verify($password, $result['password'])) {
            $_SESSION['login'] = true;
            header("Location: index.php");
            exit;
        }
    }
    return [
        'error' => true,
        'pesan' => 'Username / Password Salah!'
    ];
}


// registrasi akun karena tidak ada fiturnya
// function registrasi()
// {
//     $conn = koneksi();
//     // jika username & password sudah sesuai
//     // enkripsi password
//     $password_baru = password_hash("123", PASSWORD_DEFAULT);
//     // insert ke tabel user
//     $query = "INSERT INTO user
//               VALUES
//             ('7174022710980001', '$password_baru')
//           ";
//     mysqli_query($conn, $query) or die(mysqli_error($conn));
//     return mysqli_affected_rows($conn);
// }
