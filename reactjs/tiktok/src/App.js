import { useState } from 'react'
import Content from './Content.js';


function App() {
  const [click, setClick] = useState(false);

  return (
    <div style = {{
      padding: 50
    }}>
      <button
        onClick={() => setClick(!click)}
      > click </button>
      { click && < Content />}
    </div>
  );
}

export default App;
