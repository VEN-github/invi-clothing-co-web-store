<?php
require_once "../class/webstoreclass.php";
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
          <p class="category-label">All products | 12 Products</p>
        </div>
        <div class="container">
          <div class="shop-grid">
            <div class="filter">
              <span>Sort by:</span>
              <select name="" id="" class="input sorting">
                <option value="">Featured</option>
                <option value="">Name (Ascending)</option>
                <option value="">Name (Descending)</option>
              </select>
            </div>
            <div class="categories">
              <p>Categories</p>
              <ul class="category-list">
                <li>All Products</li>
                <?php foreach ($categories as $category) { ?>  
                <li><?= $category["categoryName"] ?></li>
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
                <?php $stocks = $store->view_all_stocks($product["ID"]); ?>
                  <?php foreach ($stocks as $stock) { ?>
                  <?php } ?>
                  <?php if (
                    $product["ID"] &&
                    $product["netSales"] &&
                    ($stock["stock"] || $stock["size"])
                  ) { ?>
                  <div class="products">
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
                    ] ?>"><?= '<img src="./assets/img/' .
  $product["coverPhoto"] .
  '" alt="' .
  $product["coverPhoto"] .
  '">' ?></a>
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
                    <!-- <div class="hidden">
                      <form action="">
                        <div class="color-group">
                          <label class="color-field">
                            <input
                              type="radio"
                              name="color"
                              id=""
                              checked
                              class="radio"
                            />
                            <span
                              class="checkmark"
                              style="background: #df5d7d"
                            ></span>
                          </label>
                          <label class="color-field">
                            <input
                              type="radio"
                              name="color"
                              id=""
                              class="radio"
                            />
                            <span
                              class="checkmark"
                              style="background: #fff"
                            ></span>
                          </label>
                        </div>
                        <div class="variations">
                          <div>
                            <select name="" id="" class="input size">             
                              <option value=""></option>
                            </select>
                          </div>
                          <div class="item-quantity">
                            <button class="minus-btn">-</button>
                            <input
                              class="qty-input"
                              type="text"
                              name=""
                              id=""
                              value="1"
                              min="1"
                            />
                            <button class="plus-btn">+</button>
                          </div>
                        </div>
                        <div class="add-cart">
                          <button class="btn primary-btn cart-btn">
                            <span
                              class="iconify cart-icon"
                              data-icon="gg:shopping-bag"
                              data-inline="false"
                            ></span>
                            Add to Cart
                          </button>
                        </div>
                      </form>
                    </div> -->
                  </div> 
                  <?php } ?>
                <?php } ?>
              <?php } else { ?> 
              <div class="container"><h1>No Data Available</h1></div>
              <?php } ?>
            </div>
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
</body>
</html>