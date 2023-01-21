// <!-- https://www.youtube.com/watch?v=OHTudicK7nY -->
//Use a Div to create an draggable element
const dragImage = document.querySelector("#dragImage");

//The item which is dragged will be transformed into an text file
dragImage.addEventListener("dragstart", e => {
    e.dataTransfer.setData("text/plain", dragImage.id);
});

//When an imaged is dragged into the zone the opacity will decrease a little bit
for(const droppedImage of document.querySelectorAll(".drop-zone")){
    droppedImage.addEventListener("dragover", e =>{
    e.preventDefault();
    droppedImage.classList.add("drop-zone--over");
 });

 //if the dragged image is removed from the zone the opacity will return to its original state
 droppedImage.addEventListener("dragleave", e => {
    droppedImage.classList.remove("drop-zone--over");
})}

//this event listener will make sure that the dragged image can be dropped into an input field
//it will get the input value id from the html page and place the text data into an element
//this text data can later be picked up as an file
droppedImage.addEventListener("drop", e => {
    e.preventDefault();

    document.getElementById("myFileInput").files = e.dataTransfer.files;

    const droppedElementId = e.dataTransfer.getData("text/plain");
    const droppedElement = document.getElementById(droppedElementId);

    droppedImage.appendChild(droppedElement);
    droppedImage.classList.remove("drop-zone--over");
 });