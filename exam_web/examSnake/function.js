var x=0;
var y=0;
var keyOld;
var key;
var headSnake = document.getElementById("head-snake");

document.addEventListener("keydown",changecolor);

function changecolor(event){
    console.log(event.key);
    if (event.key === "w"){
        x -= 40;
        headSnake.style.top = x+"px";
    }
    else if (event.key === "s"){
        x += 40;
        headSnake.style.top = x+"px";
    }
    else if (event.key === "a"){
        y -= 40;
        headSnake.style.left = y+"px";
    }
    else if (event.key === "d"){
        y += 40;
        headSnake.style.left = y+"px";
    }
}
