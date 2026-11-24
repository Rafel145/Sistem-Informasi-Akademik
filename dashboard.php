<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

include('koneksi.php');

/* Hitung jumlah dosen */
$queryDosen = "SELECT COUNT(*) AS total_dosen FROM dosen";
$resultDosen = mysqli_query($mysqli, $queryDosen);
$dataDosen = mysqli_fetch_assoc($resultDosen);
$total_dosen = $dataDosen['total_dosen'];

/* Hitung jumlah mahasiswa */
$queryMahasiswa = "SELECT COUNT(*) AS total_mahasiswa FROM mahasiswa";
$resultMahasiswa = mysqli_query($mysqli, $queryMahasiswa);
$dataMahasiswa = mysqli_fetch_assoc($resultMahasiswa);
$total_mahasiswa = $dataMahasiswa['total_mahasiswa'];

/* Hitung jumlah mata kuliah */
$querymatakuliah = "SELECT COUNT(*) AS total_matakuliah FROM matakuliah";
$resultmatakuliah = mysqli_query($mysqli, $querymatakuliah);
$datamatakuliah = mysqli_fetch_assoc($resultmatakuliah);
$total_matakuliah = $datamatakuliah['total_matakuliah'];

/* Hitung jumlah mahasiswa */
$querymitra = "SELECT COUNT(*) AS total_mitra FROM mitra";
$resultmitra = mysqli_query($mysqli, $querymitra);
$datamitra = mysqli_fetch_assoc($resultmitra);
$total_mitra = $datamitra['total_mitra'];
?>

<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Dashboard
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            <div class="row">

                <!-- DOSEN -->
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3><?= $total_dosen ?></h3>
                            <p>Dosen Aktif</p>
                        </div>

                        <i class="small-box-icon bi bi-person-badge-fill"
                           style="font-size:4.5rem;opacity:.15;position:absolute;right:15px;top:15px;"></i>

                        <a href="tabel_dosen.php"
                           class="small-box-footer link-light text-decoration-none">
                            More info
                            <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>

                <!-- MAHASISWA -->
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3><?= $total_mahasiswa ?></h3>
                            <p>Mahasiswa Aktif</p>
                        </div>

                        <i class="small-box-icon bi bi-mortarboard-fill"
                           style="font-size:4.5rem;opacity:.15;position:absolute;right:15px;top:15px;"></i>

                        <a href="tabel_mahasiswa.php"
                           class="small-box-footer link-light text-decoration-none">
                            More info
                            <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>

                <!-- MATA KULIAH -->
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3><?= $total_matakuliah ?></h3>
                            <p>Mata Kuliah</p>
                        </div>

                        <i class="small-box-icon bi bi-journal-bookmark-fill"
                           style="font-size:4.5rem;opacity:.15;position:absolute;right:15px;top:15px;"></i>

                        <a href="tabel_matakuliah.php"
                           class="small-box-footer link-dark text-decoration-none">
                            More info
                            <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>

                <!-- MITRA -->
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-danger">
                        <div class="inner">
                            <h3><?= $total_mitra ?></h3>
                            <p>Mitra</p>
                        </div>

                        <i class="small-box-icon bi bi-building-fill"
                           style="font-size:4.5rem;opacity:.15;position:absolute;right:15px;top:15px;"></i>

                        <a href="tabel_mitra.php"
                           class="small-box-footer link-light text-decoration-none">
                            More info
                            <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</main>

<?php include('layouts/footer.php'); ?>