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
      <?php
      include_once "../includes/navbar.php";
      $store->subscribe();
      ?>
      <!-- start of addresses section -->
      <main>
        <section id="profile">
          <div class="banner">Addresses</div>
          <div class="container">
            <div class="profile-wrapper">
              <?php include_once "../includes/profilesummary.php"; ?>
              <div class="customer-details">
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
                      <div class="input-field">
                        <input
                          type="text"
                          name="addFirstName"
                          placeholder="First Name"
                          class="input left-input"
                          form="addAddressForm"
                        />
                        <input
                          type="text"
                          name="addLastName"
                          placeholder="Last Name"
                          class="input"
                          form="addAddressForm"
                        />
                      </div>
                      <div class="input-field">
                        <input
                          type="text"
                          name="addAddress1"
                          placeholder="House Number, Street Address"
                          class="input input-full"
                          form="addAddressForm"
                        />
                      </div>
                      <div class="input-field">
                        <input
                          type="text"
                          name="addAddress2"
                          placeholder="Apartment, suite, etc. (optional)"
                          class="input input-full"
                          form="addAddressForm"
                        />
                      </div>
                      <div class="input-field">
                        <input
                          type="text"
                          name="addCity"
                          placeholder="City"
                          class="input left-input"
                          form="addAddressForm"
                        />
                        <input
                          type="text"
                          name="addPostalCode"
                          placeholder="Postal Code"
                          class="input"
                          form="addAddressForm"
                        />
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
                          placeholder="Phone Number"
                          class="input input-full"
                          form="addAddressForm"
                        />
                      </div>
                      <div class="inputfield custom-checkbox">
                        <input type="checkbox" name="addPrimaryAddress" class="checkbox" value="primary address" form="addAddressForm"/>
                        <label>Set as primary address</label>
                      </div>
                      <div class="button-container">
                        <button
                          type="button"
                          id="cancel-btn"
                          class="btn outline-primary-btn"
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
                    <form method="post" id="editAddressForm" style="display:none">
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

                      <div class="input-field">
                        <input
                          type="text"
                          name="editFName"
                          id="fName"
                          placeholder="First Name"
                          class="input left-input"
                          form="editAddressForm"
                        />
                        <input
                          type="text"
                          name="editLName"
                          id="lName"
                          placeholder="Last Name"
                          class="input"
                          form="editAddressForm"
                        />
                      </div>
                      <div class="input-field">
                        <input
                          type="text"
                          name="editAddress1"
                          id="address1"
                          placeholder="House Number, Street Address"
                          class="input input-full"
                          form="editAddressForm"
                        />
                      </div>
                      <div class="input-field">
                        <input
                          type="text"
                          name="editAddress2"
                          id="address2"
                          placeholder="Apartment, suite, etc. (optional)"
                          class="input input-full"
                          form="editAddressForm"
                        />
                      </div>
                      <div class="input-field">
                        <input
                          type="text"
                          name="editCity"
                          id="city"
                          placeholder="City"
                          class="input left-input"
                          form="editAddressForm"
                        />
                        <input
                          type="text"
                          name="editPostalCode"
                          id="postalCode"
                          placeholder="Postal Code"
                          class="input"
                          form="editAddressForm"
                        />
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
                          placeholder="Phone Number"
                          class="input input-full"
                          form="editAddressForm"
                        />
                      </div>
                      <div class="inputfield custom-checkbox">
                        <input type="checkbox" name="editPrimaryAddress" id="primaryAddress" class="checkbox" value="primary address" form="editAddressForm"/>
                        <label>Set as primary address</label>
                      </div>
                      <div class="button-container">
                        <button
                          type="button"
                          id="close-btn"
                          class="btn outline-primary-btn"
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
    <script src="./assets/js/header.js"></script>
    <script src="./assets/js/user.js"></script>
    <script src="./assets/js/cart.js"></script>
    <script src="./assets/js/addresses.js"></script>
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
