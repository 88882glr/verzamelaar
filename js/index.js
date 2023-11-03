const items = document.querySelectorAll("items");
const mainBox = document.querySelector("main-box");
const selectedItem = document.querySelector("selected-item")

items.forEach(item => {
    item.addEventListener("click", () => {
        mainBox.style.pointerEvents = "none";

        const img = item.querySelector("img").getAttribute("src");
        const naam = item.querySelector("naam").innerHTML;
        const grootte = item.querySelector("grootte").innerHTML;
        const gewicht = item.querySelector("gewicht").innerHTML;
        const prijs = item.querySelector("prijs").textContent;
        const info = item.querySelector("info").innerHTML;

        selectedItem.style.display = "flex"

        document.getElementById("img").src = img;
        document.getElementById("naam").innerHTML = naam;
        document.getElementById("grootte").innerHTML = "Grootte: " + grootte;
        document.getElementById("gewicht").innerHTML = "Gewicht: " + gewicht;
        document.getElementById("prijs").innerHTML = prijs;
        document.getElementById("info").innerHTML = info;
    });
});

const weg = document.getElementById("weg");

weg.addEventListener("click", () => {
    selectedItem.style.display = "none"
    mainBox.style.pointerEvents = "";
});

function getTotalItemCount() {
    cookieValue = document.cookie;
    cartList = [];

    if (cookieValue !== "") {
        cartList = JSON.parse(cookieValue.split("cart=")[1]);
    }

    let totalCount = 0;
    for (let i = 0; i < cartList.length; i++) {
        totalCount += parseInt(cartList[i].count) || 0;
    }

    return totalCount;
}

function updateTotalItemCount() {
    const totalItemCount = getTotalItemCount();
    document.querySelector("count").innerHTML = totalItemCount;
}

function addToCart() {
    const img = document.getElementById("img").src;
    const naam = document.getElementById("naam").textContent.trim();
    const prijs = document.getElementById("prijs").textContent.trim();

    cookieValue = document.cookie;
    cartList = [];

    if (cookieValue !== "") {
        cartList = JSON.parse(cookieValue.split("cart=")[1]);
    }

    let contains = false;
    for (let i = 0; i < cartList.length; i++) {
        if (cartList[i]['naam'] === naam) {
            contains = true;
            cartList[i].count = (parseInt(cartList[i].count) || 0) + 1;
            break;
        }
    }

    if (!contains) {
        cartList.push({ img: img, naam: naam, prijs: prijs, count: 1 });
    }

    expire = new Date();
    expire.setTime(expire.getTime() + 1000000000000000000);

    document.cookie = `cart=${JSON.stringify(cartList)};expires=${expire.toUTCString()}`;

    updateTotalItemCount();
    location.reload();
};

function createProduct(i) {
    const product = document.createElement("product");

    const productImg = document.createElement("img");
    productImg.classList.add("product-img");
    productImg.src = `${cartList[i].img}`;

    const productNaam = document.createElement("product-naam");
    productNaam.innerHTML = cartList[i].naam;

    let berekenPrijs = parseInt(cartList[i].prijs.replace('€ ', ''));

    let totaalPrijs = berekenPrijs * parseInt(cartList[i].count);

    const productPrijs = document.createElement("product-prijs");
    productPrijs.innerHTML = "€ " + totaalPrijs + ",-";

    const productCount = document.createElement("product-count");
    productCount.innerHTML = cartList[i].count;


    product.append(productImg, productNaam, productPrijs, productCount);
    document.querySelector('winkelmand-items').append(product);
};

window.onload = function () {
    updateTotalItemCount();
    for (i = 0; i < cartList.length; i++) {
        createProduct(i);
    };
    prijzenEls = document.querySelectorAll("product-prijs");

    let totaalKosten = 0

    for (let i = 0; i < prijzenEls.length; i++) {
        totaalKosten += parseFloat(prijzenEls[i].innerHTML.replace('€ ', ''))
    }
    document.querySelector("totaal-prijs").innerHTML = "Totaal: € " + totaalKosten + ",-";
};

let zien = false;
document.getElementById("basket").addEventListener("click", () => {
    if (!zien) {
        document.querySelector("winkelmand").style.display = "flex";
        zien = true
    } else if (zien) {
        document.querySelector("winkelmand").style.display = "none";
        zien = false
    }
})

function oncartload() {
    const queryString = window.location.search;
    if (queryString == "?status=success") {
        cartList = [];
        document.cookie = `cart=[];expires=Thu, 01 Jan 1970 00:00:00 UTC;`;
        document.location = "index.php";
    }
}

oncartload();