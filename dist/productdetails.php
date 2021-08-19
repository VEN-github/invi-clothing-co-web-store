<?php
require_once "../class/webstoreclass.php";
$user = $store->get_userdata();
$ID = $_GET["ID"];
$product = $store->get_singleproduct($ID);
$stocks = $store->view_all_stocks($ID);
$sizeList = "";
if (!empty($_POST)) {
  $sizeList = isset($_POST["sizeList"]) ? $_POST["sizeList"] : "";
}

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

                <?php if (isset($_SESSION["cart"])) {
                  $count = count($_SESSION["cart"]);
                  echo "<span class=\"counter\">$count</span>";
                } else {
                  echo "<span class=\"counter\">0</span>";
                } ?>             
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
            <?= '<img src="./assets/img/' .
              $product["coverPhoto"] .
              '" alt="' .
              $product["coverPhoto"] .
              '">' ?>
          </div>
          <div class="product-gallery">
            <?= '<img src="./assets/img/' .
              $product["coverPhoto"] .
              '" alt="' .
              $product["coverPhoto"] .
              '">' ?>
            <?php if (!empty($product["productImage1"])) {
              echo '<img src="./assets/img/' .
                $product["productImage1"] .
                '" alt="' .
                $product["productImage1"] .
                '">';
            } ?>
            <?php if (!empty($product["productImage2"])) {
              echo '<img src="./assets/img/' .
                $product["productImage2"] .
                '" alt="' .
                $product["productImage2"] .
                '">';
            } ?>
            <?php if (!empty($product["productImage3"])) {
              echo '<img src="./assets/img/' .
                $product["productImage3"] .
                '" alt="' .
                $product["productImage3"] .
                '">';
            } ?>
          </div>
          <div class="product-info">
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
                <?= $product["productPrice"] ?>
                <span>.00</span>
              </p>
            </div>
              <button class="wishlist" title="Wishlist">
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
              <p>Color: <span><?= $product["productColor"] ?></span></p>
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
              <div class="product-size">
                <div class="size-guide">
                  <p>Size:</p>
                  <button class="size-chart">
                    <span
                      class="iconify ruler"
                      data-icon="bx:bx-ruler"
                    ></span>
                    Size Guide
                  </button>
                </div>
                <form action="" method="post" name="sizeForm">
                  <select name="sizeList" id="" class="input size" onchange="sizeForm.submit();">
                      <option selected disabled>Select Size</option>
                      <?php foreach ($stocks as $stock) { ?>
                      <option value="<?= $stock["sizes"] ?>" <?php if (
  $sizeList == $stock["sizes"]
) { ?> selected <?php } ?> ><?= $stock["sizes"] ?></option><?php } ?>  
                  </select>
                </form>
              </div>
              <?php foreach ($stocks as $stock) { ?>  
                <?php if ($sizeList == $stock["sizes"]) { ?>
                  <div class="product-quantity">
                    <p>Quantity:</p>
                    <div class="qty">
                      <button class="minus-btn">-</button>
                      <input
                        class="qty-input"
                        type="number"
                        name=""
                        id="quantity"
                        value="1"
                        min="1"
                        max="<?= $stock["stocks"] ?>"             
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
                <?php } ?>
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
  <script>
  // QUANTITY
  // SETTING DEFAULT ATTRIBUTE TO DISABLED MINUS BUTTON
  document.querySelector(".minus-btn").setAttribute("disabled", "disabled");
  document.querySelector(".minus-btn").style.cursor="not-allowed";

  // TAKING VALUE TO INCREMENT DECREMENT INPUT VALUE
  let valueCount;

  // SETTING MAX VALUE
  let maxValue = "<?php foreach ($stocks as $stock) { ?> <?php if (
   $sizeList == $stock["sizes"]
 ) { ?> <?= $stock["stocks"] ?> <?php } ?> <?php } ?>"

  // PLUS BUTTON
  document.querySelector(".plus-btn").addEventListener("click", () => {
    //GETTING VALUE INPUT
    valueCount = document.querySelector("#quantity").value;

    //INPUT VALUE INCREMENT BY 1
    valueCount++;

    //SETTING INCREMENT INPUT VALUE
    document.querySelector("#quantity").value = valueCount;
    //SETTING INCREMENT MAX VALUE
    document.querySelector("#quantity").max = maxValue;

    if (valueCount > 1) {
      document.querySelector(".minus-btn").removeAttribute("disabled");
      document.querySelector(".minus-btn").classList.remove("disabled");
      document.querySelector(".minus-btn").style.cursor="pointer";
    }
    if (valueCount == maxValue) {
      document.querySelector(".plus-btn").setAttribute("disabled", "disabled");
      document.querySelector(".plus-btn").style.cursor="not-allowed";
    }
  });
  // MINUS BUTTON
  document.querySelector(".minus-btn").addEventListener("click", () => {
    //GETTING VALUE INPUT
    valueCount = document.querySelector("#quantity").value;

    //INPUT VALUE DECREMENT BY 1
    valueCount--;

    //SETTING DECREMENT INPUT VALUE
    document.querySelector("#quantity").value = valueCount;

    if (valueCount == 1) {
      document.querySelector(".minus-btn").setAttribute("disabled", "disabled");
      document.querySelector(".minus-btn").style.cursor="not-allowed";
    }
    if (valueCount != maxValue){
      document.querySelector(".plus-btn").removeAttribute("disabled");
      document.querySelector(".plus-btn").classList.remove("disabled");
      document.querySelector(".plus-btn").style.cursor="pointer";
    }
  });
  </script>
  <!-- <script src="./assets/js/cart.js"></script> -->
</body>
</html>