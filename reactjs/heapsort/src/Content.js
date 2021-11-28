import { useState, useEffect } from 'react';
import './App.css';
import './domarrow';

function Content() {
    
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

    const [time, setTime] = useState(30)

    const setTimeDown = () => {
        setTime(time-1)
    }

    const DeleteNode = (time) => {
        setItemTree(pre=>{
            
            return pre.filter(item => {
                return item.left !== itemTree[time].left
            }) 
        })
    }

    useEffect(() => {
        var time = 31
        setInterval(() =>{
            time = time-1
            DeleteNode(time)
        },1000)
    },[])


    return (<div>
        <input type='text'/>        
        <button>click</button>
        <button onClick={DeleteNode}>delete</button>
    
        {itemTree.map(item =>{
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
        })}

        {itemTree && itemTree.map(item =>{
            return <div 
                key={item.idTree}
                className='TreeStyle'
                style={{left: item.left, top: item.top}}
                id={item.idTree}
                display={item.display}
            >
                {item.left}
            </div>
        })}
   
        
    </div>
    );
}

export default Content;