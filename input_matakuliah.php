<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

include_once('koneksi.php');

$id_matakuliah = "";
$kode_matakuliah = "";
$nama_matakuliah = "";
$sks = "";

if (isset($_GET['kode'])) {

    $id_matakuliah = $_GET['kode'];

    $query = "SELECT * FROM matakuliah
              WHERE id_matakuliah='$id_matakuliah'";

    $result = mysqli_query($mysqli, $query);

    if ($data = mysqli_fetch_assoc($result)) {
        $id_matakuliah   = $data['id_matakuliah'];
        $kode_matakuliah = $data['kode_matakuliah'];
        $nama_matakuliah = $data['nama_matakuliah'];
        $sks             = $data['sks'];
    }
}
?>

<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>

<main class="app-main">

    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Input Mata Kuliah</h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Input Mata Kuliah
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            <div class="card card-info card-outline">

                <div class="card-header">
                    <h3 class="card-title">Form Mata Kuliah</h3>
                </div>

                <form action="aksi.php" method="POST">

                    <input
                        type="hidden"
                        name="id_matakuliah"
                        value="<?= $id_matakuliah ?>"
                    >

                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">
                                Kode Mata Kuliah
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                name="kode_matakuliah"
                                value="<?= $kode_matakuliah ?>"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Nama Mata Kuliah
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                name="nama_matakuliah"
                                value="<?= $nama_matakuliah ?>"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                SKS
                            </label>

                            <input
                                type="number"
                                class="form-control"
                                name="sks"
                                value="<?= $sks ?>"
                                required
                            >
                        </div>

                    </div>

                    <div class="card-footer">

                        <?php if(isset($_GET['kode'])){ ?>

                            <button
                                type="submit"
                                name="proses"
                                value="update_matakuliah"
                                class="btn btn-warning">
                                Update Data
                            </button>

                        <?php } else { ?>

                            <button
                                type="submit"
                                name="proses"
                                value="simpan_matakuliah"
                                class="btn btn-primary">
                                Simpan Data
                            </button>

                        <?php } ?>

                    </div>

                </form>

            </div>

        </div>
    </div>

</main>

<?php include('layouts/footer.php'); ?>