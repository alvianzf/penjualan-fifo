<div class="row">
    <div class="card shadow border-left-primary col-md-12 col-xs-12">
        <div class="card-body row">
            <div class="col-xs-12 col-md-4">
                <h4>Laporan Transaksi Penjualan</h4>
            </div>
            <div class="col-xs-12 col-md-2">
                <a href="#" class="text-muted"><span class="fa fa-money-bill-wave"></span> Transaksi</a>
            </div>
            <div class="col-xs-12 col-md-2">
                <a href="<?= base_url('form/produksi') ?>" class="text-primary"><span class="fa fa-industry"></span> Produksi</a>
            </div>
            <div class="col-xs-12 col-md-2">
                <a href="<?= base_url('form/persediaan') ?>" class="text-info"><span class="fa fa-chart-bar"></span> Persediaan</a>
            </div>
            <div class="col-xs-12 col-md-2">
                <a href="<?= base_url('form/neraca') ?>" class="text-warning"><span class="fa fa-balance-scale-right"></span> Neraca</a>
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
                    <button id="lihat" class="btn btn-success btn-block"><span class="fa fa-list"></span> Lihat Data</button>
                </div>
                <div class="col-md-4 col-xs-12">
                    <button id="btn-print" class="btn btn-info btn-block" ><span class="fa fa-file"></span> Cetak</button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <table id="table" class="table table-condensed table-hover table-striped table-collapse">
                        <thead>
                            <th>Tanggal Transaksi</th>
                            <th>Kode Barang</th>
                            <!-- <th>Qty</th> -->
                            <th>Pembeli</th>
                            <th>Jumlah</th>
                            <th>Pembayaran</th>
                            <!-- <th><span class="fa fa-cog"></span></th> -->
                        </thead>

                        <tbody>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$('#btn-print').click(() => {

    if ($('#month').val()  != 'tahunan') {
        const bulan = $('#month').val();
        window.location.href= "<?= base_url('reports/print_bulan/') ?>" + bulan;
    } else {
        dt = new Date();
        window.location.href= "<?= base_url('reports/print_tahun/') ?>" + dt.getFullYear();
    }

});

$(document).ready(() => {
    
  $('#table').DataTable({
                processing: true,
                responsive: true,
                order: [0,'asc'],
                pageLength: 10,
                lengthChange: false,
                // searching: false,
                lengthMenu: [[25,50,100,200], [25,50,100,200]],
                language: {
                    paginate: {
                        next: '<i class="fas fa-caret-right"></i>',
                        previous: '<i class="fas fa-caret-left"></i>'
                    },
                    info: 'Menunjukkan _START_ sampai _END_ dari _TOTAL_ data'
                },
                ajax: {
                    url: "<?= site_url('dt/receipts_all')?>",
                    type: "POST",
                    // data: {
                    //     <?= $this->security->get_csrf_token_name() ?>: <?= json_encode($this->security->get_csrf_hash()) ?>
                    // }
                },
                columnDefs: [{
                    targets: -1,
                    orderable: false
                }],
                columns: [
                {
                    data: 'tanggal',
                    searchale: true,
                    orderable: true
                },
                {
                    data: 'keterangan',
                    searchable: true,
                    orderable: true,
                    render: tipe_barang => {
                        return tipe_barang == 'bata75' ? 'Bata 7.5cm' : 'Bata 10cm';
                    }
                },
                {
                    data: 'nama',
                    searchale: true,
                    orderable: true
                },
                {
                    data: null,
                    searchable: true,
                    orderable: true,
                    render: (data) => {
                        return `Rp. ${numberWithCommas(data.total_bayar)}`
                    }
                },
                {
                    data: 'nominal',
                    searchable: true,
                    orderable: true,
                    render: nominal => {
                        return `Rp. ${numberWithCommas(nominal)},00`
                    },
                },

            ],
            initComplete: function(settings) {
                $('.dataTables_filter').hide()
            }
            })
            .draw();
});

$('#lihat').click(() => {
    switch ($('#month').val()) {
        case "01" : $('#table').DataTable().search("Jan").draw();
                    break;
        case "02" : $('#table').DataTable().search("Feb").draw();
                    break;
        case "03" : $('#table').DataTable().search("Mar").draw();
                    break;
        case "04" : $('#table').DataTable().search("Apr").draw();
                    break;
        case "05" : $('#table').DataTable().search("May").draw();
                    break;
        case "06" : $('#table').DataTable().search("Jun").draw();
                    break;
        case "07" : $('#table').DataTable().search("Jul").draw();
                    break;
        case "08" : $('#table').DataTable().search("Aug").draw();
                    break;
        case "09" : $('#table').DataTable().search("Sep").draw();
                    break;
        case "10" : $('#table').DataTable().search("Oct").draw();
                    break;
        case "11" : $('#table').DataTable().search("Nov").draw();
                    break;
        case "12" : $('#table').DataTable().search("Dec").draw();
                    break;
        case "tahunan" : $('#table').DataTable().search('2019').draw();
                    break;
    }
});
var d = new Date();
var n = d.getMonth();

$('#month').val(00+n+1);
</script>