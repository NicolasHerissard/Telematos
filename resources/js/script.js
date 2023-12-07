
document.addEventListener("DOMContentLoaded", function () {
    var burgerLink = document.getElementById("burger");
    var deroulerDiv = document.querySelector(".derouler");

    burgerLink.addEventListener("click", function (event) {
        event.preventDefault();

        // alterner entre afficher et cacher la div
        if (deroulerDiv.style.display === "none" || deroulerDiv.style.display === "") {
            deroulerDiv.style.display = "grid";
            //css de la div quand on l'affiche
            deroulerDiv.style.backgroundColor = "#ccc";
            deroulerDiv.style.justifyContent = "center";
            deroulerDiv.style.padding = "10px";
        } else {
            deroulerDiv.style.display = "none";
        }
    });
});