const table = document.querySelector(".table");

if (table) {
  let headerCell = null;
  let headerCell1 = null;
  let headerCell4 = null;
  let headerCell5 = null;
  let headerCell6 = null;
  let headerCell7 = null;
  let headerCell8 = null;
  let headerCell9 = null;
  let headerCell10 = null;

  for (let row of table.rows) {
    const cell = row.cells[0];
    const cell1 = row.cells[1];
    const cell4 = row.cells[4];
    const cell5 = row.cells[5];
    const cell6 = row.cells[6];
    const cell7 = row.cells[7];
    const cell8 = row.cells[8];
    const cell9 = row.cells[9];
    const cell10 = row.cells[10];

    if (headerCell === null || cell.innerText !== headerCell.innerText) {
      headerCell = cell;
      headerCell1 = cell1;
      headerCell4 = cell4;
      headerCell5 = cell5;
      headerCell6 = cell6;
      headerCell7 = cell7;
      headerCell8 = cell8;
      headerCell9 = cell9;
      headerCell10 = cell10;
    } else {
      headerCell.rowSpan++;
      headerCell1.rowSpan++;
      headerCell4.rowSpan++;
      headerCell5.rowSpan++;
      headerCell6.rowSpan++;
      headerCell7.rowSpan++;
      headerCell8.rowSpan++;
      headerCell9.rowSpan++;
      headerCell10.rowSpan++;
      cell.remove();
      cell1.remove();
      cell4.remove();
      cell5.remove();
      cell6.remove();
      cell7.remove();
      cell8.remove();
      cell9.remove();
      cell10.remove();
    }
  }
}
