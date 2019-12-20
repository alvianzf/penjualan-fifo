<div class="row">
    <div class="card shadow border-left-primary col-md-12 col-xs-12">
        <div class="card-body">
            <h4>Daftar Penjualan</h4>

            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <a class="btn btn-info" href="<?= base_url('sales/new-sales') ?>" >
                        <span class="fa fa-plus"> Penjualan Baru</span>
                    </a>
                </div>
                <div class="col-md-4 col-xs-12">

                </div>
                <div class="col-md-4 col-xs-12">
                    <input id="cari" class="form-control" placeholder="Cari..."/>
                </div>
            </div>

            <hr />

            <table id="table" class="table table-collapse table-condensed table-hover table-striped" width="100%">
                <thead>
                    <th>Tanggal</th>
                    <th>Nama Pembeli</th>
                    <th>Item</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Transaksi Terakhir</th>
                    <th>Bayar</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="fullModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pembayaran Penuh</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <h6 id="total-full"></h6>

        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="currency">Rp.</span>
                        <input id="bayar-full" class="form-control" placeholder="Masukkan nominal" aria-describedby="currency"/>
                        <input id="id" class="hidden">
                        <input id="qty" class="hidden">
                        <input id="keterangan" class="hidden" value="penuh">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <button class="btn btn-success btn-block" id="save-full" ><span class="fa fa-money-bill-alt"></span> Bayar Sekarang</button>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="cicilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pembayaran Bertahap</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 id="total-cicil"></h6>

        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="currency">Rp.</span>
                        <input id="bayar-cicil" class="form-control" placeholder="Masukkan nominal" aria-describedby="currency"/>
                        <input id="id_cicilan" class="hidden">
                        <input id="qty_cicilan" class="hidden">
                        <input id="keterangan_cicilan" class="hidden" value="cicilan">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <button class="btn btn-warning btn-block" id="save-cicil" ><span class="fa fa-money-bill-alt"></span> Bayar Bertahap</button>
            </div>
        </div>
        
        <hr />

        <h6>Daftar Pembayaran:</h6>

        <table id="bayar-cicil-table" class="table table-condensed table-hover table-striped table-collapse">
            <thead>
                <th>Tanggal Pembayaran</th>
                <th>Jumlah (Rp.)</th>
            </thead>
            <tbody>
            
            </tbody>
            <tfoot>
                <th>Sisa</th>
                <th id="sisa">0</th>
            </tfoot>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>

$(document).ready(() => {
    $('#table').DataTable({
        processing: true,
        responsive: true,
        order: [0,'asc'],
        pageLength: 25,
        lengthMenu: [[25,50,100,200], [25,50,100,200]],
        language: {
            paginate: {
                next: '<i class="fas fa-caret-right"></i>',
                previous: '<i class="fas fa-caret-left"></i>'
            },
            info: 'Menunjukkan _START_ sampai _END_ dari _TOTAL_ data'
        },
        ajax: {
                    url: "<?= site_url('dt/transactions')?>",
                    type: "POST",
                },
                columnDefs: [{
                    targets: -1,
                    orderable: false
                }],
                columns: [
                {
                    data: 'tanggal',
                    searchable: true,
                    orderable: true,
                },
                {
                    data: 'nama',
                    searchable: true,
                    orderable: true,
                },
                {
                    data: 'keterangan',
                    searchable: true,
                    orderable: true,
                    render: function(keterangan) {
                        return keterangan == 'bata10' ? 'Bata 10 cm' : 'Bata 7,5 cm';
                    }
                },
                {
                    data: 'qty',
                    searchable: true,
                    orderable: true,
                },
                {
                    data: 'nominal',
                    searchable: true,
                    orderable: true,
                    render: function(nominal) {
                        return `Rp. ${numberWithCommas(nominal)}`;
                    }
                },
                {
                    data: 'created_at',
                    searchable: true,
                    orderable: true,
                },
                {
                    data: 'id',
                    render: function(id) {
                        return `<button id="pay" data-id="${id}" class="btn btn-success col-md-6 col-xs-12" data-toggle="modal" data-target="#fullModal" onClick="bayarFull($(this))"><span class="fa fa-money-bill-alt"></span> Full</button><button id="credit" data-id="${id}" class="btn btn-warning col-md-6 col-xs-12" data-toggle="modal" data-target="#cicilModal" onClick="bayarCicil($(this))"><span class="fa fa-receipt"></span> Cicil</button>`
                    }
                }

            ],
        initComplete: settings => {
            $('.dataTables_filter').hide()
        }
    })
});

function bayarFull(data) {
    const id = data.attr('data-id');
    $.get("<?= api('sales/single_transaction/') ?>" + id)
    .then(res => {
        $('#id').val(res.result.buyer_id);
        $('#qty').val(res.result.qty);
        $('#bayar-full').val(res.result.nominal).attr('disabled', true);

        $('#total-full').text(`Total Bayar: Rp.${res.result.nominal}`);
    }).catch(err=> toastr.error('Data tidak dapat ditampilkan', 'server error!'));
}

function bayarCicil(data) {
    const id = data.attr('data-id');
    $.get("<?= api('sales/single_transaction/') ?>" + id)
    .then(res => {

        $.get("<?= api('payment/data/') ?>" + id).then(payment => {
            $('#bayar-cicil-table').append(`<tr><td>${payment.result.tanggal}</td><td>${numberWithCommas(payment.result.nominal)}</td></tr>`);
            $('#sisa').text(`${numberWithCommas(payment.result.sisa)}`)
        }).catch(err => {
            $('#bayar-cicil-table').append('<tr><td>Belum ada pembayaran cicilan</td><td></td></tr>')
        });

        $('#id_cicilan').val(res.result.buyer_id);
        $('#qty_cicilan').val(res.result.qty);

        $('#total-cicil').text(`Total Bayar: Rp.${res.result.nominal}`);
    }).catch(err=> toastr.error('Data tidak dapat ditampilkan', 'server error!'));
}

$('#save-full').click(function (e) { 
    const transaction_id    =   $('#id').val();
    const qty               =   $('#qty').val();
    const nominal           =   $('#bayar-full').val();
    const keterangan        =   $('#keterangan').val();

    $.post("<?= api('payment/pay') ?>", {transaction_id, qty, nominal, keterangan})
    .then(res => {
        toastr.success('Berhasil melakukan pembayaran!');

        window.location.reload(false);

    })
    .catch(err => {
        toastr.error('Gagal menyimpan pembayaran', 'server error!');
    })
});

$('#save-cicil').click(function (e) { 
    const transaction_id    =   $('#id_cicilan').val();
    const qty               =   $('#qty_cicilan').val();
    const nominal           =   $('#bayar-cicil').val();
    const keterangan        =   $('#keterangan_cicilan').val();

    $.post("<?= api('payment/pay') ?>", {transaction_id, qty, nominal, keterangan})
    .then(res => {
        toastr.success('Berhasil melakukan pembayaran!');

        window.location.reload(false);

    })
    .catch(err => {
        toastr.error('Gagal menyimpan pembayaran', 'server error!');
    })
});

</script>