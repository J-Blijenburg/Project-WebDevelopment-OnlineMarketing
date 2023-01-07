// function allowDrop(ev) {
//     ev.preventDefault();
//   }
  
//   function drag(ev) {
//     ev.dataTransfer.setData("text", ev.target.id);
//   }
  
//   function drop(ev) {
//     ev.preventDefault();
//     var data = ev.dataTransfer.getData("text");
//     ev.target.appendChild(document.getElementById(data));
//   }

//   function drag_drop(event){
//     alert(event.dataTransfer.files[0].name);
//   }

const draggableElement = document.querySelector("#myDraggableElement");

draggableElement.addEventListener("dragstart", e => {
    e.dataTransfer.setData("text/plain", draggableElement.id);
});

for(const dropZone of document.querySelectorAll(".drop-zone")){
 dropZone.addEventListener("dragover", e =>{
    e.preventDefault();
    dropZone.classList.add("drop-zone--over");
 });

dropZone.addEventListener("dragleave", e => {
    dropZone.classList.remove("drop-zone--over");
})

 dropZone.addEventListener("drop", e => {
    e.preventDefault();

    document.getElementById("myFileInput").files = e.dataTransfer.files;

    console.log(e.dataTransfer.files);

    const droppedElementId = e.dataTransfer.getData("text/plain");
    const droppedElement = document.getElementById(droppedElementId);

    dropZone.appendChild(droppedElement);
    console.log(droppedElementId);
    dropZone.classList.remove("drop-zone--over");
 })
};