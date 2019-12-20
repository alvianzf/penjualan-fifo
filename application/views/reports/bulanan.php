<div class="row">
    <div class="card shadow col-md-12 col-xs-12">
        <div class="card-body">
            <center>
                <h4>Laporan Penjualan Bulan <span id="bulan"><?= $bulan_lap ?></span></h4>
                <h6><?= date('d F Y') ?></h6>
            </center>
        </div>

    <hr />

        <div class="card-body">
            <table id="table" class="table table-condensed table-collapse table-striped">
                <thead>
                    <th>Tanggal Transaksi</th>
                    <th>Jumlah</th>
                    <th>Nominal</th>
                    <th>Sisa</th>
                    <th>Keterangan</th>
                </thead>
            </table>
        </div>
    </div>
</div>

<script>

$.get("<?= api('reports/bulan/' . $bulan ) ?>").then(res => {

    $.each(res.result, (i, data) => {
        $('#table').append(
            `
                <tr>
                    <td>${data.tanggal}</td>
                    <td>${data.qty}</td>
                    <td>${data.nominal}</td>
                    <td>${data.sisa}</td>
                    <td>${data.keterangan == 'cicilan' ? '<span class="text-warning">'+data.keterangan+'</span>' : '<span class="text-success">'+data.keterangan+'</span>'}</td>
                </tr>
            `
        );
    })
});

</script>