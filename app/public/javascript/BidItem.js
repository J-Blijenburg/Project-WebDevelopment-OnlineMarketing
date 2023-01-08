// function BidOnItem(){
//     const currentBody = document.getElementById('bidBodyId');
    
//     const newRow = document.getElementById('test');

//     const firstCol = document.createElement('th');
//     const secondCol = document.createElement('td');
//     const thirdCol = document.createElement('td');
//     const fourthCol = document.createElement('td');

//     const sellButton = document.getElementById('sellButtonId');

//     newRow.appendChild(firstCol);
//     currentBody.appendChild(newRow);




// }
var items = 0;
function BidOnItem(){
    items++;
    var html = "<tr>";
        html += "<td>" + items + "</td>";
        html += "<td><input name='itemName[]'></td>";
        html += "<td><input name='itemQuality[]'></td>";

        html =+ "</tr>";

            document.getElementById("bidBodyId").insertRow().innerHTML = html;
}