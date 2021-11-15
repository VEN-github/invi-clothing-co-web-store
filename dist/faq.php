<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$user = $store->get_userdata();
$title = "FAQ";
include_once "../includes/header.php";
?>
  <body>
    <div class="page-container">
      <?php include_once "../includes/navbar.php"; ?>
      <!-- start of faq section -->
      <main>
        <section id="faq-wrapper">
          <div data-sal="zoom-out" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="banner">Frequently Asked Questions</div>
          <div class="container faq-grid">
            <img data-sal="slide-right" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" src="./assets/img/faq.svg" alt="FAQ">
            <div data-sal="slide-left" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="accordion">
              <div class="content-box">
                <div class="question"><h4>What is the status of my order?</h4><span class="plus-icon">+</span></div>
                <div class="answer"><p>We have you covered! We will email you as items in your order ship, or if there are updates on the status of your order. Can't find the email? Go to Profile > Orders > Track. COVID-19 potential delivery delay. We apologize for the inconvenience this may cause.</p></div>
              </div>
              <div class="content-box">
                <div class="question"><h4>What is the status of my order?</h4><span class="plus-icon">+</span></div>
                <div class="answer"><p>We have you covered! We will email you as items in your order ship, or if there are updates on the status of your order. Can't find the email? Go to Profile > Orders > Track. COVID-19 potential delivery delay. We apologize for the inconvenience this may cause.</p></div>
              </div>
              <div class="content-box">
                <div class="question"><h4>What is the status of my order?</h4><span class="plus-icon">+</span></div>
                <div class="answer"><p>We have you covered! We will email you as items in your order ship, or if there are updates on the status of your order. Can't find the email? Go to Profile > Orders > Track. COVID-19 potential delivery delay. We apologize for the inconvenience this may cause.</p></div>
              </div>
              <div class="content-box">
                <div class="question"><h4>What is the status of my order?</h4><span class="plus-icon">+</span></div>
                <div class="answer"><p>We have you covered! We will email you as items in your order ship, or if there are updates on the status of your order. Can't find the email? Go to Profile > Orders > Track. COVID-19 potential delivery delay. We apologize for the inconvenience this may cause.</p></div>
              </div>
              <div class="content-box">
                <div class="question"><h4>What is the status of my order?</h4><span class="plus-icon">+</span></div>
                <div class="answer"><p>We have you covered! We will email you as items in your order ship, or if there are updates on the status of your order. Can't find the email? Go to Profile > Orders > Track. COVID-19 potential delivery delay. We apologize for the inconvenience this may cause.</p></div>
              </div>
              <div class="content-box">
                <div class="question"><h4>Can I change my order?</h4><span class="plus-icon">+</span></div>
                <div class="answer"><p>Unfortunately no, you cannot change your order but you can cancel your order and place new one.</p></div>
              </div>
              <div class="content-box">
                <div class="question"><h4>What do I do if my order is damaged?</h4><span class="plus-icon">+</span></div>
                <div class="answer"><p>We are sorry to hear that your order arrived less than pristine condition! For order return you can go to Profile > return, fill out the form and select the reason for the return. We will get back to you once we received.</p></div>
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- end of faq section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <?php require_once "../includes/scripts.php"; ?>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
  </body>
</html>