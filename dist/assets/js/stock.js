const addSize=document.querySelector("#addSize"),closeSize=document.querySelector("#close");addSize&&addSize.addEventListener("click",()=>{document.querySelector("#sizeInfo").style.display="block",document.querySelector("#stockInfo").style.display="none";const e=document.querySelectorAll(".stocks");e.forEach(e=>{e.value=1}),document.querySelector("#noSize").value=1}),closeSize&&closeSize.addEventListener("click",()=>{document.querySelector("#sizeInfo").style.display="none",document.querySelector("#stockInfo").style.display="block";const e=document.querySelectorAll(".stocks");e.forEach(e=>{e.value=1}),document.querySelector("#noSize").value=""});