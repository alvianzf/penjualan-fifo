<div class="center"><h1>Kuitansi Pembayaran</h1></div>
<div class="center"><h5><?= date('d F Y') ?></h5></div>

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