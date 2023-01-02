function addItem() {

    const div = document.createElement('div');
    const textarea = document.getElementById('todoText');
    const textNode = document.createTextNode(textarea.value);

    div.appendChild(textNode);

    const currentdiv = document.getElementById('itemList');
    
    
    


    const div1 = document.createElement('div1');
    const div2 = document.createElement('div2');
    const div3 = document.createElement('div3');
    div1.className = 'col-md-6 col-xxl-4 mt-2 ';
    div2.className = 'card';
    div3.className = 'card-body';

    


    div3.appendChild(div);
    div2.appendChild(div3);
    div1.appendChild(div2);
   
    currentdiv.appendChild(div1);
    textarea.value = "";

}