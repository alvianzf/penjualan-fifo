<div class="row">
    <div class="card shadow border-left-primary col-md-12">
        <div class="card-body">
            <h4>Pengambilan Stok</h4>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                        <label for="item">Item<sup class="text-danger">*</sup></label>
                        <select id="item" class="form-control">
                            <option value="" disabled selected>Pilih</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-md-1">
                    <label for="stock">Sisa stok</label>
                    <p class="text-success" id="stock"></p>
                </div>
                <div class="col-xs-12 col-md-2">
                    <label for="harga">Harga</label>
                    <p id="harga"></p>
                </div>
                <div class="col-xs-12 col-md-2">
                    <div class="form-group">
                        <label for="jumlah">Jumlah<sup class="text-danger">*</sup></label>
                        <input type="number" id="jumlah" class="form-control" placeholder="jumlah diambil">
                    </div>
                </div>
                <div class="col-xs-12 col-md-2">
                    <label for="stock">Subtotal</label>
                    <p id="subtotal"></p>
                    <input id="sub" style="display: none">
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <button id="tambah" class="btn btn-info"><i class="fa fa-plus"></i> Ambil Stok</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $.get("<?= api('purchasing') ?>").then(res => {
        const items = res.result

        $.each(items, (i, data) => {
            $('#item').append(`<option value="${data.id}">${data.kode_barang} - ${data.nama_barang}</option>`)
        });
    });
    
    var _harga = 0
    $('#item').change(() => { 
        const item = $('#item').val();

        $.get("<?= api('purchasing/item/') ?>" + item).then(res => {
            $('#stock').text(res.result.jumlah)
            $('#harga').text(`Rp.${numberWithCommas(res.result.harga)}`)
            _harga = res.result.harga;
        })
    });

    $('#jumlah').on('keyup', function (e) { 
        const jumlah = $('#jumlah').val();
        const harga = $('#harga').text();
        console.log(harga)
        const total = jumlah * _harga;
        $('#subtotal').text(_harga && `Rp.${numberWithCommas(total)}`)
    });

    $('#tambah').click(() => {
        const jumlah = $('#jumlah').val()
        const item = $('#item').val()

        $.post("<?= api('purchasing/reduction/') ?>" + item).then((res) => {
            if (res.success) {
                toastr.success('Berhasil mengurangi stok')
                window.location.href = "<?= base_url('purchasing/stock') ?>"
            } else {
                toastr.error('Gagal mengurangi stok')
            }
        })
    })
</script>