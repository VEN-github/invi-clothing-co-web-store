const colorVar=document.querySelectorAll(".var-gallery span"),colorTxt=document.querySelector("#color-txt");if(colorVar){colorVar.forEach(t=>{t.addEventListener("click",()=>{document.querySelector("#color-container").style.display="block",colorTxt.textContent=t.getAttribute("data-variant"),document.querySelector("#productColor").value=t.getAttribute("data-variant"),document.querySelector("#productImg").src="./assets/img/"+t.getAttribute("data-variantImg"),document.querySelector("#productImg").alt=t.getAttribute("data-variantImg")})});const a=document.querySelector("#sizeOpt");for(let e=0;e<colorVar.length;e++)colorVar[e].addEventListener("click",()=>{if(a){max_value(),document.querySelector(".product-size").style.display="block",document.querySelector(".product-quantity").style.display="none",document.querySelector(".add-cart").style.display="none",a.options[0].selected=!0;for(let t=1;t<a.options.length;t++)colorVar[e].getAttribute("data-varID")==colorVar[e].childNodes[3].childNodes[t-1].getAttribute("data-variantID")&&(a.options[t].value=colorVar[e].childNodes[3].childNodes[t-1].getAttribute("data-stockID"),a.options[t].dataset.stock=colorVar[e].childNodes[3].childNodes[t-1].getAttribute("data-stocks"))}else document.querySelector("#qty-no-size").style.display="block",document.querySelector("#quantity").value=1,colorVar[e].getAttribute("data-varID")==colorVar[e].childNodes[3].childNodes[0].getAttribute("data-variantID")&&""===colorVar[e].childNodes[3].childNodes[0].getAttribute("data-size")&&(document.querySelector("#quantity").max=colorVar[e].childNodes[3].childNodes[0].getAttribute("data-stocks"),document.querySelector("#stockID").value=colorVar[e].childNodes[3].childNodes[0].getAttribute("data-stockID"),max_value())})}function max_value(){const t=document.querySelector(".minus-btn"),e=document.querySelector(".plus-btn");var o;t&&(t.setAttribute("disabled","disabled"),t.style.cursor="not-allowed",0==(o=document.querySelector("#quantity").max)?(e.setAttribute("disabled","disabled"),e.style.cursor="not-allowed",document.querySelector("#disabled-btn").style.display="block",document.querySelector("#cart-btn").style.display="none"):(1==o?(e.setAttribute("disabled","disabled"),e.style.cursor="not-allowed"):(e.removeAttribute("disabled"),e.classList.remove("disabled"),e.style.cursor="pointer"),document.querySelector("#disabled-btn").style.display="none",document.querySelector("#cart-btn").style.display="flex"))}