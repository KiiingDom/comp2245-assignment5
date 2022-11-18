window.addEventListener('DOMContentLoaded', function(){
  event.preventDefault();


let theButton = document.getElementById("lookup");
theButton.onclick = function() 
{
let Entry = document.getElementById("country").value;
let MainIndex = `http://localhost/comp2245-assignment5/world.php?country=${Entry}`;

fetch(MainIndex)
.then(response => response.text())
.then(data =>{
document.getElementById("result").className ="visible";
let theResult = document.getElementById("result");
theResult.innerHTML = data;
})
.catch(error => 
{
})


};



let theButton2 = document.getElementById("cityLookup");
theButton2.onclick = function() 
{
  event.preventDefault();

let Entry2 = document.getElementById("country").value;
let MainIndex2 = `http://localhost/comp2245-assignment5/world.php?country=${Entry2}&city=cities`;

fetch(MainIndex2)
.then(response => response.text())
.then(data =>{
document.getElementById("result").className ="visible";
let theResult2 = document.getElementById("result");
theResult2.innerHTML = data;
})
.catch(error => 
{
})

};


});