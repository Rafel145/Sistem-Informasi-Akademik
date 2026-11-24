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
                    <h3 class="mb-0">Data Dosen</h3>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">
                            <a href="dashboard.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Data Dosen
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
                        Tabel Dosen
                    </h3>

                    <a href="input_dosen.php" class="btn btn-primary btn-sm">
                        Tambah Dosen
                    </a>

                </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th>Nama Lengkap</th>
                                <th>NIP / NPT</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            $query = "SELECT * FROM dosen";
                            $result = $mysqli->query($query);

                            $no = 1;

                            if ($result->num_rows > 0) {

                                while ($data = $result->fetch_assoc()) {
                            ?>

                                    <tr>

                                        <td><?= $no++; ?></td>

                                        <td>
                                            <?= htmlspecialchars($data['nama_dosen']); ?>
                                        </td>

                                        <td>
                                            <?= htmlspecialchars($data['nip_dosen']); ?>
                                        </td>

                                        <td>

                                            <a
                                                href="input_dosen.php?kode=<?= $data['id_dosen']; ?>"
                                                class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <a
                                                href="aksi.php?proses=hapus&kode=<?= $data['id_dosen']; ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                Hapus
                                            </a>

                                        </td>

                                    </tr>

                            <?php
                                }
                            } else {
                            ?>

                                <tr>
                                    <td colspan="4" class="text-center">
                                        Data dosen belum tersedia
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