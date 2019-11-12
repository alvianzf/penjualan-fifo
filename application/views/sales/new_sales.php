<div class="row">
    <div class="card shadow border-left-primary col-md-12">
        <div class="card-body">
            <h4>Penjualan Baru</h4>
        </div>
    
        <div class="card-body">

            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <div class="form-group">
                        <label for="pembeli">Pembeli<sup class="text-danger">*</sup></label>
                        <input id="pembeli" class="form-control" placeholder="nama pembeli">
                    </div>
                </div>
                <div class="col-xs-12 col-md-2">
                    <div class="form-group">
                        <label for="item">Item<sup class="text-danger">*</sup></label>
                        <select id="item" class="form-control">
                            <option value="" disabled selected>Pilih</option>
                            <option>Bata</option>
                            <option>Lainnya</option>
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
                        <input type="number" id="jumlah" class="form-control" placeholder="jumlah pembelian">
                    </div>
                </div>
                <div class="col-xs-12 col-md-2">
                    <label for="stock">Subtotal</label>
                    <p id="subtotal"></p>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <button id="tambah" class="btn btn-info">+ Tambah</button>
                </div>
            </div>
        </div>
    </div>
</div>

    <br />

<div class="row">
    <div class="card shadow border-left-primary col-md-12">

        <div class="card-body">
            <h4>Daftar pembelian</h4>

            <div class="col-xs-12 col-md-12">
                <table id="table" class="table-striped table-condensed table-hover table-collapse" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Item</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                </table>
            </div>
            <hr>

            <div class="row">
                <div class="col-xs-12 col-md-3">
                    <select id="tipe" class="form-control" >
                        <option value="" selected disabled>Tipe Pembayaran</option>
                        <option>Tunai</option>
                        <option>Bertahap</option>
                    </select>
                </div> 
                <div class="col-xs-12 col-md-3">
                    <button id="ok" class="btn btn-success btn-block"><i class="fa fa-check"></i> OK</button>
                </div> 
                <div class="col-xs-12 col-md-3">
                    <button id="clear" class="btn btn-warning btn-block"><i class="fa fa-list"></i> Clear</button>
                </div> 
                <div class="col-xs-12 col-md-3">
                    <button id="list" class="btn btn-info btn-block"><i class="fa fa-money"></i> Daftar Transaksi</button>
                </div> 
            </div>
        </div>
    </div>

</div>

<div class="hidden">
    <div id="table-row">
        <tr>
            <td>{{ID}}</td>
            <td id="item-{{ID}}">-</td>
            <td id="jumlah-{{ID}}">-</td>
            <td id="harga-{ID}}">-</td>
            <td id="subtotal-{{ID}}">-</td>
            <td><button class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
        </tr>
    </div>
</div>

<script>

var harga = 0;
var stok = 0;
var satuan = '';

$('#item').change(() => {
    $.get("<?= api('transaction/information/') ?>" + $('#item').val()).then((res) => {
        $('#stock').attr('class', 'text-success').text(`${res.result.stok} ${res.result.satuan}`);
        $('#harga').text(`Rp. ${res.result.harga},00`);

        harga = res.result.harga;
        stok = res.result.stok;
        satuan = res.result.satuan

    }).catch(err => {
        $('#stock').attr('class', 'text-danger').text('0 Buah');
    })
});


$('#jumlah').on('keydown', () => {
    if (harga) {
        jumlah = $('#jumlah').val();

        sum = jumlah * harga;

        $('#subtotal').text(`Rp. ${numberWithCommas(sum)},00`);

        sisa = stok - jumlah;
        if (sisa >= 0) {
            $('#stock').attr('class', 'text-info').text(`${sisa} ${satuan}`);
        } else {
            $('#stock').attr('class', 'text-danger').text('Stok Kosong!');

            toastr.error('Stok Kosong!', 'Peringatan!');
        }
    }
});

var row = (function (){
    var itemIndex = 1;
    var itemTemplate = $('#table-row').html();

    return () => {
        return itemTemplate.replace(/{{ID}}/g, itemIndex++);
    }
})();

var t = $('#table').DataTable();

var k = 1;
$('#tambah').click(() => {
    if ($('#jumlah').val()) {
    } else {
        toastr.error('Silahkan mengisi form terlebih dahulu', 'Form kosong!');
    }
})

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

</script>