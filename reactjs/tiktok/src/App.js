import './App.css';
import {useState} from 'react';



function App() {
  const [job, setjob] = useState('')

  const [jobs,setjobs] = useState(() => {
    const dataJob = JSON.parse(localStorage.getItem('job'))
    if (dataJob){
      return dataJob
    }
    return []
  })


  const [allClick, setAllClick] = useState(false)
  
  const [jobChoise,setJobChoise] = useState([])

  const saveDataJob = (data) =>{
    data = JSON.stringify(data)
    localStorage.setItem('job',data);
  }

  const clickAllCheck = ()=>{
    if (allClick === true){
      setAllClick(false)
      
    }  
    else {
      setAllClick(true)
      setJobChoise([...Array(jobs.length).keys()])
    }
  }



  const submitList = () => {
    setjobs([...jobs,job])
    setjob('');
    saveDataJob([...jobs,job])
  }

  const choiseList = (index) => {
    if(jobChoise.includes(index)){
      setJobChoise(jobChoise.filter(item => item !== index))
    }
    else{
      setJobChoise(prev => [...prev,index])
    }
  }

  const deleteJob = () =>{
    var array = jobs;
    for (var i = 0; i < jobChoise.length; i++) {
      array[jobChoise[i]] = " "
    }
    array = array.filter(item => item !== " ")
    setjobs(array);
    setJobChoise([]);
    saveDataJob(array)
  }
  return (
    <div className="AppNe">
      <input 
        value={job}
        onChange = {e => setjob(e.target.value)}
      />
      <button onClick={submitList}>làm nhé</button>
      <ul>
        {jobs.map((job, index) =>{
          return (
          <li key={index}>
            <input id={index} type="checkbox"
              onChange={() => choiseList(index)}
              defaultChecked={jobChoise.includes(index)}
            />
            <label htmlFor={index}>{job}</label>
          </li>)
        })}

      </ul>
      <button onClick={deleteJob}>Xóa nhé</button>
      <input id="all" type="checkbox"
        defaultChecked={allClick}
        onChange={clickAllCheck}
      />
      <label htmlFor="all">chọn tất cả</label>
    </div>
  );
}

export default App;
