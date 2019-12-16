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
})

</script>