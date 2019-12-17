<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Penjualan - Login</title>

	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/style.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" aria-describedby="emailHelp" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password">
                    </div>
                    <button type="button" id="login" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <!-- <script src="assets/vendor/jquery/jquery.min.js"></script> -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>

<script>

$('#login').click(() => {
  const username = $('#username').val();
  const password = $('#password').val();

  $.post("<?=api('auth/login')?>", {username, password})
  .then((res) => 
  {
    if (res) {
      toastr.success('Logged in');
      window.location.href = 'dashboard';
    }
  }).catch(err => {
        if (err.status == 401) {
          console.log(err.status)
          toastr.error('Login Gagal!');
        }
      })
})

$('#password').on('keypress', (e) => {

  const username = $('#username').val();
  const password = $('#password').val();

  if (e.which == 13) {
    $.post("<?=api('auth/login')?>", {username, password})
      .then((res, status) => 
      {
        if (res) {
          toastr.success('Logged in');
          window.location.href = 'dashboard';
        }
      }).catch(err => {
        if (err.status == 401) {
          console.log(err.status)
          toastr.error('Login Gagal!');
        }
      })
  }
})

</script>

<style>
/* Custom CSS by Saya Sendiri */

.toast-error {
  background-color: red;
}

.toast-success {
  background-color: lightgreen;
}

.toast-info {
  background-color: lightblue;
}

.toast-warning {
  background-color: yellow;
}
</style>