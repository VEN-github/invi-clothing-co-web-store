const checkout=document.querySelector("#checkout");checkout&&checkout.addEventListener("click",()=>{const e=document.querySelectorAll(".item-code"),o=document.querySelectorAll(".cart-items img"),t=document.querySelectorAll(".item-name"),c=document.querySelectorAll(".item-color"),l=document.querySelectorAll(".item-size"),n=document.querySelectorAll(".item-price p"),r=document.querySelectorAll(".quantity");var u=document.querySelector("#subtotal-price").textContent;e.forEach(e=>{console.log(e.value)}),o.forEach(e=>{console.log(e.src)}),t.forEach(e=>{console.log(e.textContent)}),c.forEach(e=>{console.log(e.textContent)}),l.forEach(e=>{console.log(e.textContent)}),n.forEach(e=>{console.log(e.textContent)}),r.forEach(e=>{console.log(e.value)}),console.log(u)});