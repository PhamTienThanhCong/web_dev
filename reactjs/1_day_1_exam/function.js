const root = document.getElementById("root");
const url = "https://api-gateway.fullstack.edu.vn/api/courses/featured";
var apiResponse

function getData(callback) {
    fetch(url)
        .then(response => response.json())
        .then(data => {
            apiResponse = data.data // Prints result from `response.json()` in getRequest
        })
        .then(callback)
        .catch(error => console.error(error))
}

function App({ data }) {
    return (
        <div className={data.id}>
            <h2>{data.id}. {data.title}</h2>
            <img src={data.thumbnail_cdn} alt={data.title} />
            <p>Mô Tả: {data.description}</p>
            <p>Thành Viên: {data.students_count}</p>
        </div>
    )
}
function Renderapp() {
    return (apiResponse.map((dataCoursera) => {
        return (
            <div className="app" key={dataCoursera.id} >
                <App
                    key={dataCoursera.id}
                    data = { dataCoursera }
                />
            </div>
        )
    })
    )
}

function render() {
    return (ReactDOM.render(<Renderapp />, root))
}

getData(render)