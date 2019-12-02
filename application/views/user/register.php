<div class="row">
    <div class="card shadow border-left-primary col-md-12">
        <div class="card-body">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h4>Pengguna Baru 
                        <span id="user-label" class="text-primary" style="text-align: right;"></span>
                    </h4>
                </div>
                <div class="col-x-12 col-md-6">
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <label for="username">User Name<sup class="text-danger">*</sup></label>
                    <input id="username" class="form-control" placeholder="Username" />
                </div>
                <div class="col-xs-12 col-md-4">
                    <label for="password">Password<sup class="text-danger">*</sup></label>
                    <input id="password" type="password" class="form-control" placeholder="Password"/>
                </div>
                <div class="col-xs-12 col-md-4">
                    <label for="role">Role<sup class="text-danger">*</sup></label>
                    <select id="role" class="form-control">
                        <option value="" disabled selected>Pilih Peran</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
            </div>

            <hr />
            
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h5>Biodata Pengguna <span id="name-label" class="text-warning"></span></h5>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <label for="name"></label>
                    <input id="name" class="form-control" />
                </div>
                <div class="col-xs-12 col-md-4">
                    <label for="contact_number"></label>
                    <input id="contact_number" class="form-control" />
                </div>
                <div class="col-xs-12 col-md-4">
                    <label for="position"></label>
                    <select id="position" class="form-control">
                        <option value="" selected disabled>Pilih Posisi</option>
                        <option value="owner">Pemilik</option>
                        <option value="kasir">Kasir</option>
                        <option value="operator">Operator</option>
                    </select>
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

</script>