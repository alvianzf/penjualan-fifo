<div class="row">
    <div class="card shadow border-left-primary col-md-12">
        <div class="card-body">
            <h5>Daftar Transaksi</h5>
        </div>

        <div class="card-body">
            <table id="table" class="table table-condensed table-hover table-striped table-collapse">
                <thead>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Item</th>
                    <th>Total Terhutang</th>
                    <th>Dibayarkan</th>
                    <th>Sisa</th>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

$(document).ready(function() {

$('#table').DataTable({
            processing: true,
            responsive: true,
            order: [0,'asc'],
            pageLength: 10,
            lengthChange: true,
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
                url: "<?= site_url('dt/receipts')?>",
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
                data: 'nama',
                searchable: true,
                orderable: true,
                render: tipe_barang => {
                    return tipe_barang == 'bata75' ? 'Bata 7.5cm' : 'Bata 10cm';
                }
            },
            {
                data: 'keterangan',
                searchable: true,
                orderable: true,
                render: (keterangan) => {
                    return keterangan == 'bata10' ? "Bata 10 cm" : "Bata 7,5 cm";
                }
            },
            {
                data: 'total_bayar',
                searchable: true,
                orderable: true,
                render: total_bayar => {
                    return `Rp. ${numberWithCommas(total_bayar)},00`
                },
            },
            {
                data: 'nominal',
                searchable: true,
                orderable: true,
                render: nominal => {
                    // return nominal == 0 ? `Rp. ${numberWithCommas(parseInt(nominal))},00` : "Belum ada pembayaran";
                    return nominal != 0 ? `Rp. ${numberWithCommas(parseInt(nominal))}` : "Belum ada pembayaran";
                },
            },
            {
                data: 'sisa',
                searchable: true,
                orderable: true,
                render: sisa => {
                    return `Rp. ${numberWithCommas(sisa)},00`
                },
            },

        ],
        initComplete: function(settings) {
            $('.dataTables_filter').hide()
        }
        })
        .draw();
});
</script>
