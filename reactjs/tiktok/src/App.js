import './App.css';
import {useState} from 'react';

let statusLike = 'like';
let yourStatusLike = '';

function App() {
  const [number, setNumber] = useState(1)
  
  const changeNumber = () =>{
    if (number%2 === 1){
      statusLike = 'đã like'
      yourStatusLike = 'Bạn và'
    }
    else{
      statusLike = 'like'
      yourStatusLike = ''
    }
    setNumber(number + 1);
  }

  return (
    <div className="App">
      <h2>đây là ảnh gái xinh</h2>
      <p>{yourStatusLike} 4 người khác</p>
      <button onClick={changeNumber}>{statusLike}</button>
      <p>Bạn đã ấn: {number}</p>
    </div>
  );
}

export default App;
