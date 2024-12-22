document.addEventListener("DOMContentLoaded", function() {
    // Dropdown for cities
    const cityInput = document.getElementById("numberInput");
    const cityDropdown = document.createElement("div");
    cityDropdown.classList.add("dropdowns");
    cityInput.parentNode.insertBefore(cityDropdown, cityInput.nextSibling);

    cityInput.addEventListener("input", function() {
        const searchQuery = cityInput.value.toLowerCase();
        const matchingCities = cities.filter(city => city.toLowerCase().startsWith(searchQuery));

        renderDropdown(matchingCities);
    });

    function renderDropdown(cities) {
        cityDropdown.innerHTML = "";
        cities.forEach(city => {
            const option = document.createElement("div");
            option.classList.add("dropdowns-item");
            option.textContent = city;
            option.addEventListener("click", function() {
                cityInput.value = city;
                cityDropdown.innerHTML = ""; 
            });
            cityDropdown.appendChild(option);
        });
    }

    document.addEventListener("click", function(event) {
        if (!cityDropdown.contains(event.target) && event.target !== cityInput) {
            cityDropdown.innerHTML = "";
        }
    });

    // Kamar Tidur
    let peopleMain = document.getElementById("peopleMain");
    let peopleLessMain = document.getElementById("peopleLessMain");
    let peopleMoreMain = document.getElementById("peopleMoreMain");
    let peopleIndexMain = parseInt(peopleMain.value, 10) || 0;

    peopleLessMain.addEventListener("click", () => {
        if (peopleIndexMain > 0) {
            peopleIndexMain -= 1;
            peopleMain.value = peopleIndexMain;
        }
    });

    peopleMoreMain.addEventListener("click", () => {
        if (peopleIndexMain < 4) {
            peopleIndexMain += 1;
            peopleMain.value = peopleIndexMain;
        }
    });

    // Kamar Mandi
    let peopleMain1 = document.getElementById("peopleMain1");
    let peopleLessMain1 = document.getElementById("peopleLessMain1");
    let peopleMoreMain1 = document.getElementById("peopleMoreMain1");
    let peopleIndexMain1 = parseInt(peopleMain1.value, 10) || 0;

    peopleLessMain1.addEventListener("click", () => {
        if (peopleIndexMain1 > 0) {
            peopleIndexMain1 -= 1;
            peopleMain1.value = peopleIndexMain1;
        }
    });

    peopleMoreMain1.addEventListener("click", () => {
        if (peopleIndexMain1 < 4) {
            peopleIndexMain1 += 1;
            peopleMain1.value = peopleIndexMain1;
        }
    });
});

function setRangeMain(minValue, maxValue) {
    document.getElementById('minPriceMain').value = minValue;
    document.getElementById('maxPriceMain').value = maxValue;
}
// formatrupiah
document.addEventListener("DOMContentLoaded", function() {
    const minPriceInput = document.getElementById("minPriceMain");
    const maxPriceInput = document.getElementById("maxPriceMain");
    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
    }
    function cleanInput(input) {
        return input.replace(/\D/g, '');
    }
    minPriceInput.addEventListener("input", function() {
        var angka = cleanInput(this.value);
        this.value = formatRupiah(angka);
    });

    maxPriceInput.addEventListener("input", function() {
        var angka = cleanInput(this.value);
        this.value = formatRupiah(angka);
    });

    // Fungsi untuk mengatur rentang harga
    window.setRangeMain = function(min, max) {
        minPriceInput.value = formatRupiah(min);
        maxPriceInput.value = formatRupiah(max);
    }
});


// // buka filter lanjutan
// let filterButton = document.querySelector(".filter1");
// let filterBox = document.getElementById("filterBox");

// filterButton.addEventListener("click", function() {
//     filterBox.style.display = "block";
// });

// let cancelButton = document.getElementById("cancelButton");

// cancelButton.addEventListener("click", function() {
//     filterBox.style.display = "none";
// });

// // filterlanjutan
// function setRangeFilter(minValue, maxValue) {
//     document.getElementById('minPriceFilter').value = minValue;
//     document.getElementById('maxPriceFilter').value = maxValue;
// }
// // formatrupiah
// document.addEventListener("DOMContentLoaded", function() {
//     const minPriceInput = document.getElementById("minPriceFilter");
//     const maxPriceInput = document.getElementById("maxPriceFilter");
//     function formatRupiah(angka) {
//         var reverse = angka.toString().split('').reverse().join(''),
//             ribuan = reverse.match(/\d{1,3}/g);
//         ribuan = ribuan.join('.').split('').reverse().join('');
//         return ribuan;
//     }
//     function cleanInput(input) {
//         return input.replace(/\D/g, '');
//     }
//     minPriceInput.addEventListener("input", function() {
//         var angka = cleanInput(this.value);
//         this.value = formatRupiah(angka);
//     });

//     maxPriceInput.addEventListener("input", function() {
//         var angka = cleanInput(this.value);
//         this.value = formatRupiah(angka);
//     });

//     // Fungsi untuk mengatur rentang harga
//     window.setRangeFilter = function(min, max) {
//         minPriceInput.value = formatRupiah(min);
//         maxPriceInput.value = formatRupiah(max);
//     }
// });
// // listkota
// document.addEventListener("DOMContentLoaded", function() {
//     const cityInput = document.getElementById("numberInput1");
//     const cityDropdown = document.createElement("div");
//     cityDropdown.classList.add("dropdown");
//     cityInput.parentNode.insertBefore(cityDropdown, cityInput.nextSibling);

//     cityInput.addEventListener("input", function() {
//         const searchQuery = cityInput.value.toLowerCase();
//         const matchingCities = cities.filter(city => city.toLowerCase().startsWith(searchQuery));

//         renderDropdown(matchingCities);
//     });

//     function renderDropdown(cities) {
//         cityDropdown.innerHTML = "";
//         cities.forEach(city => {
//             const option = document.createElement("div");
//             option.classList.add("dropdown-item");
//             option.textContent = city;
//             option.addEventListener("click", function() {
//                 cityInput.value = city;
//                 cityDropdown.innerHTML = ""; // Hapus dropdown setelah memilih kota
//             });
//             cityDropdown.appendChild(option);
//         });
//     }

//     // Sembunyikan dropdown saat klik di luar dropdown
//     document.addEventListener("click", function(event) {
//         if (!cityDropdown.contains(event.target) && event.target !== cityInput) {
//             cityDropdown.innerHTML = "";
//         }
//     });
// });

// let peopleFilter = document.getElementById("peopleFilter");
// let peopleLessFilter = document.getElementById("peopleLessFilter");
// let peopleMoreFilter = document.getElementById("peopleMoreFilter");

// let peopleIndexFilter = 0;

// peopleLessFilter.addEventListener("click", ()=> {
//     peopleIndexFilter -= 1;

//     if (peopleIndexFilter <= 0) {
//         peopleIndexFilter = 1;
//         peopleFilter.value = peopleIndexFilter;
//     } else {
//         peopleFilter.value = peopleIndexFilter;
//     }
// })

// peopleMoreFilter.addEventListener("click", ()=> {
//     peopleIndexFilter += 1;

//     if (peopleIndexFilter >= 4) {
//         peopleIndexFilter = 4;
//         peopleFilter.value = peopleIndexFilter;
//     } else {
//         peopleFilter.value = peopleIndexFilter;
//     }
// })
// let peopleFilter1 = document.getElementById("peopleFilter1");
// let peopleLessFilter1 = document.getElementById("peopleLessFilter1");
// let peopleMoreFilter1 = document.getElementById("peopleMoreFilter1");

// let peopleIndexFilter1 = 0;

// peopleLessFilter1.addEventListener("click", () => {
//     peopleIndexFilter1 -= 1;

//     if (peopleIndexFilter1 <= 0) {
//         peopleIndexFilter1 = 1;
//         peopleFilter1.value = peopleIndexFilter1;
//     } else {
//         peopleFilter1.value = peopleIndexFilter1;
//     }
// });

// peopleMoreFilter1.addEventListener("click", () => {
//     peopleIndexFilter1 += 1;

//     if (peopleIndexFilter1 >= 4) {
//         peopleIndexFilter1 = 4;
//         peopleFilter1.value = peopleIndexFilter1;
//     } else {
//         peopleFilter1.value = peopleIndexFilter1;
//     }
// });






// format titik

let ul = document.querySelector(".ul");
let prev = document.querySelector(".prev");
let next = document.querySelector(".next");
let current_page = 1;
let total_page = 10;
let active_page = "";

create_pages(current_page);

function create_pages(current_page) {
    ul.innerHTML = "";

    let before_page = current_page - 2;
    let after_page = current_page + 2;

    if(current_page == 2){
        before_page = current_page - 1;
    }
    if(current_page == 1){
        before_page = current_page;
    }

    if(current_page == total_page - 1){
        after_page = current_page + 1;
    }
    if(current_page == total_page){
        after_page = current_page;
    }

    for (let i = before_page; i <= after_page; i++) {
        if (current_page == i) {
            active_page = "active_page";
        } else {
            active_page = "";

        }
        ul.innerHTML += `<li onclick="create_pages(` + i + `)"><a href="#" class="page_number ` + active_page + `">` + i + `</a></li>`;

    }

    // Next and Previous Button Functionality.

    prev.onclick = function () {
        current_page--;
        create_pages(current_page);
    }
    if(current_page <= 1){
        prev.style.display = "none";
    }else{
        prev.style.display = "block";
    }

    next.onclick = function () {
        current_page++;
        create_pages(current_page);
    }
    if(current_page >= total_page){
        next.style.display = "none";
    }else{
        next.style.display = "block";
    }

}