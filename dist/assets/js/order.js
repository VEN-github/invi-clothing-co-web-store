const table=document.querySelector(".table");if(table){let a=null,c=null,t=null,u=null,w=null,S=null,v=null,b=null,f=null;for(let e of table.rows){const k=e.cells[0],l=e.cells[1],m=e.cells[4],n=e.cells[5],o=e.cells[6],p=e.cells[7],q=e.cells[8],r=e.cells[9],s=e.cells[10];null===a||k.innerText!==a.innerText?(a=k,c=l,t=m,u=n,w=o,S=p,v=q,b=r,f=s):(a.rowSpan++,c.rowSpan++,t.rowSpan++,u.rowSpan++,w.rowSpan++,S.rowSpan++,v.rowSpan++,b.rowSpan++,f.rowSpan++,k.remove(),l.remove(),m.remove(),n.remove(),o.remove(),p.remove(),q.remove(),r.remove(),s.remove())}}