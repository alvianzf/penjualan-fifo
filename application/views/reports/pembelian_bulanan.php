<div style="position:absolute">
		<img src="BBA.jpeg" height="200" height="100" />
</div>

<div class="row">
    <div class="card shadow col-md-12 col-xs-12">
        <div class="card-body">
            <center>
				<div class="center">
				<h2>PT.BINTAN BERSATU ABADI</h2>
				<h5>Jln.Karya Praja RT001/RW001 Tanjung Uban Selatan</h5>
                <h4>Laporan Pembelian Bulan <span id="bulan"><?= $bulan_lap ?></span></h4>
                <h6><?= date('d F Y') ?></h6>
				</div>
            </center>
        </div>

    <hr />

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
                    <?php foreach($result as $v) {
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
    </div>
</div>

<div class="right">
		<h5>Penanggung Jawab</h5>
		<br>
		<br>
		<br>
		<br>
		<br>
		<h5><?php echo($this->session->userdata['user_detail']->user_data[0]->name) ?></h5>

</div>

<script>

$(document).ready(() => {
    toastr.success('Sukses!');
})

</script>


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