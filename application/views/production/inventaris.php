<div class="row">
    <div class="card shadow col-md-12 border-left-success">
        <div class="card-body">
            <h4>Daftar Inventaris Bata</h4>
        <div class="table">
            
        <table id="table" class="table table-compact table-striped table-collapse col-md-12">
            <thead>
                <tr>
                    <td>Kode Produksi</td>
                    <td>Nama Barang</td>
                    <td>Tipe Barang</td>
                    <td>Jumlah</td>
                    <td>Tanggal Produksi</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2</td>
                </tr>
            </tbody>
        </table>

        </div>

        <hr>

        <button id="add" class="btn btn-info btn-block"><i class="fa fa-plus"></i> Tambah baru</button>
</div>
    </div>
</div>

<script>

$(document).ready(function() {

    toastr.info('All data loaded', 'Info');

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
                    url: "<?= site_url('dt/test')?>",
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
                    data: 'kode_produksi',
                    searchale: true,
                    orderable: true
                },
                {
                    data: 'nama_barang',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'tipe_barang',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'jumlah',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'tanggal',
                    searchable: true,
                    orderable: true
                },

            ],
            initComplete: function(settings) {
                // $('.dataTables_filter').hide()
            }
            })
            .draw();
});

$('#add').click(function() {
    window.location.href = "<?= base_url('production/new') ?>"
})
</script>