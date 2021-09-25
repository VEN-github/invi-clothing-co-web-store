<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$ID = $_GET["ID"];
$product = $store->get_singleproduct($ID);
$stocks = $store->view_single_stock($ID);
$title = $product["productName"];
include_once "../includes/header.php";
?>
<body>
  <div class="page-container">
    <!-- start of navbar -->
    <header id="main-header" class="bg">
      <div class="container flex">
        <div class="logo">
          <a href="index.php"><img src="./assets/img/logo.png" alt="Logo" /></a>
        </div>
        <nav>
          <ul class="nav-links">
            <li><a href="index.php" class="nav-link">Home</a></li>
            <li><a href="shop.php" class="nav-link">Shop</a></li>
            <li><a href="#" class="nav-link">About</a></li>
            <li><a href="#" class="nav-link">Contact</a></li>
            <?php if (isset($_SESSION["userdata"])) { ?>
            <?php } else { ?>
            <li>
              <a href="login.php" class="login-nav btn outline-primary-btn">Login</a>
            </li>
            <?php } ?>
          </ul>
        </nav>
        <div class="side-menu">
          <div class="icon-menu">
            <div>
              <span class="iconify search-icon" data-icon="fe:search" data-inline="false"></span>
            </div>
            <div class="shopping-container">
              <a href="cart.php">
                <span class="iconify cart-icon" data-icon="gg:shopping-bag" data-inline="false"></span></a>
                <span id="counter" class="counter">0</span>        
            </div>
            
            <div class="profile-menu">
            <?php if (isset($_SESSION["userdata"])) { ?>
              <div class="hover">
                <span
                  class="iconify user-icon"
                  data-icon="carbon:user-avatar"
                  data-inline="false"
                ></span>
                <span
                  class="iconify arrow"
                  data-icon="dashicons:arrow-down-alt2"
                  data-inline="false"
                ></span>
              </div>          
              <ul class="menu">
                <li>
                  <a href="profile.php?ID=<?= $user["ID"] ?>"
                    ><span
                      class="iconify"
                      data-icon="fa-solid:user"
                      data-inline="false"
                    ></span
                    >Profile</a
                  >
                </li>
                <li>
                  <a href="#">
                    <span
                      class="iconify"
                      data-icon="ant-design:home-filled"
                      data-inline="false"
                    ></span
                    >Addresses</a
                  >
                </li>
                <li>
                  <a href="#"
                    ><span
                      class="iconify"
                      data-icon="fa-solid:shopping-bag"
                      data-inline="false"
                    ></span
                    >Orders</a
                  >
                </li>
                <li>
                  <a href="#"
                    ><span
                      class="iconify"
                      data-icon="emojione-monotone:heart-suit"
                      data-inline="false"
                    ></span
                    >Wishlist</a
                  >
                </li>
                <li>
                  <a href="../includes/logout.php"
                    ><span
                      class="iconify"
                      data-icon="ls:logout"
                      data-inline="false"
                    ></span
                    >Logout</a
                  >
                </li>
              </ul>
            </div>
          </div>
          <?php } else { ?>
          <a href="login.php" class="btn outline-primary-btn">Login</a>
          <?php } ?>
          <div class="burger-btn">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
          </div>
        </div>
      </div>
    </header>
    <!-- end of navbar -->
    <!-- start of product section -->
    <main>
    <section id="product-details">
      <div class="container">
        <div class="product-grid">
          <div class="product-highlight">
            <img src="./assets/img/<?= $product[
              "coverPhoto"
            ] ?>" alt="<?= $product["coverPhoto"] ?>">
          </div>
          <div class="product-gallery">
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
          <div class="product-info">
            <input type="hidden" id="productID" value="<?= $product["ID"] ?>">
            <div class="label"></div>
            <div class="product-name"><?= $product["productName"] ?></div>
            <div class="reviews">
              <!-- <div class="ratings">
                <span
                  class="iconify star"
                  data-icon="ant-design:star-filled"
                ></span>
                <span
                  class="iconify star"
                  data-icon="ant-design:star-filled"
                ></span>
                <span
                  class="iconify star"
                  data-icon="ant-design:star-filled"
                ></span>
                <span
                  class="iconify star"
                  data-icon="ant-design:star-filled"
                ></span>
                <span
                  class="iconify star"
                  data-icon="ant-design:star-filled"
                ></span>
                <span class="rating-number">56 Reviews</span>
              </div> -->
              <div class="product-price">
                <p class="price">
                  <span
                    class="iconify peso-sign"
                    data-icon="clarity:peso-line"
                    data-inline="false"
                  ></span>
                  <span id="productPrice" ><?= number_format(
                    $product["netSales"]
                  ) ?></span>
                  <span>.00</span>
                </p>
              </div>
              <button class="wishlist" title="Add to Wishlist">
                <span
                  class="iconify heart"
                  data-icon="ant-design:heart-outlined"
                  data-inline="false"
                ></span>
              </button>
            </div>
            <div class="product-description">
              <p>Product Details:</p>
              <div class="details">
                <?= $product["productDescription"] ?>
              </div>
            </div>
          </div>
          <div class="product-actions">
            <div class="product-color">
              <p>Color: <span id="productColor"><?= $product[
                "productColor"
              ] ?></span></p>
                <!-- <form action="" method="post">
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
                      <input type="radio" name="color" id="" class="radio" />
                      <span class="checkmark" style="background: #fff"></span>
                    </label>
                  </div>
                </form> -->
              </div>
              <?php foreach ($stocks as $stock) { ?>
                <?php if (is_null($stock["size"])) { ?>
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
                        max="<?= $stock["stock"] ?>"             
                        />   
                      <button class="plus-btn" onclick="plus(this)">+</button>
                    </div>
                  </div>
                  <div class="add-cart">
                    <button type="button" id="cart-btn" class="<?= $stock[
                      "stock"
                    ] == 0
                      ? "btn disabled-btn cart-btn"
                      : "btn primary-btn cart-btn" ?> ">
                      <?= $stock["stock"] == 0
                        ? "Out of Stock"
                        : '<span
                        class="iconify cart-icon"
                        data-icon="gg:shopping-bag"
                        data-inline="false"
                      ></span>
                      Add to Cart' ?>
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
                          ] ?>" data-stock= <?= $stock["stock"] ?> ><?= $stock[
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
              <div class="socials">
                <p>Share:</p>
                <span
                  class="iconify social-icon"
                  data-icon="ant-design:facebook-filled"
                ></span>
                <span
                  class="iconify social-icon"
                  data-icon="ant-design:instagram-filled"
                ></span>
                <span
                  class="iconify social-icon"
                  data-icon="ant-design:twitter-square-filled"
                ></span>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <!-- end of product section -->
    <?php require_once "../includes/footer.php"; ?>
  </div>
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