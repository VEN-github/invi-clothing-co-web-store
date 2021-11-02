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
        <div class="banner">
          Shop
          <p class="category-label"><span id="category-text">All Products</span> | <span id="product-count"></span> Products</p>
        </div>
        <div class="container">
          <div class="shop-grid">
            <div class="filter">
              <span>Sort by:</span>
              <select id="sorting" class="input sorting">
                <option value="Featured">Featured</option>
                <option value="Ascending">Name (Ascending)</option>
                <option value="Descending">Name (Descending)</option>
              </select>
            </div>
            <div class="categories">
              <p>Categories</p>
              <ul class="category-list">
                <li class="filter-btn" data-filter="All Products">All Products</li>
                <?php foreach ($categories as $category) { ?>  
                <li class="filter-btn" data-filter="<?= $category[
                  "categoryName"
                ] ?>"><?= $category["categoryName"] ?></li>
                <?php } ?>
              </ul>
              <p>Stock Status</p>
              <ul class="stock-status">
                <li>
                  <div class="custom-checkbox">
                    <input type="checkbox" name="" id="" class="checkbox" />
                    <label for="">In Stock</label>
                  </div>
                </li>
                <li>
                  <div class="custom-checkbox">
                    <input type="checkbox" name="" id="" class="checkbox" />
                    <label for="">Out of Stock</label>
                  </div>
                </li>
              </ul>
            </div>
            <div class="product-container">          
            <?php if ($displayProducts) { ?>
              <?php foreach ($displayProducts as $product) { ?>
                <?php if ($product["availability"] === "Available") { ?>
                  <div class="products <?= $product[
                    "categoryName"
                  ] ?>" style="display:none;">
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
              <div class="container"><h1>No Data Available</h1></div>
              <?php } ?>
            </div>
            <div class="load-more"><button id="load-more" class="btn primary-btn">Load More</button></div>
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
</body>
</html>