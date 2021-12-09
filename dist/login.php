<?php
require_once "../class/webstoreclass.php";
require_once "../includes/config.php";
require_once "../includes/fb_config.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$store->loginValidation();
$store->login();
$title = "Login";
require_once "../includes/header.php";
?>
  <body>
    <div class="page-container">
      <?php include_once "../includes/navbar.php"; ?>
      <main>
        <section class="login-wrapper">
          <div class="container">
            <div class="form-container">
              <!-- start of login form -->
              <div data-sal="zoom-out" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="login-form">
                <form class="form-group login-group" method="post">
                  <h2 class="title">Login</h2>
                  <div class="social">
                    <button onclick="window.location = '<?php echo $fb_url; ?>'" type="button">
                      <span
                        class="iconify facebook"
                        data-icon="akar-icons:facebook-fill"
                        data-inline="false"
                      ></span
                    ></button>
                    <button onclick="window.location = '<?php echo $login_url; ?>'" type="button">
                      <span
                        class="iconify google"
                        data-icon="akar-icons:google-contained-fill"
                        data-inline="false"
                      ></span>
                    </button>
                  </div>
                  <p class="input-text">or use your email account</p>
                  <div class="input-field">
                    <input
                      type="email"
                      name="email"
                      class="input"
                      placeholder=" "
                    />
                    <label class="form-label">Email Address</label>
                  </div>
                  <div class="input-field">
                    <input
                      type="password"
                      name="password"
                      id="login-pass-input"
                      class="input password"
                      placeholder=" "
                    />
                    <label class="form-label">Password</label>
                    <button type="button" class="show-password login-eye-btn invisible">
                      <span
                        class="iconify show-pass"
                        data-icon="ant-design:eye-invisible-outlined"
                        data-inline="false"
                      ></span>
                    </button>
                    <button type="button" class="show-password login-eye-btn visible" style="display:none;"> 
                    <span
                          class="iconify show-pass"
                          data-icon="ant-design:eye-outlined"
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
              </div>
              <!-- end of login form -->
              <!-- start of panels -->
              <div class="panel">
                <div data-sal="slide-down" data-sal-duration="1200" data-sal-delay="400" data-sal-easing="ease-out-bounce" class="content">
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
                <img data-sal="slide-up" data-sal-duration="1200" data-sal-delay="400" data-sal-easing="ease-out-bounce"
                  class="illustration"
                  src="./assets/img/sign-up.svg"
                  alt="Sign Up Illustration"
                />
              </div>
              <!-- end of panels -->
            </div>
          </div>
        </section>
      </main>
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <?php include_once "../includes/scripts.php"; ?>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/cart.js"></script>
    <script src="./assets/js/buttons.js"></script>
  </body>
</html>
