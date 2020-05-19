<?php include "./application/views/Customer/include/header.php" ?>

<div class="container">
	<div class="row">
	<div class="col-sm-6">
		<center><h4>Đăng ký</h4></center>
		<form action="<?= base_url() ?>Customer/Home/add_user" method="post">
	      <div class="form-group">
		    <label for="exampleInputPassword1">Tên người dùng</label>
		    <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="Nhập người dùng">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Tài khoản</label>
		    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tài khoản">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Mật khẩu</label>
		    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu">
		  </div>
		   <div class="form-group">
		    <label for="exampleInputPassword1">Email</label>
		    <input type="text" name="email" class="form-control" id="exampleInputPassword1" placeholder="Nhập email">
		  </div>
		   <div class="form-group">
		    <label for="exampleInputPassword1">Địa chỉ</label>
		    <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="Nhập địa chỉ">
		  </div>
		   <div class="form-group">
		    <label for="exampleInputPassword1">Số điện thoại</label>
		    <input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Nhập số điện thoại">
		  </div>
		  <button type="submit" class="btn btn-primary">Đăng ký</button>
        </form>
	</div>
	</div>
</div>
<br>
<br>
<br>
<?php include "./application/views/Customer/include/footer.php" ?>