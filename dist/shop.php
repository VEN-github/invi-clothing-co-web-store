<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$user = $store->get_userdata();
$categories = $store->get_categories();
$displayProducts = $store->get_products();
$title = "Shop";
include_once "../includes/header.php";
?>
<body>
  <div class="page-container">
    <?php include_once "../includes/navbar.php"; ?>
    <!-- start of shop section -->
    <main>
      <section id="shop">
        <div data-sal="slide-down" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="banner">
          Shop
          <p class="category-label"><span id="category-text">All Products</span> | <span id="product-count"></span> Products</p>
        </div>
        <div class="container">
          <div class="shop-grid">
            <div data-sal="slide-left" data-sal-duration="1200" data-sal-delay="300" data-sal-easing="ease-out-bounce" class="filter">
              <span class="iconify search-icon" data-icon="fe:search" data-inline="false"></span>
              <input type="text" class="input search-bar" id="search-bar" placeholder="Search...">
            </div>
            <div data-sal="slide-right" data-sal-duration="1200" data-sal-delay="300" data-sal-easing="ease-out-bounce" class="categories">
              <p>Categories</p>
              <ul class="category-list">
                <li class="filter-btn" data-filter="All Products">All Products</li>
                <?php foreach ($categories as $category) { ?>  
                <li class="filter-btn" data-filter="<?= $category[
                  "categoryName"
                ] ?>"><?= $category["categoryName"] ?></li>
                <?php } ?>
              </ul>
            </div>
            <div data-sal="zoom-out" data-sal-duration="1200" data-sal-delay="400" data-sal-easing="ease-out-bounce" class="product-container">          
            <?php if ($displayProducts) { ?>
              <?php foreach ($displayProducts as $product) { ?>
                <?php if ($product["availability"] === "Available") { ?>
                  <div class="products <?= $product[
                    "categoryName"
                  ] ?> <?= strtoupper(
   $product["productName"]
 ) ?> <?= strtoupper($product["categoryName"]) ?> <?= strtoupper(
   $product["productColor"]
 ) ?>" style="display:none;">
                    <div class="labels">
                      <span class="product-label"></span>
                      <!-- <button class="wishlist">
                        <span
                          class="iconify heart"
                          data-icon="ant-design:heart-outlined"
                          data-inline="false"
                        ></span>
                      </button> -->
                    </div>
                    <a href="productdetails.php?ID=<?= $product[
                      "ID"
                    ] ?>"><img loading="lazy" src="./assets/img/<?= $product[
  "coverPhoto"
] ?>" alt="<?= $product["coverPhoto"] ?>"></a>
                    <div class="details">
                      <a href="productdetails.php?ID=<?= $product[
                        "ID"
                      ] ?>"><?= $product["productName"] ?></a>
                      <p class="color">
                        <?= $product["productColor"] ?>
                      </p>
                      <p class="price">
                        <span
                          class="iconify peso-sign"
                          data-icon="clarity:peso-line"
                          data-inline="false"
                        ></span>
                        <?= number_format($product["netSales"], 2) ?>
                      </p>
                    </div>
                  </div> 
                  <?php } ?>
                <?php } ?>
              <?php } else { ?> 
              <div class="container no-data"><img src="./assets/img/empty-order.svg" alt="No Data"><p>No Data Available</p></div>
              <?php } ?>
            </div>
            <div data-sal="zoom-in" data-sal-duration="1200" data-sal-delay="500" data-sal-easing="ease-out-bounce" class="load-more"><button id="load-more" class="btn primary-btn">Load More</button></div>
          </div>
        </div>
      </section>
    </main>
    <!-- end of shop section -->
    <?php require_once "../includes/footer.php"; ?>
  </div>
  <script src="./assets/js/header.js"></script>
  <script src="./assets/js/user.js"></script>
  <script src="./assets/js/cart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('.products').slice(0, 9).show();

    if($('.products:hidden').length == 0){
      $('#load-more').fadeOut();
    }
    $('#load-more').click(function(){
      $('.products:hidden').slice(0, 3).show();

      if($('.products:hidden').length == 0){
        $('#load-more').fadeOut();
      }
    });
  </script>
  <script src="./assets/js/filter.js"></script>
  <?php require_once "../includes/scripts.php"; ?>
</body>
</html>