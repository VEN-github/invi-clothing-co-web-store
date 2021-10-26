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
      $store->subscribe();
      $store->contact_us();
      ?>
      <!-- start of contact section -->
      <main>
        <section id="contact">
          <div class="container">
            <h1>GET IN TOUCH</h1>
            <div class="contact-grid">
              <div class="contact-vector">
                <img src="./assets/img/contact-us.svg" alt="Contact Us" />
                <div class="contact-details">
                  <div class="contact-icon">
                    <div>
                      <span
                        class="iconify icon-contact"
                        data-icon="fluent:location-28-filled"
                      ></span>
                    </div>
                    <div>
                      <span
                        class="iconify icon-contact"
                        data-icon="carbon:phone-filled"
                      ></span>
                    </div>
                    <div>
                      <span
                        class="iconify icon-contact"
                        data-icon="mdi:email"
                      ></span>
                    </div>
                  </div>
                  <div class="contact-text">
                    <p>Pinagbuhatan, Pasig City 1600</p>
                    <p>+63 995 976 4761</p>
                    <p>inviclothing.co@gmail.com</p>
                  </div>
                </div>
              </div>
              <div class="contact-form">
                <h4>We'd love to hear from you</h4>
                <form method="post">
                  <div class="input-field">
                    <input
                      type="text"
                      name="customerName"
                      class="input input-full"
                      placeholder="Name"
                    />
                  </div>
                  <div class="input-field">
                    <input
                      type="email"
                      name="email"
                      class="input input-full"
                      placeholder="Email Address"
                    />
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
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
  </body>
</html>
