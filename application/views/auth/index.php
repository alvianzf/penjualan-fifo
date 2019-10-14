
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
                      <input id="user-id" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="userID" placeholder="masukkan user ID">
                    </div>
                    <div class="form-group">
                      <input id="password" type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="password">
                    </div>
                    <hr>
                    <a href="#" id="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


<script src="assets/templates/vendor/jquery/jquery.min.js"></script>
<script>
  
$('#submit').click(() => {
  const user = $('#user-id').val()
  const pass = $('#password').val()

  $.post("<?= api('auth/login')?>", {user, pass}).then(res => { console.log(res) }).catch(err => {console.log(err)})

  $.get("<?= api('auth/login')?>").then(res => {console.log(res)})
})

</script>
