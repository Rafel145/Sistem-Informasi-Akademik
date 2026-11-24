<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

include_once('koneksi.php');

$id_mahasiswa = "";
$nama_mahasiswa = "";
$npm = "";

if (isset($_GET['kode'])) {

    $id_mahasiswa = $_GET['kode'];

    $query = "SELECT * FROM mahasiswa WHERE id_mahasiswa='$id_mahasiswa'";
    $result = $mysqli->query($query);

    if ($data = $result->fetch_assoc()) {
        $id_mahasiswa   = $data['id_mahasiswa'];
        $nama_mahasiswa = $data['nama_mahasiswa'];
        $npm            = $data['npm'];
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
                    <h3 class="mb-0">Input Mahasiswa</h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Input Mahasiswa
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
                    <h3 class="card-title">Form Mahasiswa</h3>
                </div>

                <form action="aksi.php" method="POST">

                    <input
                        type="hidden"
                        name="id_mahasiswa"
                        value="<?= $id_mahasiswa ?>"
                    >

                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Nama Mahasiswa</label>

                            <input
                                type="text"
                                class="form-control"
                                name="nama_mahasiswa"
                                value="<?= $nama_mahasiswa ?>"
                                placeholder="Masukkan Nama Mahasiswa"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NPM</label>

                            <input
                                type="text"
                                class="form-control"
                                name="npm"
                                value="<?= $npm ?>"
                                placeholder="Masukkan NPM"
                                required
                            >
                        </div>

                    </div>

                    <div class="card-footer">

                        <?php if (isset($_GET['kode'])) : ?>

                            <button
                                type="submit"
                                name="proses"
                                value="update_mahasiswa"
                                class="btn btn-warning"
                            >
                                Update Data
                            </button>

                        <?php else : ?>

                            <button
                                type="submit"
                                name="proses"
                                value="simpan_mahasiswa"
                                class="btn btn-primary"
                            >
                                Simpan Data
                            </button>

                        <?php endif; ?>

                    </div>

                </form>

            </div>

        </div>
    </div>

</main>

<?php include('layouts/footer.php'); ?>