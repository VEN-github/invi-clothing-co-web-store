<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$store->delete_userdata();
$userProfile = $store->setProfile();
$user = $store->get_userdata();
$title = "Profile";
include_once "../includes/header.php";
$store->update_userdata();
?>
  <body>
    <div class="page-container">
      <?php include_once "../includes/navbar.php"; ?>
      <!-- start of profile section -->
      <main>
        <section id="profile">
          <div class="banner">Profile</div>
          <div class="container">
            <div class="profile-wrapper">
              <?php include_once "../includes/profilesummary.php"; ?>
              <div class="customer-details">
                <h4>Personal Details</h4>
                <form method="post" id="profileForm">
                  <input type="hidden" name="emailCustomer" value="<?= $userProfile[
                    "email"
                  ] ?>" />
                  <input type="hidden" name="deleteOldAvatarImg" value="<?= $userProfile[
                    "profileImg"
                  ] ?>"/>
                </form>
                <form method="post" enctype="multipart/form-data">
                  <input type="file" name="avatarImg" id="avatarImg" style="display:none;"/>
                  <input type="hidden" name="oldAvatarImg" value="<?= $userProfile[
                    "profileImg"
                  ] ?>" />
                  <div class="input-group">
                    <div class="input-field">
                      <input type="text" name="firstName" class="input" placeholder=" " value="<?= $userProfile[
                        "firstName"
                      ] ?>" />
                      <label class="form-label">First Name</label>
                    </div>
                    <div class="input-field">
                      <input type="text" name="lastName" class="input" placeholder=" " value="<?= $userProfile[
                        "lastName"
                      ] ?>" />
                      <label class="form-label">Last Name</label>
                    </div>
                  </div>
                  <div class="input-group">
                    <div class="input-field">
                      <input type="text" name="email" class="input disabled"
                      value="<?= $userProfile["email"] ?>" />
                    </div>
                    <div class="input-field">
                      <input type="text" name="contactNumber" class="input" placeholder=" "         
                        value="<?= $userProfile["contactNumber"] ?>" />
                      <label class="form-label">Contact Number</label>
                    </div>
                  </div>
                  <div class="input-group">
                    <div class="input-field">
                      <input
                        type="password"
                        name="newPass"
                        id="signup-pass-input"
                        class="input password"
                        placeholder=" "
                      />
                      <label class="form-label">New Password</label>
                      <button type="button" class="show-password signup-show-pass signup-show-invisible">
                        <span
                          class="iconify show-pass"
                          data-icon="ant-design:eye-invisible-outlined"
                          data-inline="false"
                        ></span>
                      </button>
                      <button type="button" class="show-password signup-show-pass signup-show-visible" style="display:none;"> 
                        <span
                          class="iconify show-pass"
                          data-icon="ant-design:eye-outlined"
                          data-inline="false"
                        ></span>
                      </button>
                    </div>
                    <div class="input-field">
                      <input type="password" name="confirmPass" id="confirm-password-input" class="input password" placeholder=" "/>
                      <label class="form-label">Confirm Password</label>
                      <button type="button" class="show-password signup-show-confirmpass confirm-invisible">
                        <span
                          class="iconify show-pass"
                          data-icon="ant-design:eye-invisible-outlined"
                          data-inline="false"
                        ></span>
                      </button>
                      <button type="button" class="show-password signup-show-confirmpass confirm-visible" style="display:none;"> 
                        <span
                          class="iconify show-pass"
                          data-icon="ant-design:eye-outlined"
                          data-inline="false"
                        ></span>
                      </button>
                    </div>  
                  </div>
                  <div class="button-container">
                    <button
                      type="button"
                      id="deleteBtn"
                      class="btn outline-primary-btn del-btn"
                    >
                      <span
                        class="iconify del-acct"
                        data-icon="line-md:account-delete"
                        data-inline="false"
                      ></span>
                      Delete Account
                    </button>
                    <button type="submit" name="update" class="btn primary-btn update-btn">
                      <span
                        class="iconify save-icon"
                        data-icon="fluent:save-20-regular"
                        data-inline="false"
                      ></span>
                      Save Changes
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- end of profile section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
    <script src="./assets/js/buttons.js"></script>
    <script src="./assets/js/avatar.js"></script>
    <script>
      const deleteBtn = document.querySelector("#deleteBtn");
      if (deleteBtn) {
        deleteBtn.addEventListener("click", () => {
          Swal.fire({
            title: 'Are you sure you want to delete your account?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'No',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire({
                title: 'Account Deleted',
                icon: 'success',
                showConfirmButton: false
              });
              setTimeout(function() { 
              document.querySelector('#profileForm').submit();
            }, 1000);
            }
          })
        });
      }
    </script>
  </body>
</html>
