<?php include "./application/views/Customer/include/header.php" ?>
<!--================Cart Area =================-->
    <section class="cart_area">
      <div class="container">
        <div class="cart_inner">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                 
                  <th scope="col">Total</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
              <tbody>
               <form action="<?= base_url() ?>Customer/Cart/update" method="post">
               <?php foreach ($sp as $value): ?>
                        
               		 <tr>
                  <td>
                    <div class="media">
                      <div class="d-flex">
                        <img style="width: 50px;height: 50px"
                          src="<?= base_url() ?><?= $value['img'] ?>"
                          alt=""
                        />
                      </div>
                      <div class="media-body">
                        <p><?= $value['name'] ?></p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <h5>$<?= $value['price'] ?></h5>
                  </td>
                    
                  <td>
                  	
                    <div class="product_count">
                      <input
                        type="text"
                        name="qty_<?= $value['id']?>"
                        id="qty_<?= $value['id']?>"
                        maxlength="12"
                        value="<?= $value['qty'] ?>"
                        title="Quantity:"
                        class="input-text qty"
                      />
                      <button
                        onclick="var result = document.getElementById('qty_<?= $value['id']?>'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                        class="increase items-count"
                        type="button"
                      >
                        <i class="lnr lnr-chevron-up"></i>
                      </button>
                      <button
                        onclick="var result = document.getElementById('qty_<?= $value['id']?>'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                        class="reduced items-count"
                        type="button"
                      >
                        <i class="lnr lnr-chevron-down"></i>
                      </button>
                    </div>
                  </td>
                  <td>
                    <h5>$<?= $value['subtotal'] ?></h5>
                  </td>
                  <td>
                                <a href="<?= base_url() ?>Customer/Cart/delete/<?= $value['id'] ?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                </tr>
               <?php endforeach ?>
               
                <tr class="bottom_button">
                  <td>
                    <button class="gray_btn">Update Cart</button>
                  </td>
                  <td></td>
                  <td></td>
                  <td>
                    <div class="cupon_text">
                     <!--  <input type="text" placeholder="Coupon Code" /> -->
                      <a class="main_btn" href="<?= base_url() ?>Customer/Cart/checkout" style="margin-left: 380px">Apply</a>
                    </div>
                  </td>
                </tr>
                </form>
                <tr>
                  <td></td>
                  <td></td>
                  <td>
                    <h5>Subtotal</h5>
                  </td>
                  <td>
                    <h5><?php echo $this->cart->format_number($this->cart->total()); ?></h5>
                  </td>
                </tr>
             
             
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!--================End Cart Area =================-->

<?php include "./application/views/Customer/include/footer.php" ?>