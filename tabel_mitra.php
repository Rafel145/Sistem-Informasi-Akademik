<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:index.php");
    exit;
}

include_once('koneksi.php');
?>

<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>

<main class="app-main">

    <div class="app-content-header">
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Data Mitra</h3>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Data Mitra
                    </li>
                </ol>
            </div>
        </div>

    </div>
</div>

    <div class="app-content">
        <div class="container-fluid">

            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">

    <h3 class="card-title">
        Tabel Mitra
    </h3>

    <a href="input_mitra.php"
       class="btn btn-primary btn-sm">
        Tambah Mitra
    </a>

</div>

                <div class="card-body">

                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Mitra</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th width="170">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            $no = 1;

                            $query = "SELECT * FROM mitra";
                            $result = mysqli_query($mysqli, $query);

                            while($data = mysqli_fetch_assoc($result)) {
                            ?>

                            <tr>

                                <td><?= $no++ ?></td>

                                <td><?= $data['nama_mitra'] ?></td>

                                <td><?= $data['alamat_mitra'] ?></td>

                                <td><?= $data['telepon_mitra'] ?></td>

                                <td>

                                    <a href="input_mitra.php?kode=<?= $data['id_mitra'] ?>"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <a href="aksi.php?proses=hapus_mitra&kode=<?= $data['id_mitra'] ?>"
                                       onclick="return confirm('Yakin ingin menghapus data?')"
                                       class="btn btn-danger btn-sm">
                                        Hapus
                                    </a>

                                </td>

                            </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>

</main>

<?php include('layouts/footer.php'); ?>