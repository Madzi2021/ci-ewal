let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".menu-samping");

btn.onclick = function() {
    sidebar.classList.toggle("active");
}