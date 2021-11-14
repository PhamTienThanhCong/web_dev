const url = "https://api-gateway.fullstack.edu.vn/api/courses/featured";
// A URL returns TEXT data.
var apiResponse 

function printdata(){
    console.log(apiResponse)
}

function getData(callback){
    fetch(url)
    .then(response => response.json())
    .then(data => {
        apiResponse = data.data // Prints result from `response.json()` in getRequest
    })
    .then(callback)
    .catch(error => console.error(error))
}

getData(printdata)