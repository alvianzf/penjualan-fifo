<div class="row">
    <div class="card shadow border-left-primary col-md-12">
        <div class="card-body">
            <h4>Penjualan Baru</h4>
        </div>
    
        <div class="card-body">

            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                        <label for="pembeli">Pembeli<sup class="text-danger">*</sup></label>
                        <input id="pembeli" class="form-control" placeholder="nama pembeli">
                    </div>
                </div>
                <div class="col-xs-12 col-md-3">
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
                    <p id="stock"></p>
                </div>
                <div class="col-xs-12 col-md-1">
                    <label for="harga">Harga</label>
                    <p id="harga"></p>
                </div>
                <div class="col-xs-12 col-md-2">
                    <div class="form-group">
                        <label for="jumlah">Jumlah<sup class="text-danger">*</sup></label>
                        <input type="number" id="jumlah" class="form-control" placeholder="jumlah pembelian">
                    </div>
                </div>
                <div class="col-xs-12 col-md-1">
                    <label for="stock">Subtotal</label>
                    <p id="subtotal"></p>
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
                <table id="table" class="table table-striped table-condensed table-hover table-collapse" width="100%">
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