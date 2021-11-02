const addressForm = document.querySelector("#addresses");
const editAdd = document.querySelectorAll(".edit-address");

if (addressForm) {
  addressForm.addEventListener("change", () => {
    const addressID =
      addressForm.options[addressForm.selectedIndex].dataset.addressid;
    const fname = addressForm.options[addressForm.selectedIndex].dataset.fname;
    const lname = addressForm.options[addressForm.selectedIndex].dataset.lname;
    const address1 =
      addressForm.options[addressForm.selectedIndex].dataset.address1;
    const address2 =
      addressForm.options[addressForm.selectedIndex].dataset.address2;
    const city = addressForm.options[addressForm.selectedIndex].dataset.city;
    const zip = addressForm.options[addressForm.selectedIndex].dataset.zip;
    const region =
      addressForm.options[addressForm.selectedIndex].dataset.region;
    const country =
      addressForm.options[addressForm.selectedIndex].dataset.country;
    const phone = addressForm.options[addressForm.selectedIndex].dataset.phone;
    const primary =
      addressForm.options[addressForm.selectedIndex].dataset.primary;

    document.querySelector("#addressID").value = addressID;
    document.querySelector("#firstName").value = fname;
    document.querySelector("#lastName").value = lname;
    document.querySelector("#address1").value = address1;
    document.querySelector("#address2").value = address2;
    document.querySelector("#city").value = city;
    document.querySelector("#postalCode").value = zip;
    const regionOpt = document.querySelector("#region");
    setRegionValue(regionOpt, region);
    const countryOpt = document.querySelector("#country");
    setCountryValue(countryOpt, country);
    document.querySelector("#phoneNumber").value = phone;
    if (primary) {
      document.querySelector("#primaryAddress").checked = true;
    } else {
      document.querySelector("#primaryAddress").checked = false;
    }
  });
}
if (editAdd) {
  editAdd.forEach((edit) => {
    edit.addEventListener("click", () => {
      const addressID = edit.getAttribute("data-addressid");
      const fname = edit.getAttribute("data-fname");
      const lname = edit.getAttribute("data-lname");
      const address1 = edit.getAttribute("data-address1");
      const address2 = edit.getAttribute("data-address2");
      const city = edit.getAttribute("data-city");
      const zip = edit.getAttribute("data-zip");
      const region = edit.getAttribute("data-region");
      const country = edit.getAttribute("data-country");
      const phone = edit.getAttribute("data-phone");
      const primary = edit.getAttribute("data-primary");

      document.querySelector("#addressID").value = addressID;
      document.querySelector("#firstName").value = fname;
      document.querySelector("#lastName").value = lname;
      document.querySelector("#editAddress1").value = address1;
      document.querySelector("#editAddress2").value = address2;
      document.querySelector("#editCity").value = city;
      document.querySelector("#editPostalCode").value = zip;
      document.querySelector("#editRegion").value = region;
      document.querySelector("#editCountry").value = country;
      document.querySelector("#editPhoneNumber").value = phone;
      document.querySelector("#editAddressType").value = primary;
      document.querySelector("#fName").value = fname;
      document.querySelector("#lName").value = lname;
      document.querySelector("#address1").value = address1;
      document.querySelector("#address2").value = address2;
      document.querySelector("#city").value = city;
      document.querySelector("#postalCode").value = zip;
      const regionOpt = document.querySelector("#region");
      setRegionValue(regionOpt, region);
      const countryOpt = document.querySelector("#country");
      setCountryValue(countryOpt, country);
      document.querySelector("#phoneNumber").value = phone;
      if (primary) {
        document.querySelector("#primaryAddress").checked = true;
      } else {
        document.querySelector("#primaryAddress").checked = false;
      }
    });
  });
}

function setRegionValue(regionOption, regionValue) {
  for (let i = 0; i < regionOption.options.length; i++) {
    if (regionOption.options[i].value == regionValue) {
      regionOption.options[i].selected = true;
      return;
    }
  }
}
function setCountryValue(countryOption, countryValue) {
  for (let i = 0; i < countryOption.options.length; i++) {
    if (countryOption.options[i].value == countryValue) {
      countryOption.options[i].selected = true;
      return;
    }
  }
}
