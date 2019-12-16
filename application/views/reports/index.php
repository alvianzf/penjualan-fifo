<div class="row">
    <div class="card shadow border-left-primary col-md-12 col-xs-12">
        <div class="card-body">
            <h4>Laporan</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    Cetak laporan:
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <select class="form-control" id="month">
                        <option value="" disabled selected>Pilih Bulan</option>
                        <option value="1">Bulan Januari</option>
                        <option value="2">Bulan Februari</option>
                        <option value="3">Bulan Maret</option>
                        <option value="4">Bulan April</option>
                        <option value="5">Bulan Mei</option>
                        <option value="6">Bulan Juni</option>
                        <option value="7">Bulan Juli</option>
                        <option value="8">Bulan Agustus</option>
                        <option value="9">Bulan September</option>
                        <option value="10">Bulan Oktober</option>
                        <option value="11">Bulan November</option>
                        <option value="12">Bulan Desember</option>
                        <option value="all">Tahun ini</option>
                    </select>
                </div>
                <div class="col-md-4 col-xs-12">
                    <button class="btn btn-success btn-block"><span class="fa fa-list"></span> Lihat Data</button>
                </div>
                <div class="col-md-4 col-xs-12">
                    <button class="btn btn-info btn-block" ><span class="fa fa-file"></span> Cetak</button>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <table id="table" class="table table-condensed table-hover table-striped table-collapse">
                        <thead>
                            <th>Tanggal Transaksi</th>
                            <th>Kode Barang</th>
                            <th>Qty</th>
                            <th>Pembeli</th>
                            <th>Jumlah</th>
                            <th>Pembayaran</th>
                            <th><span class="fa fa-cog"></span></th>
                        </thead>

                        <tbody>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>