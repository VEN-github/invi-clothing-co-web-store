const addressForm=document.querySelector("#addresses");function setRegionValue(d,s){for(let e=0;e<d.options.length;e++)if(d.options[e].value==s)return void(d.options[e].selected=!0)}function setCountryValue(d,s){for(let e=0;e<d.options.length;e++)if(d.options[e].value==s)return void(d.options[e].selected=!0)}addressForm&&addressForm.addEventListener("change",()=>{var e=addressForm.options[addressForm.selectedIndex].dataset.addressid,d=addressForm.options[addressForm.selectedIndex].dataset.fname,s=addressForm.options[addressForm.selectedIndex].dataset.lname,o=addressForm.options[addressForm.selectedIndex].dataset.address1,r=addressForm.options[addressForm.selectedIndex].dataset.address2,t=addressForm.options[addressForm.selectedIndex].dataset.city,a=addressForm.options[addressForm.selectedIndex].dataset.zip,n=addressForm.options[addressForm.selectedIndex].dataset.region,c=addressForm.options[addressForm.selectedIndex].dataset.country,u=addressForm.options[addressForm.selectedIndex].dataset.phone,l=addressForm.options[addressForm.selectedIndex].dataset.primary;document.querySelector("#addressID").value=e,document.querySelector("#firstName").value=d,document.querySelector("#lastName").value=s,document.querySelector("#address1").value=o,document.querySelector("#address2").value=r,document.querySelector("#city").value=t,document.querySelector("#postalCode").value=a,setRegionValue(document.querySelector("#region"),n),setCountryValue(document.querySelector("#country"),c),document.querySelector("#phoneNumber").value=u,document.querySelector("#primaryAddress").checked=!!l});