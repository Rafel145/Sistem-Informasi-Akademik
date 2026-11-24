<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

include_once('koneksi.php');

$id_dosen = "";
$nama_dosen = "";
$nip_dosen = "";

if (isset($_GET['kode'])) {

    $id_dosen = $_GET['kode'];

    $query = "SELECT * FROM dosen WHERE id_dosen='$id_dosen'";
    $result = $mysqli->query($query);

    if ($data = $result->fetch_assoc()) {
        $id_dosen   = $data['id_dosen'];
        $nama_dosen = $data['nama_dosen'];
        $nip_dosen  = $data['nip_dosen'];
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
                    <h3 class="mb-0">Input Dosen</h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Input Dosen
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
                    <h3 class="card-title">Form Dosen</h3>
                </div>

                <form action="aksi.php" method="POST">

                    <input
                        type="hidden"
                        name="id_dosen"
                        value="<?= $id_dosen ?>"
                    >

                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                name="nama_dosen"
                                value="<?= $nama_dosen ?>"
                                placeholder="Masukkan Nama Dosen"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                NIP / NPT
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                name="nip_dosen"
                                value="<?= $nip_dosen ?>"
                                placeholder="Masukkan NIP"
                                required
                            >
                        </div>

                    </div>

                    <div class="card-footer">

                        <?php if (isset($_GET['kode'])) : ?>

                            <button
                                type="submit"
                                name="proses"
                                value="update"
                                class="btn btn-warning"
                            >
                                Update Data
                            </button>

                        <?php else : ?>

                            <button
                                type="submit"
                                name="proses"
                                value="simpan"
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