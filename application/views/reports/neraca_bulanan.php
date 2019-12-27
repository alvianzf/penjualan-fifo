<div class="center">
        <h3>Neraca Transaksi Perusahaan Bulan <?= $bulan_lap ?></h3>
        <h5><?= date('d F Y') ?></h5>
</div>

<hr />

<div class="left">
<h6>Pembelian:</h6>
</div>
<div class="card-body">
    <table id="table" class="table table-condensed table-collapse table-striped">
        <thead>
            <tr>
                <td>Kode Pembelian</td>
                <td>Merek</td>
                <td>Tipe Barang</td>
                <td>Jumlah</td>
                <td>Harga</td>
                <td>Total</td>
                <td>Tanggal Produksi</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($result['beli'] as $v) {
                ?>
                <tr>
                    <td><?= $v->kode_barang ?></td>
                    <td><?= $v->nama_barang ?></td>
                    <td><?= $v->tipe_barang ?></td>
                    <td><?= $v->jumlah ?></td>
                    <td>Rp. <?= $v->harga ?></td>
                    <td>Rp. <?= $v->harga * $v->jumlah?>
                    <td><?= $v->created_at ?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
</div>

<br />
<hr />
<br />

<h6>Penjualan:</h6>

<div class="card-body">
    <table id="table" class="table table-condensed table-collapse table-striped">
        <thead>
            <tr>
                <th>Tanggal Transaksi</th>
                <th>Jumlah</th>
                <th>Nominal</th>
                <th>Sisa</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($result['bayar'] as $v) {
                ?>
                <tr>
                    <td><?= $v->tanggal ?></td>
                    <td><?= $v->qty ?></td>
                    <td>Rp. <?= $v->nominal == 0 ? "Pembelian awal" : $v->nominal ?></td>
                    <td><?= $v->sisa ?></td>
                    <td><?= $v->keterangan == '-' ? null : $v->keterangan ?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
</div>

<br />
<hr />
<br />


<?php
    $total_beli = 0;
    $total_bayar = 0;

    foreach($result['beli'] as $v) {
        $total_beli = $total_beli + $v->nominal;
    }

    foreach($result['bayar'] as $v) {
        $total_bayar = $total_bayar + $v->nominal;
    }
?>

<h6>Total neraca:</h6>
<div class="card-body">
    <table id="table" class="table table-condensed table-collapse table-striped">
        <thead>
            <tr>
                <th>Pembelian</th>
                <th>Penjualan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    Rp. <?= $total_beli ?>
                </td>
                <td>
                    Rp. <?= $total_bayar ?>
                </td>
                <td>
                    Rp. <?= $total_bayar - $total_beli ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>


<style>

.right {
        display: inline-block;
        text-align: right;
    }
.left {
    display: inline-block;
    text-align: left;
}
.center {
    display: inline-block;
    text-align: center;
}

center {
    display: inline-block;
    text-align: center;
}

table{
    border-collapse: collapse;
    width: 100%;
    padding: 5px;
    margin: 0;
    border: 1px solid black;
    text-align: center;
}

th {
    height: 50%;
    vertical-align: middle;
}
</style>