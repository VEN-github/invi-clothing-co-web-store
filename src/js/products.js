const table = document.querySelector("#table");

if (table) {
  let headerCell = null;
  let headerCell1 = null;
  let headerCell2 = null;
  let headerCell3 = null;
  let headerCell4 = null;
  let headerCell5 = null;
  let headerCell10 = null;
  let headerCell11 = null;

  for (let row of table.rows) {
    const cell = row.cells[0];
    const cell1 = row.cells[1];
    const cell2 = row.cells[2];
    const cell3 = row.cells[3];
    const cell4 = row.cells[4];
    const cell5 = row.cells[5];
    const cell10 = row.cells[11];
    const cell11 = row.cells[12];

    if (headerCell === null || cell.innerText !== headerCell.innerText) {
      headerCell = cell;
      headerCell1 = cell1;
      headerCell2 = cell2;
      headerCell3 = cell3;
      headerCell4 = cell4;
      headerCell5 = cell5;
      headerCell10 = cell10;
      headerCell11 = cell11;
    } else {
      headerCell.rowSpan++;
      headerCell1.rowSpan++;
      headerCell2.rowSpan++;
      headerCell3.rowSpan++;
      headerCell4.rowSpan++;
      headerCell5.rowSpan++;
      headerCell10.rowSpan++;
      headerCell11.rowSpan++;
      cell.remove();
      cell1.remove();
      cell2.remove();
      cell3.remove();
      cell4.remove();
      cell5.remove();
      cell10.remove();
      cell11.remove();
    }
  }
}
