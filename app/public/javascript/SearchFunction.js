//https://stackoverflow.com/questions/71210541/how-do-i-implement-search-function-on-bootstrap-cards

// function searchThroughItems() {
//     var input = document.getElementById("myInput");
//     var filter = input.value.toUpperCase();
//     var cards = document.getElementsByClassName("card")
//     var titles = document.getElementsByClassName("card-title");

//     for (i = 0; i <= cards.length; i++) {
//       a = titles[i];
//       if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
//         cards[i].style.display = "";
//       } else {
//         cards[i].style.display = "none";
//       }
//     }
//   }
 
  function searchThroughItemsCategory() {
    var input = document.getElementById("inputCategory");
    var filter = input.value.toUpperCase();
    var cards = document.getElementsByClassName("card")
    var titles = document.getElementsByClassName("card-title");

    for (i = 0; i <= cards.length; i++) {
      a = titles[i];
      if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
        cards[i].style.display = "";
      } else {
        cards[i].style.display = "none";
      }
    }
  }