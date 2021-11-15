<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$user = $store->get_userdata();
$ID = $_GET["ID"];
$product = $store->get_singleproduct($ID);
$stocks = $store->view_all_stocks($ID);
$title = $product["productName"];
include_once "../includes/header.php";
?>
  <body>
    <div class="page-container">
      <?php include_once "../includes/navbar.php"; ?>
      <!-- start of product section -->
      <main>
      <section id="product-details">
        <div class="container">
          <div class="product-grid">
            <div id="zoom" class="magnify-wrapper product-highlight">
              <img data-sal="zoom-out" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" src="./assets/img/<?= $product[
                "coverPhoto"
              ] ?>" alt="<?= $product["coverPhoto"] ?>">
              <div id="large-img"></div>
            </div>
            <div data-sal="zoom-out" data-sal-duration="1200" data-sal-delay="400" data-sal-easing="ease-out-bounce" class="product-gallery">
              <img src="./assets/img/<?= $product[
                "coverPhoto"
              ] ?>" alt="<?= $product["coverPhoto"] ?>">
              <?php if (!empty($product["image1"])) { ?>
                <img src="./assets/img/<?= $product[
                  "image1"
                ] ?>" alt="<?= $product["image1"] ?>">
              <?php } ?>
              <?php if (!empty($product["image2"])) { ?>
                <img src="./assets/img/<?= $product[
                  "image2"
                ] ?>" alt="<?= $product["image2"] ?>">
              <?php } ?>
              <?php if (!empty($product["image3"])) { ?>
                <img src="./assets/img/<?= $product[
                  "image3"
                ] ?>" alt="<?= $product["image3"] ?>">
              <?php } ?>
            </div>
            <div data-sal="zoom-out" data-sal-duration="1200" data-sal-delay="400" data-sal-easing="ease-out-bounce" class="product-info">
              <input type="hidden" id="productID" value="<?= $product["ID"] ?>">
              <?php if ($product["salesDiscount"]) { ?>
                <div class="label">Sale</div>
              <?php } ?>
              <div class="product-name"><?= $product["productName"] ?></div>
              <div class="product-price">
                <p class="price">
                  <span
                    class="iconify peso-sign"
                    data-icon="clarity:peso-line"
                    data-inline="false"
                  ></span>
                  <span id="productPrice"><?= number_format(
                    $product["netSales"]
                  ) ?></span>
                  <span>.00</span>
                </p>
                <?php if ($product["salesDiscount"]) { ?>
                  <p class="price sales-amount">
                    <span><?= number_format(
                      $product["salesAmount"],
                      2
                    ) ?></span>
                  </p>
                <?php } ?>
              </div>
              <div class="product-description">
                <p>Product Details:</p>
                <div class="details">
                  <?= $product["productDescription"] ?>
                </div>
              </div>
            </div>
            <div data-sal="zoom-out" data-sal-duration="1200" data-sal-delay="400" data-sal-easing="ease-out-bounce" class="product-actions">
              <div class="product-color">
                <p>Color: <span id="productColor"><?= $product[
                  "productColor"
                ] ?></span></p>
                </div>
                <?php foreach ($stocks as $stock) { ?>
                  <?php if (is_null($stock["size"])) { ?>
                    <input type="hidden" id="stockID" value="<?= $stock[
                      "ID"
                    ] ?>">
                    <div class="product-quantity">
                      <p>Quantity:</p>
                      <div class="qty">
                        <button class="minus-btn" onclick="minus(this)">-</button>
                        <input
                          class="qty-input"
                          type="number"
                          name=""
                          id="quantity"
                          value="1"
                          min="1"
                          max="<?php $soldProducts = $store->sold_products(
                            $ID,
                            $stock["ID"]
                          ); ?>
                              <?php $addedInventory = $store->get_added_stock_products(
                                $ID,
                                $stock["ID"]
                              ); ?>
                              <?php if (
                                is_array($soldProducts) &&
                                is_array($addedInventory)
                              ) { ?>
                                <?php foreach (
                                  $soldProducts
                                  as $index => $value
                                ) { ?>
                                        <?= $addedInventory[$index]["stock"] +
                                          $addedInventory[$index]["addedQty"] -
                                          $soldProducts[$index]["salesQty"] ?>
                                        <?php } ?>
                                        <?php } elseif (
                                is_array($addedInventory)
                              ) { ?> 
                                        <?php foreach (
                                          $addedInventory
                                          as $addedStock
                                        ) { ?>
                                          <?= $addedStock["stock"] +
                                            $addedStock["addedQty"] ?>
                                        <?php } ?> 
                                      <?php } elseif (
                                is_array($soldProducts)
                              ) { ?> 
                                        <?php foreach (
                                          $soldProducts
                                          as $sold
                                        ) { ?>
                                          <?= $stock["stock"] -
                                            $sold["salesQty"] ?>
                                        <?php } ?>    
                                      <?php } else { ?>
                                        <?= $stock["stock"] ?> 
                                      <?php } ?>"             
                          />   
                        <button class="plus-btn" onclick="plus(this)">+</button>
                      </div>
                    </div>
                    <div class="add-cart">
                      <button type="button" id="cart-btn" class="<?php $soldProducts = $store->sold_products(
                        $ID,
                        $stock["ID"]
                      ); ?>
                              <?php $addedInventory = $store->get_added_stock_products(
                                $ID,
                                $stock["ID"]
                              ); ?>
                              <?php if (
                                is_array($soldProducts) &&
                                is_array($addedInventory)
                              ) { ?>
                                <?php foreach (
                                  $soldProducts
                                  as $index => $value
                                ) { ?>
                                        <?= $addedInventory[$index]["stock"] +
                                          $addedInventory[$index]["addedQty"] -
                                          $soldProducts[$index]["salesQty"] ==
                                        0
                                          ? "btn disabled-btn cart-btn"
                                          : "btn primary-btn cart-btn" ?>
                                        <?php } ?>
                                        <?php } elseif (
                                is_array($addedInventory)
                              ) { ?> 
                                        <?php foreach (
                                          $addedInventory
                                          as $addedStock
                                        ) { ?>
                                          <?= $addedStock["stock"] +
                                            $addedStock["addedQty"] ==
                                          0
                                            ? "btn disabled-btn cart-btn"
                                            : "btn primary-btn cart-btn" ?>
                                        <?php } ?> 
                                      <?php } elseif (
                                is_array($soldProducts)
                              ) { ?> 
                                        <?php foreach (
                                          $soldProducts
                                          as $sold
                                        ) { ?>
                                          <?= $stock["stock"] -
                                            $sold["salesQty"] ==
                                          0
                                            ? "btn disabled-btn cart-btn"
                                            : "btn primary-btn cart-btn" ?>
                                        <?php } ?>    
                                      <?php } else { ?>
                                        <?= $stock["stock"] == 0
                                          ? "btn disabled-btn cart-btn"
                                          : "btn primary-btn cart-btn" ?> 
                                      <?php } ?>"/>
                            <?php $soldProducts = $store->sold_products(
                              $ID,
                              $stock["ID"]
                            ); ?>
                    <?php $addedInventory = $store->get_added_stock_products(
                      $ID,
                      $stock["ID"]
                    ); ?>
                    <?php if (
                      is_array($soldProducts) &&
                      is_array($addedInventory)
                    ) { ?>
                      <?php foreach ($soldProducts as $index => $value) { ?>
                              <?= $addedInventory[$index]["stock"] +
                                $addedInventory[$index]["addedQty"] -
                                $soldProducts[$index]["salesQty"] ==
                              0
                                ? "Out of Stock"
                                : '<span
                                class="iconify cart-icon"
                                data-icon="gg:shopping-bag"
                                data-inline="false"
                              ></span>
                              Add to Cart' ?>
                              <?php } ?>
                              <?php } elseif (is_array($addedInventory)) { ?> 
                              <?php foreach (
                                $addedInventory
                                as $addedStock
                              ) { ?>
                                <?= $addedStock["stock"] +
                                  $addedStock["addedQty"] ==
                                0
                                  ? "Out of Stock"
                                  : '<span
                                  class="iconify cart-icon"
                                  data-icon="gg:shopping-bag"
                                  data-inline="false"
                                ></span>
                                Add to Cart' ?>
                              <?php } ?> 
                            <?php } elseif (is_array($soldProducts)) { ?> 
                              <?php foreach ($soldProducts as $sold) { ?>
                                <?= $stock["stock"] - $sold["salesQty"] == 0
                                  ? "Out of Stock"
                                  : '<span
                                  class="iconify cart-icon"
                                  data-icon="gg:shopping-bag"
                                  data-inline="false"
                                ></span>
                                Add to Cart' ?>
                              <?php } ?>    
                            <?php } else { ?>
                              <?= $stock["stock"] == 0
                                ? "Out of Stock"
                                : '<span
                                class="iconify cart-icon"
                                data-icon="gg:shopping-bag"
                                data-inline="false"
                              ></span>
                              Add to Cart' ?> 
                            <?php } ?>
                      </button>
                    </div>
                  <?php } ?>
                <?php } ?>
                <?php if (!is_null($stock["size"])) { ?>       
                  <div class="product-size">
                    <div class="size-guide">
                      <p>Size:</p>
                        <?php if (!empty($product["sizeGuide"])) { ?>
                          <button type="button" id="size-chart" class="size-chart" onclick="sizeGuide(this)">
                            <span
                              class="iconify ruler"
                              data-icon="bx:bx-ruler"
                            ></span>
                            Size Guide
                          </button>
                        <?php } ?>
                    </div>
                    <form action="" method="post" name="sizeForm">
                      <select name="sizeList" id="sizeOpt" class="input size">
                          <option selected disabled>Select Size</option>
                          <?php foreach ($stocks as $stock) { ?>
                            <option value="<?= $stock[
                              "ID"
                            ] ?>" <?php $soldProducts = $store->sold_products(
  $ID,
  $stock["ID"]
); ?>
                                <?php $addedInventory = $store->get_added_stock_products(
                                  $ID,
                                  $stock["ID"]
                                ); ?>
                                <?php if (
                                  is_array($soldProducts) &&
                                  is_array($addedInventory)
                                ) { ?>
                                  <?php foreach (
                                    $soldProducts
                                    as $index => $value
                                  ) { ?>
                                        data-stock = <?= $addedInventory[
                                          $index
                                        ]["stock"] +
                                          $addedInventory[$index]["addedQty"] -
                                          $soldProducts[$index]["salesQty"] ?>
                                          <?php } ?>
                                          <?php } elseif (
                                  is_array($addedInventory)
                                ) { ?> 
                                          <?php foreach (
                                            $addedInventory
                                            as $addedStock
                                          ) { ?>
                                            data-stock = <?= $addedStock[
                                              "stock"
                                            ] + $addedStock["addedQty"] ?>
                                          <?php } ?> 
                                        <?php } elseif (
                                  is_array($soldProducts)
                                ) { ?> 
                                          <?php foreach (
                                            $soldProducts
                                            as $sold
                                          ) { ?>
                                            data-stock = <?= $stock["stock"] -
                                              $sold["salesQty"] ?>
                                          <?php } ?>    
                                        <?php } else { ?>
                                          data-stock = <?= $stock["stock"] ?> 
                                        <?php } ?> ><?= $stock[
   "size"
 ] ?></option>          
                          <?php } ?>  
                      </select>
                    </form>
                  </div>
                  <div class="product-quantity" style="display:none;">
                    <p>Quantity:</p>
                    <div class="qty">
                      <button class="minus-btn" onclick="minus(this)">-</button>
                      <input
                        class="qty-input"
                        type="number"
                        name=""
                        id="quantity"
                        value="1"
                        min="1"            
                        />   
                      <button class="plus-btn" onclick="plus(this)">+</button>
                    </div>
                  </div>
                  <div class="add-cart" style="display:none;">
                    <button type="button" id="cart-btn" class="btn primary-btn cart-btn" >
                      <span
                        class="iconify cart-icon"
                        data-icon="gg:shopping-bag"
                        data-inline="false"
                      ></span>Add to Cart
                    </button>
                    <button id="disabled-btn" class="btn disabled-btn cart-btn" style="display:none;">
                      Out of Stock
                    </button>
                  </div>  
                <?php } ?>  
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- end of product section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <?php require_once "../includes/scripts.php"; ?>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/imgGallery.js"></script>
    <script src="./assets/js/cart.js"></script>
    <script src="./assets/js/qty.js"></script>
    <script>
      function sizeGuide(){
        Swal.fire({
          width: 700,
          imageUrl: './assets/img/<?= $product["sizeGuide"] ?>' ,
          imageWidth: 580,
          imageAlt: '<?= $product["sizeGuide"] ?>',
          showConfirmButton: false,
          showCloseButton: true,
        })
      }
    </script>
  </body>
</html>