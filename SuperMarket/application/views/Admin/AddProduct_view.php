<?php include "./application/views/Admin/include/header.php" ?>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="row">

		<div class="col-lg-7">

			

			<!-- Basic Card Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Nhập thông tin</h6>
				</div>
				<div class="card-body">
					<form action="<?= base_url() ?>Admin/Admin/add" method="POST" enctype="multipart/form-data">
						<fieldset class="form-group">
							<label for="exampleInputEmail1">Tên sản phẩm</label>
							<input name="name" type="text" class="form-control" id="" placeholder="Tên sản phẩm">
						</fieldset>

						<fieldset class="form-group">
							<label for="exampleInputPassword1">Giá</label>
							<input type="number" name="price" placeholder="Giá"  class="form-control" >
						</fieldset>

						<fieldset class="form-group">
							<label for="exampleInputPassword1">Giá giảm</label>
							<input type="number" name="discount" placeholder="Giá giảm"  class="form-control" >
						</fieldset>
							<fieldset class="form-group">
							<label for="exampleInputPassword1">Số lượng</label>
							<input type="number" name="amount" placeholder="Số lượng"  class="form-control" >
						</fieldset>

						<fieldset class="form-group">
							<label for="exampleInputPassword1">Danh mục</label>
							<select class="form-control" name="catalog_id">
								<option selected>Chọn danh mục</option>
								<?php fetch_menu($catalog)?>
							</select>
						</fieldset>
						
						<fieldset class="form-group">
							<label for="exampleInputPassword1">Mô tả</label>
							<textarea name="content" id="noidung" rows="10" cols="80">
							</textarea>
							<script>
								CKEDITOR.replace( 'noidung' );
							</script>
						</fieldset>
						
						<button type="submit" class="btn btn-primary">Xác nhận</button>
					</div>
				</div>

			</div>

			<div class="col-lg-5">
				<input type="file" name="img" id="profile-img">
				<img src="" id="profile-img-tag" width="400px" />
			</div>
		</form>

	</div>

</div>
<!-- /.container-fluid -->

</div>

<!-- End of Main Content -->


<?php include "./application/views/Admin/include/footer.php" ?>

<?php 


function fetch_menu($catalog){

	foreach($catalog as $menu){


		echo "<option value='".$menu->id."'>".$menu->name."</option>";

		if(!empty($menu->sub)){
			fetch_sub_menu($menu->sub);

		}

	}

}


function fetch_sub_menu($sub_menu){

	foreach($sub_menu as $menu){

		echo "<option value='".$menu->id."'>"."&#160;&#160;&#160;&#160;&#160;".$menu->name."</option>";
		
		if(!empty($menu->sub)){

			fetch_sub_menu($menu->sub);
		}   

	}

}

?>
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			
			reader.onload = function (e) {
				$('#profile-img-tag').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#profile-img").change(function(){
		readURL(this);
	});
</script>