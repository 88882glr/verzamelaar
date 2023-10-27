// function showSelectedItem() {
//     naam = document.querySelector("naam").innerHTML
//     console.log(naam)
// }
const items = document.querySelectorAll("items");
const mainBox = document.querySelector("main-box");
const selectedItem = document.querySelector("selected-item")

items.forEach(item => {
    item.addEventListener("click", () => {
        mainBox.style.pointerEvents = "none";
        mainBox.style.filter = "brightness(0.5)";

        // *:not(selected-item>*)


        const img = item.querySelector("img").getAttribute("src");
        const naam = item.querySelector("naam").innerHTML;
        const grootte = item.querySelector("grootte").innerHTML;
        const gewicht = item.querySelector("gewicht").innerHTML;
        const prijs = item.querySelector("prijs").innerHTML;
        const info = item.querySelector("info").innerHTML;
        console.log(img);

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
