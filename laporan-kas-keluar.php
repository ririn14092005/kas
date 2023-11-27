<?php
if (isset($_POST['tanggal_awal'])) {
    $tanggal_awal = $_POST['tanggal_awal'];
    $tanggal_akhir = $_POST['tanggal_akhir'];
} else {
    $tanggal_awal = '';
    $tanggal_akhir = '';
}
?>

<h1 class="h3 mb-2 text-gray-800">Kas Keluar</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-5">
                    <div class="mb-3">
                        <label class="form-label">Tanggal Awal</label>
                        <input type="date" name="tanggal_awal" class="form-control" value="<?php echo ($tanggal_awal ? $tanggal_awal : '') ?>">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="mb-3">
                        <label class="form-label">Tanggal Akhir</label>
                        <input type="date" name="tanggal_akhir" class="form-control" value="<?php echo ($tanggal_akhir ? $tanggal_akhir : '') ?>">
                    </div>
                </div>
                <div class="col-sm-2" style="margin-top: 3.2%;">
                    <button class="btn btn-light"><i class="fas fa-search"></i></button>
                    <button type="reset" onclick="location.href='?page=laporan-kas-keluar'" class="btn btn-light"><i class="fa fa-retweet" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <?php
        if (isset($_POST['tanggal_awal'])) {
        ?>
            <a href="cetak-kas-keluar.php?tanggal_awal=<?php echo $_POST['tanggal_awal'] ?>&tanggal_akhir=<?php echo $_POST['tanggal_akhir'] ?>" target="_blank" class="btn btn-success btn-sm mb-3">Print</a>
        <?php
        } else {
        }
        ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="laporan-kas-keluar" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['tanggal_awal'])) {
                        $tanggal_awal = $_POST['tanggal_awal'];
                        $tanggal_akhir = $_POST['tanggal_akhir'];
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM kas_keluar WHERE (DATE(tanggal) BETWEEN '$tanggal_awal' AND '$tanggal_akhir')");
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo date('d-m-Y', strtotime($data['tanggal'])) ?></td>
                                <td><?php echo $data['keterangan'] ?></td>
                                <td>Rp <?php echo number_format($data['total'], 2, ",", ".") ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#laporan-kas-keluar').DataTable();
    });
</script>