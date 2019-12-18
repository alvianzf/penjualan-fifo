<div class="row">
    <div class="card shadow border-left-primary col-md-12 col-xs-12">
        <div class="card-body">
            <h4>Daftar Transaksi</h4>

            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <a class="btn btn-info" href="<?= base_url('sales/new-sales') ?>" >
                        <span class="fa fa-plus"> Transaksi Baru</span>
                    </a>
                </div>
                <div class="col-md-4 col-xs-12">

                </div>
                <div class="col-md-4 col-xs-12">
                    <input id="cari" class="form-control" placeholder="Cari..."/>
                </div>
            </div>

            <hr />

            <table id="table" class="table table-collapse table-condensed table-hover table-striped" width="100%">
                <thead>
                    <th>Tanggal</th>
                    <th>Nama Pembeli</th>
                    <th>Item</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Transaksi Terakhir</th>
                    <th>Bayar</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

$(document).ready(() => {
    $('#table').DataTable({
        processing: true,
        responsive: true,
        order: [0,'asc'],
        pageLength: 25,
        lengthMenu: [[25,50,100,200], [25,50,100,200]],
        language: {
            paginate: {
                next: '<i class="fas fa-caret-right"></i>',
                previous: '<i class="fas fa-caret-left"></i>'
            },
            info: 'Menunjukkan _START_ sampai _END_ dari _TOTAL_ data'
        },
        initComplete: settings => {
            $('.dataTables_filter').hide()
        }
    })
})
</script>