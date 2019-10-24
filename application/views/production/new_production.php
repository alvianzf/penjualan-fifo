<h2>Produksi Baru</h2>

<div class="row"></div>
    <div class="card shadow border-left-primary">
        <div class="card-body">
            <h4></h4>

            <div class="form-group ">
                <div class="row">
                    <div class="col-md-6 card-body">
                        <h5>Form pencatatan Produksi Baru</h5>
                        <p>Form ini mencatat setiap produksi baru yang siap untuk dijual.</p>
                    </div>
                    <div class="col-md-6 border-left-danger card-body shadow" >
                        <label for="kode_barang">Kode Item</label>
                        <input id="kode_barang" class="form-control form-control-user" placeholder="kode item"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 card-body">
                        <label for="nama_barang">
                            Nama Item
                        </label>
                        <input id="nama_barang" class="form-control form-control-user" placeholder="nama item"/>
                    </div>
                    <div class="col-md-3 card-body">
                        <label for="tipe_barang">
                            Tipe Barang
                        </label>
                        <select id="tipe_barang" class="form-control form-control-user">
                            <option>Bata</option>
                            <option>Lainnya</option>
                        </select>
                    </div>
                    <div class="col-md-3 card-body">
                        <label for="jumlah_barang">
                            Jumlah Barang
                        </label>
                        <input id="jumlah_barang" class="form-control form-control-user" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 card-body">
                        <label for="tanggal">
                            Tanggal Produksi
                        </label>
                        <input type="date" id="tanggal" class="form-control form-control-user" placeholder="tanggal produksi"/>
                    </div>
                    <div class="col-md-6 card-body">
                        <button id="submit" class="btn btn-primary col-md-5">+ Tambah</button>
                        <button id="reset" class="btn btn-danger col-md-5"><i class="fa fa-trash fa-fw"></i> Reset</button>
                        <button id="list" class="btn  btn-success col-md-10"><i class="fa fa-list"></i> Daftar Barang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$('#submit').click(() => {
    kode_produksi   = $('#kode_barang').val();
    nama_barang     = $('#nama_barang').val();
    tipe_barang     = $('#tipe_barang').val();
    jumlah          = $('#jumlah_barang').val();
    created_at      = $('tanggal').val();

    data = {kode_produksi, nama_barang, tipe_barang, jumlah, created_at}

    $.post("<?= api('production/insert') ?>", data).then(res => {
        console.log(res)
        toastr.success('Berhasil menambahkan item '+ res.result.kode_produksi, 'Sukses');

        $('#kode_barang').val('')    
        $('#nama_barang').val('')    
        $('#tipe_barang').val('')    
        $('#jumlah_barang').val('')  
        $('tanggal').val('')         
    })
    .catch(err => {
        console.log(err.status)
    })
})

$('#list').click(function(){
    window.location.href = "<?= base_url('production/inventaris') ?>";
})

</script>