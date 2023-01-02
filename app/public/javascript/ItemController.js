function addItem() {
    //get the div class itemlist
    const divItemList = document.getElementById('itemList');

    //create a div with card  
    const divCard = document.createElement('div');
    divCard.insertAdjacentText('beforeend', ', Kiwi, Melon');

    divItemList.appendChild(divCard);
}

function addItem2(itemName) {
    //get the div class itemlist
    const divItemList = document.getElementById('itemList');




    //create a div with card  
    const divCard = document.createElement('div');
    const divCardBody = document.createElement('div');
    divCard.className = "card";
    divCardBody.className = "card-body";

    //place the image inside the itemlist card
    var img = document.createElement("img");
    img.src = src;
    divCard.appendChild(img);

    //place the name of the item in the card body

    const div = document.createElement('div');


    const textarea = document.getElementById('todoText');
    const textNode = document.createTextNode(textarea.value);

    div.appendChild(textNode);


    divCard.appendChild(divCardBody);

    divItemList.appendChild(divCard);

}