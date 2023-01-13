

function getAllBid($test) {
    fetch("http://localhost/api/bid")
        .then(res => res.json())
        .then((bids) => {
            console.log('output:', bids);
            bids.forEach(bid => {
                //create a card for all the information
                const bodytable = document.getElementById("bidBodyId");

                //create a table row
                const tableRow = document.createElement("tr");

                //set the first collumn
                const firstCol = document.createElement("td");

                //set the name of the bid in the created row
                const name = document.createElement("td");
                name.innerHTML = bid.FirstName;

                //set the price of the bid in the created row
                const price = document.createElement("td");
                price.innerHTML = bid.Price;

                const date = document.createElement("td");
                date.innerHTML = bid.Date;


                tableRow.appendChild(firstCol);
                tableRow.appendChild(name);
                tableRow.appendChild(price);
                tableRow.appendChild(date);
                bodytable.appendChild(tableRow);
            });

        }).catch(err => console.error(err));
}

function test(){
    window.alert("Item has been sold to the selected user \n The item will now be removed from ur profile");
};