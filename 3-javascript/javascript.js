var RandomShapesContainer = document.getElementById("container");
var showRandomShapes = document.getElementById("random-shapes");
var yourTime = document.getElementById("your-time");
var backgroundColorsArrays = ["red", "purple", "#e76f51", "#344e41", "#b5179e", "#bb3e03", "#9ef01a"];
showRandomShapes.style.display = "none";
RandomShapesContainer.style.border = "1px solid green";
RandomShapesContainer.style.width = "750px";
RandomShapesContainer.style.height = "550px";

showRandomShapes.style.width = "150px";
showRandomShapes.style.height = "150px";

// var randomPercentage = Math.random() * 50;
// var randomColors = Math.random() * backgroundColorsArrays.length;
// var movingElementsAround = Math.random() * 500;
// movingElementsAround = Math.floor(movingElementsAround);
// console.log(movingElementsAround);
// randomColors = Math.floor(randomColors);

let start = new Date().getTime();

function timeBeforeNextShape() {
    setTimeout(showShapes, Math.random() + 2000);
    start = new Date().getTime();
}



function showShapes() {
    var randomPercentage = Math.random() * 50;
    var randomColors = Math.random() * backgroundColorsArrays.length;
    var movingElementsAround = Math.random() * 500;
    movingElementsAround = Math.floor(movingElementsAround);
    console.log(movingElementsAround);
    randomColors = Math.floor(randomColors);
    showRandomShapes.style.display = "block";
    showRandomShapes.style.backgroundColor = backgroundColorsArrays[randomColors];
    showRandomShapes.style.borderRadius = randomPercentage + "%";
    showRandomShapes.style.position = "sticky";
    showRandomShapes.style.left = movingElementsAround + "px";
    showRandomShapes.style.right = movingElementsAround + "px";
    showRandomShapes.style.top = movingElementsAround + "px";
}

timeBeforeNextShape();

showRandomShapes.onclick = function () {
    let end = new Date().getTime()
    let secondsTaken = (end - start) / 1000;
    console.log("Shape clicked at " + secondsTaken + "s");
    yourTime.innerHTML = secondsTaken + "s";
    showRandomShapes.style.display = "none";


    timeBeforeNextShape();
}