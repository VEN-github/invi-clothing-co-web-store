<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$user = $store->get_userdata();
$title = "Terms & Condition";
include_once "../includes/header.php";
?>
  <body>
    <div class="page-container">
      <?php include_once "../includes/navbar.php"; ?>
      <!-- start of Terms & Condition section -->
      <main>
        <section id="terms-wrapper">
          <div data-sal="zoom-out" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="banner">Terms & Condition</div>
          <div class="container terms-container">
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="100" data-sal-easing="ease-out-bounce" class="content">
              <p>These are the terms and conditions (which included our copyright notice) on which we do business for goods ordered through this website. These terms and conditions are designed to set out clearly our responsibilities and your rights. Please read these terms and conditions carefully before placing your order and retain a copy for future reference.</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="content">
              <p>We reserve the right to vary these terms and conditions at any time but, in respect of any ordered goods, the terms and conditions which apply shall be those which you accepted when you placed your order. Otherwise, no alteration of these terms and conditions shall apply unless agreed in writing between us and you.</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="300" data-sal-easing="ease-out-bounce" class="content">
              <p>A contract is formed between us and you when (and not before) we have sent you confirmation by email to the email address you have given and receive settlement of your credit/debit card payment. If you want to cancel or amend your order you must contact us as soon as possible.</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="400" data-sal-easing="ease-out-bounce" class="content">
              <p>Every effort will be made to ensure that prices shown in our website are accurate at the time you place your order. If an error is found prior to dispatch of the goods, we will inform you as soon as possible and offer you the option of reconfirming your order at the correct price or canceling your order. If you cancel, we will refund or re-credit you for any sum that has been paid by you or debited from your credit card for the goods.</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="500" data-sal-easing="ease-out-bounce" class="content">
              <p>Pictures, illustrations or descriptions or any other information submitted or contained in this website or other advertising matter are for general information and guidance. There may be minor variations between the goods as shown or described on our website and those dispatched to you without affecting their function, quality or price.</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="600" data-sal-easing="ease-out-bounce" class="content">
              <p>Payment for goods ordered can be made by any method shown in this website at the time you place your order. All payments are taken in peso.</p>
              <p>For cancellation, if the payment method is through bank and PayPal the refund may take up to 5-7 business days. Additionally, for Express Delivery or same day delivery which is only available from 8AM to 3PM, cancellation or items that are successfully placed can no longer be cancelled.</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="700" data-sal-easing="ease-out-bounce" class="content">
              <p>INVI Clothing Co. only allows 3 business days to request for return item. Once not requested within the given time INVI Clothing Co. is no longer responsible for any damage or defect from the product.</p>
              <p>Please take note, returned items are still for approval by the admin. Upload a photo of the product and write the detailed reason for the return.</p>
            </div>
            <div data-sal="slide-up" data-sal-duration="1200" data-sal-delay="600" data-sal-easing="ease-out-bounce" class="content">
              <h1>Copyright Notice</h1>
              <p>It is a condition of INVI Clothing Co. allowing you access to the material on this website that you accept the terms and conditions of this notice.</p>
              <p>The contents of this website are protected by copyright. The copying or incorporation into any other work of part or all of the material available on this website in any form is prohibited except that you may print or download extracts of the materials on this site for your personal use.</p>
              <p>INVI Clothing Co. operates in the Philippines only. The clothing line may not be used in connection with any product or service that is not supplied by INVI Clothing Co.</p>
              <p>Links or redirections to other websites or references to products and services offered by third parties are provided for your convenience only. They do not constitute an endorsement or approval in any form by us. We have no control or responsibility for the companies that operate the sites the content they may provide the privacy policies and terms of use they may adopt or the products and services they offer. We neither assume nor accept any liability for your use of third party or linked web sites and your use of such is entirely at your own risk.</p>
            </div>
          </div>
        </section>
      </main>
      <!-- end of Terms & Condition section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <?php require_once "../includes/scripts.php"; ?>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
  </body>
</html>