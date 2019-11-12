<h2>Edit Produksi</h2>

<div class="row"></div>
    <div class="card shadow border-left-primary">
        <div class="card-body">
            <h4></h4>

            <div class="form-group ">
                <div class="row">
                    <div class="col-md-6 card-body">
                        <h5>Form Edit Produksi</h5>
                        <p>Form ini mencatat perubahan data pada benda-benda produksi</p>
                    </div>
                    <div class="col-md-6 border-left-danger card-body shadow" >
                        <label for="kode_barang">Kode Item</label>
                        <input id="kode_barang" class="form-control form-control-user" placeholder="kode item" value="<?= @$data->kode_produksi ?>"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 card-body">
                        <label for="nama_barang">
                            Nama Item
                        </label>
                        <input id="nama_barang" class="form-control form-control-user" placeholder="nama item" value="<?= @$data->nama_barang ?>"/>
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
                        <input id="jumlah_barang" class="form-control form-control-user" placeholder="Jumlah" value="<?= $data->jumlah ?>"/>
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
                        <input id="harga" class="form-control form-control-user" placeholder="Harga" value="<?= $data->harga ?>"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 card-body">
                        <label for="tanggal">
                            Tanggal Produksi
                        </label>
                        <input type="date" id="tanggal" class="form-control form-control-user" placeholder="tanggal produksi"  value="<?= @Date('Y-m-d', $data->created_at) ?>"/>
                    </div>
                    <div class="col-md-6 card-body">
                        <button id="submit" class="btn btn-primary col-md-5"><i class="fa fa-pencil"></i> Edit</button>
                        <button id="reset" class="btn btn-danger col-md-5"><i class="fa fa-trash fa-fw"></i> Reset</button>
                        <button id="list" class="btn  btn-success col-md-10"><i class="fa fa-list"></i> Daftar Barang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

$('#tipe_barang').val("<?=  $data->tipe_barang ?>")
$('#satuan').val("<?=  $data->satuan ?>")
console.log("<?= $data->tipe_barang ?>")

$('#submit').click(() => {
    nama_barang     = $('#nama_barang').val();
    tipe_barang     = $('#tipe_barang').val();
    satuan          = $('#satuan').val();
    jumlah          = $('#jumlah_barang').val();
    created_at      = $('#tanggal').val();
    harga           = $('#harga').val();
    data = {nama_barang, tipe_barang, jumlah, harga, satuan, created_at}

    $.post("<?= api('purchasing/edit/') . $id ?>", data).then(res => {
        toastr.success('Berhasil mengubah data item '+ res.result.kode_produksi, res.result.nama_barang);
        window.location.reload(true)
    })
    .catch(err => {
        console.log(err.status)
    })
})

$('#list').click(function(){
    window.location.href = "<?= base_url('purchasing/inventaris') ?>";
})

$('#reset').click(() => {

    $('#kode_barang').val('')    
    $('#nama_barang').val('')    
    $('#tipe_barang').val('')    
    $('#jumlah_barang').val('')  
    $('#tanggal').val('');
    $('#harga').val(''); 

    toastr.info('Data berhasil diset ulang', 'reset data');
})

</script>