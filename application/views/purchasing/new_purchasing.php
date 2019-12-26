<h2>Pembelian Stok Baru</h2>

<div class="row"></div>
    <div class="card shadow border-left-primary">
        <div class="card-body">
            <div class="form-group ">
                <div class="row">
                    <div class="col-md-8 card-body">
                        <h5>Form pencatatan pembelian stok baru</h5>
                        <p>Form ini mencatat setiap pembelian baru yang akan masuk ke dalam stok produksi.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 card-body">
                        <label for="nama_barang">
                            Merek
                        </label>
                        <input id="nama_barang" class="form-control form-control-user" placeholder="Merek Item"/>
                    </div>
                    <div class="col-md-2 card-body">
                        <label for="tipe_barang">
                            Tipe Barang
                        </label>
                        <select id="tipe_barang" class="form-control form-control-user">
                            <option value="" disabled selected>Pilih</option>
                            <option>Bahan Produksi</option>
                            <option>ATK</option>
                            <option>Inventarisir</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-2 card-body">
                        <label for="jumlah_barang">
                            Jumlah Barang
                        </label>
                        <input id="jumlah_barang" class="form-control form-control-user" placeholder="Jumlah"/>
                    </div>
                    <div class="col-md-2 card-body">
                        <label for="satuan">
                            Satuan
                        </label>
                        <select id="satuan" class="form-control form-control-user">
                            <option value="" disabled selected>Pilih</option> 
                            <option>Buah</option>
                            <option>Kotak</option>
                            <option>Lori</option>
                            <option>Kilogram</option>
                            <option>Bak</option>
                            <option>Sak</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-2 card-body">
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
    nama_barang     = $('#nama_barang').val();
    tipe_barang     = $('#tipe_barang').val();
    jumlah          = $('#jumlah_barang').val();
    satuan          = $('#satuan').val();
    harga           = $('#harga').val();
    created_at      = $('#tanggal').val();

    data = {nama_barang, tipe_barang, jumlah, satuan, harga, created_at}
    
    if (validate(nama_barang, "Nama Barang"), validate(tipe_barang, "Tipe Barang"), validate(jumlah, "Jumlah Barang"), validate(created_at, "Tanggal Pembelian"), validate(satuan, "Satuan"), validate(harga, "Harga Barang")) {
        $.post("<?= api('purchasing/insert') ?>", data).then(res => {
            toastr.success('Berhasil menambahkan item '+ res.result.nama_barang, res.result.nama_barang);

            $('#kode_barang').val('');   
            $('#nama_barang').val('');   
            $('#tipe_barang').val('');
            $('#jumlah_barang').val('');
            $('#tanggal').val('');      
            $('#harga').val('');        
        })
        .catch(err => {
            console.log(err.status)
        })

    }
})

$('#list').click(function(){
    window.location.href = "<?= base_url('purchasing/inventaris') ?>";
})

$('#reset').click(() => {
 
    $('#nama_barang').val('')    
    $('#tipe_barang').val('')    
    $('#jumlah_barang').val('')  
    $('#satuan').val('');
    $('#harga').val('');
    $('#tanggal').val('');

    toastr.info('Data berhasil diset ulang', 'reset data');
})

function validate(field, fieldName) {
    if (field) {
        return true
    }

    toastr.error(`Harap mengisi field yang telah ditentukan!`, `${fieldName} kosong`)
    return false
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

</script>