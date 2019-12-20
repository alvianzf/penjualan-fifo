<div class="row">
    <div class="card shadow col-md-12 col-xs-12">
        <div class="card-body">
            <center>
                <h4>Laporan Penjualan Bulan <span id="bulan"><?= $bulan_lap ?></span></h4>
                <h6><?ph echo date('d F Y') ?></h6>
            </center>
        </div>

    <hr />

        <div class="card-body">
            <table id="table" class="table table-condensed table-collapse table-striped">
                <thead>
                    <tr>
                        <td>Kode Produksi</td>
                        <td>Tipe Barang</td>
                        <td>Jumlah Terakhir</td>
                        <td>Harga</td>
                        <td>Tanggal Produksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($result as $v) {
                        ?>
                        <tr>
                            <td><?= $v->kode_produksi ?></td>
                            <td><?= $v->tipe_barang ?></td>
                            <td><?= $v->jumlah ?></td>
                            <td>Rp. <?= $v->harga ?></td>
                            <td><?php echo $v->created_at ?></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

$(document).ready(() => {
    toastr.success('Sukses!');
})

</script>