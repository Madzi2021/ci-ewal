let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".menu-samping");
let baris = document.getElementById("trans");

btn.onclick = function() {
    sidebar.classList.toggle("active");
}

baris.onclick = function() {
    alert("tes");
}

