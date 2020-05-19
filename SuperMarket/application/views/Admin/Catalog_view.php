<?php include "./application/views/Admin/include/header.php" ?>
   <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
            <?php echo form_open('Admin/Catalog/multipledelete');?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a type="button" class="btn btn-outline-info"  data-toggle="modal" data-target="#addModel">Thêm danh mục</a>
              <input class="btn btn-outline-warning" type="submit" value="Xóa sản phẩm đã chọn" onclick="return confirm('Bạn chắc chắn muốn xóa')">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Danh mục</th>
                      <th>Danh mục cha</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                  	  <?php if(is_array($catalogs)){ ?>
                  	<?php foreach ($catalogs as $value): ?>
           
                      <tr>
                      <td><input type="checkbox" name="child_id[]" value="<?php echo($value['child_id'])?>">
                      <td><?= $value['name_child']?></td>
                       <?php if (is_null($value['id_parent'])) {?>
                       	 <td style="color: red">Không có danh mục cha</td>
                           	<?php }else{ ?>
                               <td><?= $value['name_parent'] ?></td>
                           	<?php } ?> 
                              	
                              
                            <td>
                            <a type="button" class="btn btn-outline-success " data-toggle="modal" data-target="#editModel<?= $value['child_id'] ?>"><i class="fas fa-info"></i></a>
                              <a type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModel<?= $value['child_id'] ?>"><i class="fas fa-trash"></i></a>
                            
                            </td>
                              	
                           </tr>
                           
                     <?php endforeach ?>
                      <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
   <?php echo form_close(); ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
           
<!-- bắt đầu xóa -->
  <?php if(is_array($catalogs)){ ?>
	<?php foreach ($catalogs as $value): ?>
<div class="modal fade" id="deleteModel<?= $value['child_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xóa sách</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
      <h2 class="text-center">Có chắc xóa</h2>
      </div>
      <div class="modal-footer">
       
       	 <form method="post" action="<?= base_url() ?>Admin/Catalog/delete/<?= $value['child_id'] ?>">
       	 	<?= $value['child_id'] ?>
        	<input value="Xóa" type="submit" class="btn btn-danger">
        		<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
        </form>
       
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
 <?php } ?>
<!-- hết xóa -->

<!-- bắt đầu thêm -->

    <div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Thêm mới danh mục</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body"> 
            <form action="<?= base_url(); ?>Admin/Catalog/add" method="post">
              <div class="form-group">
                <label for="number">Tên danh mục</label>
                <input type="text" class="form-control" id="number" name="name" placeholder="Tên danh mục">
              </div>

              <div class="form-group">
                <label for="number">Thuộc danh mục:</label>
               <select class="form-control" name="parent_id">
                <option selected value="0">Chọn danh mục</option>
                <?php fetch_menu($catalog)?>
              </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Hủy</button>
              <input type="submit" class="btn btn-outline-primary" value="Thêm">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> 
  <!-- hết thêm -->



<!-- bắt đầu sửa -->

      <?php foreach ($catalogs as $value): ?> 
  <div class="modal fade" id="editModel<?= $value['child_id'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
          <div class="modal-header">
          <h4 class="modal-title">Chỉnh sửa thông tin danh mục</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
              
        <!-- Modal body -->
        <div class="modal-body">
          <form action="<?= base_url() ?>Admin/Catalog/update" method="POST">

          <input hidden="hidden" type="text" name="id" value="<?= $value['child_id'] ?>"> 

           <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" class="form-control" name="name" value="<?= $value['name_child'] ?>">
          </div>
          <div class="form-group">
            <label for="name">Tên danh mục</label>
            <select class="form-control" name="parent_id" >

                   <?php if($value['parent_id'==0]) {?>
                     <option selected>Chọn danh mục</option>
                       <?php fetch_menu($catalog)?>
                   <?php }else{ ?>
                    <option>Chọn danh mục</option>
                    <?php fetch_menu1($catalog,$value['parent_id'])?>

                   <?php } ?>

                            </select>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">OK</button>
      </div>
        </div>
      
  </form>
      
      
  
    </div> 
    </div>
  </div>
  <?php endforeach ?>

<!-- hết sửa -->


<?php include "./application/views/Admin/include/footer.php" ?>


<?php 


function fetch_menu1($catalog,$selectedCatalog){

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


function fetch_sub_menu1($sub_menu,$selectedCatalog){

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