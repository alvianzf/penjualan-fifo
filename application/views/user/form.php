<div class="row">
    <div class="card shadow border-left-primary col-md-12">
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h4>Sunting Pengguna 
                        <span id="user-label" class="text-primary" style="text-align: right;"><?= ': '. $data->username ?></span>
                    </h4>
                </div>
                <div class="col-x-12 col-md-6">
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <label for="username">User Name<sup class="text-danger">*</sup></label>
                    <input id="username" class="form-control" placeholder="Username" value="<?= $data->username ?>"/>
                </div>
                <div class="col-xs-12 col-md-4">
                    <label for="password">Password<sup class="text-danger">*</sup></label>
                    <input id="password" type="password" class="form-control" placeholder="Password" />
                </div>
                <div class="col-xs-12 col-md-4">
                    <label for="role">Role<sup class="text-danger">*</sup></label>
                    <select id="role" class="form-control" >
                        <option value="" disabled selected>Pilih Peran</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>

            <hr />
            
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h5>Biodata Pengguna <span id="name-label" class="text-warning"><?= ': ' . $data->user_data[0]->name ?></span></h5>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <label for="name">Nama Lengkap</label>
                    <input id="name" class="form-control" placeholder="Nama Lengkap" value="<?= $data->user_data[0]->name ?>"/>
                </div>
                <div class="col-xs-12 col-md-4">
                    <label for="contact_number">Nomor Kontak</label>
                    <input id="contact_number" class="form-control" placeholder="Nomor Kontak" value="<?= $data->user_data[0]->contact_number ?>"/>
                </div>
                <div class="col-xs-12 col-md-4">
                    <label for="position">Posisi</label>
                    <select id="position" class="form-control">
                        <option value="" selected disabled>Pilih Posisi</option>
                        <option value="owner">Pemilik</option>
                        <option value="admin">Kasir</option>
                        <option value="operator">Operator</option>
                    </select>
                </div>
            </div>

            <hr />

            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <!-- only blank space here -->
                </div>
                <div class="col-xs-6 col-md-2">
                    <button id="reset" class="btn btn-warning btn-block"><span class="fa fa-list"></span> Reset</button>
                </div>
                <div class="col-xs-6 col-md-2">
                    <button id="submit" class="btn btn-success btn-block"><span class="fa fa-pencil-alt"></span> Ubah</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$('#username').keyup(() => {
    $('#user-label').text(': ' + $('#username').val());
});

$('#name').keyup(() => {
    $('#name-label').text(': ' + $('#name').val());
});

$('#role').val("<?= $data->role ?>");
$('#position').val("<?= $data->user_data[0]->position ?>");

$('#submit').click(() => {
    const id = "<?= $id ?>";
    const username = $('#username').val();
    const password = $('#password').val();
    const role     = $('#role').val();

    const name = $('#name').val();
    const contact_number = $('#contact_number').val();
    const position = $('#position').val();

    $.post("<?= api('user/edit/') . $id ?>", {username, password, role, name, contact_number, position})
    .then(res => {
        toastr.success('Berhasil mengupdate data', 'Success!');
        window.location.href= "<?= base_url('admin/user-list') ?>";
    })
    .catch(err => toastr.error('Internal Server Error', 'Error'));
});

$('#reset').click(() => {

    $('#username').val("<?= $data->username ?>");
    $('#password').val('');
    $('#role').val("<?= $data->role ?>");

    $('#name').val("<?= $data->user_data[0]->name ?>");
    $('#contact_number').val("<?= $data->user_data[0]->contact_number ?>");
    $('#position').val("<?= $data->user_data[0]->position ?>");

    $('#user-label').text("<?= $data->username ?>");
    $('#name-label').text("<?= $data->user_data[0]->name ?>");

});
</script>