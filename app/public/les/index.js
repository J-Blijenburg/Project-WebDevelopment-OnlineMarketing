function updateColor(){
    const red = document.getElementById('red-value').value;
    const blue = document.getElementById('blue-value').value;
    const green = document.getElementById('green-value').value;
  
    const color = 'rgb(' + red + ',' + green + ',' + blue + ')';
    document.body.style.backgroundColor = color;
}