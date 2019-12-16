<div class="row">
    <div class="card shadow border-left-primary col-md-12">
        <div class=" card-body col-xs-12 col-md-12">
            <h4>Atur detil produksi</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6 col-xs-12">
                    <label for="tipe">Tipe Barang</label>
                    <input id="tipe" class="form-control" placeholder="Tipe Barang" />
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="harga">Harga Barang</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input id="harga" class="form-control" type="number" placeholder="Harga Barang" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4 col-xs-12 text-right">
                        <button id="add-btn" class="btn btn-success btn-block" ><span class="fa fa-cog"></span> Tambah Produksi</button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table id="table" class="table table-hover table-condensed table-striped table-collapse">
                        <thead>
                            <th>Tipe Barang</th>
                            <th>Harga Barang</th>
                            <th><span class="fa fa-cog"></span></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$('#add-btn').click(() => {
    const tipe_barang   = $('#tipe').val();
    const harga_barang  = $('#harga').val();

    const data = {tipe_barang, harga_barang}

    if (tipe_barang) {
        $.post("<?= api('settings/production_insert') ?>", data).done(res => {
            toastr.success('Berhasil memasukkan tipe baru');
            window.location.reload(false);
        })
        .catch(err =>{
            toastr.error('Gagal memasukkan data!', 'Error!');
        });
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
                    url: "<?= site_url('dt/tipe_barang')?>",
                    type: "POST",
                    data: {
                        <?= $this->security->get_csrf_token_name() ?>: <?= json_encode($this->security->get_csrf_hash()) ?>
                    }
                },
                columnDefs: [{
                    targets: -1,
                    orderable: false
                }],
                columns: [
                {
                    data: 'tipe_barang',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'harga_barang',
                    searchable: true,
                    orderable: true,
                    render: function(harga) {
                        return `Rp. ${numberWithCommas(harga)}`
                    }
                },
                {
                    data: 'id',
                    render: function(id) {
                        return `<a class="text-danger" onclick="deleteData(${id})" href="#"><i class="fa fa-trash"></i></a>`
                    }
                }

            ],
        initComplete: function(settings) {
            $('.dataTables_filter').hide();
        }
    }).draw();
});

function deleteData(id)
{
    $.get("<?= api('settings/production_delete') ?>" + id).then(res => {
        toastr.success('Berhasil mengapus item');
        window.location.reload(false);
    }).catch(err => {toastr.error('Gagal menghapus item')});
}
</script>