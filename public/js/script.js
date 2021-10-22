let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".menu-samping");
let assetbaru = document.getElementById("div-baru");
let tombolassetbaru = document.getElementById("tombol-asset-baru");
let asset = document.getElementById('asset');

btn.onclick = function() {
    sidebar.classList.toggle("active");
}

tombolassetbaru.onclick = function() {
    assetbaru.classList.toggle("aktif");
    if (assetbaru.classList.length == 2) {
        asset.removeAttribute("disabled");
    } else if (assetbaru.classList.length == 3) {
        asset.setAttribute("disabled","true");    
    }
    
    // console.log(assetbaru.classList);
}


