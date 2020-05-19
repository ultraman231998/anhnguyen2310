<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng Nhập</title>
	    <script type="text/javascript" src="<?= base_url() ?>B/trap/vendor/bootstrap.js"></script>
		<link rel="stylesheet" href="<?= base_url() ?>B/trap/vendor/bootstrap.css">
		<link rel="stylesheet" href="<?= base_url() ?>B/trap/vendor/font-awesome.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"> 
		<link href="<?= base_url() ?>A/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>A/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>
	 <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
          <!--     <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <div class="col-lg-6 push-sm-3">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <div class="text-danger"><?= $this->session->flashdata('intval_user_pass');?></div>
               

                  <form class="user" action="<?= base_url()?>Admin/Admin/checklogin" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user"  name="username" aria-describedby="emailHelp" placeholder="Enter Username" value="<?= set_value('username') ?>">
                      <div class="text-danger"><?= form_error('username')?></div>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password" value="<?= set_value('password') ?>">
                      <div class="text-danger"><?= form_error('password')?></div>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>

                    <input type="submit" class="btn btn-outline-primary btn-user btn-block" value="Login">

                    
<!-- 
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url()?>Admin/forgotpassword">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>


</body>
</html>