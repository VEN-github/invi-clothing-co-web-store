const selectForm=document.querySelector(".rawMaterialForm"),form=document.querySelector(".rawForm");function computeTotalCost(e){var t=parseInt(e.parentNode.previousElementSibling.children[1].value),o=parseInt(e.max),l=parseInt(e.value);let a=t;isNaN(l)||(l<=o?a=t*l:(Swal.fire({icon:"error",text:"Please select a value that is no more than "+o}),e.value=1)),e.parentNode.nextElementSibling.children[1].value=a,totals()}function removeMaterial(e){if(e.parentNode.parentNode.remove(),selectForm.selectedIndex=0,form.children[2].classList.contains("labor-fee")){const t=document.querySelector(".labor-fee");t.style.display="none";const o=document.querySelector(".layout-fee");o.style.display="none";const l=document.querySelector(".expense-fee");l.style.display="none";const a=document.querySelector(".total");a.style.display="none";const n=document.querySelectorAll(".hr");n.forEach(e=>{e.style.display="none"}),document.querySelector("#laborFee").value="",document.querySelector("#layoutFee").value="",document.querySelector("#expenseFee").value="",document.querySelector("#laborFeeQty").value=1,document.querySelector("#layoutFeeQty").value=1,document.querySelector("#expenseFeeQty").value=1,laborFeeQtyContainer=document.querySelector(".laborFeeQty"),laborFeeQtyContainer.style.display="none",laborFeeTotalCostContainer=document.querySelector(".laborFeeTotalCost"),laborFeeTotalCostContainer.style.display="none",layoutFeeQtyContainer=document.querySelector(".layoutFeeQty"),layoutFeeQtyContainer.style.display="none",layoutFeeTotalCostContainer=document.querySelector(".layoutFeeTotalCost"),layoutFeeTotalCostContainer.style.display="none",expenseFeeQtyContainer=document.querySelector(".expenseFeeQty"),expenseFeeQtyContainer.style.display="none",expenseFeeTotalCostContainer=document.querySelector(".expenseFeeTotalCost"),expenseFeeTotalCostContainer.style.display="none",document.querySelector("#costPrice").value="",document.querySelector("#totalCost").value="",document.querySelector("#sales").value="",document.querySelector("#salesDisc").value="",document.querySelector("#netSales").value="",document.querySelector("#cogs").value="",document.querySelector("#grossProfit").value="",document.querySelector("#expenses").value="",document.querySelector("#netIncome").value="",document.querySelector("#salesResult").textContent=""}totals()}selectForm&&selectForm.addEventListener("change",()=>{const e=document.querySelector(".labor-fee");e.style.display="flex";const t=document.querySelector(".layout-fee");t.style.display="flex";const o=document.querySelector(".expense-fee");o.style.display="flex";const l=document.querySelector(".total");l.style.display="flex";const a=document.querySelectorAll(".hr");a.forEach(e=>{e.style.display="block"});var n=selectForm.options[selectForm.selectedIndex].value,r=selectForm.options[selectForm.selectedIndex].text,s=selectForm.options[selectForm.selectedIndex].dataset.price,u=selectForm.options[selectForm.selectedIndex].dataset.qty;const c=document.createElement("div");c.className="row rawMaterialContainer";const d=document.createElement("div");d.className="form-group col-lg-3";const y=document.createElement("div");y.className="form-group col-lg-2";const i=document.createElement("div");i.className="form-group col-lg-2";const m=document.createElement("div");m.className="form-group col-lg-2";const p=document.createElement("div");p.className="d-flex align-items-center col-lg-2";const F=document.createElement("label");F.innerText="Raw Material";const v=document.createElement("label");v.innerText="Unit Price";const C=document.createElement("label");C.innerText="Quantity";const b=document.createElement("label");b.innerText="Total Cost";const S=document.createElement("input");S.setAttribute("type","hidden"),S.setAttribute("name","materialID[]"),S.setAttribute("value",n);const q=document.createElement("input");q.className="form-control",q.setAttribute("disabled",!0),q.setAttribute("value",r);const x=document.createElement("input");x.className="form-control",x.setAttribute("disabled",!0),x.setAttribute("name","unitPrice[]"),x.setAttribute("value",s);const h=document.createElement("input");h.className="form-control",h.setAttribute("type","number"),h.setAttribute("name","qty[]"),h.setAttribute("max",u),h.setAttribute("min","1"),h.setAttribute("value","1"),h.setAttribute("onchange","computeTotalCost(this)"),h.setAttribute("oninput","computeTotalCost(this)");const Q=document.createElement("input");Q.className="form-control",Q.setAttribute("disabled",!0),Q.setAttribute("name","totalCost[]"),Q.setAttribute("value",s);const I=document.createElement("button");I.className="deleteBtn btn btn-danger btn-sm btn-block",I.setAttribute("type","button"),I.setAttribute("onclick","removeMaterial(this)");const N=document.createElement("i");N.className="fas fa-trash",d.appendChild(F),d.appendChild(S),d.appendChild(q),y.appendChild(v),y.appendChild(x),i.appendChild(C),i.appendChild(h),m.appendChild(b),m.appendChild(Q),p.appendChild(I),I.appendChild(N),c.appendChild(d),c.appendChild(y),c.appendChild(i),c.appendChild(m),c.appendChild(p),form.insertBefore(c,form.children[1]),totals()});let laborFee=document.querySelector("#laborFee"),laborFeeQty=document.querySelector("#laborFeeQty");{function handler(){var e=parseInt(laborFee.value),t=parseInt(laborFeeQty.value);isNaN(t)||(document.querySelector("#laborFeeTotalCost").value=e*t),totals()}laborFee&&laborFeeQty&&(laborFee.addEventListener("input",()=>{laborFeeQtyContainer=document.querySelector(".laborFeeQty"),laborFeeQtyContainer.style.display="block",laborFeeTotalCostContainer=document.querySelector(".laborFeeTotalCost"),laborFeeTotalCostContainer.style.display="block";var e=parseInt(laborFee.value),t=parseInt(laborFeeQty.value);isNaN(e)?document.querySelector("#laborFeeTotalCost").value="":0!=laborFee.value?document.querySelector("#laborFeeTotalCost").value=e*t:(laborFeeQty.value=0,document.querySelector("#laborFeeTotalCost").value=0),totals()}),laborFeeQty.addEventListener("change",handler,!1),laborFeeQty.addEventListener("input",handler,!1))}let layoutFee=document.querySelector("#layoutFee"),layoutFeeQty=document.querySelector("#layoutFeeQty");{function handler(){let e=parseInt(layoutFee.value),t=parseInt(layoutFeeQty.value);isNaN(t)||(document.querySelector("#layoutFeeTotalCost").value=e*t),totals()}layoutFee&&layoutFeeQty&&(layoutFee.addEventListener("input",()=>{layoutFeeQtyContainer=document.querySelector(".layoutFeeQty"),layoutFeeQtyContainer.style.display="block",layoutFeeTotalCostContainer=document.querySelector(".layoutFeeTotalCost"),layoutFeeTotalCostContainer.style.display="block";var e=parseInt(layoutFee.value),t=parseInt(layoutFeeQty.value);isNaN(e)?document.querySelector("#layoutFeeTotalCost").value="":0!=layoutFee.value?document.querySelector("#layoutFeeTotalCost").value=e*t:(layoutFeeQty.value=0,document.querySelector("#layoutFeeTotalCost").value=0),totals()}),layoutFeeQty.addEventListener("change",handler,!1),layoutFeeQty.addEventListener("input",handler,!1))}let expenseFee=document.querySelector("#expenseFee"),expenseFeeQty=document.querySelector("#expenseFeeQty");{function handler(){let e=parseInt(expenseFee.value),t=parseInt(expenseFeeQty.value);isNaN(t)||(document.querySelector("#expenseFeeTotalCost").value=e*t),totals()}expenseFee&&expenseFeeQty&&(expenseFee.addEventListener("input",()=>{expenseFeeQtyContainer=document.querySelector(".expenseFeeQty"),expenseFeeQtyContainer.style.display="block",expenseFeeTotalCostContainer=document.querySelector(".expenseFeeTotalCost"),expenseFeeTotalCostContainer.style.display="block";var e=parseInt(expenseFee.value),t=parseInt(expenseFeeQty.value);isNaN(e)?document.querySelector("#expenseFeeTotalCost").value="":0!=expenseFee.value?document.querySelector("#expenseFeeTotalCost").value=e*t:(expenseFeeQty.value=0,document.querySelector("#expenseFeeTotalCost").value=0),totals()}),expenseFeeQty.addEventListener("change",handler,!1),expenseFeeQty.addEventListener("input",handler,!1))}function totals(){var t=document.getElementsByName("unitPrice[]");let o=0;var e=document.querySelector("#laborFee"),l=document.querySelector("#layoutFee"),a=document.querySelector("#expenseFee");let n=document.querySelector("#costPrice");var r=parseInt(e.value),s=parseInt(l.value),u=parseInt(a.value),c=document.getElementsByName("totalCost[]");let d=0;e=document.querySelector("#laborFeeTotalCost"),l=document.querySelector("#layoutFeeTotalCost"),a=document.querySelector("#expenseFeeTotalCost"),e=parseInt(e.value),l=parseInt(l.value),a=parseInt(a.value);if(!isNaN(r)&&!isNaN(s)&&!isNaN(u)){for(let e=0;e<t.length;e++)o+=parseInt(t[e].value),d+=parseInt(c[e].value);n.value=r+s+u+o,document.querySelector("#cogs").value=n.value,document.querySelector("#totalCost").value=e+l+a+d}salesIncome()}const sales=document.querySelector("#sales"),salesDisc=document.querySelector("#salesDisc"),expenses=document.querySelector("#expenses");{function salesIncome(){var e=parseInt(sales.value),t=parseInt(salesDisc.value),o=parseInt(expenses.value);if(!isNaN(e)&&!isNaN(t)){const a=document.querySelector("#netSales");var l=document.querySelector("#cogs");const n=document.querySelector("#grossProfit");a.value=e-t;t=parseInt(a.value),l=parseInt(l.value);n.value=t-l,isNaN(o)||(l=parseInt(n.value),document.querySelector("#netIncome").value=l-o,parseInt(document.querySelector("#netIncome").value)<0?document.querySelector("#salesResult").innerText="Loss":document.querySelector("#salesResult").innerText="Income")}}sales&&salesDisc&&expenses&&(sales.addEventListener("input",salesIncome,!1),salesDisc.addEventListener("input",salesIncome,!1),expenses.addEventListener("input",salesIncome,!1))}