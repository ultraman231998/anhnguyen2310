<?php include "./application/views/Admin/include/header.php" ?>
<?php if( $this->session->flashdata('add_success')){ ?>
<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Thêm thành công</strong></div>
<?php }elseif($this->session->flashdata('add_error')){ ?>
<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Thêm ko thành công</strong></div>
<?php }elseif ($this->session->flashdata('edit_success')){?>
<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Sửa thành công</strong></div>
<?php }elseif ($this->session->flashdata('edit_error')) {?>
<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Sửa ko thành công</strong></div>
<?php } ?>

  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         
        
           
          <!-- DataTales Example -->
          <?php echo form_open('Admin/Admin/multipledelete');?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                 <a href="<?= base_url() ?>Admin/Admin/AddProduct_view" class="btn btn-outline-info">Thêm sản phẩm</a>
              <input class="btn btn-outline-warning" type="submit" value="Xóa sản phẩm đã chọn" onclick="return confirm('Bạn chắc chắn muốn xóa')">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <?php echo form_open('Admin/Admin/multipledelete');?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Tên sản phẩm</th>
                      <th>Mã Sản Phẩm</th>
                      <th>Giá gốc</th>
                      <th>Giá giảm</th>
                      <th>Số lượng</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php if(is_array($product)){ ?>
                   <?php foreach ($product as $value): ?>
                      <tr>
                      <td><input type="checkbox" name="id[]" value="<?php echo($value['id'])?>">
                      <td><?= $value['name'] ?></td>
                      <td><?= $value['code_product'] ?></td>
                      <td><?= $value['price'] ?></td>
                      <td><?= $value['discount'] ?></td>
                      <td><?= $value['amount'] ?></td>
                      <td>
                         <a href="<?= base_url() ?>/Admin/Admin/GetProduct_view/<?= $value['id'] ?>" class="btn btn-outline-info"><i class="fas fa-info"></i></a>
                      <a type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#deleteModel<?= $value['id'] ?>"><i class="fas fa-trash"></i></a>
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
<?php if(is_array($product)){ ?>
  <?php foreach ($product as $value): ?>
<div class="modal fade" id="deleteModel<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
       
         <form method="post" action="<?= base_url() ?>Admin/Admin/delete/<?= $value['id'] ?>">
         
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

<?php include "./application/views/Admin/include/footer.php" ?>