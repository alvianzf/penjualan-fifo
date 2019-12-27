<div class="row">
    <div class="card shadow border-left-primary col-md-12 col-xs-12">
        <div class="card-body row">
            <div class="col-xs-12 col-md-4">
                <h4>Laporan Transaksi Penjualan</h4>
            </div>
            <div class="col-xs-12 col-md-2">
                <a href="<?= base_url('form') ?>" class="text-success"><span class="fa fa-money-bill-wave"></span> Transaksi</a>
            </div>
            <div class="col-xs-12 col-md-2">
                <a href="<?= base_url('form/produksi') ?>" class="text-primary"><span class="fa fa-industry"></span> Produksi</a>
            </div>
            <div class="col-xs-12 col-md-2">
                <a href="<?= base_url('form/persediaan') ?>" class="text-info"><span class="fa fa-chart-bar"></span> Persediaan</a>
            </div>
            <div class="col-xs-12 col-md-2">
                <a href="#" class="text-muted"><span class="fa fa-balance-scale-right"></span> Neraca</a>
            </div>      
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    Cetak laporan:
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <select class="form-control" id="month">
                        <option value="" disabled selected>Pilih Bulan</option>
                        <option value="01">Bulan Januari</option>
                        <option value="02">Bulan Februari</option>
                        <option value="03">Bulan Maret</option>
                        <option value="04">Bulan April</option>
                        <option value="05">Bulan Mei</option>
                        <option value="06">Bulan Juni</option>
                        <option value="07">Bulan Juli</option>
                        <option value="08">Bulan Agustus</option>
                        <option value="09">Bulan September</option>
                        <option value="10">Bulan Oktober</option>
                        <option value="11">Bulan November</option>
                        <option value="12">Bulan Desember</option>
                        <option value="tahunan">Tahunan</option>
                    </select>
                </div>
                <div class="col-md-4 col-xs-12">
                    <!-- <button id="lihat" class="btn btn-success btn-block"><span class="fa fa-list"></span> Lihat Data</button> -->
                </div>
                <div class="col-md-4 col-xs-12">
                    <button id="btn-print" class="btn btn-info btn-block" ><span class="fa fa-file"></span> Cetak</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$('#btn-print').click(() => {

    if ($('#month').val()  != 'tahunan') {
        const bulan = $('#month').val();
        window.location.href= "<?= base_url('reports/neraca_bulanan/') ?>" + bulan;
    } else {
        dt = new Date();
        window.location.href= "<?= base_url('reports/neraca_tahun/') ?>" + dt.getFullYear();
    }

});

var d = new Date();
var n = d.getMonth();

$('#month').val(00+n+1);
</script>