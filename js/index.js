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
        const prijs = item.querySelector("prijs").innerHTML;
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

window.onload = function () {
    updateTotalItemCount();
};

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

    console.log(cartList);

    updateTotalItemCount();
}










