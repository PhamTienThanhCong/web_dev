var x = 0;
var y = 0;
var xChange = 0;
var yChange = 0;
var keyOld;
var key;
var headSnake = document.getElementById("head-snake");
var fruit = document.getElementById("game-Fruit");
var xFruit;
var yFruit;
var keyStop = 1;
var xStop = 0;
var yStop = 0;
var Diem = 0;

// Lắng Nghe Bàn phím hay là set key
function keyChange(event) {
    key = event.key;
    // console.log(key);
    if (key === "w" && keyOld !== "s" && keyStop === 1) {
        xChange = -30;
        yChange = 0;
        keyOld = key;
    }
    else if (key === "s" && keyOld !== "w" && keyStop === 1) {
        xChange = 30;
        yChange = 0;
        keyOld = key;
    }
    else if (key === "a" && keyOld !== "d" && keyStop === 1) {
        yChange = -30;
        xChange = 0;
        keyOld = key;
    }
    else if (key === "d" && keyOld !== "a" && keyStop === 1) {
        yChange = 30;
        xChange = 0;
        keyOld = key;
    }
    else if (event.key === " ") {
        stopSnake();
    }
    else if (event.key === "f") {
        console.log("exit")
        clearInterval(myVar)
    }
}

function stopSnake(){
    if (keyStop === 1){
        keyStop = -1;
        console.log("stop");
        xStop = xChange;
        yStop = yChange;
        yChange = 0;
        xChange = 0;
    }
    else if (keyStop === -1){
        console.log("run");
        yChange = yStop;
        xChange = xStop;
        keyStop = 1
    }
}

function changecolor() {
    x += xChange;
    y += yChange;
    headSnake.style.left = y + "px";
    headSnake.style.top = x + "px";
    
    fruit.style.left = yFruit + "px";
    fruit.style.top = xFruit + "px";
}

function checkCreate(){
    xFruit = (Math.floor(Math.random() * 13))*30;
    yFruit = (Math.floor(Math.random() * 14))*30;
}

function checkEat(){
    if (xFruit === x-30 && yFruit === y){
        checkCreate();
        Diem += 10;
        console.log(Diem);
    }
}

checkCreate()
function runCode() {
    document.addEventListener("keydown", keyChange);
    checkEat();
    changecolor();
    // console.log(x, y);
};

let myVar = setInterval(runCode, 200);
