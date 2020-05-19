<?php include "./application/views/Customer/include/header.php" ?>
<div class="container">
	<div class="row">
			<div class="col-sm-6">
		<center><h4>Đăng nhập</h4></center>
		<form action="<?= base_url() ?>Customer/Home/checkloginUser" method="post">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Tài khoản</label>
		    <input type="text" class="form-control"  name="username" placeholder="Nhập tài khoản" value="<?= set_value('username')?>">
		    <div class="text-danger"><?= form_error('username')?></div>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Mật khẩu</label>
		   <input type="password" class="form-control"  name="password" placeholder="Nhập mật khẩu" value="<?= set_value('password') ?>">
		      <div class="text-danger"><?= form_error('password')?></div>
		  </div>
		  <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </form>
	</div>
	</div>
</div>
<br>
<br>
<br>
<?php include "./application/views/Customer/include/footer.php" ?>