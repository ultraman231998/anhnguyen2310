<?php include "./application/views/Customer/include/header.php" ?>
 <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
      <div class="container">
        <div class="billing_details">
          <div class="row">
            <div class="col-lg-8">
              <h3>Billing Details</h3>
              <form
                class="row contact_form"
                action="<?= base_url() ?>Customer/Checkout/add"
                method="post"
                novalidate="novalidate"
              >
                <input type="hidden" name="code_user" value="<?= $data_user['code_user'] ?>">
                <div class="col-md-8 form-group p_star">
                  <input
                    type="text"
                    class="form-control"
                    id="first"
                    name="user_name"
                    value="<?= $data_user['name'] ?>"
                  />
                  <span
                   
                  ></span>
                </div>
                <div class="col-md-8 form-group">
                  <input
                    type="text"
                    class="form-control"
                    id="company"
                    name="user_email"
                   
                    value="<?= $data_user['email'] ?>"
                  />
                </div>
                <div class="col-md-8 form-group p_star">
                  <input
                    type="text"
                    class="form-control"
                    id="number"
                    name="user_phone"
                    value="0<?= $data_user['phone'] ?>"
                  />
                  <span
                   
                   
                  ></span>
                </div>
                <div class="col-md-8 form-group p_star">
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="address"
                    value="<?= $data_user['address'] ?>"
                  />
                  <span
                   
                   
                  ></span>
                </div>
       
                <div class="col-md-12 form-group">
                  <textarea
                    class="form-control"
                    name="message"
                    id="message"
                    rows="1"
                    placeholder="Order Notes"
                  ></textarea>
                </div>
             
            </div>
            <div class="col-lg-4">
              <div class="order_box">
                <h2>Your Order</h2>
                <ul class="list">
                  <li>
                    <a href="#"
                      >Product
                      <span>Total</span>
                    </a>
                  </li>
               <?php foreach ($sp as $value): ?>
               	   <li>
                    <a href="#"
                      ><?= $value['name'] ?>
                      <span class="middle">X<?= $value['qty'] ?></span>
                      <span class="last"><?= $value['subtotal'] ?></span>
                    </a>
                  </li>
               <?php endforeach ?>
                 
                </ul>
                <ul class="list list_2">
                  <li>
                    <a href="#"
                      >Subtotal
                      <span><?= $value['subtotal'] ?></span>
                    </a>
                  </li>
                
                
                </ul>
                  <div id="payment-checkout-wp">
                    <ul id="payment_methods">
                        <li>
                            <input type="radio" id="direct-payment" name="payment_method" value="direct-payment" checked="true">
                            <label for="direct-payment">Thanh toán tại cửa hàng</label>
                        </li>
                        <li>
                            <input type="radio" id="payment-home" name="payment_method" value="payment-home">
                            <label for="payment-home">Thanh toán tại nhà</label>
                        </li>
                    </ul>
                </div>
              </div>
              <div class="place-order-wp clearfix" style="margin-top: 20px">
                    <input class="btn btn-outline-danger" type="submit" id="order-now" value="Đặt hàng">
                </div>
            </div>

             </form>
          </div>
        </div>
      </div>
    </section>
    <!--================End Checkout Area =================-->
<?php include "./application/views/Customer/include/footer.php" ?>