<?php
//Sign Up function
require_once "../class/webstoreclass.php";
$store->signupValidation();
$store->signup();
$title = "Create Account";
require_once "../includes/header.php";
?>
  <body>
    <div class="page-container">
      <?php include_once "../includes/navbar.php"; ?>
      <main>
        <section class="signup-wrapper">
          <div class="container">
            <div class="form-container">
              <!-- start of panels -->
              <div class="panels-container">
                <div class="panel">
                  <div class="content">
                    <h3 class="panel-title">Welcome Back!</h3>
                    <p class="panel-text">
                      To keep connected with us<span
                        >please login with your personal info</span
                      >
                    </p>
                    <a href="login.php" class="btn outline-light-btn">
                      Login
                    </a>
                  </div>
                  <img
                    class="illustration"
                    src="./assets/img/login.svg"
                    alt="Login Illustration"
                  />
                </div>
              </div>
              <!-- end of panels -->
              <!-- start of sign up form -->
              <form action="" class="form-group signup-form" method="post">
                <h2 class="title">Create Account</h2>
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
                <p class="input-text">or use your email for registration</p>
                <div class="input-field">
                  <input
                    type="text"
                    name="firstName"
                    id=""
                    placeholder="First Name"
                    class="input"
                  />
                </div>
                <?php if (isset($_GET["firstNameError"])) { ?>
                <div class="validation">
                  <span
                    class="iconify error-icon"
                    data-icon="clarity:error-standard-line"
                    data-inline="false"
                  ></span
                  ><?= $_GET["firstNameError"] ?>
                </div>
                <?php } ?>
                <div class="input-field">
                  <input
                    type="text"
                    name="lastName"
                    id=""
                    placeholder="Last Name"
                    class="input"
                  />
                </div>
                <?php if (isset($_GET["lastNameError"])) { ?>
                <div class="validation">
                  <span
                    class="iconify error-icon"
                    data-icon="clarity:error-standard-line"
                    data-inline="false"
                  ></span
                  ><?= $_GET["lastNameError"] ?>
                </div>
                <?php } ?>
                <div class="input-field">
                  <input
                    type="email"
                    name="email"
                    id=""
                    placeholder="Email Address"
                    class="input"
                  />
                </div>
                <?php if (isset($_GET["emailError"])) { ?>
                <div class="validation">
                  <span
                    class="iconify error-icon"
                    data-icon="clarity:error-standard-line"
                    data-inline="false"
                  ></span
                  ><?= $_GET["emailError"] ?>
                </div>
                <?php } ?>
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
                <?php if (isset($_GET["passwordError"])) { ?>
                <div class="validation">
                  <span
                    class="iconify error-icon"
                    data-icon="clarity:error-standard-line"
                    data-inline="false"
                  ></span
                  ><?= $_GET["passwordError"] ?>
                </div>
                <?php } ?>
                <div class="input-field">
                  <input
                    type="password"
                    name="confirmPassword"
                    id=""
                    placeholder="Confirm Password"
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
                <?php if (isset($_GET["confirmPasswordError"])) { ?>
                <div class="validation">
                  <span
                    class="iconify error-icon"
                    data-icon="clarity:error-standard-line"
                    data-inline="false"
                  ></span
                  ><?= $_GET["confirmPasswordError"] ?>
                </div>
                <?php } ?>
                <div class="input-field">
                  <input
                    type="hidden"
                    name="access"
                    id=""
                    value="user"
                  />
                </div>
                <input type="submit" name="signup" value="Sign Up" class="signup" />
                <p class="agreement-text">
                  By clicking on Sign Up, you agree to
                  <span><a href="#">terms & condition</a></span> and
                  <span><a href="#">privacy policy</a></span
                  >.
                </p>
              </form>
            </div>
          </div>
          <!-- end of sign up form -->
        </section>
      </main>
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/cart.js"></script>
  </body>
</html>
