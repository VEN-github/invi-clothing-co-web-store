<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$store->loginValidation();
$store->login();
$title = "Login";
require_once "../includes/header.php";
?>
  <body>
    <div class="page-container">
      <?php
      include_once "../includes/navbar.php";
      $store->subscribe();
      ?>
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
                    placeholder="Email Address"
                    class="input"
                  />
                </div>
                <div class="input-field">
                  <input
                    type="password"
                    name="password"
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
                <a href="forgotpassword.php" class="forgot-pass">Forgot Password?</a>
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
    <script src="./assets/js/cart.js"></script>
  </body>
</html>
