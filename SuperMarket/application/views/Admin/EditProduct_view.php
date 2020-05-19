<?php include "./application/views/Admin/include/header.php" ?>
<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="row">
		<form action="<?= base_url() ?>Admin/Admin/update" method="POST" enctype="multipart/form-data">
		<?php foreach ($get_product as $value): ?>
			

		<div class="col-lg-7">

			

			<!-- Basic Card Example -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Nhập thông tin chỉnh sửa</h6>
				</div>
			

					<div class="card-body">
					
							
							<fieldset class="form-group">
								<label for="exampleInputEmail1">Tên sản phẩm</label>
								<input name="name" type="text" class="form-control" value="<?= $value['name'] ?>" placeholder="Tên sản phẩm">

								<input name="id" type="hidden" class="form-control" 
								id="id" placeholder="Tiêu đề" value="<?php echo($value['id']) ?>">
								<input name="code_product" type="hidden" class="form-control" 
								id="id" placeholder="Tiêu đề" value="<?php echo($value['code_product']) ?>">
							</fieldset>

							<fieldset class="form-group">
								<label for="exampleInputPassword1">Giá</label>
								<input type="number" name="price" placeholder="Giá"  class="form-control" value="<?php echo($value['price']) ?>" >
							</fieldset>

							<fieldset class="form-group">
								<label for="exampleInputPassword1">Giá giảm</label>
								<input type="number" name="discount" placeholder="Giá giảm"  class="form-control" value="<?php echo($value['discount']) ?>">
							</fieldset>
							<fieldset class="form-group">
								<label for="exampleInputPassword1">Số lượng</label>
								<input type="number" name="amount" placeholder="Số lượng"  class="form-control" value="<?php echo($value['amount']) ?>" >
							</fieldset>

							<fieldset class="form-group">
								<label for="exampleInputPassword1">Danh mục</label>
								<select class="form-control" name="catalog_id" >
									<option selected>Chọn danh mục</option>
									<?php fetch_menu($catalog,$value['catalog_id'])?>
                             

                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                        	<label for="exampleInputPassword1">Mô tả</label>
                        	<textarea name="content" id="noidung" rows="10" cols="80">
                        	  <?php echo $value['content'] ?>
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
        	<img src="<?= base_url() ?><?= $value['img'] ?>" id="profile-img-tag" width="400px" name="img" />
        </div>
      		<?php endforeach ?>
     </form>
                                                 <!-- xem ho upload anh -->
                                                 <!-- sua thong tin khac mat anh -->
</div>

</div>
<!-- /.container-fluid -->

</div>

<!-- End of Main Content -->


<?php include "./application/views/Admin/include/footer.php" ?>

<?php 


function fetch_menu($catalog,$selectedCatalog){

	foreach($catalog as $menu){

		if ($menu->id==$selectedCatalog) {
			echo "<option selected value='".$menu->id."'>".$menu->name."</option>";
		}
		else {
			echo "<option value='".$menu->id."'>".$menu->name."</option>";
		}

		if(!empty($menu->sub)){
			fetch_sub_menu($menu->sub,$selectedCatalog);

		}

	}

}


function fetch_sub_menu($sub_menu,$selectedCatalog){

	foreach($sub_menu as $menu){

		if ($menu->id==$selectedCatalog) {
			echo "<option selected value='".$menu->id."'>"."&#160;&#160;&#160;&#160;&#160;".$menu->name."</option>";
		} else{

			echo "<option value='".$menu->id."'>"."&#160;&#160;&#160;&#160;&#160;".$menu->name."</option>";
		}
		
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