<?php
require_once "../class/webstoreclass.php";
require "../PHPMailer/src/PHPMailer.php";
require "../PHPMailer/src/SMTP.php";
$userProfile = $store->setProfile();
$user = $store->get_userdata();
$title = "Addresses";
include_once "../includes/header.php";
$regions = $store->region();
$ID = $_GET["ID"];
$addresses = $store->get_address($ID);
$store->add_addresses();
$store->update_addresses();
$store->delete_address();
?>
  <body>
    <div class="page-container">
      <?php include_once "../includes/navbar.php"; ?>
      <!-- start of addresses section -->
      <main>
        <section id="profile">
          <div data-sal="zoom-out" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="banner">Addresses</div>
          <div class="container">
            <div class="profile-wrapper">
              <?php include_once "../includes/profilesummary.php"; ?>
              <div data-sal="zoom-in" data-sal-duration="1200" data-sal-delay="200" data-sal-easing="ease-out-bounce" class="customer-details">
                <?php if ($addresses) { ?>
                  <div class="address-header">
                    <h4>Address Book</h4>
                    <a id="add-address" class="add-address"
                      ><span
                        class="iconify add-icon"
                        data-icon="carbon:add-alt"
                      ></span
                      >Add New Address</a
                    >
                  </div>             
                  <div class="address-wrapper">
                    <?php foreach ($addresses as $address) { ?>
                      <div class="address-container">
                        <div class="address-details">
                          <h3><?= $address["firstName"] .
                            " " .
                            $address["lastName"] ?></h3>
                          <p><?= $address["address1"] ?></p>
                          <p><?= $address["address2"] ?></p>
                          <p><?= $address["city"] .
                            " " .
                            $address["postalCode"] ?></p>
                          <p><?= $address["region"] .
                            " " .
                            $address["country"] ?></p>
                          <p><?= $address["phoneNumber"] ?></p>
                        </div>
                        <div class="address-actions">
                          <button type="button" class="edit-address" data-addressid="<?= $address[
                            "addressID"
                          ] ?>" data-fname="<?= $address[
  "firstName"
] ?>" data-lname="<?= $address["lastName"] ?>" data-address1="<?= $address[
  "address1"
] ?>" data-address2="<?= $address["address2"] ?>" data-city="<?= $address[
  "city"
] ?>" data-zip="<?= $address["postalCode"] ?>" data-region="<?= $address[
  "region"
] ?>" data-country="<?= $address["country"] ?>" data-phone="<?= $address[
  "phoneNumber"
] ?>" data-primary="<?= $address["addressType"] ?>">
                            <span
                              class="iconify action-icon"
                              data-icon="akar-icons:edit"
                            ></span>
                          </button>
                          <button type="button" class="delete-address">
                            <span
                              class="iconify action-icon"
                              data-icon="ant-design:delete-outlined"
                            ></span>
                          </button>
                        </div>
                        <?= $address["addressType"]
                          ? '<p class="primary">Primary</p>'
                          : "" ?>
                        <form method="post" id="deleteForm">
                          <input type="hidden" name="addressID" value="<?= $address[
                            "addressID"
                          ] ?>">
                          <input type="hidden" name="firstName" value="<?= $address[
                            "firstName"
                          ] ?>">
                          <input type="hidden" name="lastName" value="<?= $address[
                            "lastName"
                          ] ?>">
                          <input type="hidden" name="address1" value="<?= $address[
                            "address1"
                          ] ?>">
                          <input type="hidden" name="address2" value="<?= $address[
                            "address2"
                          ] ?>">
                          <input type="hidden" name="city" value="<?= $address[
                            "city"
                          ] ?>">
                          <input type="hidden" name="postalCode" value="<?= $address[
                            "postalCode"
                          ] ?>">
                          <input type="hidden" name="region" value="<?= $address[
                            "region"
                          ] ?>">
                          <input type="hidden" name="country" value="<?= $address[
                            "country"
                          ] ?>">
                          <input type="hidden" name="phoneNumber" value="<?= $address[
                            "phoneNumber"
                          ] ?>">
                          <input type="hidden" name="addressType" value="<?= $address[
                            "addressType"
                          ] ?>">
                        </form>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="form">
                    <form method="post" id="addAddressForm" style="display:none">
                      <input type="hidden" name="addressID" value="<?= rand() ?>" form="addAddressForm">
                      <input type="hidden" name="acctID" value="<?= $user[
                        "ID"
                      ] ?>" form="addAddressForm">
                      <div class="input-group">
                        <div class="input-field">
                          <input
                            type="text"
                            name="addFirstName"
                            placeholder=" "
                            class="input"
                            form="addAddressForm"
                          />
                          <label class="form-label">First Name</label>
                        </div>
                        <div class="input-field">
                          <input
                            type="text"
                            name="addLastName"
                            placeholder=" "
                            class="input"
                            form="addAddressForm"
                          />
                          <label class="form-label">Last Name</label>
                        </div>
                      </div>
                      <div class="input-field">
                        <input
                          type="text"
                          name="addAddress1"
                          placeholder=" "
                          class="input input-full"
                          form="addAddressForm"
                        />
                        <label class="form-label">House Number, Street Address</label>
                      </div>
                      <div class="input-field">
                        <input
                          type="text"
                          name="addAddress2"
                          placeholder=" "
                          class="input input-full"
                          form="addAddressForm"
                        />
                        <label class="form-label">Apartment, suite, etc. (optional)</label>
                      </div>
                      <div class="input-group">
                        <div class="input-field">
                          <input
                            type="text"
                            name="addCity"
                            placeholder=" "
                            class="input left-input"
                            form="addAddressForm"
                          />
                          <label class="form-label">City</label>
                        </div>
                        <div class="input-field">
                          <input
                            type="text"
                            name="addPostalCode"
                            placeholder=" "
                            class="input"
                            form="addAddressForm"
                          />
                          <label class="form-label">Postal Code</label>
                        </div>
                      </div>
                      <div class="input-field custom-select">
                        <select
                          class="input input-full select-menu"
                          name="addRegion"
                          form="addAddressForm"
                        >
                          <option selected disabled>Region</option>
                          <?php foreach ($regions as $region) { ?>
                            <option value="<?= $region["name"] ?>"><?= $region[
  "name"
] ?></option>
                          <?php } ?>
                        </select>
                        <span
                          class="iconify dropdown"
                          data-icon="ls:dropdown"
                          data-inline="false"
                        ></span>
                      </div>
                      <div class="input-field custom-select">
                        <select
                          class="input input-full select-menu"
                          name="addCountry"
                          form="addAddressForm"
                        >
                          <option selected disabled>Country</option>
                          <option value="Philippines">Philippines</option>
                        </select>
                        <span
                          class="iconify dropdown"
                          data-icon="ls:dropdown"
                          data-inline="false"
                        ></span>
                      </div>
                      <div class="input-field">
                        <input
                          type="text"
                          name="addPhoneNumber"
                          placeholder=" "
                          class="input input-full"
                          form="addAddressForm"
                        />
                        <label class="form-label">Phone Number</label>
                      </div>
                      <div class="inputfield custom-checkbox">
                        <input type="checkbox" name="addPrimaryAddress" class="checkbox" value="primary address" form="addAddressForm"/>
                        <label>Set as primary address</label>
                      </div>
                      <div class="button-container">
                        <button
                          type="button"
                          id="cancel-btn"
                          class="btn outline-primary-btn cancel-form"
                        >
                          Cancel
                        </button>
                        <button type="submit" name="addNewAddresses" class="btn primary-btn update-btn" style="box-shadow:none" form="addAddressForm">
                          Add Address
                        </button>
                      </div>
                    </form>
                  </div>
                  <div class="form">
                    <form method="post" id="editAddressForm" style="display:none;">
                      <input type="hidden" name="editAcctID" value="<?= $user[
                        "ID"
                      ] ?>" form="editAddressForm">
                      <input type="hidden" name="editAddressID" id="addressID" form="editAddressForm">
                      <input
                        type="hidden"
                        name="editFirstName"
                        id="firstName"
                        form="editAddressForm"
                      />
                      <input
                        type="hidden"
                        name="editLastName"
                        id="lastName"
                        form="editAddressForm"
                      />
                      <input
                        type="hidden"
                        name="hiddenAddress1"
                        id="editAddress1"
                        form="editAddressForm"
                      />
                      <input
                        type="hidden"
                        name="hiddenAddress2"
                        id="editAddress2"
                        form="editAddressForm"
                      />
                      <input
                        type="hidden"
                        name="hiddenCity"
                        id="editCity"
                        form="editAddressForm"
                      />
                      <input
                        type="hidden"
                        name="hiddenPostalCode"
                        id="editPostalCode"
                        form="editAddressForm"
                      />
                      <input
                        type="hidden"
                        name="hiddenRegion"
                        id="editRegion"
                        form="editAddressForm"
                      />
                      <input
                        type="hidden"
                        name="hiddenCountry"
                        id="editCountry"
                        form="editAddressForm"
                      />
                      <input
                        type="hidden"
                        name="hiddenPhoneNumber"
                        id="editPhoneNumber"
                        form="editAddressForm"
                      />
                      <input
                        type="hidden"
                        name="hiddenAddressType"
                        id="editAddressType"
                        form="editAddressForm"
                      />
                      <div class="input-group">
                        <div class="input-field">
                          <input
                            type="text"
                            name="editFName"
                            id="fName"
                            placeholder=" "
                            class="input"
                            form="editAddressForm"
                          />
                          <label class="form-label">First Name</label>
                        </div>
                        <div class="input-field">
                          <input
                            type="text"
                            name="editLName"
                            id="lName"
                            placeholder=" "
                            class="input"
                            form="editAddressForm"
                          />
                          <label class="form-label">Last Name</label>
                        </div>
                      </div>
                      <div class="input-field">
                        <input
                          type="text"
                          name="editAddress1"
                          id="address1"
                          placeholder=" "
                          class="input input-full"
                          form="editAddressForm"
                        />
                        <label class="form-label">House Number, Street Address</label>
                      </div>
                      <div class="input-field">
                        <input
                          type="text"
                          name="editAddress2"
                          id="address2"
                          placeholder=" "
                          class="input input-full"
                          form="editAddressForm"
                        />
                        <label class="form-label">Apartment, suite, etc. (optional)</label>
                      </div>
                      <div class="input-group">
                        <div class="input-field">
                          <input
                            type="text"
                            name="editCity"
                            id="city"
                            placeholder=" "
                            class="input"
                            form="editAddressForm"
                          />
                          <label class="form-label">City</label>
                        </div>
                        <div class="input-field">
                          <input
                            type="text"
                            name="editPostalCode"
                            id="postalCode"
                            placeholder=" "
                            class="input"
                            form="editAddressForm"
                          />
                          <label class="form-label">Postal Code</label>
                        </div>
                      </div>
                      <div class="input-field custom-select">
                        <select
                          class="input input-full select-menu"
                          name="editRegion"
                          id="region"
                          form="editAddressForm"
                        >
                          <option selected disabled>Region</option>
                          <?php foreach ($regions as $region) { ?>
                            <option value="<?= $region["name"] ?>"><?= $region[
  "name"
] ?></option>
                          <?php } ?>
                        </select>
                        <span
                          class="iconify dropdown"
                          data-icon="ls:dropdown"
                          data-inline="false"
                        ></span>
                      </div>
                      <div class="input-field custom-select">
                        <select
                          class="input input-full select-menu"
                          name="editCountry"
                          id="country"
                          form="editAddressForm"
                        >
                          <option selected disabled>Country</option>
                          <option value="Philippines">Philippines</option>
                        </select>
                        <span
                          class="iconify dropdown"
                          data-icon="ls:dropdown"
                          data-inline="false"
                        ></span>
                      </div>
                      <div class="input-field">
                        <input
                          type="text"
                          name="editPhoneNumber"
                          id="phoneNumber"
                          placeholder=" "
                          class="input input-full"
                          form="editAddressForm"
                        />
                        <label class="form-label">Phone Number</label>
                      </div>
                      <div class="inputfield custom-checkbox">
                        <input type="checkbox" name="editPrimaryAddress" id="primaryAddress" class="checkbox" value="primary address" form="editAddressForm"/>
                        <label>Set as primary address</label>
                      </div>
                      <div class="button-container">
                        <button
                          type="button"
                          id="close-btn"
                          class="btn outline-primary-btn cancel-form"
                        >
                          Cancel
                        </button>
                        <button type="submit" name="updateAddresses" class="btn primary-btn update-btn" style="box-shadow:none" form="editAddressForm">
                          Save Changes
                        </button>
                      </div>
                    </form>          
                  </div>
                <?php } else { ?>
                  <div class="no-data">
                    <img src="./assets/img/no-data.svg" alt="No Data">
                    <h4>No Data Available</h4>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </section>
      </main>
      <!-- end of addresses section -->
      <?php require_once "../includes/footer.php"; ?>
    </div>
    <?php require_once "../includes/scripts.php"; ?>
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
    <script src="./assets/js/addresses.js"></script>
    <script src="./assets/js/avatar.js"></script>
    <script>
      const editBtn = document.querySelectorAll(".edit-address");
      const delBtn = document.querySelectorAll(".delete-address");
      const closeBtn = document.querySelector("#close-btn");
      
      if (delBtn) {
        delBtn.forEach((del) => {
          del.addEventListener("click", () => {
            Swal.fire({
              title: "Are you sure you want to delete your address?",
              icon: "warning",
              showCancelButton: true,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
              cancelButtonText: "No",
              confirmButtonText: "Yes",
            }).then((result) => {
              if (result.isConfirmed) {
                Swal.fire({
                  title: "Deleted",
                  icon: "success",
                  showConfirmButton: false,
                });
                setTimeout(function () {
                  document.querySelector("#deleteForm").submit();
                }, 1000);
              }
            });
          });
        });
      }

      if (editBtn) {
        editBtn.forEach((edit) => {
          edit.addEventListener("click", () => {
            document.querySelector('#editAddressForm').style.display="block";
            document.querySelector('#addAddressForm').style.display="none";
          });
        });
      }
      if(closeBtn){
        closeBtn.addEventListener('click', () => {
          document.querySelector('#editAddressForm').style.display="none";
        })
      }
    </script>
    <script>
      const addBtn = document.querySelector('#add-address');
      const cancelBtn = document.querySelector('#cancel-btn');
      if(addBtn){
        addBtn.addEventListener('click', () => {
          document.querySelector('#addAddressForm').style.display="block";
          document.querySelector('#editAddressForm').style.display="none";
        })
      }
      if(cancelBtn){
        cancelBtn.addEventListener('click', () => {
          document.querySelector('#addAddressForm').style.display="none";
        })
      }
    </script>
  </body>
</html>
