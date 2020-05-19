<?php include "./application/views/Customer/include/header.php" ?>
 <!--================Category Product Area =================-->
    <section class="cat_product_area section_gap">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-9">
            <div class="product_top_bar">
              <div class="left_dorp">
              <!--   <select class="sorting">
                  <option value="1">Default sorting</option>
                  <option value="2">Default sorting 01</option>
                  <option value="4">Default sorting 02</option>
                </select>
                <select class="show">
                  <option value="1">Show 12</option>
                  <option value="2">Show 14</option>
                  <option value="4">Show 16</option>
                </select> -->
              </div>
            </div>
            
            <div class="latest_product_inner">
              <div class="row">
              <?php foreach ($product as $value): ?>
              	  <div class="col-lg-4 col-md-6">
                  <div class="single-product">
                    <div class="product-img">
                      <img
                        class="card-img"
                        src="<?= base_url() ?><?= $value['img'] ?>"
                        alt=""
                      />
                      <div class="p_icon">
                        <a href="#">
                          <i class="ti-eye"></i>
                        </a>
                        <a href="#">
                          <i class="ti-heart"></i>
                        </a>
                        <a href="#">
                          <i class="ti-search"></i>
                        </a>
                      </div>
                    </div>
                    <div class="product-btm">
                      <a href="#" class="d-block">
                        <h4><?= $value['name'] ?></h4>
                      </a>
                      <div class="mt-3">
                        <span class="mr-4">$<?= $value['discount'] ?></span>
                        <del>$<?= $value['price'] ?></del>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
              </div>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="left_sidebar_area">
              <aside class="left_widgets p_filter_widgets">
                <div class="l_w_title">
                  <h3>Browse Categories</h3>
                </div>
                <div class="widgets_inner">
                  <ul class="list">
                  
                    <?php foreach ($catalog as $value): ?>
                    <li>
                      <a href="<?= base_url() ?>Customer/Product/getSPDanhMuc/<?= $value['child_id'] ?>"><?= $value['name_child'] ?></a>
                        </li>
                    
                    <?php endforeach ?>
                   
                  </ul>
                </div>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Category Product Area =================-->
<?php include "./application/views/Customer/include/footer.php" ?>