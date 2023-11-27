<h1 class="h3 mb-2 text-gray-800">Kas Masuk</h1>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="?page=tambah-kas-masuk" class="btn btn-success">+Tambah Kas Masuk</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="kas-masuk" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Jumlah Pemasukan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM kas_masuk");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo date('d-m-Y', strtotime($data['tanggal'])) ?></td>
                            <td><?php echo $data['keterangan'] ?></td>
                            <td>Rp <?php echo number_format($data['total'], 2, ",", ".") ?></td>
                            <td>
                                <a href="?page=edit-kas-masuk&id=<?php echo $data['id_km'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="?page=hapus-kas-masuk&id=<?php echo $data['id_km'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
                <tr>
                    <th colspan="3" class="text-danger">Total Kas Masuk :</th>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT SUM(total) AS total FROM kas_masuk");
                    $sum = mysqli_fetch_assoc($query);
                    ?>
                    <th colspan="1" class="text-success">Rp <?php echo number_format($sum['total'], 2, ",", ".") ?></th>
                    <th></th>
                </tr>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#kas-masuk').DataTable();
    });
</script>