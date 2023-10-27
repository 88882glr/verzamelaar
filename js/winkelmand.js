

cookieValue = document.cookie;
cartList = [];

if (cookieValue !== "") {
    cartList = JSON.parse(cookieValue.split("cart=")[1]);
};

for (i = 0; i < cartList.length; i++) {
    createProduct(i);
};

function createProduct(i) {
    const product = document.createElement("product");

    const productImg = document.createElement("img");
    productImg.classList.add("product-img");
    productImg.src = `../media/${cartList[i].img}`;

    const naam = document.createElement("product-name");
    productNaam.classList.add("product-naam");
    naam.innerHTML = products[i]["naam"];

    const prijs = document.createElement("product-prijs");
    productPrijs.classList.add("product-prijs");
    prijs.innerHTML = products[i]["prijs"];

    product.append(productImg, naam, prijs);
    document.document.querySelector('winkelmand').append(product);
};