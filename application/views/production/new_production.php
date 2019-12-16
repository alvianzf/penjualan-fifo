<h2>Produksi Baru</h2>

<div class="row"></div>
    <div class="card shadow border-left-primary">
        <div class="card-body">
            <h4></h4>

            <div class="form-group ">
                <div class="row">
                    <div class="col-md-8 card-body">
                        <h5>Form pencatatan Produksi Baru</h5>
                        <p>Form ini mencatat setiap produksi baru yang siap untuk dijual.</p>
                    </div>
                    <div class="col-md-4 border-left-danger card-body shadow" >
                        <label for="kode_barang">Kode Item</label>
                        <input id="kode_barang" class="form-control form-control-user" placeholder="Kode Item"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 card-body">
                        <label for="tipe_barang">
                            Tipe Barang
                        </label>
                        <select id="tipe_barang" class="form-control form-control-user">
                            <option value="" disabled selected>Pilih</option>
                            <!-- Tipe barang list -->
                        </select>
                    </div>
                    <div class="col-md-3 card-body">
                        <label for="jumlah_barang">
                            Jumlah Barang
                        </label>
                        <input id="jumlah_barang" class="form-control form-control-user" placeholder="Jumlah"/>
                    </div>
                    <div class="col-md-3 card-body">
                        <label for="tipe_barang">
                            Satuan
                        </label>
                        <select id="satuan" class="form-control form-control-user">
                            <option value="" disabled selected>Pilih</option> 
                            <option>Buah</option>
                            <option>Paket</option>
                        </select>
                    </div>
                    <div class="col-md-3 card-body">
                        <label for="harga">
                            Harga
                        </label>
                        <input id="harga" class="form-control form-control-user" placeholder="Harga" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 card-body pull-right">
                        <label for="tanggal">
                            Tanggal Produksi
                        </label>
                        <input type="date" id="tanggal" class="form-control form-control-user" placeholder="tanggal produksi"/>
                    </div>
                    <div class="col-md-9 card-body">
                    <label>&nbsp;</label>
                    <br />
                        <button id="submit" class="btn btn-primary col-md-4">+ Tambah</button>
                        <button id="reset" class="btn btn-danger col-md-4"><i class="fa fa-trash fa-fw"></i> Reset</button>
                        <button id="list" class="btn  btn-success col-md-3"><i class="fa fa-list"></i> Daftar Barang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$('#submit').click(() => {
    kode_produksi   = $('#kode_barang').val();
    tipe_barang     = $('#tipe_barang').val();
    jumlah          = $('#satuan').val() == 'Paket' ? $('#jumlah_barang').val() * 100 : $('#jumlah_barang').val();
    satuan          = $('#satuan').val();
    harga           = $('#harga').val();
    tanggal      = $('#tanggal').val();


    data = {kode_produksi, tipe_barang, jumlah, satuan, harga, tanggal}
    
    if (validate(kode_produksi, "Kode Produksi") && validate(tipe_barang, "Tipe Barang") && validate(jumlah, "Jumlah Barang") && validate(tanggal, "Tanggal Produksi") && validate(satuan, "Satuan") && validate(harga, "Harga")) {
        $.post("<?= api('production/insert') ?>", data).then(res => {
            toastr.success('Berhasil menambahkan item '+ res.result.kode_produksi, res.result_tipe_barang);

            $('#kode_barang').val('');
            $('#tipe_barang').val('');
            $('#jumlah_barang').val('');
            $('#tanggal').val('');
            $('#satuan').val('');
            $('#harga').val('');
            $('#kode_barang').val(Date.now()).attr('disabled', true);
        })
        .catch(err => {
            console.log(err.status);
            toastr.err('Terjadi kesalahan di sistem');
        })
    }
})

$('#list').click(function(){
    window.location.href = "<?= base_url('production/inventaris') ?>";
})

$('#reset').click(() => {

    $('#kode_barang').val('')    
    $('#tipe_barang').val('')    
    $('#jumlah_barang').val('')  
    $('tanggal').val('') 
    $('#kode_barang').val(Date.now()).attr('disabled', true);

    toastr.info('Data berhasil diset ulang', 'reset data');
})

function validate(field, fieldName) {
    if (field) {
        return true
    }

    toastr.error(`Harap mengisi field yang telah ditentukan!`, `${fieldName} kosong`)
    return false
}

$('#kode_barang').val(Date.now()).attr('disabled', true);

$.get("<?= api('settings/production') ?>")
.then(res => {
    $.each(res.result, (i, data) => {
        $('#tipe_barang').append(`<option value="${data.id}">${data.tipe_barang}</option>`);
    });
}).catch(err => {
    toastr.error('Gagal mengambil tipe barang dari database!');
})
</script>