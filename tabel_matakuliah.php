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
                    <h3 class="mb-0">Data Mata Kuliah</h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Data Mata Kuliah
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
                        Tabel Mata Kuliah
                    </h3>

                    <a href="input_matakuliah.php"
                       class="btn btn-primary btn-sm">
                        Tambah Mata Kuliah
                    </a>

                </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode MK</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php

                            $query = mysqli_query(
                                $mysqli,
                                "SELECT * FROM matakuliah
                                 ORDER BY id_matakuliah DESC"
                            );

                            $no = 1;

                            while($data = mysqli_fetch_assoc($query)){
                            ?>

                            <tr>

                                <td><?= $no++ ?></td>

                                <td>
                                    <?= $data['kode_matakuliah'] ?>
                                </td>

                                <td>
                                    <?= $data['nama_matakuliah'] ?>
                                </td>

                                <td>
                                    <?= $data['sks'] ?>
                                </td>

                                <td>

                                    <a
                                        href="input_matakuliah.php?kode=<?= $data['id_matakuliah'] ?>"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <a
                                        href="aksi.php?proses=hapus_matakuliah&kode=<?= $data['id_matakuliah'] ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus data?')">
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