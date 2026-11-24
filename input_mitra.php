<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

include_once('koneksi.php');

$id_mitra = "";
$nama_mitra = "";
$alamat_mitra = "";
$telepon_mitra = "";

if (isset($_GET['kode'])) {

    $id_mitra = $_GET['kode'];

    $query = "SELECT * FROM mitra WHERE id_mitra='$id_mitra'";
    $result = $mysqli->query($query);

    if ($data = $result->fetch_assoc()) {
        $id_mitra       = $data['id_mitra'];
        $nama_mitra     = $data['nama_mitra'];
        $alamat_mitra   = $data['alamat_mitra'];
        $telepon_mitra  = $data['telepon_mitra'];
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
                <h3 class="mb-0">Input Mitra</h3>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Input Mitra
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
                    <h3 class="card-title">Form Mitra</h3>
                </div>
    

                <form action="aksi.php" method="POST">

                    <input type="hidden"
                           name="id_mitra"
                           value="<?= $id_mitra ?>">

                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Nama Mitra</label>
                            <input type="text"
                                   class="form-control"
                                   name="nama_mitra"
                                   value="<?= $nama_mitra ?>"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control"
                                      name="alamat_mitra"
                                      rows="3"
                                      required><?= $alamat_mitra ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Telepon</label>
                            <input type="text"
                                   class="form-control"
                                   name="telepon_mitra"
                                   value="<?= $telepon_mitra ?>"
                                   required>
                        </div>

                    </div>

                    <div class="card-footer">

                        <?php if(isset($_GET['kode'])) { ?>

                            <button type="submit"
                                    name="proses"
                                    value="update_mitra"
                                    class="btn btn-warning">
                                Update Data
                            </button>

                        <?php } else { ?>

                            <button type="submit"
                                    name="proses"
                                    value="simpan_mitra"
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