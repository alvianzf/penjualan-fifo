<div class="row">
    <div class="card shadow col-md-12 border-left-success">
        <div class="card-body">

            <div>
                <div class="row">
                    <div class="col-md-8">
                        <h4>Daftar Stok Barang Siap Jual</h4>
                    </div>
                    <div class="col-md-4">
                        <input id="cari" placeholder="Cari di tabel" class="form-control pull-right" />
                    </div>
                </div>
            <hr />
            <table id="table" class="table table-striped table-collapse table-condensed col-md-12" width="100%">
                <thead>
                    <tr>
                        <td>Kode Produksi</td>
                        <td>Tipe Barang</td>
                        <td>Jumlah</td>
                        <td>Harga</td>
                        <td>Tanggal Produksi</td>
                        <td style="width: 10%"><i class="fa fa-cog"></i></td>
                    </tr>
                </thead>
                <tbody>
                
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

    toastr.info('Data telah dimuat', 'Info');

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
                    url: "<?= site_url('dt/item')?>",
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
                    data: 'tipe_barang',
                    searchable: true,
                    orderable: true
                },
                {
                    data: null,
                    searchable: true,
                    orderable: true,
                    render: (data) => {
                        return `${numberWithCommas(data.jumlah)} ${data.satuan}`
                    }
                },
                {
                    data: 'harga',
                    searchable: true,
                    orderable: true,
                    render: harga => {
                        return `Rp. ${numberWithCommas(harga)},00`
                    },
                },
                {
                    data: 'tanggal',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'id',
                    render: function(id) {
                        return `<a class="text-success" href="<?= base_url('production/edit/') ?>${id}"><i class="fa fa-edit"></i></a>&nbsp;  <a class="text-danger" onclick="deleteData(${id})" href="#"><i class="fa fa-trash"></i></a>`
                    }
                }

            ],
            initComplete: function(settings) {
                $('.dataTables_filter').hide()
            }
            })
            .draw();
});

$('#add').click(function() {
    window.location.href = "<?= base_url('production/new') ?>"
})

function deleteData(id){
    $.get("<?= api('production/delete/') ?>" + id).then((res) => {
        if (res) {
            toastr.success('Berhasil menghapus data');
            window.location.reload(true)
        }
    }).catch(err => {
        console.log(err)
    })
}

$('#cari').on('keyup', function() {

    $('#table').DataTable()
        .search($('#cari').val()).draw();
})
</script>