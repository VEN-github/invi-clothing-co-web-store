<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$user = $store->get_userdata();
$title = "Privacy Policy";
include_once "../includes/header.php";
?>
  <body>
    <div class="page-container">
      <?php include_once "../includes/navbar.php"; ?>
      <!-- start of privacy policy section -->
      <main>
        <section id="privacy-wrapper">
          <div data-sal="zoom-out" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="banner">Privacy Policy</div>
          <div class="container policy-container">
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="100" data-sal-easing="ease-out-bounce" class="content">
              <p>We are committed to protecting the privacy of visitors and customers that use our sites, and take your privacy very seriously. INVI Clothing Co. appreciate and respect the importance of privacy on the Internet. The sections below make up our privacy policy. It sets out the rules we follow regarding how we use any personal information we collect about you.</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="content">
              <p>INVI Clothing Co. operate our sites, under the trading names of INVI Clothing Co. and are referred to in this policy as ‘we’, ‘our’, and ‘us’. We are the data controller of any information provided to us via our websites, mobile phone applications, stores, or social media pages. Any changes we make to our privacy policy in the future will be posted on this page. This policy was last updated July 2021.</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="300" data-sal-easing="ease-out-bounce" class="content">
              <p>If you have any concerns or questions about our privacy policy, or how we use your personal information, please contact us.</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="400" data-sal-easing="ease-out-bounce" class="content">
              <h1>Why we collect your data?</h1>
              <p>We recognize the need to treat any customer data in an appropriate and lawful manner, and only collect and process the data on the basis of contract, and legitimate interests.</p>
              <p>We collect data about you for the purpose of fulfilling our duties of any contract made by us when receiving an order placed by you, the customer.</p>
              <p>We may also, with your consent, collect your data for the purpose of providing you with marketing, promotional, or competition information.</p>
              <p>For the purpose of completing our obligations in processing your order, we will need to collect some personal information from you. Personal Information are any identifiable details supplied to us that mean we can identify you either directly, or indirectly. This can be anything from an order number to specific information, such as your address details, or telephone number.</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="500" data-sal-easing="ease-out-bounce" class="content">
              <h1>Details of when data is collected are listed below:</h1>
              <p>When placing an order on the INVI Clothing Co. website, or mobile application.</p>
              <p>When setting up an account on either the INVI Clothing Co., or mobile application.</p>
              <p>Filling in any forms on any of our sites, mobile application.</p>
              <p>Communicating with our social media pages, in the form of comments,</p>
              <p>Communicating with us via email, telephone, or by writing to us</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="600" data-sal-easing="ease-out-bounce" class="content">
              <h1>Data that may be captured about you could include, but is not limited to the following:</h1>
              <p>Name</p>
              <p>Full Address including Postal Code</p>
              <p>Email Address</p>
              <p>Telephone Numbers</p>
              <p>Password</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="600" data-sal-easing="ease-out-bounce" class="content">
              <p>If you are placing an order with us, we will require payment details unless you pay with a payment service provider such Cash on delivery. Any payment information provided will be captured securely by the third party provider.</p>
            </div>
          </div>
        </section>
      </main>
      <!-- end of privacy policy section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <?php require_once "../includes/scripts.php"; ?>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
  </body>
</html>