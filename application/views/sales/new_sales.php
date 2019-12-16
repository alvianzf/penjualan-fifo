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
                        <div class="row">
                            <div class="col-xs-12 col-md-8">
                                <select id="pembeli" class="form-control">
                                    <option value="" disabled selected>Pilih Pembeli</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <button class="btn btn-success btn-block" data-toggle="modal" data-target="#pembeliModal"><span class="fa fa-user" data-toggle="tooltip" data-placement="top" title="Tambah pembeli baru"> +</span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-2">
                    <div class="form-group">
                        <label for="item">Item<sup class="text-danger">*</sup></label>
                        <select id="item" class="form-control">
                            <option value="" disabled selected>Pilih</option>
                            <option value="bata75">Bata 7.5 cm</option>
                            <option value="bata10">Bata 10 cm</option>
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
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <h4>Daftar pembelian</h4>
            </div>
            <div class="col-xs-12 col-md-4">
                <input id="search" placeholder="cari pembelian" class="form-control">
            </div>
        </div>

    <hr />

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
                    <a id="list" class="btn btn-info btn-block" href="<?= base_url('sales/transaksi') ?>"><i class="fa fa-money"></i> Daftar Transaksi</a>
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

<!-- Modal -->
<div class="modal fade" id="pembeliModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div class="form-group">
                    <label for="nama_pembeli">Nama<sup class="text-danger">*</sup></label>
                    <input id="nama_pembeli" class="form-control" placeholder="Nama"/>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="form-group">
                    <label for="perusahaan_pembeli">Perusahaan<sup class="text-danger">*</sup></label>
                    <input id="perusahaan_pembeli" class="form-control" placeholder="Perusahaan"/>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="form-group">
                    <label for="kontak_pembeli">Nomor Kontak<sup class="text-danger">*</sup></label>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="country_code">+62</span>
                        <input type="number" id="kontak_pembeli" class="form-control" placeholder="Nomor Kontak" aria-describedy="country_code"/>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> Tutup</button>
        <button id="add_buyer" type="button" class="btn btn-success"><span class="fa fa-user"> + </span> Tambah Pembeli</button>
      </div>
    </div>
  </div>
</div>

<script>

$(document).ready(() => {
    var t = $('#table').DataTable({
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
        initComplete: function(settings) {
            $('.dataTables_filter').hide()
        }
    }).draw();
});

var harga = [];
var stok = [];
var satuan = [];
var sum = [];
var sisa = [];

$('#item').change(() => {
    console.log(sisa[$('#item').val()])
    if (!sisa[$('#item').val()]) {
        $.get("<?= api('transaction/information/') ?>" + $('#item').val()).then((res) => {
            $('#stock').attr('class', 'text-success').text(`${res.result.stok} ${res.result.satuan}`);
            $('#harga').text(`Rp. ${res.result.harga},00`);

            harga[$('#item').val()] = res.result.harga;
            stok[$('#item').val()] = res.result.stok;
            satuan[$('#item').val()] = res.result.satuan

        }).catch(err => {
            $('#stock').attr('class', 'text-danger').text('0 Buah');
            $('#harga').text(`Rp. --`);

            toastr.error('Stok Kosong!');
        })
    
    } else {
        if (sisa[$('#item').val()] == 0) {
            $('#stock').attr('class', 'text-danger').text(`${stok[$('#item').val()]} ${satuan[$('#item').val()]}`);
            toastr.error('Stok kosong!');
        } else {
            $('#harga').text(`Rp. ${harga[$('#item').val()]},00`);
            $('#stock').attr('class', 'text-success').text(`${stok[$('#item').val()]} ${satuan[$('#item').val()]}`);
        }
        
    }
});


$('#jumlah').on('keyup', () => {
    if (harga) {
        jumlah = $('#jumlah').val();

        sum[$('#item').val()] = jumlah * harga[$('#item').val()];

        $('#subtotal').text(`Rp. ${numberWithCommas(sum[$('#item').val()])},00`);

        sisa[$('#item').val()] = stok[$('#item').val()] - jumlah;
        if (sisa[$('#item').val()] >= 0) {
            $('#stock').attr('class', 'text-info').text(`${sisa[$('#item').val()]} ${satuan[$('#item').val()]}`);

            if (sisa[$('#item').val()] == 0) {
                $('#stock').attr('class', 'text-danger').text(`${sisa[$('#item').val()]} ${satuan[$('#item').val()]}`);
            }
        } else {
            $('#stock').attr('class', 'text-danger').text('Stok Kurang!');

            toastr.error('Stok Kurang!', 'Peringatan!');
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

$('#search').on('keyup', () => {
    $('#table').DataTable()
        .search($('#search').val()).draw();
});

var counter = 1;
$('#tambah').click(() => {
    if ($('#jumlah').val() && stok[$('#item').val()] >=0) {
        item = $('#item').val(),
        jumlah = $('#jumlah').val();
        $('#table').DataTable().row.add([
            counter,
            item,
            `${numberWithCommas(jumlah)} ${satuan[$('#item').val()]}`,
            `Rp. ${harga[$('#item').val()]},00`,
            `Rp. ${numberWithCommas(sum[$('#item').val()])},00`,
            `<i class="fa fa-trash" onClick="$('#table').DataTable().row($(this).parents('tr')).remove().draw();"></i>`
        ]).draw(false);

        counter++;

        stok[$('#item').val()] -= jumlah

        $('#jumlah').val('');

    } else {
        toastr.error('Silahkan mengisi form terlebih dahulu', 'Form kosong!');
    }
})

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

$('#clear').click(() => {
    $('#pembeli').val('');
    $('#item').val('');
    $('#jumlah').val('');
    $('#stock').text('');
    $('#harga').text('');
    $('#subtotal').text('');

    $('#table').DataTable().clear().draw();
});

$('#add_buyer').click(() => {
    const nama = $('#nama_pembeli').val();
    const perusahaan = $('#perusahaan_pembeli').val();
    const kontak = $('#kontak_pembeli').val();

    const data = {nama, perusahaan, kontak}

    $.post("<?= api('transaction/buyer') ?>", data).done(res => {
        toastr.success(`Berhasil menambahkan pembeli ${nama}`, "Sukses!");
        window.location.reload(true);
        })
    .catch(err => toastr.error('Gagal menambahkan pembeli!'));
});

$.get("<?= api('transaction/buyer_list') ?>").then(res => {
    console.log(res)
    $.each(res.result, (i, data) => {
        $('#pembeli').append(`<option value="${data.id}">${data.nama} - ${data.perusahaan}</option>`)
    })
}).catch(err => {
    toastr.error('Gagal mengambil data pembeli!');
});

</script>