<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
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
                    <h3 class="mb-0">Data Mahasiswa</h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Data Mahasiswa
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            <div class="card mb-4">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <h3 class="card-title">
                        Tabel Mahasiswa
                    </h3>

                    <a href="input_mahasiswa.php" class="btn btn-primary btn-sm">
                        Tambah Mahasiswa
                    </a>

                </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th>Nama Lengkap</th>
                                <th>NPM</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            $no = 1;

                            $query = "SELECT * FROM mahasiswa";
                            $result = $mysqli->query($query);

                            while ($data = $result->fetch_assoc()) :
                            ?>

                                <tr>
                                    <td><?= $no++ ?></td>

                                    <td>
                                        <?= $data['nama_mahasiswa'] ?>
                                    </td>

                                    <td>
                                        <?= $data['npm'] ?>
                                    </td>

                                    <td>

                                        <a
                                            href="input_mahasiswa.php?kode=<?= $data['id_mahasiswa'] ?>"
                                            class="btn btn-warning btn-sm"
                                        >
                                            Edit
                                        </a>

                                        <a
                                            href="aksi.php?kode=<?= $data['id_mahasiswa'] ?>&proses=hapus_mahasiswa"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        >
                                            Hapus
                                        </a>

                                    </td>
                                </tr>

                            <?php endwhile; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>

</main>

<?php include('layouts/footer.php'); ?>