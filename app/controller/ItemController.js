function addItem(src, itemRowName) {
    //get the div class itemlist
    const divItemList = document.getElementById('itemList');

    


    //create a div with card  
    const divCard = document.createElement('div');
    const divCardBody = document.createElement('div');
    div1.className = 'card shadow-sm';
    div2.className = 'card-body';

    //place the image inside the itemlist card
    var img = document.createElement("img");
    img.src = src;
    divCard.appendChild(img);

    //place the name of the item in the card body
    const itemName = document.createElement('h5');
    const textNode = document.createTextNode(itemRowName);
    itemName.appendChild(textNode);

    divItemList.appendChild(itemName);
}