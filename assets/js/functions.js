
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

$('#cari').on('keyup', function() {
    $('#table').DataTable()
        .search($('#cari').val()).draw();
})