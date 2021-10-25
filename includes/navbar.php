<!-- start of navbar -->
<header id="main-header" class="<?= $title !== "Home" ? "bg" : "" ?>">
  <div class="container flex">
    <div class="logo">
      <a href="index.php"><img src="./assets/img/logo.png" alt="Logo" /></a>
    </div>
    <nav>
      <ul class="nav-links">
        <li><a href="index.php" class="nav-link <?= $title === "Home"
          ? "active"
          : "" ?>">Home</a></li>
        <li><a href="shop.php" class="nav-link <?= $title === "Shop"
          ? "active"
          : "" ?>">Shop</a></li>
        <li><a href="#" class="nav-link <?= $title === "About"
          ? "active"
          : "" ?>">About</a></li>
        <li><a href="#" class="nav-link <?= $title === "Contact"
          ? "active"
          : "" ?>">Contact</a></li>
        <?php if (!isset($_SESSION["userdata"])) { ?>  
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
          <a href="cart.php" class="<?= $title === "Cart"
            ? "icon-link visited"
            : "" ?>">
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
              <a href="order.php?ID=<?= $user["ID"] ?>"
                ><span
                  class="iconify"
                  data-icon="fa-solid:shopping-bag"
                  data-inline="false"
                ></span
                >Orders</a
              >
            </li>
            <li>
              <a href="returnorder.php?ID=<?= $user["ID"] ?>"
                ><span class="iconify" data-icon="ic:baseline-assignment-return"></span>
                Return</a
              >
            </li>
            <li>
              <a href="logout.php"
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
      <a href="login.php" class="btn outline-primary-btn login-btn">Login</a>
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