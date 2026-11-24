<?php

/* ==========================
   ROUTING PROSES
========================== */

if (isset($_POST['proses']) && $_POST['proses'] == 'simpan') {
    simpanDosen();
}
elseif (isset($_POST['proses']) && $_POST['proses'] == 'update') {
    updateDosen();
}
elseif (isset($_GET['proses']) && $_GET['proses'] == 'hapus') {
    hapusDosen();
}

/* ==========================
   MAHASISWA
========================== */

elseif (isset($_POST['proses']) && $_POST['proses'] == 'simpan_mahasiswa') {
    simpanMahasiswa();
}
elseif (isset($_POST['proses']) && $_POST['proses'] == 'update_mahasiswa') {
    updateMahasiswa();
}
elseif (isset($_GET['proses']) && $_GET['proses'] == 'hapus_mahasiswa') {
    hapusMahasiswa();
}

/* ==========================
   MATA KULIAH
========================== */

elseif (isset($_POST['proses']) && $_POST['proses'] == 'simpan_matakuliah') {
    simpanMatakuliah();
}
elseif (isset($_POST['proses']) && $_POST['proses'] == 'update_matakuliah') {
    updateMatakuliah();
}
elseif (isset($_GET['proses']) && $_GET['proses'] == 'hapus_matakuliah') {
    hapusMatakuliah();
}

/* ==========================
   MITRA
========================== */

elseif (isset($_POST['proses']) && $_POST['proses'] == 'simpan_mitra') {
    simpanMitra();
}
elseif (isset($_POST['proses']) && $_POST['proses'] == 'update_mitra') {
    updateMitra();
}
elseif (isset($_GET['proses']) && $_GET['proses'] == 'hapus_mitra') {
    hapusMitra();
}

/* ==========================
   LOGIN
========================== */

elseif (isset($_POST['proses']) && $_POST['proses'] == 'login') {
    login();
}
elseif (isset($_GET['proses']) && $_GET['proses'] == 'logout') {
    logout();
}

/* ==========================
   LOGIN
========================== */

function login()
{
    include 'koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user
              WHERE username='$username'
              AND password='$password'";

    $result = mysqli_query($mysqli, $query);

    if ($result && mysqli_num_rows($result) > 0) {

        session_start();
        $_SESSION['username'] = $username;

        header("Location: dashboard.php");
        exit;

    } else {

        echo "Username atau Password Salah!";

    }
}

function logout()
{
    session_start();

    session_unset();
    session_destroy();

    header("Location: index.php");
    exit;
}

/* ==========================
   DOSEN
========================== */

function simpanDosen()
{
    include 'koneksi.php';

    $nama_dosen = $_POST['nama_dosen'];
    $nip_dosen  = $_POST['nip_dosen'];

    $query = "INSERT INTO dosen
              (nama_dosen, nip_dosen)
              VALUES
              ('$nama_dosen','$nip_dosen')";

    if (mysqli_query($mysqli, $query)) {

        header("Location: tabel_dosen.php");
        exit;

    } else {

        echo mysqli_error($mysqli);

    }
}

function updateDosen()
{
    include 'koneksi.php';

    $id_dosen   = $_POST['id_dosen'];
    $nama_dosen = $_POST['nama_dosen'];
    $nip_dosen  = $_POST['nip_dosen'];

    $query = "UPDATE dosen
              SET nama_dosen='$nama_dosen',
                  nip_dosen='$nip_dosen'
              WHERE id_dosen='$id_dosen'";

    if (mysqli_query($mysqli, $query)) {

        header("Location: tabel_dosen.php");
        exit;

    } else {

        echo mysqli_error($mysqli);

    }
}

function hapusDosen()
{
    include 'koneksi.php';

    $id_dosen = $_GET['kode'];

    $query = "DELETE FROM dosen
              WHERE id_dosen='$id_dosen'";

    if (mysqli_query($mysqli, $query)) {

        header("Location: tabel_dosen.php");
        exit;

    } else {

        echo mysqli_error($mysqli);

    }
}

/* ==========================
   MAHASISWA
========================== */

function simpanMahasiswa()
{
    include 'koneksi.php';

    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $npm            = $_POST['npm'];

    $query = "INSERT INTO mahasiswa
              (nama_mahasiswa,npm)
              VALUES
              ('$nama_mahasiswa','$npm')";

    if (mysqli_query($mysqli, $query)) {

        header("Location: tabel_mahasiswa.php");
        exit;

    } else {

        echo mysqli_error($mysqli);

    }
}

function updateMahasiswa()
{
    include 'koneksi.php';

    $id_mahasiswa   = $_POST['id_mahasiswa'];
    $nama_mahasiswa = $_POST['nama_mahasiswa'];
    $npm            = $_POST['npm'];

    $query = "UPDATE mahasiswa
              SET nama_mahasiswa='$nama_mahasiswa',
                  npm='$npm'
              WHERE id_mahasiswa='$id_mahasiswa'";

    if (mysqli_query($mysqli, $query)) {

        header("Location: tabel_mahasiswa.php");
        exit;

    } else {

        echo mysqli_error($mysqli);

    }
}

function hapusMahasiswa()
{
    include 'koneksi.php';

    $id_mahasiswa = $_GET['kode'];

    $query = "DELETE FROM mahasiswa
              WHERE id_mahasiswa='$id_mahasiswa'";

    if (mysqli_query($mysqli, $query)) {

        header("Location: tabel_mahasiswa.php");
        exit;

    } else {

        echo mysqli_error($mysqli);

    }
}

/* ==========================
   MATA KULIAH
========================== */

function simpanMatakuliah()
{
    include 'koneksi.php';

    $kode_matakuliah = $_POST['kode_matakuliah'];
    $nama_matakuliah = $_POST['nama_matakuliah'];
    $sks             = $_POST['sks'];

    $query = "INSERT INTO matakuliah
              (kode_matakuliah,nama_matakuliah,sks)
              VALUES
              ('$kode_matakuliah','$nama_matakuliah','$sks')";

    if (mysqli_query($mysqli, $query)) {

        header("Location: tabel_matakuliah.php");
        exit;

    } else {

        echo mysqli_error($mysqli);

    }
}

function updateMatakuliah()
{
    include 'koneksi.php';

    $id_matakuliah   = $_POST['id_matakuliah'];
    $kode_matakuliah = $_POST['kode_matakuliah'];
    $nama_matakuliah = $_POST['nama_matakuliah'];
    $sks             = $_POST['sks'];

    $query = "UPDATE matakuliah
              SET kode_matakuliah='$kode_matakuliah',
                  nama_matakuliah='$nama_matakuliah',
                  sks='$sks'
              WHERE id_matakuliah='$id_matakuliah'";

    if (mysqli_query($mysqli, $query)) {

        header("Location: tabel_matakuliah.php");
        exit;

    } else {

        echo mysqli_error($mysqli);

    }
}

function hapusMatakuliah()
{
    include 'koneksi.php';

    $id_matakuliah = $_GET['kode'];

    $query = "DELETE FROM matakuliah
              WHERE id_matakuliah='$id_matakuliah'";

    if (mysqli_query($mysqli, $query)) {

        header("Location: tabel_matakuliah.php");
        exit;

    } else {

        echo mysqli_error($mysqli);

    }
}

/* ==========================
   MITRA
========================== */

function simpanMitra()
{
    include 'koneksi.php';

    $nama_mitra    = $_POST['nama_mitra'];
    $alamat_mitra  = $_POST['alamat_mitra'];
    $telepon_mitra = $_POST['telepon_mitra'];

    $query = "INSERT INTO mitra
              (nama_mitra,alamat_mitra,telepon_mitra)
              VALUES
              ('$nama_mitra','$alamat_mitra','$telepon_mitra')";

    if (mysqli_query($mysqli, $query)) {

        header("Location: tabel_mitra.php");
        exit;

    } else {

        echo mysqli_error($mysqli);

    }
}

function updateMitra()
{
    include 'koneksi.php';

    $id_mitra      = $_POST['id_mitra'];
    $nama_mitra    = $_POST['nama_mitra'];
    $alamat_mitra  = $_POST['alamat_mitra'];
    $telepon_mitra = $_POST['telepon_mitra'];

    $query = "UPDATE mitra
              SET nama_mitra='$nama_mitra',
                  alamat_mitra='$alamat_mitra',
                  telepon_mitra='$telepon_mitra'
              WHERE id_mitra='$id_mitra'";

    if (mysqli_query($mysqli, $query)) {

        header("Location: tabel_mitra.php");
        exit;

    } else {

        echo mysqli_error($mysqli);

    }
}

function hapusMitra()
{
    include 'koneksi.php';

    $id_mitra = $_GET['kode'];

    $query = "DELETE FROM mitra
              WHERE id_mitra='$id_mitra'";

    if (mysqli_query($mysqli, $query)) {

        header("Location: tabel_mitra.php");
        exit;

    } else {

        echo mysqli_error($mysqli);

    }
}

?>