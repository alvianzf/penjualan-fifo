<center><h1>Kuitansi Pembayaran</h1></center>
<center><h5><?= date('d F Y') ?></h5></center>

<table>
<tr>
    <th>Tanggal</th>
    <th>Tipe Pembayaran</th>
    <th>Jumlah</th>
    <th>Nominal</th>
</tr>

<tr>
    <td><?= $data->tanggal ?></td>
    <td><?= ucfirst($data->keterangan) ?></td>
    <td><?= $data->qty ?></td>
    <td><?= $data->nominal ?></td>
</tr>

</table>

<style>
    center {
        text-align: center;
    }

    table {
        width: 100%;
        padding: 5px;
        margin: 0;
        border: 1px black;
        text-align: center;
    }
</style>