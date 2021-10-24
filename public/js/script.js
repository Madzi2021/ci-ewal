let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".menu-samping");

btn.onclick = function() {
    sidebar.classList.toggle("active");
}

// Menu Asset
let assetbaru = document.getElementById("div-baru");
let tombolassetbaru = document.getElementById("tombol-asset-baru");
let asset = document.getElementById('tambah-akun');
if (tombolassetbaru != null) {
    tombolassetbaru.onclick = function() {
        assetbaru.classList.toggle("aktif");
        if (assetbaru.classList.length == 2) {
            asset.removeAttribute("disabled");
        } else if (assetbaru.classList.length == 3) {
            asset.setAttribute("disabled","true");    
        }
    }

    
    let akun = document.querySelectorAll(".akun");
    for (let index = 0; index < akun.length; index++) {
        const element = akun[index];
        
        element.onclick = function() {
            var x = Number(this.getAttribute("data-nilai"));
            document.getElementById("ubah-kode-akun").value = this.getAttribute("data-id");
            document.getElementById("ubah-nama-akun").value = this.getAttribute("data-nama");
            document.getElementById("ubah-nilai").value = x.toLocaleString();
        }
    }
        
}


// Menu Hutang
let hutangbaru = document.getElementById("div-baru");
let hutangbaruasset = document.getElementById("div-baru-asset");
let tombolhutangbaru = document.getElementById("tombol-hutang-baru");
let tombolhutangbaruasset = document.getElementById("tombol-hutang-baru-asset");
let hutang = document.getElementById('tambah-akun-hutang');
let hutangasset = document.getElementById('tambah-hutang-asset');
if (tombolhutangbaru != null) {
    tombolhutangbaru.onclick = function() {
        hutangbaru.classList.toggle("aktif");
        if (hutangbaru.classList.length == 2) {
            hutang.removeAttribute("disabled");
        } else if (hutangbaru.classList.length == 3) {
            hutang.setAttribute("disabled","true");    
        }
    }
    
    tombolhutangbaruasset.onclick = function() {
        hutangbaruasset.classList.toggle("aktif");
        if (hutangbaruasset.classList.length == 2) {
            hutangasset.removeAttribute("disabled");
        } else if (hutangbaruasset.classList.length == 3) {
            hutangasset.setAttribute("disabled","true");    
        }
    }
        
    let akun = document.querySelectorAll(".akun");
    for (let index = 0; index < akun.length; index++) {
        const element = akun[index];
        
        element.onclick = function() {
            var x = Number(this.getAttribute("data-nilai"));
            document.getElementById("ubah-kode-akun").value = this.getAttribute("data-id");
            document.getElementById("ubah-nama-akun").value = this.getAttribute("data-nama");
            document.getElementById("ubah-nilai").value = x.toLocaleString();
        }
    }

}


