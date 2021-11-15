<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$user = $store->get_userdata();
$title = "Contact Us";
include_once "../includes/header.php";
?>
  <body>
    <div class="page-container">
      <?php
      include_once "../includes/navbar.php";
      $store->contact_us();
      ?>
      <!-- start of contact section -->
      <main>
        <section id="contact">
          <div class="container">
            <h1 data-sal="zoom-in" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce">GET IN TOUCH</h1>
            <div class="contact-grid">
              <div class="contact-vector">
                <img data-sal="slide-right" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" src="./assets/img/contact-us.svg" alt="Contact Us" />
                <div class="contact-icon">
                  <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="400" data-sal-easing="ease-out-bounce">
                    <span
                      class="iconify icon-contact"
                      data-icon="fluent:location-28-filled"
                    ></span>
                    <p>Pinagbuhatan, Pasig City 1600</p>
                  </div>
                  <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="600" data-sal-easing="ease-out-bounce">
                    <span
                      class="iconify icon-contact"
                      data-icon="carbon:phone-filled"
                    ></span>
                    <p>+63 995 976 4761</p>
                  </div>
                  <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="800" data-sal-easing="ease-out-bounce">
                    <span
                      class="iconify icon-contact"
                      data-icon="mdi:email"
                    ></span>
                    <p>inviclothing.co@gmail.com</p>
                  </div>
                </div>
              </div>
              <div data-sal="slide-left" data-sal-duration="1200" data-sal-delay="400" data-sal-easing="ease-out-bounce" class="contact-form">
                <h4>We'd love to hear from you</h4>
                <form method="post">
                  <div class="input-field">
                    <input
                      type="text"
                      name="customerName"
                      class="input input-full"
                      placeholder=" "
                    />
                    <label class="form-label full-label">Name</label>
                  </div>
                  <div class="input-field">
                    <input
                      type="email"
                      name="email"
                      class="input input-full"
                      placeholder=" "
                    />
                    <label class="form-label full-label">Email Address</label>
                  </div>
                  <div class="input-field">
                    <textarea
                      name="message"
                      rows="10"
                      class="input input-full"
                      placeholder="Write something..."
                    ></textarea>
                  </div>
                  <div class="input-field">
                    <button type="submit" name="contactSubmit" class="btn primary-btn contact-btn">
                      Submit
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- end of contact section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <?php require_once "../includes/scripts.php"; ?>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
    <script src="./assets/js/buttons.js"></script>
  </body>
</html>
