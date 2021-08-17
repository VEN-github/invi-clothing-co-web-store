<?php
//login function
require_once "../class/webstoreclass.php";
$store->loginValidation();
$store->login();
$store->add_cart();
$userdata = $store->get_userdata();

if (isset($userdata)) {
  if ($userdata["access"] != "admin") {
    header("Location: index.php");
  } else {
    header("Location: dashboard.php");
  }
}

$title = "Login";
require_once "../includes/header.php";
?>
  <body>
    <div class="page-container">
      <!-- start of navbar -->
      <header id="main-header" class="bg">
        <div class="container flex">
          <div class="logo">
            <a href="index.php"
              ><img src="./assets/img/logo.png" alt="Logo"
            /></a>
          </div>
          <nav>
            <ul class="nav-links">
              <li><a href="index.php" class="nav-link">Home</a></li>
              <li><a href="shop.php" class="nav-link">Shop</a></li>
              <li><a href="#" class="nav-link">About</a></li>
              <li><a href="#" class="nav-link">Contact</a></li>
              <li>
                <a href="login.php" class="login-nav btn outline-primary-btn"
                  >Login</a
                >
              </li>
            </ul>
          </nav>
          <div class="side-menu">
            <div class="icon-menu">
              <div>
                <span
                  class="iconify search-icon"
                  data-icon="fe:search"
                  data-inline="false"
                ></span>
              </div>
              <div class="shopping-container">
                <a href="cart.php">
                  <span
                    class="iconify cart-icon"
                    data-icon="gg:shopping-bag"
                    data-inline="false"
                  ></span
                ></a>
                <?php if (isset($_SESSION["cart"])) {
                  $count = count($_SESSION["cart"]);
                  echo "<span class=\"counter\">$count</span>";
                } else {
                  echo "<span class=\"counter\">0</span>";
                } ?>  
              </div>
            </div>
            <a
              href="login.php"
              class="btn outline-primary-btn"
              >Login</a
            >
            <div class="burger-btn">
              <div class="line1"></div>
              <div class="line2"></div>
              <div class="line3"></div>
            </div>
          </div>
        </div>
      </header>
      <!-- end of navbar -->
      <main>
        <section class="login-wrapper">
          <div class="container">
            <!-- start of login form -->
            <div class="form-container">
              <form action="" class="form-group login-form" method="post">
                <h2 class="title">Login</h2>
                <div class="social">
                  <a href="#"
                    ><span
                      class="iconify facebook"
                      data-icon="akar-icons:facebook-fill"
                      data-inline="false"
                    ></span
                  ></a>
                  <a href="#"
                    ><span
                      class="iconify google"
                      data-icon="akar-icons:google-contained-fill"
                      data-inline="false"
                    ></span
                  ></a>
                </div>
                <p class="input-text">or use your email account</p>
                <div class="input-field">
                  <input
                    type="email"
                    name="email"
                    id=""
                    placeholder="Email Address"
                    class="input"
                  />
                </div>
                <div class="input-field">
                  <input
                    type="password"
                    name="password"
                    id=""
                    placeholder="Password"
                    class="input password"
                  />
                  <button class="show-password">
                    <span
                      class="iconify show-pass"
                      data-icon="ant-design:eye-invisible-outlined"
                      data-inline="false"
                    ></span>
                  </button>
                </div>
                <?php if (isset($_GET["error"])) { ?>
                <div class="validation">
                  <span
                    class="iconify error-icon"
                    data-icon="clarity:error-standard-line"
                    data-inline="false"
                  ></span
                  ><?= $_GET["error"] ?>
                </div>
                <?php } ?>
                <a href="#" class="forgot-pass">Forgot Password?</a>
                <input type="submit" name="login" value="Login" class="login" />
              </form>
              <!-- end of login form -->
              <!-- start of panels -->
              <div class="panels-container">
                <div class="panel right-panel">
                  <img
                    class="illustration"
                    src="./assets/img/sign-up.svg"
                    alt="Sign Up Illustration"
                  />
                  <div class="content signup-content">
                    <h3 class="panel-title">Get Started</h3>
                    <p class="panel-text">
                      Enter your personal details and start<span
                        >journey with us</span
                      >
                    </p>
                    <a href="signup.php" class="btn outline-light-btn">
                      Sign Up
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- end of panels -->
          </div>
        </section>
      </main>
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <script src="./assets/js/header.js"></script>
  </body>
</html>
