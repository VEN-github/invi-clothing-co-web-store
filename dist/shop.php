<?php
require_once "../class/webstoreclass.php";
$store->login();
$userID = $store->get_userdata();

$title = "Shop";
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
            <li><a href="shop.php" class="nav-link active">Shop</a></li>
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
                  <a href="profile.php?ID=<?php echo $userID["ID"]; ?>"
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
          <a href="login.php" class="btn login-outline-btn outline-primary-btn">Login</a>
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
                <li>Tees</li>
                <li>Accessories</li>
                <li>Jackets</li>
                <li>Bottoms</li>
                <li>December Collection</li>
                <li>Villain Collection</li>
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
              <div class="products">
                <div class="labels">
                  <span class="product-label">SALE</span>
                  <button class="wishlist">
                    <span
                      class="iconify heart"
                      data-icon="ant-design:heart-outlined"
                      data-inline="false"
                    ></span>
                  </button>
                </div>
                <a href="productdetails.html"
                  ><img
                    src="./assets/img/INVI Warrior - Front - Golden Yellow.png"
                    alt="INVI Warrior Shirt"
                /></a>
                <div class="details">
                  <a href="productdetails.html">Invincible Warrior</a>
                  <p class="price">
                    <span
                      class="iconify peso-sign"
                      data-icon="clarity:peso-line"
                      data-inline="false"
                    ></span>
                    450.00
                  </p>
                </div>
                <div class="hidden">
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
                          <option value="">XS</option>
                          <option value="">S</option>
                          <option value="">M</option>
                          <option value="">L</option>
                          <option value="">XL</option>
                          <option value="">2XL</option>
                          <option value="">3XL</option>
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
                </div>
              </div>
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
  <!-- <script src="./assets/js/cart.js"></script> -->
</body>
</html>