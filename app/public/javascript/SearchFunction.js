//https://stackoverflow.com/questions/71210541/how-do-i-implement-search-function-on-bootstrap-cards
//loop through every single character and display the card which contains one of these characters
function searchThroughItemsCategory() {
  var input = document.getElementById("inputCategory");
  var filter = input.value.toUpperCase();
  var cards = document.getElementsByClassName("card")
  var titles = document.getElementsByClassName("card-category");

  FilterCards(filter, cards, titles);
}

//The first one is for the category search and the second one is for the searchbar

function searchThroughItemsTextfield() {
  var input = document.getElementById("myInput");
  var filter = input.value.toUpperCase();
  var cards = document.getElementsByClassName("card")
  var titles = document.getElementsByClassName("card-title");

  FilterCards(filter, cards, titles);
}

function FilterCards(filter, cards, titles){
  for (i = 0; i <= cards.length; i++) {
    a = titles[i];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      cards[i].style.display = "";
    } else {
      cards[i].style.display = "none";
    }
  }
}


