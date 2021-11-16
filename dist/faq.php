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
                <div class="question"><h4>Can you ship internationally or process international credit cards?</h4><span class="plus-icon">+</span></div>
                <div class="answer"><p>At this time we do not offer international shipping and cannot accept credit cards from outside of the Philippines.</p></div>
              </div>
              <div class="content-box">
                <div class="question"><h4>How can I pay for my order?</h4><span class="plus-icon">+</span></div>
                <div class="answer"><p>INVI Clothing Co. currently accepts Credit/Debit card. We also accept payment via PayPal and Cash on Delivery (COD).</p></div>
              </div>
              <div class="content-box">
                <div class="question"><h4>How long will it take to get my order?</h4><span class="plus-icon">+</span></div>
                <div class="answer"><p>For standard shipping within Metro Manila, you should receive your order within 2-3 business days. For standard shipping outside Metro Manila, it can take 5-7 business days. INVI Clothing Co. also offers express delivery within Metro Manila only, and this is only available between 8:00 am to 3:00 pm and you should receive your order within the day.</p></div>
              </div>
              <div class="content-box">
                <div class="question"><h4>Can I cancel my order?</h4><span class="plus-icon">+</span></div>
                <div class="answer"><p>I'm sorry to hear that you are thinking to cancel your order. Cancelling of the orders can only be done if the order status is still on "Pending or Processing Status". Once Order shipped you can no longer cancel your order.</p></div>
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