<div class="row">
    <div class="card shadow border-left-primary col-md-12">
        <div class="card-body">
            <h4>Daftar Pengguna Aktif</h4>

            <div class="row">
                <div class="col-x-12 col-md-8">
                
                </div>
                <div class="col-xs-12 col-md-4">
                    <input id="cari" placeholder="Cari di tabel..." class="form-control" />
                </div>
                
            </div>

            <table id="table" class="table table-condensed table-stripe table-hover table-collapse col-md-12" width="100%">
                <thead>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Posisi</th>
                    <th><span class="fa fa-cog"></span></th>
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
                    url: "<?= site_url('dt/user')?>",
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
                    data: 'username',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'role',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'name',
                    searchable: true,
                    orderable: true
                },
                {
                    data: 'contact_number',
                    searchable: true,
                    orderable: true,
                },
                {
                    data: 'position',
                    searchable: true,
                    orderable: true,
                },
                {
                    data: 'id',
                    render: function(id) {
                        return `<a class="text-success" href="<?= base_url('purchasing/edit-purchase/') ?>${id}"><i class="fa fa-edit"></i></a>&nbsp;  <a class="text-danger" onclick="deleteData(${id})" href="#"><i class="fa fa-trash"></i></a>`
                    }
                }

            ],
        initComplete: function(settings) {
            $('.dataTables_filter').hide();
        }
    }).draw();
});


$('#cari').on('keyup', function() {

$('#table').DataTable()
    .search($('#cari').val()).draw();
});

function deleteData(id) {
    $.get("<?= api('user/delete/') ?>" + id).then(res => toastr.success(`Successfully deleted ${res.result.username}`)).catch(err => console.log(err));
}

</script>