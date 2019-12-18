<div class="row">
    <div class="card shadow border-left-primary col-md-12">
        <div class="card-body">
            <h5>Daftar Transaksi</h5>
        </div>

        <div class="card-body">
            <table id="table" class="table table-condensed table-hover table-striped table-collapse">
                <thead>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Item</th>
                    <th>Total Terhutang</th>
                    <th>Total Dibayarkan</th>
                    <th>Sisa</th>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        $('#table').DataTable().draw();
    });
</script>