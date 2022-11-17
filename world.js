window.addEventListener('DOMContentLoaded', (event)=>{


let theButton = document.getElementById("lookup");
let Entry = document.getElementById("country");
let MainIndex = "http://localhost/Web-Dev/Assignment%205/comp2245-assignment5/world.php?country=";
theButton.onclick = function() {whatCountry()}



function whatCountry() 
{


fetch(MainIndex+Entry.value)
.then(response => response.text())
.then(data =>{
document.getElementById("result").className ="visible";
let theResult = document.getElementById("result");
theResult.innerHTML = data;
})

};
});