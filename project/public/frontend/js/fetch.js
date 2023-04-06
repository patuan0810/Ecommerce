// console.log(fetch('https://jsonplaceholder.typicode.com/posts'));
function fetchData(){
    fetch('https://jsonplaceholder.typicode.com/posts')
    .then(Response => {
        return Response.json()
    })
    .then(data =>{
        console.log('check:', data)
    })
    // .then(res => res.json())
    // .then(data =>{
    //     console.log(data.data)
    //     const html = data.data.map( user =>{
    //         return '<p>';
    //     }).join("");
    //     document.querySelector("#app").insertAdjacentHTML("afterbegin", html);
    // }) 
    // .catch(error => {console.log('Error')});
}