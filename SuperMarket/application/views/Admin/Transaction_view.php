<?php include "./application/views/Admin/include/header.php" ?>
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         
        
           
          <!-- DataTales Example -->
          <?php echo form_open('');?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                 <a href="" class="btn btn-outline-info">Thêm sản phẩm</a>
              <input class="btn btn-outline-warning" type="submit" value="Xóa sản phẩm đã chọn" onclick="return confirm('Bạn chắc chắn muốn xóa')">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                 
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Mã đơn hàng</th>
                      <th>Người mua</th>
                      <th>Emailc</th>
                      <th>Số điện thoại</th>
                      <th>Địa chỉ</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php if(is_array($transaction)){ ?>
                   <?php foreach ($transaction as $value): ?>
                      <tr>
                      <td><input type="checkbox" name="id[]" value="<?php echo($value['id'])?>">
                      <td><?= $value['code_transaction'] ?></td>
                      <td><?= $value['user_name'] ?></td>
                      <td><?= $value['user_email'] ?></td>
                      <td><?= $value['user_phone'] ?></td>
                      <td><?= $value['user_address'] ?></td>
                      <td>
                         <a href="<?= base_url() ?>/Admin/Transaction/transactiondetail/<?= $value['id'] ?>" class="btn btn-outline-info"><i class="fas fa-info"></i></a>
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
<?php include "./application/views/Admin/include/footer.php" ?>