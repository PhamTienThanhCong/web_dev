import { useState, useEffect } from 'react';
import './App.css';
// import './domarrow';

function sleep(milliseconds) {
    const date = Date.now();
    let currentDate = null;
    do {
      currentDate = Date.now();
    } while (currentDate - date < milliseconds);
  }

function Content() {
    

    const [colorTree,setColorTree] = useState(() => {
        const colorTrees = []; 
        for(let i=1;i<32;i++){
            colorTrees.push('pink')
        }
        return colorTrees;
    })

    var colors = colorTree

    const [itemTree, setItemTree] = useState(() => {
        const pointTrees = [];
        const widthScreen = 1000;
        const widthTree = 50;
        var topTree = 50;


        for (var i = 1; i <= 16; i = i * 2) {
            var valuePoint = widthScreen / (i * 2) - widthTree / 2;
            for (var j = 1; j <= i; j++) {
                var idTo = "";
                if (pointTrees.length > 0){
                    idTo = pointTrees[Math.round(pointTrees.length/2-1)].idTree;
                }
                
                var pointTree = {
                    top: topTree,
                    left: valuePoint,
                    idTree: "tree" + Math.round(valuePoint) + topTree,
                    idArrowTreeTo: idTo,
                    idArrowTree: "cong" + topTree + Math.round(valuePoint),
                    display: "block"
                }
                pointTrees.push(pointTree);
                valuePoint = valuePoint + widthScreen / i;
            }
            topTree = topTree + 100
        }
        return pointTrees
    })

    const DeleteNode = (time) => {
        colors[time]='red'
        sleep(1000)
        setItemTree(pre=>{   
            return pre.filter(item => {
                return item.left !== itemTree[time].left
            }) 
        })
    }


    return (<div>
        <input type='text'/>        
        <button>click</button>
        <button onClick={() => DeleteNode(1)}>delete</button>
    
        {/* {itemTree.map(item =>{
            if (item.idArrowTree != "cong50475"){    
                var idFrom = "#"+item.idArrowTreeTo
                var idTo = "#"+item.idTree
                return <connection 
                    key = {item.idArrowTree}
                    id={item.idArrowTree} 
                    from= {idFrom}
                    to= {idTo}
                    color="#aaaaaa" 
                    fromX="0.5" 
                    fromY="0.5" 
                    tail
                >
                </connection>
            }
        })} */}


        {itemTree && itemTree.map((item,index) =>{
            return <div 
                key={item.idTree}
                className='TreeStyle'
                style={{
                    left: item.left, 
                    top: item.top, 
                    backgroundColor:colors[index]
                }}
                id={index}
            >
                {item.top}
            </div>
        })}
   
        
    </div>
    );
}

export default Content;